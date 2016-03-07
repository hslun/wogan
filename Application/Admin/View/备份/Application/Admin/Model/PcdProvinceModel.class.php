<?php
namespace Admin\Model;
use Think\Model;
class PcdProvinceModel extends Model
{

	public function search($dataA,$pageSize = 10)
	{

		if(!empty($dataA)){

           $province = $dataA;
		$where = array(
			'a.provinceName'=>array('like',$province),
			);

		$count = $this->alias('a')->where($where)->count();

		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();

			/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('a.id,a.ProvinceName,b.id,b.ProvinceID,b.CityName,c.*,d.id,d.name,d.email,d.tel,d.create_date,d.start_date,d.end_date,d.balance,d.account')
			->join('LEFT JOIN __PCD_CITY__ b ON a.id=b.ProvinceID
                                LEFT JOIN __PCD_DISTRICT__ c ON b.id=c.CityID
                                LEFT JOIN __AGENT__ d ON b.id=d.cityid
		')->group('b.CityName')
			->where($where)->select();
		//echo $this->getLastSql();


		return $data;
		}

		/**************************************** 搜索 ****************************************/


	}
        public function pid(){
            $pname=mb_substr($_POST['pname'], 0, -3, 'UTF-8');
            $where = array(
                'a.ProvinceName'=>array('eq',$pname)
            );
            $data = $this->alias('a')->field('a.id')->where($where)->find();
            return $data;
        }

	/************************************ 其他方法 ********************************************/
}