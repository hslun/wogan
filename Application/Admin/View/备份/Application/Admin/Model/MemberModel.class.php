<?php
namespace Admin\Model;
use Think\Model;
class MemberModel extends Model
{
	public function search($pageSize = 15)
	{
		$where = array(
			//'a.cityid'=>array('eq','1')
                    'a.level'=>array('eq','1')
		);
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();

		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$page_tpl = urlencode('[PAGE]');
		$page->url   =  "http://58.30.16.58/abc.php?s=admin&c=Member&a=Member&p=".$page_tpl; 
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('a.nikename,tel,b.ProvinceName,c.CityName,d.DistrictName,a.id')->where($where)
		->JOIN('LEFT JOIN __PCD_PROVINCE__ b ON a.provinceid=b.id
			LEFT JOIN __PCD_CITY__ c ON a.cityid=c.id
			LEFT JOIN __PCD_DISTRICT__ d ON a.districtid=d.id
			LEFT JOIN __ORDER__ e ON a.id=e.frommemberid 
			')
		->limit($page->firstRow.','.$page->listRows)->select();
		foreach ($data['data'] as $key => $value) {
			$whereqiangdan['tomemberid'] = $wherefadan['frommemberid'] = $data['data'][$key]['id'];   
			$data['data'][$key]['fadancount'] = M('order')->where($wherefadan)->count();
			$data['data'][$key]['qiangdancount']  = M('order')->where($whereqiangdan)->count();  
			$wherequxiao['status'] = 2;
			$tomemberid = $frommemberid = $data['data'][$key]['id']; 
			$wherequxiao['_string'] = "frommemberid = $frommemberid or tomemberid = $tomemberid";  
			$data['data'][$key]['quxiaocount'] = M('order')->where($wherequxiao)->count(); 
			$whereuser['id'] = $data['data'][$key]['id'];
			$memberlock = M('member')->field('lock')->where($whereuser)->find();
			if($memberlock['lock'] == 0){
				$memberlock['lock']= '正常';
			}else{
				$memberlock['lock']= '冻结';
			}
			$data['data'][$key]['lock'] = $memberlock['lock'];  
		}   
		return $data;
	}
	public function memberlockupd($uid){
		$where['id'] = $uid; 
		$data['lock'] = 1;   
		return M('member')->where($where)->save($data);
	} 
	public function memberlockupj($uid){
		$where['id'] = $uid; 
		 
			$data['lock'] = 0;    
		return M('member')->where($where)->save($data);
	} 

        public function searcha($pageSize = 15)
	{
		/**************************************** VIP用户搜索 ****************************************/
		$where = array(
			//'a.cityid'=>array('eq','1')
                    'a.level'=>array('eq','2')
		);
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();

		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');

		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('a.*')->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		foreach ($data['data'] as $key => $value) {
			$whereqiangdan['tomemberid'] = $wherefadan['frommemberid'] = $data['data'][$key]['id'];   
			$data['data'][$key]['fadancount'] = M('order')->where($wherefadan)->count();
			$data['data'][$key]['qiangdancount']  = M('order')->where($whereqiangdan)->count();  
			$wherequxiao['status'] = 2;
			$tomemberid = $frommemberid = $data['data'][$key]['id']; 
			$wherequxiao['_string'] = "frommemberid = $frommemberid or tomemberid = $tomemberid";  
			$data['data'][$key]['quxiaocount'] = M('order')->where($wherequxiao)->count(); 
			$whereuser['id'] = $data['data'][$key]['id'];
			$memberlock = M('member')->field('lock')->where($whereuser)->find();
			if($memberlock['lock'] == 0){
				$memberlock['lock']= '正常';
			}else{
				$memberlock['lock']= '冻结';
			}
			$data['data'][$key]['lock'] = $memberlock['lock'];  
		}    
		//echo $this->getLastSql();
		return $data;
	}
        public function searc($pageSize = 15)
	{
		if($_POST['province']=="北京"||$_POST['province']=="上海"||$_POST['province']=="重庆"||$_POST['province']=="天津"){
			$pname = $_POST['province']."市";
		}else if($_POST['province']){
			$pname = $_POST['province'];//省份名字
		}
		/**************************************** 搜索 ****************************************/
		$where = array(
	                    'a.level'=>array('eq','1'),
	                    'b.ProvinceName'=>array('eq',$pname)
		);
		/************************************* 翻页 ****************************************/

		/************************************** 取数据 ******************************************/
		$count = $this->alias('a')->join("LEFT JOIN __PCD_PROVINCE__ b on a.provinceid = b.id") ->where($where)->count();
		$page = new \Think\Page($count, $pageSize);

		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
	          $nowPage = isset($_GET['p'])?$_GET['p']:1; 
		$data['data']= $this->alias('a')->field('a.nikename,tel,b.*') 
                        ->join("LEFT JOIN __PCD_PROVINCE__ b on a.provinceid = b.id")
                        ->where($where)->page($nowPage.','.$page->listRows)->select();
                        foreach ($data['data'] as $key => $value) {
			$whereqiangdan['tomemberid'] = $wherefadan['frommemberid'] = $data['data'][$key]['id'];   
			$data['data'][$key]['fadancount'] = M('order')->where($wherefadan)->count();
			$data['data'][$key]['qiangdancount']  = M('order')->where($whereqiangdan)->count();  
			$wherequxiao['status'] = 2;
			$tomemberid = $frommemberid = $data['data'][$key]['id']; 
			$wherequxiao['_string'] = "frommemberid = $frommemberid or tomemberid = $tomemberid";  
			$data['data'][$key]['quxiaocount'] = M('order')->where($wherequxiao)->count(); 
			$whereuser['id'] = $data['data'][$key]['id'];
			$memberlock = M('member')->field('lock')->where($whereuser)->find();
			if($memberlock['lock'] == 0){
				$memberlock['lock']= '正常';
			}else{
				$memberlock['lock']= '冻结';
			}
			$data['data'][$key]['lock'] = $memberlock['lock'];  
		}    
		//echo $this->getLastSql();
                     $data['page'] = $page->show();  
                   
		return $data;
	}
        public function sear($pageSize = 15)
	{
                $cname = $_POST['city'];//省份名字
		/**************************************** 搜索 ****************************************/
		$where = array(
			//'a.cityid'=>array('eq','1')
                    'a.level'=>array('eq','1'),
                    'b.CityName'=>array('eq',$cname)
		);

		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('a.nikename,tel,b.*,c.orderid')
						->group('c.qiangdanrenid')
                        ->join("LEFT JOIN __PCD_CITY__ b on a.cityid = b.id
									LEFT JOIN __ORDERRECORD__ c on a.id = c.qiangdanrenid")
                        ->where($where)->select();
                        foreach ($data['data'] as $key => $value) {
			$whereqiangdan['tomemberid'] = $wherefadan['frommemberid'] = $data['data'][$key]['id'];   
			$data['data'][$key]['fadancount'] = M('order')->where($wherefadan)->count();
			$data['data'][$key]['qiangdancount']  = M('order')->where($whereqiangdan)->count();  
			$wherequxiao['status'] = 2;
			$tomemberid = $frommemberid = $data['data'][$key]['id']; 
			$wherequxiao['_string'] = "frommemberid = $frommemberid or tomemberid = $tomemberid";  
			$data['data'][$key]['quxiaocount'] = M('order')->where($wherequxiao)->count(); 
			$whereuser['id'] = $data['data'][$key]['id'];
			$memberlock = M('member')->field('lock')->where($whereuser)->find();
			if($memberlock['lock'] == 0){
				$memberlock['lock']= '正常';
			}else{
				$memberlock['lock']= '冻结';
			}
			$data['data'][$key]['lock'] = $memberlock['lock'];  
		}   
		//echo $this->getLastSql();
		return $data;
	}
	  public function sea($pageSize = 15)
	{
                $dname = $_POST['county'];//区县名字
		/**************************************** 搜索 ****************************************/
		$where = array(
			//'a.cityid'=>array('eq','1')
                    'a.level'=>array('eq','1'),
                    'b.DistrictName'=>array('eq',$dname)
		);

		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('a.nikename,tel,b.*,c.orderid')
						->group('c.qiangdanrenid')
                        ->join("LEFT JOIN __PCD_DISTRICT__ b on a.districtid = b.id
									LEFT JOIN __ORDERRECORD__ c on a.id = c.qiangdanrenid")
                        ->where($where)->select();
                        foreach ($data['data'] as $key => $value) {
			$whereqiangdan['tomemberid'] = $wherefadan['frommemberid'] = $data['data'][$key]['id'];   
			$data['data'][$key]['fadancount'] = M('order')->where($wherefadan)->count();
			$data['data'][$key]['qiangdancount']  = M('order')->where($whereqiangdan)->count();  
			$wherequxiao['status'] = 2;
			$tomemberid = $frommemberid = $data['data'][$key]['id']; 
			$wherequxiao['_string'] = "frommemberid = $frommemberid or tomemberid = $tomemberid";  
			$data['data'][$key]['quxiaocount'] = M('order')->where($wherequxiao)->count(); 
			$whereuser['id'] = $data['data'][$key]['id'];
			$memberlock = M('member')->field('lock')->where($whereuser)->find();
			if($memberlock['lock'] == 0){
				$memberlock['lock']= '正常';
			}else{
				$memberlock['lock']= '冻结';
			}
			$data['data'][$key]['lock'] = $memberlock['lock'];  
		}   
		//echo $this->getLastSql();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{
	}
	// 删除前
	protected function _before_delete($option)
	{
		if(is_array($option['where']['id']))
		{
			$this->error = '不支持批量删除';
			return FALSE;
		}
	}
	public function from($from){
	$where['id'] = $from;
	$data = $this->field('nikename')->where($where)->find();
	//echo $this->getLastSql();
	return $data;
	}
	public function to($to){
	$where['id'] = $to;
	$data = $this->field('nikename')->where($where)->find();
	//echo $this->getLastSql();
	return $data;
	}
}