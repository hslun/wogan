<?php
namespace Admin\Model;
use Think\Model;
class OrderModel extends Model{

	public function search($pageSize = 15)
	{
		/**************************************** 今日订单 ****************************************/
                $time_start=mktime(0,0,0,date('m'),date('d'),date('Y'));//今天零点
                $time_stop=mktime(0,0,0,date('m'),date('d')+1,date('Y'));//明天零点

		$where = array(
                    'a.paytime'=>array(array('gt',$time_start),array('lt',$time_stop)),
                    'a.haspay'=>array('eq','1'),
                   );

		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('a.*')->where($where)->select();
		//echo $this->getLastSql();
		return $data;
	}

        public function sum($pageSize = 15)
	{
		/********************** 今日发布的订单量 **********/
                $time_start=mktime(0,0,0,date('m'),date('d'),date('Y'));//今天零点
                $time_stop=mktime(0,0,0,date('m'),date('d')+1,date('Y'));//明天零点

		$where = array(
                    'a.publishtime'=>array(array('gt',$time_start),array('lt',$time_stop)),
                    );

		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->field('a.*')->where($where)->select();
		//echo $this->getLastSql();
		return $data;
	}
    public function lst($pageSize = 15){
                // 根据订单号查询
            if(!empty($_POST['ordernumber'])){
                $condition['a.ordernumber'] = $_POST['ordernumber'];
            }else if(!empty($_POST['frommember'])){
                 $c['b.nikename'] = $_POST['frommember'];
                $fromid = $this->alias('a')->join('
           LEFT JOIN __MEMBER__ b ON a.frommemberid = b.id
                    ')->field('b.id')->where($c)->find();
                 $condition['a.frommemberid'] = $fromid['id'];
            }elseif (!empty($_POST['tomember'])) {
                $c['b.nikename'] = $_POST['tomember'];


                $toid = $this->alias('a')->join('
           LEFT JOIN __MEMBER__ b ON a.tomemberid = b.id
                    ')->field('b.id')->where($c)->find();
                 $condition['a.tomemberid'] = $toid['id'];
            }elseif ((!empty($_POST['city'])&&(empty($_POST['county'])))) {
                $c['b.CityName'] = $_POST['city'];
                echo "here";

                $cid = $this->alias('a')->join('
           LEFT JOIN __PCD_CITY__ b ON a.cityid = b.id
                    ')->field('b.id')->where($c)->find();
                 $condition['a.cityid'] = $cid['id'];
            }elseif (!empty($_POST['county'])) {
                $c['b.DistrictName'] = $_POST['county'];

                $cid = $this->alias('a')->join('
           LEFT JOIN __PCD_DISTRICT__ b ON a.districtid = b.id
                    ')->field('b.id')->where($c)->find();
                 $condition['a.districtid'] = $cid['id'];
            }

        $count = $this->alias('a')->where($condition)->count();
        $perpage = '15';
        // 生成翻页类
        $page = new \Think\Page($count, $perpage);
        // 设置翻页的样式
		$page_tpl = urlencode('[PAGE]');
		$page->url   =  "http://58.30.16.58/abc.php?s=admin&c=order&a=index&p=".$page_tpl;
        $page->setConfig('prev', '上一页');
        $page->setConfig('next', '下一页');
        // 生成翻页的字符串【显示在页面中的：上一页。。。下一页】
        $pageString= $page->show();

        $data= $this->alias('a')
        ->field('a.ordernumber,a.content,a.money,a.publishtime, a.paytime,a.status,a.frommemberid,a.tomemberid')
        ->where($condition)->limit($page->firstRow.','.$page->listRows)->select();
    // echo $this->getLastSql();
        $fromName = $this->alias('a')->JOIN('
               LEFT JOIN __MEMBER__ b ON a.frommemberid = b.id
              ')->field('b.nikename')->where($condition)->select();
        $toName = $this->alias('a')->JOIN('
       LEFT JOIN __MEMBER__ b ON a.tomemberid = b.id
              ')->field('b.nikename')->where($condition)->select();
//echo $this->getLastSql();


foreach($data as $k => $v)
{
    $data[$k]['from'] = $fromName[$k]['nikename'];
	$data['0']['page'] = $pageString;
	$data['0']['count']=$count;
    $data[$k]['to'] = $toName[$k]['nikename'];
}

        return $data;
  }


        public function mon(){

            $where = array(
                'a.haspay'=>array('eq','1'),
            );
            $data['data'] = $this->alias('a')->field('a.*')->where($where)->select();
//            echo $this->getLastSql();
            return $data;
        }
        public function tid($from){
            $where['frommemberid'] = $from;
            $data = $this->where($where)->field('tomemberid')->find();
            return $data;
        }
}