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
      <form id="J_Form" class="form-horizontal span24" method="post" action="/index.php/admin/Member/index">
        <div class="row">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>管理员姓名：</label>
            <div class="controls">
              <input name="id" type="text" data-rules="{required:true}"  class="input-normal control-text" readonly="readonly" style="border:1px solid #fff;">
            </div>
          </div>
		  <div class="control-group span8">
            <label class="control-label"><s>*</s>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</label>
            <div class="controls">
              <input name="id" type="text" data-rules="{required:true}" class="input-normal control-text" readonly="readonly" style="border:1px solid #fff;">
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label"><s>*</s>邮箱：</label>
            <div class="controls">
              <input name="id" type="text" data-rules="{required:true}" class="input-normal control-text" readonly="readonly" style="border:1px solid #fff;">
            </div>
          </div>
		  <div class="control-group span8">
            <label class="control-label"><s>*</s>身&nbsp;份&nbsp;证&nbsp;号：</label>
            <div class="controls">
             <input name="id" type="text" data-rules="{required:true}" class="input-normal control-text" readonly="readonly" style="border:1px solid #fff;">
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
        <div id="none" style="display:none;width:520px;font-size:18px;margin:auto;position:fixed;top:80px;left:270px;">
			<div style="background-color:#3B4D88;padding:10px;color:#fff;">请认真填写以下个人信息<input type="button"  value="关闭" onclick="show()" style="float:right;"></div>
			<div style="background-color:#666666;padding:10px;color:;#fff">
				<div style="color:#fff">
					<b>※管理员姓名：</b> <input type="text" style="border:1px solid #666666 ;background-color:#666666;color:#fff;" readonly="true" value="华雪莲">（请联系客服进行修改）
					
				</div>
				<br />
				<div style="color:#fff; ">
					<b>※电话:</b> <input type="text">
				</div>
				<br />
				<div style="color:#fff">
					<b>※邮箱:</b> <input type="text">
				</div>
				<br />
				<div style="color:#fff">
					<b>※身份证号：</b> <input type="text" style="border:1px solid #666666 ;background-color:#666666;color:#fff;" readonly="true" value="13020XXXXXXXXXXXXX">
				</div>
				<br />
				<button type="button" class="button button-primary" onclick="close()">提交</button>
				<button type="reset" class="button">重置</button>
			</div>
		</div>
		
        <div class="row">
          <div class="control-group span15">
            <label class="control-label">最&nbsp;新&nbsp;通&nbsp;知：</label>
            <div class="controls control-row4">
              <textarea name="memo" class="input-large" data-tip="{text:'请填写备注信息！'}" type="text"></textarea>
            </div>
          </div>
        </div>
        <div class="row form-actions actions-bar">
            <div class="span13 offset3 ">
              <button type="button" class="button button-primary" onclick="show()">修改</button>
      
            </div>
        </div>
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