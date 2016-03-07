<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 柱状图示例</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/page-min.css" rel="stylesheet" type="text/css" /> 
	<script type="text/javascript" src="http://58.30.16.58/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="http://58.30.16.58/assets/js/config-min.js"></script>
   <style type="text/css">
     .top1  h2 input{
           width:50px;
           border:1px solid #fff;
       }
   body{
      font-size:12px;
    }
    .top1{
       
        
    }
.top1 h2{
        margin:0px 40px; float:left;
        margin-top:-10px;
		padding-top: 30px;
}
.top2 h2{
        margin:5px 40px; float:left;
    }
    td{
    font-size:12px;
	border:1px solid #d1d1d1;
	height:26px;
	width:200px;
	text-align:center;
   }
   table{
         width: 1200px;
  margin-left: 15px;
  margin-top: 10px;
   }
   </style>
 </head>
 <body>
  
    
    <div>

       <form id="J_Form" class="form-horizontal span24" method="post" action="/abc.php?s=admin&c=order&a=index">
        



<div style="background-color:#f2f2f2;margin:15px 10px;width:1150px;padding:15px 25px" >
          <div class="top1" style="">
              今日收入:<input type="text" value="<?php echo $money;?>" style="background-color:#f2f2f2; border:1px solid #f2f2f2;" readonly="readonly">&nbsp;元
            下单总量:<input type="text" value="<?php echo $i;?>"  style="background-color:#f2f2f2; border:1px solid #f2f2f2;"  readonly="readonly">&nbsp;单
            成交:<input type="text" value="<?php echo $count;?>" style="background-color:#f2f2f2; border:1px solid #f2f2f2;"  readonly="readonly">&nbsp;单
            成交率:&nbsp;<input type="text" style="background-color:#f2f2f2; border:1px solid #f2f2f2;"  value="<?php echo (Round($count/$i,2))*100;?>" readonly="readonly">% 
            <div style="clear:both;"></div><br/>
       
        </div>
         <div class="container" style="background-color:#f2f2f2;border-top:1px solid #e6e6e6;border-bottom:1px solid #e6e6e6;   ">
     <div class="row">
     
        <div class="row">
          <div class="control-group span15">
            <label class="control-label" style="margin-left:-35px;"><b>代理区域：</b></label><br /><br />
      
            <div class="controls bui-form-group-select"  data-type="city" style="margin-left:0px;">
      
              <select  style="width:95px;float:left;font-size:14px;color: #aaa;display:none; class="input-small" name="province" value="<?php  if(($Pname=='北京市')||($Pname=='天津市')||($Pname=='上海市')||($Pname=='重庆市')){ echo mb_substr($Pname,0,-1,'utf-8'); }else{ echo $Pname; } ?>">
                <option>请选择省</option>
              </select>
              <select style="width:95px;float:left;font-size:14px;color: #aaa;" class="input-small"  name="city" value="<?php echo $city; ?>"><option>请选择市</option></select>
              <select style="width:95px;float:left;font-size:14px;color: #aaa;" class="input-small" name="county" id="district"  value="<?php echo $county; ?>"><option>请选择县/区</option></select>
        &nbsp;&nbsp;
                 <button type="submit" class="button button-primary" style="width:100px;height:25px;">查询</button>&nbsp;&nbsp;&nbsp;</div>
            </div>
                 </div> 
            <div style="clear:both;"></div>
            
        </div>
        </div>
       
            
   </div>
    <div style="  padding-left: -15px;
  padding-top: 15px;
  padding-bottom: 15px; background-color:#f2f2f2;width:1150px;">订&nbsp;单&nbsp;号:<input name="ordernumber" type="text">&nbsp;发单人:<input name="frommember" type="text">&nbsp;接单人<input name="tomember" type="text">&nbsp;&nbsp;
			  <button type="submit" class="button button-primary" style="width:100px;height:25px;">查询</button>&nbsp;&nbsp;&nbsp;</div>
      </form>
    </div>
         </div>
           <div style="clear:both;"></div>
           <div>
               <table>
               	<tr>
               		<td>订单编号</td>
               		<td>发单人</td>
               		<td>接单人</td>
               		
               		
               		<td>内容</td>
               		<td>金额</td>
               		<td>发布时间</td>
               		<td>支付时间</td>
               		<td>订单状态</td>
               	</tr>
				<?php foreach($data as $k => $v):?>
               	<tr>
               		<td><?php echo $v['ordernumber']; ?></td>
               		<td><?php echo $v['from']; ?></td>
                      <td><?php echo $v['to']; ?></td>
               		
               		<td><?php echo $v['content']; ?></td>
               		<td><?php echo $v['money']; ?></td>
               		<td><?php echo date('y-m-d h:i:s',$v['publishtime']); ?></td>
               		<td><?php if(!empty($v['paytime'])){echo date('y-m-d h:i:s',$v['paytime']);} ?></td>
                        <td><?php
 if($v['status']=="1"){ echo "进行中"; }else if($v['status']=="2"){ echo "取消"; }else if($v['status']=="3"){ echo "被接单"; }?></td>
               	</tr>
                 
				<?php endforeach;?>
                 <tr>
                   <td colspan="8"><?php echo $data['0']['page'];?></td>
                 </tr>
               </table>
               
           </div>
           
    </div>

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