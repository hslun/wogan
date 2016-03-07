<?php
namespace Admin\Model;
use Think\Model;
class PcdCityModel extends Model
{

	public function search($dataA,$dataB,$pageSize = 10)
{

	
            if(!empty($dataA)){

               $dname = $dataA;
               $where = array(
			'b.DistrictName'=>array('eq',$dname),
			);
               $count = $this->alias('a')->where($where)->count();

		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();

			/************************************** 取数据 ******************************************/
	$data['data'] = $this->alias('a')->field('a.id,a.ProvinceID,b.*,c.*')->join('LEFT JOIN __PCD_DISTRICT__ b ON a.id=b.CityID
                        LEFT JOIN __AGENT__ c ON b.id=c.districtid
                        ')->where($where)->group('b.DistrictName')->select();
	// var_dump($data);

//		echo $this->getLastSql()."<br />";


		return $data;

            }else{
		// 输入市名称搜索
		$city = $dataB;
		$where = array(
			'a.CityName'=>array('eq',$city),
			);
		/**************************************** 搜索 ****************************************/
		$count = $this->alias('a')->where($where)->count();

		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();

			/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('a.id,a.ProvinceID,b.*,c.*')->join('LEFT JOIN __PCD_DISTRICT__ b ON a.id=b.CityID
                        LEFT JOIN __AGENT__ c ON b.id=c.districtid
                        ')->where($where)->group('b.DistrictName')->select();
//		echo $this->getLastSql()."<br />"; 

		return $data;


            }
	}
        public function cid(){
            $cname = mb_substr($_POST['city'], 0, -3, 'UTF-8'); 
            $where = array(
                'a.CityName'=>array('eq',$cname)
            );
            $data = $this->alias('a')->field('a.id')->where($where)->find();
            return $data;
        }

	/************************************ 其他方法 ********************************************/
}