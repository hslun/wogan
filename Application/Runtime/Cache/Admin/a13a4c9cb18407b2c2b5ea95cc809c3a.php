<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 账户信息</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/page-min.css" rel="stylesheet" type="text/css" /> 
   <style type="text/css">
       .container{
           margin:10px 30px;
       }
 #user input{
	margin:5px 10px;
	font-size:18px;
	heiht:30px;
 }
   td{
    font-size:12px;
	border:1px solid #d1d1d1;
	height:26px;
	width:200px;
	text-align:center;
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
        <form id="J_Form" class="form-horizontal span24" method="post" action="/index.php/admin/Member/Member.html">
             <div class="row">
                <div class="row">
                    <div class="control-group span15">
            <label class="control-label" style="margin-left:-35px;"><b>代理区域：</b></label><br /><br />
                        <div><select  style="width:70px;float:left;margin-top:2px;" name="" id=""><option value="">全国</option></select></div>
        <div class="controls bui-form-group-select"  data-type="city" style="margin-left:0px;">
              <select  class="input-small" name="province" value="">
                <option>请选择省</option>
              </select>
              <select class="input-small"  name="city" value="北京市"><option>请选择市</option></select>
              <select name="county" id="district"  value="大兴区"><option>请选择县/区</option></select>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <button type="submit" class="button button-primary" onclick="che()">查询</button>&nbsp;&nbsp;&nbsp;
              <button type="reset" class="button">重置</button>
													</div>
										</div>
								 </div>
        <table id="box">
  			<tr id="t1">
  				<td style="width:330px;">用户昵称</td>
  				<td>手机号</td>
  				<td style="width:400px;">所属地区</td>
  				<td>发单数量</td>
  				<td>抢单数量</td>
  				<td>取消数量</td>
  				<td>状态</td>
  				<td>操作</td>
  			</tr>
                        <?php if(!empty($data)): ?>
			<?php foreach ($data as $k=>$v):?>
  			<tr>
  				<td><?php echo $v['nikename'];?></td>
  				<td><?php echo $v['tel'];?></td>
  				<td><?php echo $v['ProvinceName'].$v['CityName'].$v['DistrictName'] ?></td>
  				<td></td>
  				<td>-</td>
				<td>-</td>
				<td>-</td>
                                <td><input type="button" value="冻结"> 
                                    <input type="button" value="封号"></td>
  			</tr>
			<?php endforeach ?>
                        <?php endif; ?>
                        
                         <?php if(!empty($dat)): ?>
			<?php foreach ($dat as $k1=>$v1):?>
  			<tr>
  				<td><?php echo $v1['nikename'];?></td>
  				<td><?php echo $v1['tel'];?></td>
  				<td><?php echo $v1['ProvinceName'].$v1['CityName'].$v1['DistrictName'] ?></td>
  				<td></td>
  				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
  			</tr>
			<?php endforeach ?>
                        <?php endif; ?>
                       
                          <?php if(!empty($da)): ?>
			<?php foreach ($da as $k2=>$v2):?>
  			<tr>
  				<td><?php echo $v2['nikename'];?></td>
  				<td><?php echo $v2['tel'];?></td>
  				<td><?php echo $v2['ProvinceName'].$v2['CityName'].$v2['DistrictName'] ?></td>
  				<td></td>
  				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
  			</tr>
			<?php endforeach ?>
                        <?php endif; ?>
                    
        <tr>
               <td colspan="8" style="font-size:15px;  color: #36c; "> <?php echo $page; ?></td>
       </tr>
  		
  		</table>	
		</div>
      </form>
	 
			 </div>
		</div>

  </div>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="http://58.30.16.58/assets/js/config-min.js"></script>

<script type="text/javascript">

  BUI.use('bui/form',function (Form) {
    var form = new Form.HForm({
      srcNode : '#J_Form'
    });

    form.render();
  });

</script>

<body>
</html>