<?php
/**
 * 发邮件
 *
 * @param unknown_type $to ： 收件人邮件地址
 * @param unknown_type $title ： 标题
 * @param unknown_type $content ：内容
 * @return unknown
 */
function sendMail($to, $title, $content, $isHtml = TRUE)
{
	require_once('./PHPMailer_v5.1/class.phpmailer.php');
    $mail = new PHPMailer();
    // 设置为要发邮件
    $mail->IsSMTP();
    // 是否允许发送HTML代码做为邮件的内容
    $mail->IsHTML($isHtml);
    $mail->CharSet='UTF-8';
    // 是否需要身份验证【要看邮件服务器是怎么搭建的】
    $mail->SMTPAuth=TRUE;
    $mail->Username=C('MAIL_LOGINNAME');
    $mail->Password=C('MAIL_PASSWORD');
    /*  邮件服务器上的账号是什么 -> 到163注册一个账号即可 */
    $mail->From=C('MAIL_ADDRESS');
    $mail->FromName=C('MAIL_FROM');
    $mail->Host=C('MAIL_SMTP');
    // 发邮件端口号默认25
    $mail->Port = 25;
    // 收件人
    $mail->AddAddress($to);
    // 邮件标题
    $mail->Subject=$title;
    // 邮件内容
    $mail->Body=$content;
    return($mail->Send());
}
/**
 * 生成一个下拉框
 *
 * @param unknown_type $modelName   ： 从哪个模型取数据：模型名字
 * @param unknown_type $selectName     ： 下拉框的name属性是什么<select name='xxx'
 * @param unknown_type $textFieldName   ： 表中用来显示的字段叫什么　＜ｏｐｔｉｏｎ＞ｘｘｘ＜／ｏｐｔｉｏｎ＞
 * @param unknown_type $valueFieldName  ： 表中用来作为值的字段叫什么　＜ｏｐｔｉｏｎ value='xxxx'＞＜／ｏｐｔｉｏｎ＞
 */
function buildSelect($modelName, $selectName, $textFieldName, $valueFieldName='id', $defaultValue='')
{
	// 先取出下拉框中的数据
	$model = M($modelName);
	$data = $model->select();
	$html = "<select name='$selectName'><option value=''>请选择</option>";
	foreach ($data as $k => $v)
	{
		// 如果是要选中的值就选中
		if($v[$valueFieldName] == $defaultValue)
			$select = 'selected="selected"';
		else
			$select = '';
		$html .= '<option '.$select.' value="'.$v[$valueFieldName].'">'.$v[$textFieldName].'</option>';
	}
	$html .= '</select>';
	echo $html;
}
/**
 * 上传图片并生成缩略图
 * 用法：
 * $ret = uploadOne('logo', 'Goods', array(
			array(600, 600),
			array(300, 300),
			array(100, 100),
		));
	返回值：
	if($ret['ok'] == 1)
		{
			$ret['images'][0];   // 原图地址
			$ret['images'][1];   // 第一个缩略图地址
			$ret['images'][2];   // 第二个缩略图地址
			$ret['images'][3];   // 第三个缩略图地址
		}
		else
		{
			$this->error = $ret['error'];
			return FALSE;
		}
 *
 */
function uploadOne($imgName, $dirName, $thumb = array())
{
	// 上传LOGO
	if(isset($_FILES[$imgName]) && $_FILES[$imgName]['error'] == 0)
	{
		$config = C('IMAGE_CONFIG');
		$upload = new \Think\Upload($config);// 实例化上传类
		$upload->savePath = $dirName . '/'; // 图片二级目录的名称
		// 上传文件
		// 上传时指定一个要上传的图片的名称，否则会把表单中所有的图片都处理，之后再想其他图片时就再找不到图片了
		$info   =   $upload->upload(array($imgName=>$_FILES[$imgName]));
		if(!$info)
		{
			return array(
				'ok' => 0,
				'error' => $upload->getError(),
			);
		}
		else
		{
			$ret['ok'] = 1;
		    $ret['images'][0] = $logoName = $info[$imgName]['savepath'] . $info[$imgName]['savename'];
		    // 判断是否生成缩略图
		    if($thumb)
		    {
		    	$image = new \Think\Image();
		    	// 循环生成缩略图
		    	foreach ($thumb as $k => $v)
		    	{
		    		$ret['images'][$k+1] = $info[$imgName]['savepath'] . 'thumb_'.$k.'_' .$info[$imgName]['savename'];
		    		// 打开要处理的图片
				    $image->open($config['rootPath'].$logoName);
				    $image->thumb($v[0], $v[1])->save($config['rootPath'].$ret['images'][$k+1]);
		    	}
		    }
		    return $ret;
		}
	}
}
function deleteImage($image = array())
{
	$config = C('IMAGE_CONFIG');
	foreach ($image as $v)
	{
		unlink($config['rootPath'] . $v);
	}
}
function showImage($url, $width='', $height='')
{
	if(!$url)
		return ;
	// 以下三代码代码的功能是：无论同一个脚本中showImage函数调用多少次,C只会调用一次
	static $config = null;
	if($config === null)
		$config = C('IMAGE_CONFIG');

	$url = $config['htmlPath'] . $url;
	if($width)
		$width = " width='$width'";
	if($height)
		$height = " height='$height'";
	echo  "<img src='$url' $width $height />";
}
function clearXSS($data)
{
	require_once './htmlpurifier/HTMLPurifier.auto.php';
	// 生成默认的配置
	$_clean_xss_config = HTMLPurifier_Config::createDefault();
	$_clean_xss_config->set('Core.Encoding', 'UTF-8');
	// 设置允许出现的标签
	$_clean_xss_config->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]');
	// 设置允许出现的css样式
	$_clean_xss_config->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
	// 设置a标签上可以使用target属性
	$_clean_xss_config->set('HTML.TargetBlank', TRUE);
	// 根据配置生成对象
	$_clean_xss_obj = new HTMLPurifier($_clean_xss_config);
	// 过滤数据
	return $_clean_xss_obj->purify($data);
}

/*------操作日志-------------*/
