<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登录页</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/purebox.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
<body>

<div class="login-layout">
	<form method="post" id="form_login" action="privilege.php" name='theForm'>
    	<div class="login-form">
        	<div class="logo"><img src="images/logo.png" /></div>
            <div class="formInfo">
            	<div class="formText">
                	<i class="icon icon-user"></i>
                    <input type="text" name="stores_user" autocomplete="off" class="input-text" value="" placeholder="用户名">
                </div>
                <div class="formText mb10">
                	<i class="icon icon-pwd"></i>
                    <input type="password" name="stores_pwd" autocomplete="off" class="input-text" value="" placeholder="密  码">
                </div>
                <div class="formText mb10">
                	<input type="checkbox" name="remember" class="ui-checkbox" id="remember" />
                    <label for="remember" class="ui-label">保存信息</label>
                </div>
                <div class="formText submitDiv mb10">
                	<?php if ($this->_var['gd_version'] > 0): ?>
                	<span class="text_span">
                        <div class="code">
                            <div class="arrow"></div>
                            <div class="code-img"><img src="index.php?act=captcha&<?php echo $this->_var['random']; ?>" onclick= this.src="index.php?act=captcha&"+Math.random() title="<?php echo $this->_var['lang']['click_for_another']; ?>"  name="codeimage" border="0" id="codeimage"></div>
                        </div>
                        <input type="text" name="captcha" class="input-yzm" placeholder="输入验证码" value="">
                    </span>
                    <?php endif; ?>
                    <span class="submit_span">
                    	<input type="hidden" name="act" value="signin" />
                        <input type="button" name="submit" class="sub" value="登录" onclick="send_form_data('form[name=theForm]')">
                    </span>
                </div>
                <div class="formText">
                	<a href="get_password.php?act=forget_pwd" class="not_pwd" target="_blank">忘记密码？</a>
                </div>
            </div>
        </div>
	</form>
</div>
<div id="bannerBox">
	<ul class="slideBanner">
    	<li><img src="images/banner_login.jpg" /></li>
    </ul>
</div>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.purebox.js')); ?>
<script type="text/javascript">
	$("#bannerBox").slide({mainCell:".slideBanner",effect:"fold",interTime:3500,delayTime:500,autoPlay:true,autoPage:true,endFun:function(i,c,s){
		$(window).resize(function(){
			var width = $(window).width();
			var height = $(window).height();
			s.find(".slideBanner,.slideBanner li").css({"width":width,"height":height});
		});
	}});
	
	$(function(){
		$(".formText .input-text").focus(function(){
			$(this).parent().addClass("focus");
		});
		
		$(".formText .input-text").blur(function(){
			$(this).parent().removeClass("focus");
		});
		
		$(".checkbox").click(function(){
			if($(this).hasClass("checked")){
				$(this).removeClass("checked");
			}else{
				$(this).addClass("checked");
			}
		});
		
		$(".formText .input-yzm").focus(function(){
			$(this).prev().show();
		});
		
		$(document).on('click',function(e){
			if(e.target.className !='input-yzm' && !$(e.target).parents("div").is(".code")){
				$('.code').hide();
			}
		});
	});
</script>
</body>
</html>
