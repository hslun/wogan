<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title> 账户信息</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="http://58.30.16.58/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="http://58.30.16.58/assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="http://58.30.16.58/assets/css/prettify.css" rel="stylesheet" type="text/css" />
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
        <form id="J_Form" class="form-horizontal span24" method="post" action="<?php echo U('Agent/edit');?>">
        <div class="row">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>管理员姓名：</label>
            <div class="controls">
              <input name="name" type="text" data-rules="{required:true}"  class="input-normal control-text">
            </div>
          </div>
		  <div class="control-group span8">
            <label class="control-label"><s>*</s>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</label>
            <div class="controls">
              <input name="tel" type="text" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label"><s>*</s>邮箱：</label>
            <div class="controls">
              <input name="email" type="text" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>
		  <div class="control-group span8">
            <label class="control-label"><s>*</s>身&nbsp;份&nbsp;证&nbsp;号：</label>
            <div class="controls">
             <input name="idcard" type="text" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>
		  <div class="control-group span8">
            <label class="control-label"><s>*</s>支付宝账号：</label>
            <div class="controls">
             <input name="alipay" type="text" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>  
	
        </div>
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">代&nbsp;理&nbsp;区&nbsp;域：</label>
            <div class="controls bui-form-group-select"  data-type="city">
              <select  class="input-small" name="province" value="山东省">
                <option>请选择省</option>
              </select>
              <select class="input-small"  name="city" value="淄博市"><option>请选择市</option></select>
              <select class="input-small"  name="county" value="淄川区"><option>请选择县/区</option></select>
            </div>
          </div>
        </div>
        
		
        
        <div class="row form-actions actions-bar">
            <div class="span13 offset3 ">
              <button type="submit" class="button button-primary" onclick="show()">保存</button>
      
            </div>
        </div>
            <input type="hidden" name="id" value="<?php echo $_SESSION['admin_id']?>">
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

<body>
</html>