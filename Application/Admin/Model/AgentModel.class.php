<?php
namespace Admin\Model;
use Think\Model;
class AgentModel extends Model{
   public function area(){
   
    $where = array(
            'a.id'=>array('eq',$_SESSION['admin_id']),
        );
    $data = $this->alias('a')->JOIN('
    LEFT JOIN __PCD_PROVINCE__ b ON a.provinceid = b.id
    LEFT JOIN __PCD_CITY__ c ON a.cityid = c.id
    LEFT JOIN __PCD_DISTRICT__ d ON a.districtid = d.id
        ')
    ->field('b.ProvinceName,c.CityName,d.DistrictName')->where($where)->find();
    // echo $this->getLastSql();
    return $data;
   }
	public function search($pageSize = 15)
	{
		$count = $this->alias('a')->where($where)->count();

		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');

		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('a.*')->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		//echo $this->getLastSql();
		return $data;
	}
        public function pid(){
            $pname=mb_substr($_POST['pname'], 0, -3, 'UTF-8');
            $where = array(
                'b.ProvinceName'=>array('eq',$pname)
            );
            $data = $this->alias('a')->field('b.id')->JOIN("LEFT JOIN __PCD_PROVINCE__ b on a.provinceid = b.id")->where($where)->select();
            //echo $this->getLastSql();
            return $data;
        }
        public function show(){
            if($_GET){
                $id = $_GET['id'];
                $where=array(
                    'a.id'=>array('eq',$id),
                );
                $data = $this->alias('a')->field('a.*')->where($where)->select();
                //echo $this->getLastSql();
                return $data;
            }
        }
        public function login()
	{
		// 从模型中获取用户名和密码，因为我们会在控制器中调用create方法接收数据到模型
		$username = $this->account;
		$password = $this->password;
        // var_dump($password);exit;
		// 先查询用户名
		$user = $this->where(array('account'=> array('eq', $username)))->find();
		if($user)
		{
            
			if($user['password'] == md5($password. C('MD5_KEY')))
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
        public function check(){
            $id = $_SESSION['admin_id'];
            $where = array(
                'a.id'=>array('eq',$id),
            );
            $data = $this->alias('a')->field('a.name')->where($where)->find();
//            $this->getLastSql();
           return $data;
        }
        public function edit(){
            $id = $_POST['id'];
            $where=array(
                'id'=>array('eq',$id),
            );
            $savedata['name']=$_POST['name'];
            $savedata['tel']=$_POST['tel'];
            $savedata['email']=$_POST['email'];
            $savedata['idcard']=$_POST['idcard'];
            $savedata['alipay']=$_POST['alipay'];
          
            
            $data = $this->where($where)->save($savedata);
            echo $this->getLastSql();
            return $data;
        }
        public function logout()
	{
		session(null);
	}
        public function index(){
            $where = array(
                'a.id'=>array('eq',$_SESSION['admin_id']),
            );
            $data = $this->alias('a')->field('a.*,b.ProvinceName,c.CityName,d.DistrictName')->JOIN("LEFT JOIN __PCD_PROVINCE__ b on a.provinceid = b.id
                LEFT JOIN __PCD_CITY__ c on a.cityid = c.id
                LEFT JOIN __PCD_DISTRICT__ d on a.districtid = d.id
                ")->where($where)->select();
            //echo $this->getLastSql();
            return $data;
        }
        public function admin(){
            $where = array(
            'id' => array('eq',$_SESSION['admin_id']),
                );
            $data = $this->where($where)->find();
            return $data;
        }

        protected function _before_insert(&$data, $option)
    {
        // 添加管理员之前先加密
        $data['password'] = md5($data['password']. C('MD5_KEY'));
  
    }
}