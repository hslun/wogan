<?php
namespace Admin\Controller;
use Think\Controller;
class SplitController extends Controller
{
	public function index()
	{
		$p = M('pcd_province');
		$pdata = $p->field('id,ProvinceName')->select();
			
	//	print_r($pdata);

		$c = M('pcd_city');
		$cdata = $c->field('id,CityName')->select();
	//	print_r($cdata);

		$d = M('pcd_district');
		$ddata = $d->field('id,DistrictName')->select();
	//	print_r($ddata);

		$where['updated'] = 0;
		$m = M('Member');
		$data = $m->where($where)->field('address,id')->select();
			
		for($x=0;$x<count($data);$x++){
			
			$where['id'] = $data[$x]['id'];

			for($i=0;$i<count($pdata);$i++){
				if(strstr($data[$x]['address'],$pdata[$i]['ProvinceName'])){
					$s['provinceid'] = $pdata[$i]['id'];		
				}	
			}	


			
			for($j=0;$j<count($cdata);$j++){
				if(strstr($data[$x]['address'],$cdata[$j]['CityName'])){
					$s['cityid'] = $cdata[$j]['id'];
				}
			}

			
			for($k=0;$k<count($ddata);$k++){
				if(strstr($data[$x]['address'],$ddata[$k]['DistrictName'])){
					$s['districtid'] = $ddata[$k]['id'];
				}
			}
			print_r($s);
			$s['updated'] = 1;

			$m->where($where)->save($s);

		}
	}

}
