<?php

namespace Admin\Controller;

class AgentController extends AdminController{
	public function add(){
            if($_POST['pname']){
                $pname=mb_substr($_POST['pname'], 0, -3, 'UTF-8');
                $model = D('PcdProvince');
                $data1 = $model->pid();
                $p = implode('',$data1);


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

			$model = D('Agent');
                        $add['provinceid'] = $_POST['provinceid'];
                        $add['cityid'] = $data2;
                        $add['districtid']=$_POST['districtid'];
                        $a = $model->create(I('post.'), 1);
                        $a['provinceid']=$_POST['provinceid'];
                        $a['cityid']=$c;
                        $a['districtid']=$_POST['districtid'];

                        if($id = $model->data($a)->add())
    			{
    				$this->success('添加成功！', 'http://58.30.16.58/abc.php?s=Admin&c=agent&a=agent');
    				exit;
    		}


     }
	 $this->display();
}
	public function Agent(){
                            $modelA = D('Agent');
                            $dataA = $modelA->area();
							//var_dump($dataA);
                            $this->assign(array(
                            'Pname' => $dataA['ProvinceName'],
                            'Cname' => $dataA['CityName'],
                            'Dname' => $dataA['DistrictName'],
								'searchdistrict' =>$_POST['county'],
								'searchcity' =>$_POST['city'],
								'searchprovince' =>$_POST['province'],
                                ));

		$where['id'] = $_SESSION['admin_id'];
		$m = M('agent');
		$m_data = $m->where($where)->find();
		$usertype = $m_data['usertype'];
		$this->assign('usertype',$usertype);


		if($usertype == 0){

		}else if($usertype == 1){

		}else if($usertype == 2){

		}else if($usertype == 3){

		}

		if(!empty($dataA['ProvinceName'])&&empty($_POST['city'])){

		$province = $dataA['ProvinceName'];
		$model = D('PcdProvince');
                        $pname = $model->search($dataA['ProvinceName']);

                         $m = D('Agent');
                        $d = $m->search();

		$this->assign(array(
    		'pname' => $pname['data'],
                        'page' => $data['page'],
                        'province' => $_POST['province'],


    	));
		 $this->display();
		 exit;
		}else	if(($_POST['city'])||!empty($dataA['CityName']))
		{

		$province = $dataA['CityName'];
		$model = D('PcdDistrict');
                          $data = $model->search($dataA['CityName']);
                //var_dump($data);

		$this->assign(array(
    		              'data' => $data,

			'province' => $_POST['province'],

    	));
		 $this->display();
		 exit;
	}else if($dataA['CityName']!="" && $dataA['DistrictName']=='' ){
        // var_dump($_POST);
		//echo '输出区县';
		$city = $dataA['CityName'];
		$m = D('PcdCity');
                $data1 = $m->search();
                //var_dump($data1);


		$this->assign(array(
    		'data1' => $data1['data'],
			'page1' => $data['page'],
			'city' => $_POST['city'],
			'province' => $_POST['province'],
    	));
		 $this->display();
		 exit;
	}else{
        // var_dump($_POST);
                $city = $dataA['CityName'];
		$m = D('PcdCity');
                $data2 = $m->search();
               // var_dump($data2);
                $this->assign(array(
                        'data2' => $data2['data'],
                        'page2' => $data['page'],
			'county' => $dataA['DistrictName'],
			'city' => $dataA['CityName'],
			'province' => $dataA['ProvinceName'],
    	));
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
