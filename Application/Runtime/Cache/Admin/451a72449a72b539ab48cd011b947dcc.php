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
    <script type="text/javascript"> 

function openwindow(url)   {    
  
    var url = 'http://58.30.16.58/index.php/admin/advert/add.html';                                 //转向网页的地址;    
    var name;                           //网页名称，可为空;    
    var iWidth = '600';                          //弹出窗口的宽度;    
    var iHeight = '450';                        //弹出窗口的高度;    
    var iTop = (window.screen.availHeight-30-iHeight)/2;       //获得窗口的垂直位置;    
    var iLeft = (window.screen.availWidth-10-iWidth)/2;           //获得窗口的水平位置;   
    window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');   } 
    function openwin(url)   {    
    
     var url =  $('#a').val();
                                   //转向网页的地址;    
    var name;                           //网页名称，可为空;    
    var iWidth = '600';                          //弹出窗口的宽度;    
    var iHeight = '450';                        //弹出窗口的高度;    
    var iTop = (window.screen.availHeight-30-iHeight)/2;       //获得窗口的垂直位置;    
    var iLeft = (window.screen.availWidth-10-iWidth)/2;           //获得窗口的水平位置;   
    window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');   }

</script> 
    
 </head>
 <body>
     
        
            
     <a href="<?php echo U('add');?>"><input type="button" value="+" ></a>
  <table>
  	<tr style="background-image:url('/Public/Admin/img/1.png');">
                <td>广告编号</td>
  		<td>开始和结束时间</td>
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
  		<td><a style="margin-right:20px;" href="<?php echo U('edit',array('id'=>$v['id'] ));?>" >修改</a><a style="margin-left:20px;" href="<?php echo U('del',array('id'=>$v['id'] ));?>">删除</a></td>
  	</tr>
        <?php endforeach; ?>
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