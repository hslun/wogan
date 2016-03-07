<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 账户信息</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <style type="text/css">
 table{
 border-collapse:collapse;
 width:800px;
 margin:15px 10px;
 font-size:12px;
 }
 
 td{
 border:1px solid #cecece;
 height:30px;
 text-align:center;
 }
 </style>
   
    <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />

    
 </head>
 <body>
     
        
            
     
  <table>
 
  	<tr style="background-image:url('/Public/Admin/img/1.png');">
                <td>广告编号</td>
  		<td style="width:170px;">开始和结束时间</td>
  		<td>广告名称</td>
  		<td>广告类型</td>
                <td>缩略图</td>
  		<td>操作</td>
  	</tr>
        <?php foreach($data as $k => $v):?>
        
       
  	<tr>
  		<td><input type="hidden" id="a" value="<?php echo "http://58.30.16.58/index.php/admin/advert/edit?id=".$v['id'] ?>"> <?php echo $v["id"];?></td>
  		<td><?php echo $v["starttime"]."&nbsp;到&nbsp;".$v['endtime'];?></td>
  		<td><?php echo $v["title"]?></td>
  		<td><?php if($v['flag']=='1'){echo "文字广告";}else if($v['flag']=="2"){echo "左侧广告吧";}?></td>
                <td style="width:60px;height:30px;"><?php showImage($v['smlogo'],30); ?></td>
  		<td><a style="margin-right:20px;" href="<?php echo 'http://58.30.16.58/abc.php?s=Admin/advert/edit/id/'.$v['id'];?>" >修改</a><a style="margin-left:20px;" href="<?php echo 'http://58.30.16.58/abc.php?s=Admin/advert/del/id/'.$v['id']; ;?>">删除</a></td>
  	</tr>
        <?php endforeach; ?>
		 <tr>
  	<td style="border:none;"><a href="<?php echo 'http://58.30.16.58/abc.php?s=Admin/Advert/add';?>"><input type="button" value="添加" style="width:100%;height:100%;"></a></td>
  </tr>
  </table>
     
     
    
<script type="text/javascript" src="http://58.30.16.58/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="http://58.30.16.58/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>


<script type="text/javascript">
  BUI.use('bui/form',function (Form) {
    var form = new Form.HForm({
      srcNode : '#J_Form'
    });

    form.render();
  }
  
  );
</script>
<body>
</html>