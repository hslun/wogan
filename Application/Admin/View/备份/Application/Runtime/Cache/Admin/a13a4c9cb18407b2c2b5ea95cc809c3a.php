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
        <form id="J_Form" class="form-horizontal span24" method="post" action="/abc.php?s=admin/Member/Member.html">
             <div class="row">
                <div class="row">
                    <div class="control-group span15">
            <label class="control-label" style="margin-left:-35px;"><b>代理区域：</b></label><br /><br />
                        <div><select  style="width:70px;float:left;margin-top:2px;" name="" id=""><option value="">全国</option></select></div>
        <div class="controls bui-form-group-select"  data-type="city" style="margin-left:0px;">
              <select  class="input-small" name="province" value="<?php echo $province ;?>">
                <option>请选择省</option>
              </select>
              <select class="input-small"  name="city" value="<?php echo $city ;?>"><option>请选择市</option></select>
              <select name="county" id="district"  value="<?php echo $county ;?>"><option>请选择县/区</option></select>
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
  				<td><?php echo $v['fadancount'];?></td>
  				<td><?php echo $v['qiangdancount'];?></td>
				<td><?php echo $v['quxiaocount'];?></td>
				<td id="memberlock<?php echo $v['id'];?>"><span style="color:<?php if( $v['lock'] == '正常'){echo green;}else{echo red;}?>;"><?php echo $v['lock'];?></span></td>
                                <td><input type="button" value="冻结" id="$dongjie" pid="<?php echo $v['id'];?>" onclick="memberlockd(this)"> 
                                    <input type="button" value="解冻" id="$jiedong" pid="<?php echo $v['id'];?>" onclick="memberlockj(this)"></td>
  			</tr>

			<?php endforeach ?>
                        <?php endif; ?>
                        
                         <?php if(!empty($dat)): ?>
			<?php foreach ($dat as $k1=>$v1):?>
  			<tr>
  				<td><?php echo $v1['nikename'];?></td>
  				<td><?php echo $v1['tel'];?></td>
  				<td><?php echo $v1['ProvinceName'].$v1['CityName'].$v1['DistrictName'] ?></td>
				<td><?php echo $v1['fadancount'];?></td>
                    <td><?php echo $v1['qiangdancount'];?></td>
                    <td><?php echo $v1['quxiaocount'];?></td>
                    <td id="memberlock<?php echo $v1['id'];?>"><span style="color:<?php if( $v1['lock'] == '正常'){echo green;}else{echo red;}?>;"><?php echo $v1['lock'];?></span></td>
                                <td><input type="button" value="冻结" id="$dongjie" pid="<?php echo $v1['id'];?>" onclick="memberlockd(this)"> 
                                    <input type="button" value="解冻" id="$jiedong" pid="<?php echo $v1['id'];?>" onclick="memberlockj(this)"></td>
  			</tr>
			<?php endforeach ?>
                        <?php endif; ?>
                       
                          <?php if(!empty($da)): ?>
			<?php foreach ($da as $k2=>$v2):?>
  			<tr>
  				<td><?php echo $v2['nikename'];?></td>
  				<td><?php echo $v2['tel'];?></td>
  				<td><?php echo $v2['ProvinceName'].$v2['CityName'].$v2['DistrictName'] ?></td>
  				<td><?php echo $v2['fadancount'];?></td>
                    <td><?php echo $v2['qiangdancount'];?></td>
                    <td><?php echo $v2['quxiaocount'];?></td>
                    <td id="memberlock<?php echo $v2['id'];?>"><span style="color:<?php if( $v2['lock'] == '正常'){echo green;}else{echo red;}?>;"><?php echo $v2['lock'];?></span></td>
                                <td><input type="button" value="冻结" id="$dongjie" pid="<?php echo $v2['id'];?>" onclick="memberlockd(this)"> 
                                    <input type="button" value="解冻" id="$jiedong" pid="<?php echo $v2['id'];?>" onclick="memberlockj(this)"></td>
  			</tr>
			<?php endforeach ?>
                        <?php endif; ?>

						<?php if(!empty($d)): ?>
			<?php foreach ($d as $k4=>$v4):?>
  			<tr>
  				<td><?php echo $v4['nikename'];?></td>
  				<td><?php echo $v4['tel'];?></td>
  				<td><?php echo $v4['ProvinceName'].$v4['CityName'].$v4['DistrictName'] ?></td>
  				<td><?php echo $v4['fadancount'];?></td>
                    <td><?php echo $v4['qiangdancount'];?></td>
                    <td><?php echo $v4['quxiaocount'];?></td>
                    <td id="memberlock<?php echo $v4['id'];?>"><span style="color:<?php if( $v4['lock'] == '正常'){echo green;}else{echo red;}?>;"><?php echo $v4['lock'];?></span></td>
                                <td><input type="button" value="冻结" id="$dongjie" pid="<?php echo $v4['id'];?>" onclick="memberlockd(this)"> 
                                    <input type="button" value="解冻" id="$jiedong" pid="<?php echo $v4['id'];?>" onclick="memberlockj(this)"></td>
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
 <script>
                    function memberlockd(a){
                      
                      var uid = a.attributes['pid'].nodeValue;
                       document.getElementById('memberlock'+uid).innerHTML = "<span style='color:red'>冻结</span>";
                      var url = "http://58.30.16.58/abc.php?s=admin/Member/memberlockd/id/"+uid; 
                      xmlhttp=null;
                     if (window.XMLHttpRequest){
                       xmlhttp=new XMLHttpRequest();
                     }else if (window.ActiveXObject){
                       xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                     if (xmlhttp.readyState==4){
                        if (xmlhttp.status==200){ 
                        } 
                     }  
                      xmlhttp.open("GET",url,true);
                      xmlhttp.send(null);
                    }
                    function memberlockj(a){
                      var uid = a.attributes['pid'].nodeValue;
                      document.getElementById('memberlock'+uid).innerHTML = "<span style='color:green'>正常</span>";
                      
                      var url = "http://58.30.16.58/abc.php?s=admin/Member/memberlockj/id/"+uid; 
                      xmlhttp=null;
                     if (window.XMLHttpRequest){
                       xmlhttp=new XMLHttpRequest();
                     }else if (window.ActiveXObject){
                       xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                     }
                     if (xmlhttp.readyState==4){
                        if (xmlhttp.status==200){ 
                        } 
                     }  
                      xmlhttp.open("GET",url,true);
                      xmlhttp.send(null);
                    } 
                  
                </script>
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