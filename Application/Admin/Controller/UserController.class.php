<?php

namespace Admin\Controller;

class UserController extends AdminController{

	public function User(){

		$model = D('User');
    	$data = $model->search();
			//var_dump($data);
    	$this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
    	));

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
    				$this->success('添加成功！', 'http://58.30.16.58/abc.php?s=Admin&c=user&a=user');
    				exit;
    			}
    		}

    	}

	}
}