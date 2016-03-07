<?php
namespace Admin\Model;
use Think\Model;
class AdareaModel extends Model{
   public function search(){
       $where = array();
       $data = $this->alias('a')->field('a.*,b.ProvinceName,c.CityName')->join('left join __PCD_PROVINCE__ b on a.provinceid = b.id
	left join __PCD_CITY__ c on a.cityid = c.id
')->select();
       return $data;
   }
public function sea(){
       $where = array(
       	'id' =>array('eq',I('get.id'))
       	);
       $data = $this->alias('a')->field('a.*')->where($where)->find();
       return $data;
   }
   
   protected function _before_insert(&$data, $option)
	{
		// 自己接收表单中的数据，因为TP在调用create方法时会把这两个值转化成数字，结果2015-10-10就变成2015了。
		$StartDate = I('post.starttime');
		$EndDate = I('post.endtime');
               
		if($StartDate)
			$data['starttime'] = $StartDate;
		if($EndDate)
			$data['endtime'] = $EndDate;
                
		/************************ 上传图片 ******************************/
		// 判断有没有选择图片
		if($_FILES['img']['error'] == 0)
		{
			// 先读出配置
			$config = C('IMAGE_CONFIG');
			// 设置图片二级目录
			$config['savePath'] = 'Advert/';
			 $upload = new \Think\Upload($config);
                      
		     // 上传文件 
		     $info   =   $upload->upload();
		     if(!$info)
		     {
                         
		     	// 把错误信息存到模型中,然后在控制器会调用$model->getError()方法获取到错误信息
		     	$this->error = $upload->getError();
		     	// 然后返回控制器，
		     	return FALSE;
		     }
		     else
		     {
                         
		     	// 上传图片成功之后生成缩略图
		     	$image = new \Think\Image(); 
		     	// 打开要上传的图片
		     	$image->open( $config['rootPath'] .  $info['img']['savepath'] . $info['img']['savename']);
		     	// 先构造缩略图存放的目录以及名字
		     	$smlogo = $info['img']['savepath'] . 'sm_'. $info['img']['savename'];
		     	// 生成缩略图
		     	$image->thumb(150, 150)->save( $config['rootPath'] . $smlogo);
		     	// 把图片路径放到表单中插入到数据库
		     	$data['img'] = $info['img']['savepath'] . $info['img']['savename'];
                        
		     	$data['smlogo'] = $smlogo;
                        
                        return $data;
		     }
		}
	}

	protected function _before_update(&$data, $option)
	{
		// 自己接收表单中的数据，因为TP在调用create方法时会把这两个值转化成数字，结果2015-10-10就变成2015了。
		$StartDate = I('post.starttime');
		$EndDate = I('post.endtime');
               
		if($StartDate)
			$data['starttime'] = $StartDate;
		if($EndDate)
			$data['endtime'] = $EndDate;
                
		/************************ 上传图片 ******************************/
		// 判断有没有选择图片
		if($_FILES['img']['error'] == 0)
		{
			// 先读出配置
			$config = C('IMAGE_CONFIG');
			// 设置图片二级目录
			$config['savePath'] = 'Advert/';
			 $upload = new \Think\Upload($config);
                      
		     // 上传文件 
		     $info   =   $upload->upload();
		     if(!$info)
		     {
                         
		     	// 把错误信息存到模型中,然后在控制器会调用$model->getError()方法获取到错误信息
		     	$this->error = $upload->getError();
		     	// 然后返回控制器，
		     	return FALSE;
		     }
		     else
		     {
                         
		     	// 上传图片成功之后生成缩略图
		     	$image = new \Think\Image(); 
		     	// 打开要上传的图片
		     	$image->open( $config['rootPath'] .  $info['img']['savepath'] . $info['img']['savename']);
		     	// 先构造缩略图存放的目录以及名字
		     	$smlogo = $info['img']['savepath'] . 'sm_'. $info['img']['savename'];
		     	// 生成缩略图
		     	$image->thumb(150, 150)->save( $config['rootPath'] . $smlogo);
		     	// 把图片路径放到表单中插入到数据库
		     	$data['img'] = $info['img']['savepath'] . $info['img']['savename'];
                        
		     	$data['smlogo'] = $smlogo;
		     	$logo = $this->field('img,smlogo')->find($option['where']['id']);
		     	$config = C('IMAGE_CONFIG');
		     	unlink($config['rootPath'].$logo['img']);
		     	unlink($config['rootPath'].$logo['smlogo']);
                        
                        
		     }
		}
	}
}
	
