<?php

namespace Admin\Controller;

class OrderController extends AdminController{
    public function index(){
        $modelA = D('Agent');
                            $dataA = $modelA->area();
                            //var_dump($dataA);
                            $this->assign(array(
                            'Pname' => $dataA['ProvinceName'],
                            'Cname' => $dataA['CityName'],
                            'Dname' => $dataA['DistrictName'],
                                ));
       // var_dump($_POST);
            $province=$_POST['province'];
            $city=$_POST['city'];
            $county=$_POST['county'];
            $model = D('Order');
            $data = $model->search();
            // 今日收入及订单量
             $money="";
            $count="";
            foreach($data['data'] as $k=>$v){
                $money += $v['money'];
                $count++;
            }
            // 今日发布的订单量
            $data1 = $model->sum();
            $i = "";
           foreach($data1['data'] as $k1=>$v1){

                       $i++;
           }
       // 订单展示

        $d = $model->lst();


        //$fromid,$toid
        // $mem= D('Member');
        //  $from = $mem->from($fromid);//发单人
        // $to = $mem->to($toid['tomemberid']);//接单人
        // var_dump($to);
        //var_dump(time());

        //var_dump($data1['data']);

        //var_dump($d['data']);
        $this->assign(array(
    	   'data' => $d,
    	   'page' => $d['page'],
                'tonm' => $d['toname'],
                'money'=>$money,
                'count'=>$count,
                'i'=>$i,
                'county'=>$county,
                'province'=>$province,
                'city'=>$city,
                'from'=>$from,
                'to'=>$to,
				'c'=>$d['count'],

                ));

        $this->display();
    }
    public function lst(){
        $model = D('Order');
        $data = $model->lst(); 
        $this->display(); 
    }
    public function liushui(){ 
        $whereorders['isPayToAgent'] = 0;
        $whereorders['fromMemberAllowCancel'] = 0;
        $whereorders['toMemberAllowCancel'] = 0;
        $whereorders['hasconfpay'] = 1; 
        $orders = M('order')->where($whereorders)->order('id desc')->select(); 
        foreach ($orders as $key => $value) {  
            $this->agentmoney($orders[$key]['id']);   
        } 
    } 

    // 直辖市
    public function agentmoney($orderid){
        if($orderid){

             // 北京1 上海73 天津2 重庆234 香港343 澳门344  city表
            $zhixiashi_city = array(1,73,2,22,343,344); 

            // 北京1 上海9 天津2 重庆22 香港32 澳门33 province表
            $zhixiashi_province = array(1,9,2,22,32,33); 

            $whereorder['id'] = $orderid;
            
            $order = M('order')->where($whereorder)->find();    
            $money = $order['money'];
            $whereuser['id'] = $order['frommemberid'];
            // 获取到用户
            $member = M('member')->where($whereuser)->find();  
            // 省份 
            $whereprovince['provinceid'] = $member['provinceid'];
            $wherecity['cityid'] = $member['cityid'];
            $wheredistrict['districtid'] = $member['districtid'];  
            $agent = M('agent');
            $provinceagent = $agent->where($whereprovince)->find();
            $cityagent = $agent->where($wherecity)->find();
            $districtagent = $agent->where($wheredistrict)->find();    
            if(!empty($districtagent)){
                $wheredistricatagentcity['id'] = $districtagent['districtid']; 
                $districtcity = M('pcd_district')->where($wheredistricatagentcity)->find();  
                $districtcityisin = in_array($districtcity['CityID'],$zhixiashi_city);
                 if($districtcityisin){
                    $districtcityis = 1;
                }else{
                     $districtcityis = 0;
                } 
            }    

            // 直辖市有区代理
            if(!empty($districtagent) && $districtcityis == 1 ){
                 
                $districtmoney =  ($money * 5) / 100;
                $provincemoney = ($money * 3) /100; 
                $dataprovincetotal['total'] = $provinceagent['total']+$provincemoney;  
                $whereprovincetotal['id'] = $provinceagent['id'];
                $provincetotal = $agent->where($whereprovincetotal)->save($dataprovincetotal);   
                $datadistricttotal['total'] = $districtagent['total']+$districtmoney;
                $wheredistricttotal['id'] = $districtagent['id']; 
                $districttotal = $agent->where($wheredistricttotal)->save($datadistricttotal); 
                $dataorderpayagent['isPayToAgent'] = 1;
                $orderpayagent = M('order')->where($whereorder)->save($dataorderpayagent); 
            }elseif(!empty($districtagent) && $districtcityis == 0){
                
                // 存在县代理
                $districtmoney =  ($money * 5) / 100;
                $citymoney = ($money * 2) /100;
                $provincemoney = ($money *1) /100;

                $dataprovincetotal['total'] = $provinceagent['total']+$provincemoney;
                $whereprovincetotal['id'] = $provinceagent['id'];
                $provincetotal = $agent->where($whereprovincetotal)->save($dataprovincetotal);  

                $datacitytotal['total'] = $cityagent['total']+$citymoney;
                $wherecitytotal['id'] = $cityagent['id'];
                $citytotal = $agent->where($wherecitytotal)->save($datacitytotal); 

                $datadistricttotal['total'] = $districtagent['total']+$districtmoney;
                $wheredistricttotal['id'] = $districtagent['id']; 
              
                $districttotal = $agent->where($wheredistricttotal)->save($datadistricttotal);

                $dataorderpayagent['isPayToAgent'] = 1;
                $orderpayagent = M('order')->where($whereorder)->save($dataorderpayagent);

            // 没有县级代理
            }elseif(empty($districtagent) && !empty($cityagent)){  
                 
                $citymoney = ($money * 7) /100; 
                $provincemoney = ($money *1) /100;

                $dataprovincetotal['total'] = $provinceagent['total']+$provincemoney;
                $whereprovincetotal['id'] = $provinceagent['id'];
                $provincetotal = $agent->where($whereprovincetotal)->save($dataprovincetotal); 

                $datacitytotal['total'] = $cityagent['total']+$citymoney;
                $wherecitytotal['id'] = $cityagent['id'];
                $citytotal = $agent->where($wherecitytotal)->save($datacitytotal); 

                $dataorderpayagent['isPayToAgent'] = 1;
                $orderpayagent = M('order')->where($whereorder)->save($dataorderpayagent); 

            // 没有县级代理,没有城市代理
            }elseif(empty($districtagent) && empty($cityagent) && !empty($provinceagent)){ 
                $provincemoney = ($money *8) /100;
               
                $dataprovincetotal['total'] = $provinceagent['total']+$provincemoney;
                $whereprovincetotal['id'] = $provinceagent['id'];
                $provincetotal = $agent->where($whereprovincetotal)->save($dataprovincetotal); 

                $dataorderpayagent['isPayToAgent'] = 1;
                $orderpayagent = M('order')->where($whereorder)->save($dataorderpayagent); 
            } 
           
        }
    }
}