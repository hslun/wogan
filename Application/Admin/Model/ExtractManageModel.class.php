<?php
namespace Admin\Model;
use Think\Model;
class ExtractManageModel extends Model
{
    public function search($pageSize = 15)
	{
		/**************************************** 搜索 ****************************************/
		$where = array(
			//'a.cityid'=>array('eq','1')
                   
		);
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();

		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');

		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('a.*,b.nikename,c.ProvinceName,d.CityName,e.DistrictName,b.txmoney')
		->JOIN("LEFT JOIN __MEMBER__ b on a.memberid = b.id
			LEFT JOIN __PCD_PROVINCE__ c on b.provinceid = c.id
			LEFT JOIN __PCD_CITY__ d on b.cityid = d.id
			LEFT JOIN __PCD_DISTRICT__ e on b.districtid = e.id
			")->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		//echo $this->getLastSql();
		return $data;
	}
public function order(){
	$id = $_GET['id'];
	$where=array(
	'a.memberid'=>array('eq',$id),
		);
	$data = $this->alias('a')->field('a.memberid,b.ordernumber,b.paytime,b.money')->join('LEFT JOIN __ORDER__ b on a.memberid = b.tomemberid')->where($where)->select();
	// echo $this->getLastSql();
	return $data;
}
public function edit(){
	$id = $_GET['id'];
	$where = array(
	'memberid'=>array('eq',$id),
		);
	$result['flag'] = '2';
	$data = $this->where($where)->save($result);
	//echo $this->getLastSql();
	return $data; 
}
}