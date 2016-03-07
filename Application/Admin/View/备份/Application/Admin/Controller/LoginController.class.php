<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller
{
	public function login()
	{

		if(IS_POST)
		{
			$model = D('Agent');
			// 接收表单并验证表单
			if($model->create(I('post.'), 9))
			{
				if($model->login())
				{
                                    $data = $model->check();

                                    if(empty($data['name'])){
                                        //var_dump($data);
                                        $this->success('首次登录,请完善信息！', 'http://58.30.16.58/abc.php?s=Admin&c=Member&a=Information');
					exit;
                                    }
                                    $this->success('登录成功！', 'http://58.30.16.58/abc.php?s=Admin&c=index&a=index');
                                    exit;

				}
			}
			$this->error($model->getError());
		}

		$this->display();
	}
	public function register(){
		$this->display();
	}
        public function logout()
	{
		$model = D('Agent');
		$model->logout();
		// 不提示信息直接跳转
		redirect('http://58.30.16.58/abc.php?s=Admin/login/login');
	}
}