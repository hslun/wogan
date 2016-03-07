<?php

namespace Admin\Controller;

class MemberController extends AdminController{
	public function Information(){
        $this->display();
    }

	public function add(){
		if(IS_POST)
    	{
    		$model = D('User');
    		if($model->create(I('post.'), 1))
    		{
    			if($id = $model->add())
    			{
    				$this->success('添加成功！', 'http://58.30.16.58/abc.php?s=Admin&c=Member&a=user');
    				exit;
    			}
    		}

    	}
    }
        public function membervipadd(){
            if(!empty($_REQUEST['start_date']) && !empty($_REQUEST['end_date'])){
                $model->membervipadd();
            }else{
                $this->error();
            }
        }
        public function memberlockd(){
            if(!empty($_REQUEST['id'])){
                $uid = $_REQUEST['id'];
                $model = D('member');
                $data = $model->memberlockupd($uid); 
                echo json_decode($data);
            }else{
                 echo json_decode(0);
            }
        }
        public function memberlockj(){
            if(!empty($_REQUEST['id'])){
                $uid = $_REQUEST['id'];
                $model = D('member');
                $data = $model->memberlockupj($uid); 
                echo json_decode($data);
            }else{
                 echo json_decode(0);
            }
        }
        public function Member(){
			$this->assign(array(
    		    'province' =>$_POST['province'],
    		    'city' =>  $_POST['city'],
    		    'county' => $_POST['county'],));
            if($_POST['province']==""){
	$model = D('Member');
                $data = $model->search();  
                $this->assign(array(
    		      'data' => $data['data'],
    		      'page' => $data['page'],));
                $this->display();
                exit;
           }else if($_POST['province']!=="" && $_POST['city']==''){
                $mode = D('Member');
                $dat = $mode->searc(); 
			     //var_dump($dat);
                $this->assign(array(
    		   'dat' => $dat['data'],
                        'page' => $dat['page']
                        ));
                $this->display();
                exit;
           }else if($_POST['city']!=="" && $_POST['county']==''){
                $mod = D('Member');
                $da = $mod->sear();
			     //var_dump($da);
                $this->assign(array(
    		       'da' => $da['data'],
                      'page' => $da['page']
                   ));
                $this->display();
                exit;
           }else if($_POST['county']!==""){
                $mod = D('Member');
                $d = $mod->sea();
		        //var_dump($d);
                $this->assign(array(
    		    'd' => $d['data'],));
                $this->display();
                exit;
        }
    }
        public function Vipapproval(){
            $model = D('Vipapproval');
            $data = $model->search();
//            var_dump($_POST);
			//var_dump($data);
                $this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
                ));

                $this->display();
                if($_POST['yes']){

                }
        }
        public function vipmember(){
            $model = D('Member');
            $data = $model->searcha();
             $this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
                ));

                $this->display();
                exit;
        }
         public function edit()
    {

    	$id = I('get.memid');
//        var_dump($id);exit;
    	if(IS_GET)
    	{
    		$model = D('Member');
                $data['level'] = '2';
                $condition['id'] = $id;
                $result = $model->where($condition)->save($data);
                 if($result!==false){

                     $this->success('开通成功！','http://58.30.16.58/abc.php?s=Admin&c=Member&a=del/memid/'.$id);
    				exit;

                 }

    		$this->error($model->getError());
    }}
        public function del(){
            $id = I('get.memid');

            if(IS_GET){
            $Dao = M("Vipapproval");
            $condition['memberid'] = $id;
            // 删除 uid=5 的数据记录
            $result = $Dao->where($condition)->delete();

            if($result!==false){
                     $this->success('操作成功！', 'http://58.30.16.58/abc.php?s=Admin&c=Member&a=vipapproval');
    				exit;

                 }
        }

        }
}