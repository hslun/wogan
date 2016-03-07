<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 账户信息</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="http://58.30.16.58/assets/css/main-min.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" charset="utf-8" src="http://58.30.16.58/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="http://58.30.16.58/Public/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="http://58.30.16.58/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
   <style type="text/css">

   </style>
 </head>
 <body>
<div style="margin-top:30px; margin-left:-50px;">
  <div class="container">
    <div class="row">
        <form id="J_Form" class="form-horizontal span24" method="post" action="/abc.php?s=Admin/Advert/add" enctype="multipart/form-data" >
            <div>
                广告名称:&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="title" cols="30" rows="10"  style="width:470px;height:25px;"></textarea><br/><br/>
                <input type="file" name="img" ><br/><br>
            </div>
         <div class="row">
          <div class="control-group span15 ">
            <label  style="margin-left:-52px;" class="control-label">开通时间：</label>
            <div id="range" class="controls bui-form-group"  data-rules="{dateRange:true}">
              <input style="width:100px;" name="starttime" class="calendar"   data-rules="{required:true}"  type="text"><label>&nbsp;-&nbsp;</label>
              <input style="width:100px;" name="endtime" class="calendar"   data-rules="{required:true}"  type="text">
            </div>
          </div>
        </div>
            <div>
                广告类型:&nbsp;&nbsp;&nbsp;&nbsp;<select name="flag" style="width:100px;"><option value="1">文字广告</option><option value="2">左侧广告吧</option></select>&nbsp;&nbsp;<br><br>
                
            </div>
            
            <div style="margin-top:5px;width:550px;">
                <textarea id="content" name="content" cols="40" rows="3"><?php ?></textarea>
            </div>
            <input type="submit" value="提交">
			
			
		
        
       
      </form>
  
    

    </div>
  </div>


  </div>	
  <script type="text/javascript" src="http://58.30.16.58/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="http://58.30.16.58/assets/js/bui-min.js"></script>

  <script type="text/javascript" src="http://58.30.16.58/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="http://58.30.16.58/assets/js/prettify.js"></script>
  <script type="text/javascript">
      var um = UE.getEditor('content', {
	initialFrameWidth:"100%"
});

    $(function () {
      prettyPrint();
	
    }
	);
	function show(){
		$('#none').toggle();
		}	
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

</body>
</html>