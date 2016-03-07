<?php

namespace Admin\Controller;

class IndexController extends AdminController{
    public function index(){
    	$model = D('Agent');
    	$data = $model->admin();
    	//var_dump($data);
    	$this->assign(array('data'=>$data));
        $this->display();
    }


}
