<?php
namespace Admin\Controller;

class WithdrawController extends AdminController{
public function Withdraw(){
    	$model = D('ExtractManage');
        $data = $model->search();
        $money = D('Order');
        $result = $money->mon();

        	$m = "";
        foreach ($result['data'] as $k=>$v){
            $m+=$v['money'];
        }
         $this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
       		 'money'=> $m,
                ));
        $this->display();
    }

public function f1(){
	$model = D('ExtractManage');
	$data = $model->order();
	$i="";
	$money="";
	foreach($data as $k=>$v){
		$money+=$v['money'];
		$i++;
	}
	//var_dump($money);
	$this->assign(array(
		'data' => $data,
		'money'=>$money,
		'i'=>$i,
		));
	$this->display();
}
public function WithdrawManager(){
    	$model = D('Extract');
        $data = $model->search();
        $money = D('Order');
        $result = $money->mon();

        	$m = "";
        foreach ($result['data'] as $k=>$v){
            $m+=$v['money'];
        }
         $this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
       		 'money'=> $m,
                ));
        $this->display();
    }
public function edit(){
    	$model=D('ExtractManage');
    	$data = $model->edit();
    	if(!data){
    		$this->success('操作成功','http://58.30.16.58/abc.php?s=Admin&c=Withdraw&a=Withdraw');
    	}
    	echo "操作失败";
    }
}
