<?php
namespace Admin\Model;
use Think\Model;
class VipapprovalModel extends Model
{
    public function search($pageSize = 15){
        $where = array(
			//'a.cityid'=>array('eq','1')
                    //'a.level'=>array('eq','1')
            //'b.cityid'=>array('eq','1')
		);
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();

		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');

		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('b.nikename,tel,b.provinceid,b.cityid,b.districtid,a.*,c.ProvinceName,d.CityName,e.DistrictName')
                        ->join("LEFT JOIN __MEMBER__ b on a.memberid = b.id
                                LEFT JOIN __PCD_PROVINCE__ c on b.provinceid = c.id 
                                LEFT JOIN __PCD_CITY__ d on b.cityid = d.id
                                LEFT JOIN __PCD_DISTRICT__ e on b.districtid = e.id
                                ")
                        ->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		//echo $this->getLastSql();
		return $data;
    }
}
