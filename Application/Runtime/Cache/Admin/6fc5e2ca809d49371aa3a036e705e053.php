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
      <form id="J_Form" class="form-horizontal span24" style="width:1150px" method="post" action="<?php echo U('agent');?>">
        <div class="row">
     
        <div class="row">
          <div class="control-group span15">
            <label class="control-label" style="margin-left:-35px;"><b>代理区域：</b></label><br /><br />
			<div><select  style="width:70px;float:left;margin-top:2px;" name="" id=""><option value="">全国</option></select></div>
            <div class="controls bui-form-group-select"  data-type="city" style="margin-left:0px;">
			
              <select  style="width:95px;float:left;margin-top:2px; <?php if($Pname){echo "display:block";}else{echo "display:none";}?>" class="input-small" name="province" value="<?php echo $Pname; ?>">
                <option>请选择省</option>
              </select>
              <select style="width:95px;float:left;margin-top:2px;<?php if(!empty($Cname)||!empty($Pname)){echo "display:block";}else{echo "display:none";}?>" class="input-small"  name="city" value="<?php echo $Cname; ?>"><option>请选择市</option></select>
              <select name="county" id="district"  value="<?php echo $Dname; ?>"><option>请选择县/区</option></select>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <button type="submit" class="button button-primary">查询</button>&nbsp;&nbsp;&nbsp;
            </div>
          </div>
        </div>
        
		<div style="width:100%;" id="none">
		<table style="margin:5px auto;">
			<tr id="t1">
				<td style="width:330px;">区域</td>
				<td>是否签约</td>
				<td>账户余额</td>
				<td style="width:230px;">负责站长</td>
				<td>联系电话</td>
				<td>邮箱</td>
				
				<td>开通日期</td>
				<td style=" width:450px;height:30px;font-size:15px;">有效期</td>
				<td>状态</td>
				<td style="width:400px;">操作</td>
			
			</tr>
			<!-- 省级 -->
			<?php if(!empty($pname)):?>
			<?php foreach($pname as $k3=>$v3):?>
				<tr>
				<td><?php echo $v3['ProvinceName']?></td>
				<td><?php if(!empty($v3['name'])){echo "是";}else{echo "否";}?></td>
				<td><?php echo $v3['balance']?></td>
				<td><?php echo $v3['name']?></td>
				<td><?php echo $v3['tel']?></td>
				<td><?php echo $v3['email']?></td>
				<td><?php echo $v3['create_date'];?></td>
				<td><?php echo $v3['start_date']."&nbsp;&nbsp;".$v3['end_date']?></td>
				<td style="<?php if((!empty($v3['name']))||(empty($v3['name']) && time()>strtotime($v3['start_date'])&&time()<strtotime($v3['end_date']))) {echo 'color:#f60';} ?>">
				 	<?php  if((!empty($v3['name']))||(empty($v3['name']) && time()>strtotime($v3['start_date'])&&time()<strtotime($v3['end_date']))) {echo "已开通";} else{echo "未开通";} ?></td>
				<td>
				 <?php if(!empty($v3['create_date']) && time()>strtotime($v3['start_date'])&&time()>strtotime($v3['end_date'])): ?>
                                    <a href="#" style="margin-right:17px;color:green;">
                                        续费
                                    </a><a href="#">暂停</a><a onclick="return confirm('确定要关闭吗？');"  href="<?php echo U('del',array('id'=>$v3['id']));?>"style="margin-left:20px;">关闭</a>
				<?php endif; ?>


                                    <?php if(empty($v3['name']) && time()>strtotime($v3['start_date'])&&time()<strtotime($v3['end_date'])): ?>
                                    <a href="#" style="margin-left:-12px;color:grey;">
                                        已开通
                                    </a><a style=" margin-left: 14px;" href="#">暂停</a><a onclick="return confirm('确定要关闭吗？');"  href="<?php echo U('del',array('id'=>$v3['id']));?>"style="margin-left:20px;">关闭</a>
				<?php endif; ?>
                                 <?php if(empty($v3['create_date'])): ?>
                                    <a href="<?php echo U('add',array('pname'=>$v3['ProvinceName']));?>" style="margin-right:20px;">
                                        开通
                                    </a><a href="#">暂停</a><a href="#"style="margin-left:20px;">关闭</a>
				<?php endif; ?>
                                <?php if(!empty($v3['name']) &&(time()>strtotime($v3['start_date']))&&(time()<strtotime($v3['end_date']))): ?>
                                    <a style="margin-left:-12px;" href="#" style="margin-right:20px;">
                                        已开通
                                    </a><a style=" margin-left: 14px;" href="#">暂停</a><a href="#"style="margin-left:20px;">关闭</a>
				<?php endif; ?>
				 </td>
                                
			</tr>
				<?php endforeach; ?>
				<?php endif; ?>
                                <!-- 市级 -->
			<?php foreach($data as $k=>$v):?>
			<tr>
				<td><?php echo $v['CityName']?></td>
				<td><?php if(!empty($v['name'])){echo "是";}else{echo "否";}?></td>
		<td><?php echo $v['balance']?></td>
		<td><?php echo $v['name']?></td>
		<td><?php echo $v['tel']?></td>
                        <td><?php echo $v['email']?></td>
		<td><?php echo $v['create_date']?></td>
		<td><?php echo $v['start_date']."&nbsp;&nbsp;".$v['end_date']?></td>
		<td style="<?php if((!empty($v['name']))||(empty($v['name']) && time()>strtotime($v['start_date'])&&time()<strtotime($v['end_date']))) {echo 'color:#f60';} ?>">
		 	<?php  if((!empty($v['name']))||(empty($v['name']) && time()>strtotime($v['start_date'])&&time()<strtotime($v['end_date']))) {echo "已开通";} else{echo "未开通";} ?></td>
		<td>
				 <?php if(!empty($v['create_date']) && time()>strtotime($v['start_date'])&&time()>strtotime($v['end_date'])): ?>
                                    <a href="<?php echo U('show',array('id'=>$v['id']));?>" style="margin-right:20px;color:green;">
                                        续费
                                    </a><a href="#">暂停</a><a onclick="return confirm('确定要关闭吗？');"  href="<?php echo U('del',array('id'=>$v['id']));?>"style="margin-left:20px;">关闭</a>
				<?php endif; ?>


                                    <?php if(empty($v['name']) && time()>strtotime($v['start_date'])&&time()<strtotime($v['end_date'])): ?>
                                    <a href="<?php echo U('show',array('id'=>$v['id']));?>" style="margin-left:-14px;color:grey;">
                                        已开通
                                    </a><a style=" margin-left: 16px;"  href="#">暂停</a><a onclick="return confirm('确定要关闭吗？');"  href="<?php echo U('del',array('id'=>$v['id']));?>"style="margin-left:20px;">关闭</a>
				<?php endif; ?>
                                 <?php if(empty($v['create_date'])): ?>
                                    <a href="<?php echo U('add',array('city'=>$v['CityName']));?>" style="margin-right:20px;">
                                        开通
                                    </a><a href="#">暂停</a><a href="#"style="margin-left:20px;">关闭</a>
				<?php endif; ?>
                                <?php if(!empty($v['name'])): ?>
                                    <a style="margin-left:-12px;" href="#" style="margin-right:20px;">
                                        已开通
                                    </a><a style=" margin-left: 14px;" href="#">暂停</a><a href="#"style="margin-left:20px;">关闭</a>
				<?php endif; ?>
                                
                             
				</td>
			</tr>
				<?php endforeach; ?>

				<!-- 区县 -->
			<?php foreach ($data1 as $k1=>$v1):?>
			<tr>
				<td><?php echo $v1['DistrictName']?></td>
				<td><?php if(!empty($v1['name'])){echo "是";}else{echo "否";}?></td>
				<td><?php echo $v1['balance']?></td>
				<td><?php echo $v1['name']?></td>
				<td><?php echo $v1['tel']?></td>
                            		<td><?php echo $v1['email']?></td>
				<td><?php echo $v1['create_date']?></td>
				<td><?php echo $v1['start_date']."&nbsp;".$v1['end_date']?></td>
				<td style="<?php if((!empty($v1['name']))||(empty($v1['name']) && time()>strtotime($v1['start_date'])&&time()<strtotime($v1['end_date']))) {echo 'color:#f60';} ?>">
				 	<?php  if((!empty($v1['name']))||(empty($v1['name']) && time()>strtotime($v1['start_date'])&&time()<strtotime($v1['end_date']))) {echo "已开通";} else{echo "未开通";} ?></td>
                                <td>
				 <?php if(!empty($v1['create_date']) && time()>strtotime($v1['start_date'])&&time()>strtotime($v1['end_date'])): ?>
                                    <a href="<?php echo U('show',array('id'=>$v1['id']));?>" style="margin-right:20px;color:green;">
                                        续费
                                    </a><a href="#">暂停</a><a onclick="return confirm('确定要关闭吗？');"  href="<?php echo U('del',array('id'=>$v1['id']));?>"style="margin-left:20px;">关闭</a></td>
				<?php endif; ?>


                                    <?php if(empty($v1['name']) && time()>strtotime($v1['start_date'])&&time()<strtotime($v1['end_date'])): ?>
                                    <a href="<?php echo U('show',array('id'=>$v1['id']));?>" style="margin-right:20px;color:grey;">
                                        已开通
                                    </a><a href="#">暂停</a><a onclick="return confirm('确定要关闭吗？');"  href="<?php echo U('del',array('id'=>$v1['id']));?>"style="margin-left:20px;">关闭</a></td>
				<?php endif; ?>
                                 <?php if(empty($v1['create_date'])): ?>
                                    <a href="<?php echo U('add',array('District'=>$v1['DistrictName']));?>" style="margin-right:20px;">
                                        开通
                                    </a><a href="#">暂停</a><a href="#"style="margin-left:20px;">关闭</a></td>
				<?php endif; ?>
                                <?php if(!empty($v1['tel'])): ?>
                                    <a style="margin-left:-12px;" href="#" style="margin-right:20px;">
                                        已开通
                                    </a><a style=" margin-left: 14px;" href="#">暂停</a><a href="#"style="margin-left:20px;">关闭</a></td>
				<?php endif; ?>
			</tr>
			<?php endforeach; ?>
		
			
	<?php if(!empty($county)): ?>
                    <?php foreach ($data2 as $k2=>$v2):?>
			<tr>
				<td><?php echo $county; ?></td>
				<td><?php if(!empty($v2['name'])){echo "是";}else{echo "否";}?></td>
				<td><?php echo $v2['balance']?></td>
				<td><?php echo $v2['name']?></td>
				<td><?php echo $v2['tel']?></td>
                                 <td><?php echo $v2['email']?></td>
				<td><?php echo $v2['create_date']?></td>
				<td><?php echo $v2['start_date']."&nbsp;".$v2['end_date']?></td><td style="<?php if((!empty($v2['name']))||(empty($v2['name']) && time()>strtotime($v2['start_date'])&&time()<strtotime($v2['end_date']))) {echo 'color:#f60';} ?>">
				 	<?php  if((!empty($v2['name']))||(empty($v2['name']) && time()>strtotime($v2['start_date'])&&time()<strtotime($v2['end_date']))) {echo "已开通";} else{echo "未开通";} ?></td>
                                <td>    <?php if(empty($v2['name']) && time()>strtotime($v2['start_date'])&&time()<strtotime($v2['end_date'])): ?>
                                    <a href="<?php echo U('show',array('id'=>$v2['id']));?>" style="margin-right:20px;">
                                        已开通
                                    </a><a href="#">暂停</a><a href="#"style="margin-left:20px;">关闭</a></td>
				<?php endif; ?>
                                 <?php if(empty($v2['create_date'])): ?>
                                    <a href="<?php echo U('add',array('pname'=>$v2['ProvinceName']));?>" style="margin-right:20px;">
                                        开通
                                    </a><a href="#">暂停</a><a href="#"style="margin-left:20px;">关闭</a></td>
				<?php endif; ?>
                                <?php if(!empty($v2['name'])): ?>
                                    <a style="color:#f60; margin-left:-12px;" href="#" style="margin-right:20px;">
                                        已开通
                                    </a><a style=" margin-left: 14px;" href="#">暂停</a><a href="#"style="margin-left:20px;">关闭</a></td>
				<?php endif; ?>
					
			</tr>
                        <?php endforeach; ?>
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