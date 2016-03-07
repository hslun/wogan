<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>财务管理</title>
	<style type="text/css">
	table{
	border-collapse: collapse;
	  margin: 20px 20px;
	border:1px solid #d1d1d1;
	}
	td{
	height:26px;
	width:80px;
	text-align:center;
        border:1px solid #d1d1d1;

	}
	.top{
	background-image: url('/Public/Admin/img/1.png');
	}
	body{
	color:#303030;
        font-size: 12px;
	}
	</style>
</head>
<body>
    <div style="margin:30px 20px;;">
        账户余额：<input type="text" readonly="readonly" value="<?php echo $yue; ?>" style="border:1px solid #fff;"><input type="button" value="提现" style="width:55px;height:35px;"><br/><br/>
       累计盈收：<input type="text" readonly="readonly" value="<?php echo $money;?>" style="border:1px solid #fff;">
         
    </div>
    
    <div style="margin:30px 20px;;">
       <br /><br /> 支付宝账户：<input type="text" readonly="readonly" value="<?php echo $pay['alipay'];?>" style="border:1px solid #fff;"><br/><br/>
         
    </div>
  <a style="float:right;" href="http://58.30.16.58/abc.php?s=/admin/split/index">__</a>
	<table  border="1">
		<tr class="top">
			<td colspan="7" style="padding-left:10px;  text-align:left;"><b>近期提现：</b></td>
			
		</tr>
		<tr>
                        <td>会员ID</td>
                        <td>会员名称</td>
			<td style="width:180px;">申请时间</td>
			<td>审核时间</td>
			<td>提现金额</td>
			<td>余额变动</td>
			<td>状态</td>
			
		</tr>
                <?php foreach($data as $k=>$v): ?>
		<tr>
                        <td><?php echo $v['memberid']?></td>
                        <td><?php echo $v['nikename']?></td>
			<td><?php echo $v['time']?></td>
			<td></td>
			<td><?php echo $v['money']?></td>
			<td><?php echo $v['txmoney']?></td>
			<td><?php if($v['flag']=='1'){echo "待审核";}else if($v['flag']=='2'){echo "通过";}else{echo "拒绝";}?></td>
           
		</tr>
                <?php endforeach; ?>
		
	</table>	
	<table border="1">
		<tr class="top" >
			<td colspan="5"  style="padding-left:20px; text-align:left;"><b>盈收信息：</b></td>
		</tr>
		<tr>
			<td style="width:140px;height:20px;">全国盈收</td>
			<td style="width:140px;">省级盈收</td>
			<td style="width:140px;">市级盈收</td>
			<td style="width:145px;">县/区级盈收</td>
			
		</tr>
		<tr>
			<td><?php echo $money;?></td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr>
		
	</table>
</body>
</html>