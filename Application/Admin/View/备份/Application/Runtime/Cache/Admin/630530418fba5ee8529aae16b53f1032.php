<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 账户信息</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="http://58.30.16.58/assets/css/prettify.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" charset="utf-8" src="http://58.30.16.58/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="http://58.30.16.58/Public/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="http://58.30.16.58/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
   <style type="text/css">
    code {
      padding: 0px 4px;
      color: #d14;
      background-color: #f7f7f9;
      border: 1px solid #e1e1e8;
    }
   </style>
 </head>
 <body>

  <div class="container">
    <div class="row">
        <form id="J_Form" class="form-horizontal span24" method="post" action="/abc.php?s=Admin/advert/edit/id/64" enctype="multipart/form-data" >
            <div>
                广告名称:&nbsp;&nbsp;&nbsp;&nbsp;
				<textarea name="title"  cols="300" rows="10" style="width:470px;height:25px;"><?php echo $data['title']?></textarea>
				<br/><br/>
                <input type="file" name="img" >
                <?php showImage($data['smlogo'],80);?>
				<br><br>
            </div>
         <div class="row">
          <div class="control-group span15 ">
            <label  style="margin-left:-50px;" class="control-label">开通时间：</label>
            <div id="range" class="controls bui-form-group"  data-rules="{dateRange:true}">
              <input style="width:100px;" name="starttime" class="calendar"   data-rules="{required:true}"  type="text" value="<?php echo $data['starttime']?>"><label>&nbsp;-&nbsp;</label>
              <input style="width:100px;" name="endtime" class="calendar"   data-rules="{required:true}"  type="text" value="<?php echo $data['endtime']?>">
            </div>
          </div>
        </div>
            <div>
                广告类型:&nbsp;&nbsp;&nbsp;&nbsp;<select name="flag" style="width:100px;"><option value="1" <?php if($data['flag']=='1'){echo "selected = 'selected'";}?>>文字广告</option><option value="2" <?php if($data['flag']=='2'){echo "selected = 'selected'";}?>>左侧广告吧</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                <br>
        
                
            </div>
            
            <div style="margin-top:5px;width:550px;">
                <textarea id="content" name="content" cols="40" rows="3"><?php echo $data['content'];?></textarea>
            </div>
            <br>
             <button type="submit" class="button button-primary" onclick="show()">保存</button>&nbsp;
             &nbsp; &nbsp; &nbsp;
        <button type="button" class="button button-primary" onclick="back()">返回</button>
			
			
		
        
       
      </form>
  
    

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
     function back(){
    
history.back();
  }
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