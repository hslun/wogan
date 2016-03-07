<?php

namespace Admin\Controller;

class FinanceController extends AdminController{
    public function Finance(){
        $model = D('ExtractManage');
        $data = $model->search();
        $money = D('Order');
        $result = $money->mon();
        $yue = D('Agent');
        $yu = $yue->search();

	$where['id'] =  $_SESSION['admin_id'];
	$pay = $yue->where($where)->find();
	$this->assign('pay',$pay);


        foreach($yu['data'] as $k1=>$v1){
            $y+=$v1['balance'];
        }

        $m = "";
        foreach ($result['data'] as $k=>$v){
            $m+=$v['money'];
        }

//        var_dump($m);
        $this->assign(array(
    		'data' => $data['data'],
    		// 'page' => $data['page'],
                     'money'=> $m,
	'data1' => $yu,          
          'yue'=>$y,
                ));
        $this->display();
    }
}
