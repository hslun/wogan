<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model
{
	protected $insertFields = array('username','password','chk_code','cpassword');
	protected $updateFields = array('id','username','password','chk_code','cpassword');
	protected $_validate = array(
		array('username', 'require', '用户名不能为空！', 1, 'regex', 3),
		array('username', '1,30', '用户名的值最长不能超过 30 个字符！', 1, 'length', 3),
		// 以下两个只有在添加时生效
		array('password', 'require', '密码不能为空！', 1, 'regex', 1),
		array('password', '1,32', '密码的值最长不能超过 32 个字符！', 1, 'length', 1),
		// 第四个参数必须是1：代表必须验证【否则默认是说表单中有这个字段时才验证，那么有人就可以从表单中把这一个输入框删除掉这样就能跳过验证】
		// 以下两个规则设置为9代码只有在登录时才会生效【9是我们自己规则的代表登录】
		array('password', 'require', '密码不能为空！', 1, 'regex', 9),
		array('chk_code', 'require', '验证码不能为空！', 1, 'regex', 9),
		array('chk_code', 'chk_chkcode', '验证码不正确！', 1, 'callback', 9),
		// 以下规则只有在添加时生效
		array('cpassword', 'password', '两次密码不一致！', 1, 'confirm', 1),
		// 以下规则只有在修改时生效
		array('cpassword', 'password', '两次密码不一致！', 1, 'confirm', 2),
		// 以下两个规则只有添加和修改时生效
		array('username', '', '账号已经存在！', 1, 'unique', 1),
		array('username', '', '账号已经存在！', 1, 'unique', 2),
	);
	public function chk_chkcode($code)
	{
		$verify = new \Think\Verify();
	    return $verify->check($code);
	}
	public function logout()
	{
		session(null);
	}
	public function login()
	{
		// 从模型中获取用户名和密码，因为我们会在控制器中调用create方法接收数据到模型
		$username = $this->username;
		$password = $this->password;
		// 先查询用户名
		$user = $this->where(array('username'=> array('eq', $username)))->find();
		if($user)
		{
			if($user['password'] == md5($password . C('MD5_KEY')))
			{
				// 登录成功之后我们把管理员的信息存到session
				session('admin_id', $user['id']);
				session('username', $user['username']);
				return TRUE;
			}
			else
			{
				$this->error = '密码不正确！';
				return FALSE;
			}
		}
		else
		{
			$this->error = '账号不存在！';
			return FALSE;
		}
	}
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($username = I('get.username'))
			$where['username'] = array('like', "%$username%");
		// 根据角色ID搜索
		$roleId = I('get.role_id');
		if($roleId)
		{
			// 先根据角色ID取出这个角色下所有的管理员的ID
			$raModel = M('RoleAdmin');
			$adminId = $raModel->field('admin_id')->where(array(
				'role_id' => array('eq', $roleId),
			))->select();
			// 转化成一维
			$adminIds = array();
			foreach ($adminId as $k => $v)
			{
				$adminIds[] = $v['admin_id'];
			}
			$where['a.id'] = array('in', $adminIds);
		}
		/************************************* 翻页 ****************************************/
		// 取总的记录数
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		/**
		 * SELECT a.*,GROUP_CONCAT(c.role_name) role_name
 FROM php36_admin a
 LEFT JOIN php36_role_admin b ON a.id=b.admin_id
 LEFT JOIN php36_role c ON b.role_id=c.id
 GROUP BY a.id
		 */
		$data['data'] = $this->alias('a')
		->field('a.*,GROUP_CONCAT(c.role_name) role_name')
		->join('LEFT JOIN __ROLE_ADMIN__ b ON a.id=b.admin_id LEFT JOIN __ROLE__ c ON b.role_id=c.id')
		->where($where)
		->group('a.id')
		->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{
		// 添加管理员之前先加密
		$data['password'] = md5($data['password'] . C('MD5_KEY'));
	}
	// 添加后
	protected function _after_insert($data, $option)
	{
		// 处理管理员所在角色
		$roleId = I('post.role_id');
		if($roleId)
		{
			$raModel = M('RoleAdmin');
			foreach ($roleId as $k => $v)
			{
				$raModel->add(array(
					'admin_id' => $data['id'], // 添加之后的管理员的ID
					'role_id' => $v,
				));
			}
		}
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{
		// 处理管理员所在角色
		// 先删除中间表中原来的数据
		$raModel = M('RoleAdmin');
		$raModel->where(array(
			'admin_id' => $option['where']['id'],
		))->delete();
		// 重新把新选择的添加一遍
		$roleId = I('post.role_id');
		if($roleId)
		{
			foreach ($roleId as $k => $v)
			{
				$raModel->add(array(
					'admin_id' => $option['where']['id'], // 添加之后的管理员的ID
					'role_id' => $v,
				));
			}
		}
		// 判断如果密码为空就不修改密码【从表单数组中把这一项删除】
		if(empty($data['password']))
			unset($data['password']);
		else
			$data['password'] = md5($data['password'] . C('MD5_KEY'));
	}
	// 删除前
	protected function _before_delete($option)
	{
		if($option['where']['id'] == 1)
		{
			$this->error = '超级管理员不能被删除！';
			return FALSE;
		}
		// 把中间表中对应的数据也删除
		$raModel = M('RoleAdmin');
		$raModel->where(array(
			'admin_id' => array('eq', $option['where']['id']),
		))->delete();
	}
	/************************************ 其他方法 ********************************************/
}