<?php

namespace Admin\Controller;

class AdvertController extends AdminController{
    public function Advert(){
        $model = D('Adarea');
        $data = $model->search();
 //       var_dump($data);
        $this->assign(array(
            'data'=>$data,
        ));
        $this->display();
    }
public function add()
	{
	// 2. 处理表单
	if(IS_POST)
	{$model = D('Adarea');

		if($model->create(I('post.'), 1))
	{

		$model->content = clearXSS($_POST['content']);

		// 5. 如果验证成功插入到数据库中
		if($model->add())
		{

			$this->success('操作成功！', 'http://58.30.16.58/abc.php?s=admin&c=advert&a=advert');
			exit;
		}
			}

			// 8. 如果失败就提供错误
			$error = $model->getError();
                       // 从模型中获取失败的原因
			$this->error($error);         // 显示错误信息，并在1秒之后返回上一个页面【重新显示表单】
		}
		$this->display();
	}
public function edit(){
	$id = I('get.id');
// var_dump($_POST);
	if(IS_POST)
	{
		$model = D('Adarea');

	$data['title']=$_POST['title'];
	$data['starttime']=$_POST['starttime'];
	$data['endtime']=$_POST['endtime'];
	$data['flag']=$_POST['flag'];
	$data['content']=$_POST['content'];


	$where['id'] = $id;
	if(FALSE !== $model->where($where)->save($data)){

		$this->success('操作成功！', 'http://58.30.16.58/abc.php?s=admin&c=advert&a=advert');
		exit;

	}
	$error = '操作失败！';
	$this->error($error);

		}
	 $model = D('Adarea');
        	$data = $model->sea();

        	$this->assign(array(
            'data'=>$data,
        	));
		$this->display();
}



public function del(){
	$id = I('get.id');
	$model = D('Adarea');

	if(FALSE !== $model->delete($id))
		$this->success('操作成功','http://58.30.16.58/abc.php?s=admin&c=advert&a=advert');

	else
		$this->success('操作失败！', 'http://58.30.16.58/abc.php?s=admin&c=advert&a=advert');

}

}
