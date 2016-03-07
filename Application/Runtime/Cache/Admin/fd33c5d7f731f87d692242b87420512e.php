<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 账户信息</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/page-min.css" rel="stylesheet" type="text/css" /> 
	<script type="text/javascript" src="http://58.30.16.58/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="http://58.30.16.58/assets/js/config-min.js"></script>
   <style type="text/css">
   td{
    font-size:12px;
	border:1px solid #d1d1d1;
	height:26px;
	width:200px;
	text-align:center;
   }
   .td{
    font-size:12px;
	border:1px solid #d1d1d1;
	height:26px;
	width:180px;
	text-align:center;
   }
   .td input{
   border:1px solid #fff;
   }
   #t1{
   font-weight:bold;
   padding-left:20px;
   background-image: url('/Public/Admin/img/1.png');
   }
body{
	color:#303030;
	font-size:14px;
	}
   </style>
 </head>
 <body>
  
  <div class="container">
    <div class="row">
      <form id="J_Form" class="form-horizontal span24" method="post" action="<?php echo U('agent');?>">
        <div class="row">
     
        <div class="row">
          <div class="control-group span15">
            <label class="control-label" style="margin-left:-35px;"><b>代理区域：</b></label><br /><br />
			<div><select  style="width:70px;float:left;margin-top:2px;" name="" id=""><option value="">全国</option></select></div>
            <div class="controls bui-form-group-select"  data-type="city" style="margin-left:0px;">
			
              <select  style="width:95px;float:left;margin-top:2px;" class="input-small" name="province" value="<?php echo $province; ?>">
                <option>请选择省</option>
              </select>
              <select style="width:95px;float:left;margin-top:2px;" class="input-small"  name="city" value="<?php echo $city; ?>"><option>请选择市</option></select>
              <select name="county" id="district"  value="<?php echo $county; ?>"><option>请选择县/区</option></select>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <button type="submit" class="button button-primary">查询</button>&nbsp;&nbsp;&nbsp;
            </div>
          </div>
        </div>
        <div style="display:none;width:1100px;" id="add">
		
		</div>
		<div style="width:100%;" id="none">
		<table style="margin:5px auto;">
			<tr id="t1">
				<td>区域</td>
				<td>是否签约</td>
				<td>账户余额</td>
				<td>负责站长</td>
				<td>联系电话</td>
				<td>开通日期</td>
				<td style=" width:200px;height:30px;font-size:15px;">有效期</td>
				<td>操作</td>
			
			</tr>
			<tr>
				<td><a href="">路南区</a></td>
				<td>是</td>
				<td>-</td>
				<td>李磊</td>
				<td>18631643077</td>
				<td>2015-9-1</td>
				<td>2015.9.1-2017.9.1</td>
				<td><a href="<?php echo U('add');?>" style="margin-right:20px;">开通</a><a href="">暂停</a><a href=""style="margin-left:20px;">关闭</a></td>
			
			</tr>
			<?php if(!empty($pname)):?>
			<?php foreach($pname as $k2=>$v2):?>
				<tr>
				<td><?php echo $v2['ProvinceName']?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><a href="<?php echo U('add',array('pname'=>$v2['ProvinceName']));?>" style="margin-right:20px;">开通</a><a href="">暂停</a><a href=""style="margin-left:20px;">关闭</a></td>
				
			</tr>
				<?php endforeach; ?>
				<?php endif; ?>
			<?php foreach($data as $k=>$v):?>
			<tr>
				<td><?php echo $v['CityName']?></td>
				<td>省代</td>
				<td><?php echo $v['ProvinceName']?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><a href="<?php echo U('add',array('city'=>$v['CityName'],'ProvinceName'=>$v['ProvinceName']));?>" style="margin-right:20px;">开通</a><a href="">暂停</a><a href=""style="margin-left:20px;">关闭</a></td>
				
			</tr>
				<?php endforeach; ?>
			<?php foreach ($data1 as $k1=>$v1):?>
			<tr>
				<td><?php echo $v1['DistrictName']?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><a href="<?php echo U('add?District=',$v1['DistrictName']);?>" style="margin-right:20px;">开通</a><a href="">暂停</a><a href=""style="margin-left:20px;">关闭</a></td>
			</tr>
			<?php endforeach; ?>
		
			
	<?php if(!empty($county)): ?>
			<tr>
				<td><?php echo $county; ?></td>
				<td>市代</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><a href="<?php echo U('add?county='.$county);?>" style="margin-right:20px;">开通</a><a href="">暂停</a><a href=""style="margin-left:20px;">关闭</a></td>
					
			</tr>
			<?php endif; ?>
			<!-- 
				 <tr>
				 <td colspan="7" style="font-size:15px;  color: #36c; "> <?php echo $page; ?></td>
				  </tr> -->
		</table>
		</div>
 </form>
	</div>
  </div>
  

<script type="text/javascript">
$(document).ready(function(){
            $("tr td").mouseover(function(){
                $(this).parent().find("td").css("background-color","#d5f4fe");
            });
      })
$(document).ready(function(){
            $("tr td").mouseout(function(){
                $(this).parent().find("td").css("background-color","");
            });
      })
function a(){
	if($('.sele').val()=='开通'){
location.href = "http://58.30.16.58/index.php/admin/Member/add.html";
	}}

function show(){
	$('#none').show();
}
  BUI.use('bui/form',function (Form) {
    var form = new Form.HForm({
      srcNode : '#J_Form'
    });

    form.render();
  });
</script>

<body>
</html>