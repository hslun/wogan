<?php

namespace Admin\Controller;

class AgentController extends AdminController{
	public function add(){
            if($_POST['pname']){
                $pname=mb_substr($_POST['pname'], 0, -3, 'UTF-8');
                $model = D('PcdProvince');
                $data1 = $model->pid();
                $p = implode('',$data1);

                       $add['provinceid'] =$p;
                        $add['cityid'] = $data2;
                        $add['districtid']=$_POST['districtid'];
                        $add['start_date']=$_POST['start_date'];
                        $add['end_date']=$_POST['end_date'];
                        $add['account']=$_POST['account'];
                        $add['password']=$_POST['password'];
                        $add['create_date']=$_POST['create_date'];
                      var_dump($add);

                        if($id = M('agent')->data($add)->add())
                {
                    $this->success('添加成功', 'http://58.30.16.58/abc.php?s=Admin&c=agent&a=agent');
                    exit;
            }
              

            }else if($_POST['city']){

                $cname = mb_substr($_POST['city'], 0, -3, 'UTF-8');
                 $model = D('PcdCity');
                $data2 = $model->cid();
               $c = implode('',$data2);
               }else if($_POST['District']){

                $dname = mb_substr($_POST['District'], 0, -3, 'UTF-8');
                 $model = D('PcdDistrict');
                $data3 = $model->did();
               $d = implode('',$data3);
               }

		if(IS_POST)
    	{

            var_dump($_POST);exit;
                        $add['provinceid'] = $_POST['provinceid'];
                        $add['cityid'] = $data2;
                        $add['districtid']=$_POST['districtid'];
                        $a = $model->create(I('post.'), 1);
                        $a['provinceid']=$p;
                     
                        $a['cityid']=$c;
                        $a['districtid']=$_POST['districtid'];

                        if($id = $model->data($a)->add())
    			{
    				$this->success('添加成功', 'http://58.30.16.58/abc.php?s=Admin&c=agent&a=agent');
    				exit;
    		}


     }
	 $this->display();
     exit;
}
	public function Agent(){
        $abc = D('PcdProvince');
        $pro = $abc->abc();
          $this->assign(array('abc'=>$pro));
          $this->display();
          exit;
        
			$model = D('Agent');
			$modelA = D('Agent');
			$where['id'] = $_SESSION['admin_id'];
			$data = M('agent')->where($where)->find();
			$usertype = $data['usertype'];



        $modelA = D('Agent');
        $dataA = $modelA->area();
        $this->assign(array(
			'usertype'=>$usertype,
            'Pname' => $dataA['ProvinceName'],
            'Cname' => $dataA['CityName'],
            'Dname' => $dataA['DistrictName'],
        ));
        $where['id'] = $_SESSION['admin_id'];
        $dataagent = M('agent')->where($where)->find();
        $usertype = $dataagent['usertype'];
		if(!empty($dataA['ProvinceName'])&&empty($_POST['city'])){
    		$province = $dataA['ProvinceName'];
    		$model = D('PcdProvince');
            $pname = $model->search($dataA['ProvinceName']);
            $m = D('Agent');
            $d = $m->search();
    		$this->assign(array(
                'usertype'=>$usertype,
        		'pname' => $pname['data'],
                'page' => $data['page'],
                'province' => $_POST['province'],));
		    $this->display();
		    exit;
		}elseif(($_POST['city'])||!empty($dataA['CityName'])){
    		$province = $dataA['CityName'];
    		$model = D('PcdDistrict');
            $data = $model->search($dataA['CityName']);
		    $this->assign(array(
                'usertype'=>$usertype,
    		'data' => $data,
			'province' => $_POST['province'],));
    		$this->display();
    		exit;
	    }elseif($dataA['CityName']!="" && $dataA['DistrictName']=='' ){
    		$city = $dataA['CityName'];
    		$m = D('PcdCity');
            $data1 = $m->search();
    		$this->assign(array(
                'usertype'=>$usertype,
        		'data1' => $data1['data'],
    			'page1' => $data['page'],
    			'city' => $_POST['city'],
    			'province' => $_POST['province'],));
    		$this->display();
    		exit;
	    }else{
            //$city = $dataA['CityName'];
    		//$m = D('PcdCity');
            $data2 = $m->search();
            $this->assign(array(
                'data2' => $data2['data'],
                'page2' => $data['page'],
    			'county' => $dataA['DistrictName'],
    			'city' => $dataA['CityName'],
    			'province' => $dataA['ProvinceName'],
                'usertype'=>$usertype
        	));
			echo "else";
    		$this->display();
    		exit;
	    }
	 $this->display();
    }
        function randstr($len=6) {
        $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        // characters to build the password from
        mt_srand((double)microtime()*1000000*getmypid());
        // seed the random number generater (must be done)
        $password='';
        while(strlen($password)<$len)
        $password.=substr($chars,(mt_rand()%strlen($chars)),1);

        $str='0123456789';
        // characters to build the password from
        mt_srand((double)microtime()*1000000*getmypid());
        // seed the random number generater (must be done)
        $name='';
        while(strlen($name)<9)
        $name.=substr($chars,(mt_rand()%strlen($str)),1);

        $this->assign(array(
            'password'=>$password,
            'name'=>$name,
        ));

        $this->display();

        }
        public function show(){

            $model = D('Agent');
            $data = $model->show();
            //var_dump($data);
            $this->assign(array(
                'data'=>$data,
            ));
            $this->display();
        }
        public function edit(){
            //var_dump($_POST);exit;
            if($_POST['oldpwd']){
                $old = $_POST['oldpwd'];
        $new = $_POST['password'];
            }



            $model = D('Agent');
		$where['id'] = $_POST['id'];
		$data = $model->where($where)->find();
        if($_POST['oldpwd']){
        if($data['password'] == md5($old.C(MD5_KEY))){
            $data['password'] = md5($new.C(MD5_KEY));
            $model->where($where)->save($data);

                    $this->success('保存成功','http://58.30.16.58/abc.php?s=Admin&c=index&a=index',2);
            exit;
        }else{
            echo '<script>alert("输入原始密码错误");</script>';
            exit;
            //$this->error();
        }
        }


            if($model->edit()){
                $this->success('保存成功','http://58.30.16.58/abc.php?s=Admin&c=index&a=index',2);
                exit;
            }
            $this->error($model->getError());
        }
        public function index(){
            $model = D('Agent');
            $data = $model->index();
            //var_dump($data);
            $this->assign(array(
                'data'=>$data,
            ));
            $this->display();
        }
		public function del(){
		$id = I('get.id');
		$model = D('Agent');

		if($model->delete($id)){
			$this->success('删除成功','http://58.30.16.58/abc.php?s=Admin&c=agent&a=agent');
			exit;
		}
		$this->error($model->getError());
		}
}
