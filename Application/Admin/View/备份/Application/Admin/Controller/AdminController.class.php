<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller
{
	// 因为构造函数中一个类最先、自动执行的代码
	public function __construct()
	{
		// 必须先调用父类的构造函数
		parent::__construct();
		// 验证登录
		if(!session('admin_id'))
			$this->error('必须先登录！','http://58.30.16.58/abc.php?s=Admin/Login/login' );
		/***************** 验证是否有权限访问这个页面 **************************/
		//$priModel = D('Privilege');
		//if(!$priModel->hasPri())
		//	$this->error('无权访问！');
	}
}














