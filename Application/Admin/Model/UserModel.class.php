<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model
{

	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		//$where = array(
			//'a.cityid'=>array('eq','1')
		//);	/************************************** 取数据 ******************************************/
		//$data['data'] = $this->alias('a')->field('a.truename,mobile,b.*')->join('LEFT JOIN __PCD_DISTRICT__ b ON a.districtid=b.id')->where($where)->select();
		//echo $this->getLastSql()."<br />";
			$data['data'] = $this->field('truename,remark,level,starttime,endtime')->select();

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
	/************************************ 其他方法 ********************************************/
}