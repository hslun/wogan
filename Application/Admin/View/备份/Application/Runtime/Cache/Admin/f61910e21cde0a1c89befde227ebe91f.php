<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
        table{
        	width:85%;
        	 border-collapse:collapse;
        	 margin:20px 20px;
        }
td{
    font-size:12px;
	border:1px solid #d1d1d1;
	height:26px;

	text-align:center;
	color:#303030;
   }
   
   .td input{
   border:1px solid #fff;
   }
        </style>
    </head>
    <body>
        <div>
        <div style="margin:20px 20px;">用户提现<br><br></div>
<table>
	<tr style="background-color:#E8E9EE;">
		<td colspan="9"></td>
		
	</tr>
	<tr>
		<td style="width:50px;">选择</td>
		<td>订单号</td>
		<td>申请人</td>
		<td>所属地区</td>
		<td>申请日期</td>
		
		<td>申请金额</td>
		<td>状态</td>
		<td>查看详情</td>
		<td>管理操作</td>
	</tr>
	
	<?php foreach($data as $k=>$v):?>
	<tr>
		<td><input type="checkbox"><input type="hidden" id="aa" name="memberid" value="<?php
 echo "http://www.app.com/index.php/admin/Withdraw/f1?id=".$v['memberid'] ?>"></td>
		<td></td>
		<td><?php echo $v['nikename']?></td>
		<td><?php echo $v['ProvinceName'].$v['CityName'].$v['DistrictName'] ?></td>
		<td><?php echo $v['time']?></td>
		
		<td><?php echo $v['money']?></td>
		<td>
			<?php
 if($v['flag']=='1'){ echo "待审核"; }else if($v['flag']=='2') { echo "已通过"; }else if($v['flag']=='3') { echo "未通过"; } ?>
		</td>
		<td><input type="button" value="----" style="border:1px solid #fff;" id="f1"></td>
		<td><a href="<?php echo U('edit',array('id'=>$v['memberid']));?>"><input type="button" value="通过"></a>	<input type="button" value="拒绝"></td>
	</tr>
<?php endforeach; ?>
	
</table>
        </div>
        <script type="text/javascript" src="http://www.app.com/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="http://www.app.com/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="http://www.app.com/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
    $(function(){
    	$('#f1').click(function(){
    	var url = $('#aa').val();
    	                             //转向网页的地址;    
    var name;                           //网页名称，可为空;    
    var iWidth = '600';                          //弹出窗口的宽度;    
    var iHeight = '350';                        //弹出窗口的高度;    
    var iTop = (window.screen.availHeight-30-iHeight)/2;       //获得窗口的垂直位置;    
    var iLeft = (window.screen.availWidth-10-iWidth)/2;           //获得窗口的水平位置;   
    window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');
    }
    	);
    });
    
  </script>
    </body>
</html>