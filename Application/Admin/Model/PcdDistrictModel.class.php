<?php
namespace Admin\Model;
use Think\Model;
class PcdDistrictModel extends Model
{
public function did(){
            $cname = mb_substr($_POST['District'], 0, -3, 'UTF-8');
            $where = array(
                'a.DistrictName'=>array('eq',$cname)
            );
            $data = $this->alias('a')->field('a.id')->where($where)->find();
            return $data;
        }


        public function search($c){
			if($_POST['city']){
				$where = array(
					'b.CityName'=>array('eq',$_POST['city'])
				);
			}else if(!empty($c)){
			$where = array(
					'b.CityName'=>array('eq',$c)
				);
			}

            $data = $this->alias('a')->field('a.id')->JOIN(
			'LEFT JOIN __PCD_CITY__ b ON a.CityId=b.id
			LEFT JOIN __AGENT__ c ON a.id = c.districtid
			'
			)->field('a.DistrictName,a.id,c.*')->where($where)->select();
			//echo $this->getLastSql();
            return $data;
        }

	/************************************ 其他方法 ********************************************/
}