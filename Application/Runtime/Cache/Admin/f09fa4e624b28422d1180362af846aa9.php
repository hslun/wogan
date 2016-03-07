<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 账户信息</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/page-min.css" rel="stylesheet" type="text/css" /> 
   <style type="text/css">
 
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
				<form id="J_Form" class="form-horizontal span24" method="post" action="/index.php/admin/user/user1">
						<div class="row">
								 <div class="row">
										 <div class="control-group span15">
            <label class="control-label" style="margin-left:-35px;"><b>代理区域：</b></label><br /><br />
													<div class="controls bui-form-group-select"  data-type="city" style="margin-left:0px;">
              <select  class="input-small" name="province" value="北京">
                <option>请选择省</option>
              </select>
              <select class="input-small"  name="city" value="北京市"><option>请选择市</option></select>
              <select name="county" id="district"  value="大兴区"><option>请选择县/区</option></select>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <button type="button" class="button button-primary" onclick="che()">查询</button>&nbsp;&nbsp;&nbsp;
              <button type="reset" class="button">重置</button>
													</div>
										</div>
								 </div>
        <table id="box">
  			<tr id="t1">
  				<td>用户昵称</td>
  				<td>手机号</td>
  				<td>所属地区</td>
  				<td>发单数量</td>
  				<td>抢单数量</td>
  				<td>取消数量</td>
  				<td>状态</td>
  				<td>操作</td>
  			</tr>
			<?php foreach ($data as $k=>$v):?>
  			<tr>
  				<td><?php echo $v['truename']?></td>
  				<td><?php echo $v['remark']?></td>
  				<td><?php echo $v['level']?></td>
  				<td><?php echo date('Y-m-d H:i:s',$v['starttime']);?></td>
  				<td>-</td>
  			</tr>
			<?php endforeach ?>
  			<tr>
  				<td></td>
  				<td></td>
  				<td></td>
  				<td></td>
  				<td></td>
  			</tr>
  		</table>
		<button type="button" class="button button-primary" onclick="show()" style="margin-left:20px;">添加</button>
  	
  		<div id="none" style="display:none;position:fixed; left:150px; top:60px;width:600px;height:300px;">
		<div style="background-color:#3B4D88;padding:10px;color:#fff;"><b>添加管理员</b></div>
		<div class="none">昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称:<input type="text" name="truename"></div>
		<div class="none">角&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;色:<input type="text" name="remark"></div>
		<div class="none">权&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;限:<input type="text" name="level"></div>
		<div style="background-color:#E0E1E2; padding:10px;color:#000;font-size:12px;
	border:1px solid #d1d1d1; height:24px;padding-left:195px;font-weight:bold;">开通时间:<input type="hidden" name="starttime" readonly="true" value="<?php echo time();?>"></div>
		<div class="none">
		<button type="submit" class="button button-primary"  style="margin-left:20px;">提交</button>
		<button type="button" class="button button-primary" onclick="show()" style="margin-left:20px;">关闭</button>
		</div>
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
    function show(){
		$('#none').toggle();
		}
</script>

<body>
</html>