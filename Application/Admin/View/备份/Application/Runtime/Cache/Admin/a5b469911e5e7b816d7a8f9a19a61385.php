<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		table{
			margin:50px auto;
			border-collapse: collapse;
			border:1px solid #d2d2d2;
			width:500px;
			text-align: center;
		}
		td{
			border:1px solid grey;
			height:30px;
		}
	</style>
</head>
<body>
	<table style="width:550px; ">
		<tr style="height:38px; background-color:#E8E9EE;">
			<td colspan="5">近期交易记录</td>
			
		</tr>

		<tr>
			<td>订单号</td>
			<td>交易时间</td>
			<td>金额</td>
			<td>总订单量</td>
			<td>账户盈收</td>
		</tr>
		<?php foreach($data as $k => $v): ?>
		<tr>
			<td><?php echo $v['ordernumber'] ?></td>
			<td><?php if(!empty($v['paytime'])){echo date('y-m-d',$v['paytime']);}else{echo "----";} ?></td>
			<td><?php echo $v['money'] ?></td>
			<td><?php echo $i;?></td>
			<td><?php ?></td>
		</tr>
	<?php endforeach ; ?>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
</body>
</html>