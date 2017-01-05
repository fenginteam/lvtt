<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link rel="stylesheet" type="text/css" href="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/base.css" />
<link rel="stylesheet" type="text/css" href="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/user.css" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />

<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.9.1.min.js,jquery.json.js,transport_jquery.js,common.js,user.js,utils.js,user_register.js')); ?>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/sc_common.js"></script>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/scroll_city.js"></script>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/jquery.tabso_yeso.js"></script>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/placeholder.js"></script>
</head>

<body>
<?php if ($this->_var['action'] == 'login'): ?>
<div class="ecsc-registLogin">
    <div class="registLogin">
        <div class="registLogin-header w1200">
            <a href="./index.php" class="logo"><img src="themes/ecmoban_dsc/images/logo_2015.png" /></a>
            <b></b>
        </div>
    </div>
    <div class="registLogin-layout" style="overflow:visible;">
        <div class="registLogin-banner">
			<?php 
$k = array (
  'name' => 'get_adv_child',
  'ad_arr' => $this->_var['login_banner'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>  
            <div class="hd">
                <a href="javascript:void(0);" class="icon buy-prev"></a>
                <a href="javascript:void(0);" class="icon buy-next"></a>
                <div class="login-wrap">
                    <div class="login-form">
                    	<form name="formLogin" action="user.php" method="post" onSubmit="userLogin();return false;">
                        <div class="mt">
                            <h1>欢迎登录</h1>
                            <?php if ($this->_var['shop_reg_closed'] != 1): ?>
                            <a href="user.php?act=register" class="jump">免费注册</a>
                            <?php endif; ?>
                        </div>
                        <div class="mc">
                        	<div class="msg-wrap">
                                <div class="msg-error" style="display:none">
                                    <b></b>账户名与密码不匹配，请重新输入
                                </div>
                            </div>
                            <div class="form">
                                <div class="item last">
                                    <div class="item-info">
                                        <i class="i-name"></i>
                                        <input type="text" id="loginname" name="username" class="text text-2 " value="" placeholder="<?php echo $this->_var['lang']['label_username']; ?>" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="item-info">
                                        <input type="password" id="nloginpwd" name="password" class="text text-2 " value="" placeholder="<?php echo $this->_var['lang']['label_password']; ?>" />
                                        <i class="i-pass"></i>
                                    </div>
                                </div>
                                <?php if ($this->_var['enabled_captcha']): ?>
                                <div class="item">
                                    <div class="item-info">
                                    	<i class="i-captcha"></i>
                                        <input type="text" id="captcha" name="captcha" value="" class="text text-3 text-4" placeholder="<?php echo $this->_var['lang']['comment_captcha']; ?>" />
										<img src="captcha_verify.php?captcha=is_login&<?php echo $this->_var['rand']; ?>" alt="captcha" class="fl ml5" onClick="this.src='captcha_verify.php?captcha=is_login&'+Math.random()" />
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="safe">
                                    <span>
                                        <input id="remember" name="remember" type="checkbox" class="jdcheckbox" style="outline: rgb(109, 109, 109) none 0px;">
                                        <label for="remember"><?php echo $this->_var['lang']['remember']; ?></label>
                                    </span>
                                </div>
                                <div class="item">
                                    <span class="forget-pw-safe"><a href="user.php?act=get_password">忘记密码?</a></span>
                                    <input type="hidden" name="act" value="act_login" />
            						<input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
            						<div class="login-btn"><input type="submit" name="submit" id="loginSubmit" value="登&nbsp;&nbsp;录" class="btn-entry" /></div>
                                </div>
                            </div>
                            <?php if ($this->_var['website_list']): ?>
                            <div class="coagent">
                                <h4>用第三方账号直接登录：</h4>
                                <ul>
                                	<?php $_from = $this->_var['website_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'website');if (count($_from)):
    foreach ($_from AS $this->_var['website']):
?>
                                    <li><a href="user.php?act=oath&type=<?php echo $this->_var['website']['web_type']; ?>" class="<?php echo $this->_var['website']['web_type']; ?>"></a></li>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        </form>
                    </div>
                    <div class="qrcode-login">
                    	<div class="mc">
                        	<div class="qrcode-desc"><h2>用京东APP <span class="ml5">扫码安全登录</span></h2></div>
                            <div class="qrcode-error">
                                <b></b>
                                <h6>登录失败</h6>
                                请刷新二维码后重新扫描
                            </div>
                            <div class="qrcode-main">
                            	<div class="qrcode-img"><img src="themes/ecmoban_dsc/images/wap_ewm.jpg" width="150" height="150" /></div>
                                <div class="qrcode-panel">
                                	<ul>
                                        <li class="first"><a href="javascript:;">刷新二维码</a></li>
                                        <li><a href="#">使用帮助</a></li>
                                    </ul>
                                    <div class="qrcode-tips">
                                        <span>扫描不上，版本过低？</span>
                                        <div class="triangle-border tb-border"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hide">
                    <a href="javascript:;" class="qrcode-target btn-2qrcode">扫码登录</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var length = $(".registLogin-banner .bd").find("li").length;
if(length>1){
	$(".registLogin-banner").slide({titCell:".msto",mainCell:".bd ul",effect:"left",pnLoop:false,autoPlay:false,autoPage:true,prevCell:".buy-prev",nextCell:".buy-next"});
}else{
	$(".registLogin-banner .hd").find(".icon").hide();
}
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'register'): ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'./sms/sms.js')); ?>
<div class="ecsc-registLogin ecsc-register">
    <div class="registLogin borderBottom1">
        <div class="registLogin-header w1200">
            <a href="./index.php" class="logo"><img src="themes/ecmoban_dsc/images/logo_2015.png" /></a>
            <b></b>
            <span class="registLogin-header-fr">有账号<a href="user.php" class="jump">在此登录</a></span>
        </div>
    </div>
   <div class="registLogin-layout w1000">
        <div class="regist-banner"><a href="#" target="_blank"><img src="themes/ecmoban_dsc/images/regist-banner.jpg" /></a></div>
        <div class="regist-wrap">
        	<?php if ($this->_var['shop_reg_closed'] != 1): ?>
            <div class="regist-form" style="overflow:visible;">
                <div class="mc" style="overflow:visible;">
                    <div class="form formtwo">
                        <form action="user.php" method="post" name="formUser" onsubmit="return mobileRegister();">
                        <div class="item">
                        	<div class="label">用　户　名</div>
                            <div class="item-info">
                                <input type="text" id="username" name="username" onblur="is_registered(this.value, 1);"  maxlength="35" class="text" value="" />
                                <i class="i-name"></i>
                            </div>
                            <label id="username_notice_1" class="error"></label>
                        </div>
                        
                        <div class="item" id="phone_yz">
                        	<div class="label">手 机 号 码</div>
                            <div class="item-info">
                                <input type="text" id="mobile_phone" name="mobile_phone" onblur="checkPhone(this.value);" maxlength="20" class="text" value="" />
                                <i class="i-phone"></i>
                            </div>
                            <label id="phone_notice" class="error"></label>
                            <span class="tx_rm">或 <a href="javascript:void(0)" class="email_open">邮箱验证</a></span>
                        </div>
                        
                        <div class="item" id="email_yz" style="display:none;">
                        	<div class="label">邮 箱 验 证</div>
                            <div class="item-info">
                                <input type="text" id="regName" name="email" onblur="checkEmail(this.value);" class="text" value="" />
                                <i class="i-email"></i>
                            </div>
                            <label id="email_notice" class="error"></label>
                            <span class="tx_rm">或 <a href="javascript:void(0)" class="email_off">手机验证</a></span>
                        </div>
                        
                        <div class="item">
                        	<div class="label">设 置 密 码</div>
                            <div class="item-info">
                                <input type="password" id="pwd" name="password" maxlength="30" class="text " value="" />
                                <i class="i-pass"></i>
                            </div>
                            <label id="phone_password" class="error"></label>
                        </div>
                        <div class="item">
                        	<div class="label">确 认 密 码</div>
                            <div class="item-info">
                                <input type="password" id="pwdRepeat" name="confirm_password" maxlength="30" class="text " value="" />
                                <i class="i-pass"></i>
                            </div>
                            <label id="phone_confirm_password" class="error"></label>
                        </div>
                        
                        <?php $_from = $this->_var['extend_info_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
                        <?php if ($this->_var['field']['id'] == 6): ?>
                        <div class="item" style=" overflow:visible;">
                        	<div class="label">提 示 问 题</div>
                            <div class="item-info">
                                <div id="divselect2" class="divselect">
                                  <div class="cite"><?php echo $this->_var['lang']['passwd_question']; ?></div>
                                  <ul>
                                     <?php $_from = $this->_var['passwd_questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
                                     <li><a href="javascript:;" selectid="<?php echo $this->_var['key']; ?>"><?php echo $this->_var['val']; ?></a></li>
                                     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                  </ul>
                                </div>
                                <input name="sel_question" type="hidden" value="4" id="passwd_quesetion2">
                            </div>
                        </div>
                        <div class="item">
                        <label class="sel_question error"></label>
                        </div>
                        <div class="item">
                        	<div class="label">问 题 答 案</div>
                            <div class="item-info">
                                <input type="text" name="passwd_answer" maxlength="20" class="text" value="" placeholder="<?php echo $this->_var['lang']['passwd_answer']; ?>" />
                            </div>
                             <label id="passwd_answer" class="error"></label>
                        </div>
                        <?php else: ?>
                        <?php if ($this->_var['field']['reg_field_name'] != '手机'): ?>
                        <div class="item">
                        	<div class="label"><?php echo $this->_var['field']['reg_field_name']; ?></div>
                            <div class="item-info">
                                <input name="extend_field<?php echo $this->_var['field']['id']; ?>" id="extend_field<?php echo $this->_var['field']['id']; ?>" onblur="is_extend_field(this.value, <?php echo $this->_var['field']['id']; ?>, 'formUser');" type="text" maxlength="35" class="text" />
                            </div>    
                            <label class="extend_field<?php echo $this->_var['field']['id']; ?> error"></label>
                            <input type="hidden" name="extend_field" id="exis_need<?php echo $this->_var['field']['id']; ?>" value="<?php if ($this->_var['field']['is_need']): ?>1<?php else: ?>0<?php endif; ?>" />
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        
                        <?php if ($this->_var['enabled_captcha']): ?>
                        <div class="item">
                        	<div class="label lh37">验　证　码</div>
                            <div class="item-info">
                                <input type="text" id="captcha" name="captcha" maxlength="6" class="text text-1 text-4" value=""/>
                                <img src="captcha_verify.php?captcha=is_register_phone&<?php echo $this->_var['rand']; ?>" alt="captcha" id="authcode_img" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha_verify.php?captcha=is_register_phone&'+Math.random()" />
                            </div>
                            <label id="phone_captcha" class="error"></label>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_var['sms_register']): ?>
                         <div class="item" id="code_mobile">
                         	<div class="label lh37">手机验证码</div>
                            <div class="item-info phone_code">
                                <input type="text" id="sms" name="mobile_code" maxlength="6" class="text text-1 text-4" value="" />
                                <a href="javascript:void(0);" id="zphone" class="sms-btn">获取短信验证码</a>
                            </div>
                            <label id="code_notice" class="error"></label>
                        </div>
                        <?php endif; ?>
                        <div class="item yd_item">
                        	<div class="label">&nbsp;</div>
                        	<div class="item-info">
                                <input type="checkbox" id="clause2" class="fl agreement" checked="checked" value="1" name="mobileagreement">
                                <label for="clause2" class="hole">阅读并同意《<a target="_blank" href="article.php?id=57" class="agreement">服务协议</a>》</label>
                            </div>
                            <label id="mobileagreement" class="error"></label>
                        </div>
                        <div class="item">
                        	<div class="label">&nbsp;</div>
                            <div class="item-info">
                                <input type="hidden" name="flag" id="flag" value='register' />
                                <input name="register_type" type="hidden" value="1" />
                                <input type="hidden" name="seccode" id="seccode" value="<?php echo $this->_var['sms_security_code']; ?>" />
                                <input name="act" type="hidden" value="act_register" >
                                <input name="register_mode" type="hidden" value="1" >
                                <input id="phone_code_callback" type="hidden" value="" >
                                <input id="phone_captcha_verification" type="hidden" value="" />
                                <input id="phone_verification" type="hidden" value="0" />
                                <input id="email_verification" type="hidden" value="0" />
                                <input id="enabled_captcha" type="hidden" value="<?php echo $this->_var['enabled_captcha']; ?>" />
                                
                                <input type="submit" id="registsubmit" name="Submit" maxlength="8" class="btn-regist" value="同意协议并注册"/>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div style="text-align:center; line-height:485px; font-size:14px; font-weight:bold;"><?php echo $this->_var['lang']['shop_reg_closed']; ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script type="text/javascript">
$("input[name='sel_question']").val('');
$("#seccode").val(<?php echo $this->_var['sms_security_code']; ?>);
</script>
<?php endif; ?>

<?php if ($this->_var['action'] == 'get_password'): ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'./sms/sms.js')); ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    	var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
    <div class="ecsc-registLogin ecsc-getPassword-list">
        <div class="registLogin borderBottom1">
            <div class="registLogin-header w1000">
                <a href="./index.php" class="logo"><img src="themes/ecmoban_dsc/images/logo_2015.png" /></a>
                <b></b>
                <span class="registLogin-header-fr">有账号<a href="user.php" class="jump">在此登录</a></span>
            </div>
        </div>
        <div class="registLogin-layout w1000">
        	<div class="regist-banner"><a href="#" target="_blank"><img src="themes/ecmoban_dsc/images/regist-banner.jpg" /></a></div>
            <div class="regist-wrap">
                <div class="regist-form">
                    <div class="mt">
                        <ul class="tab">
                            <li class="curr">邮箱重置密码</li>
                            <li>手机重置密码</li>
                            <li id="form_getPassword1">注册问题</li>
                        </ul>
                    </div>
                    <div class="mc">
                        <div class="form formEmail">
                            <form action="user.php" method="post" name="getPassword">
                            <div class="msg_ts"><div class="msg_error"><i></i>用户名不能为空</div></div>
                            <div class="item last">
                                <div class="item-info">
                                    <input name="user_name" type="text" class="text" value="" placeholder="用户名"/>
                                    <i class="i-name"></i>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-info">
                                    <input name="email" type="text" class="text" value="" placeholder="电子邮箱" />
                                    <i class="i-email"></i>
                                </div>
                            </div>
                            <?php if ($this->_var['enabled_captcha']): ?>
                            <div class="item">
                                <div class="item-info">
                                	<i class="i-captcha"></i>
                                    <input type="text" id="captcha" name="captcha" maxlength="6" class="text text-1 text-4" value="" placeholder="验证码"/>
                                    <img src="captcha_verify.php?captcha=is_get_password&<?php echo $this->_var['rand']; ?>" alt="captcha" name="img_captcha" class="fl ml5" onClick="this.src='captcha_verify.php?captcha=is_get_password&'+Math.random()" data-key="get_password" />
                                	<div class="cap_error hide">对</div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="item">
                                <div class="item-info">
                                    <input type="hidden" name="act" value="send_pwd_email" />
                                    <input type="hidden" id="captcha_verification" name="captcha_verification" value=""/>
                                	<input id="email_enabled_captcha" type="hidden" value="<?php echo $this->_var['enabled_captcha']; ?>" />
                                    <input type="button" name="button" maxlength="8" class="btn-regist" value="重置密码" onclick="submitPwdInfo(this);"/>
                                </div>
                            </div>
                            </form>
                        </div>
                        
                        <div class="form formtwo formPhone">
                            <form action="user.php" method="post" name="getPassword">
                            <div class="msg_ts"><div class="msg_error"><i></i></div></div>
                            <div class="error" id="phone_notice" style="display:none;"></div>
                            <div class="item last">
                                <div class="item-info">
                                    <input name="user_name" type="text" class="text" value="" placeholder="用户名"/>
                                    <i class="i-name"></i>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-info">
                                    <input name="mobile_phone" id="mobile_phone" type="text" class="text" value="" placeholder="绑定手机号" />
                                    <i class="i-phone"></i>
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="item-info phone_code">
                                	<input name="sms_value" id="sms_value" type="hidden" value="sms_find_signin" />
                                    <input type="text" id="sms" name="mobile_code" maxlength="6" class="text text-1 text-4" placeholder="手机动态码"/>
                                	<a href="javascript:void(0);" id="zphone" class="sms-btn">获取验证码</a>
                                </div>
                            </div>
                            <?php if ($this->_var['cfg']['sms_find_signin']): ?><?php endif; ?>
                            <div class="item">
                                <div class="item-info">
                                    <input type="hidden" name="flag" id="flag" value='forget' />
                                    <input type="hidden" name="seccode" id="seccode" value="<?php echo $this->_var['sms_security_code']; ?>" />
                                    <input type="hidden" name="act" value="get_pwd_mobile" />
                                    <input type="button" name="button" maxlength="8" class="btn-regist" value="重置密码" onclick="submitPwdInfo(this);"/>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="form formWenti" id="form_getPassword2">
                            <form action="user.php" method="post" name="getPassword">
                            <div class="msg_ts"><div class="msg_error"><i></i>用户名不能为空</div></div>
                            <div class="item last">
                                <div class="item-info">
                                    <input name="user_name" type="text" class="text" value="" placeholder="用户名"/>
                                    <i class="i-name"></i>
                                </div>
                            </div>
                            <?php $_from = $this->_var['extend_info_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
                            <?php if ($this->_var['field']['id'] == 6): ?>
                            <div class="item" style="overflow:visible;">
                                <div class="item-info">
                                    <div id="divselect" class="divselect">
                                      <div class="cite"><?php echo $this->_var['lang']['passwd_question']; ?></div>
                                      <ul>
                                         <?php $_from = $this->_var['passwd_questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
                                         <li><a href="javascript:;" selectid="<?php echo $this->_var['key']; ?>"><?php echo $this->_var['val']; ?></a></li>
                                         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                      </ul>
                                    </div>
                                    <input name="sel_question" type="hidden" value="4" id="passwd_quesetion">
                                </div>
                            </div>
                            <div class="item">
                            	<div class="item-info">
                                	<input name="passwd_answer" type="text" size="25" class="text" maxlengt='20' placeholder="<?php echo $this->_var['lang']['passwd_answer']; ?>"/>
                                </div>
                            </div>
                            <input name="is_passwd_questions" type="hidden" value="1" />
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <?php if ($this->_var['enabled_captcha']): ?>
                            <div class="item">
                                <div class="item-info">
                                	<i class="i-captcha"></i>
                                    <input type="text" id="captcha" name="captcha" maxlength="6" class="text text-1 text-4" value="" placeholder="验证码"/>
                                    <img src="captcha_verify.php?captcha=get_pwd_question&<?php echo $this->_var['rand']; ?>" alt="captcha" name="img_captcha" class="fl ml5" onClick="this.src='captcha_verify.php?captcha=get_pwd_question&'+Math.random()" data-key="psw_question" />
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="item">
                                <div class="item-info">
                                    <input type="hidden" name="act" value="check_answer" />
                                    <input type="button" name="button" maxlength="8" class="btn-regist" value="重置密码" onclick="submitPwdInfo(this);"/>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($this->_var['action'] == 'reset_password'): ?> 
	<script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    	var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
    <div class="ecsc-registLogin ecsc-getPassword">
        <div class="registLogin borderBottom1">
            <div class="registLogin-header w1000">
                <a href="./index.php" class="logo"><img src="themes/ecmoban_dsc/images/logo_2015.png" /></a>
                <b></b>
                <span class="registLogin-header-fr">有账号<a href="user.php" class="jump">在此登录</a></span>
            </div>
        </div>
        <div class="registLogin-layout w1000">
        	<div class="regist-banner"><a href="#" target="_blank"><img src="themes/ecmoban_dsc/images/regist-banner.jpg" /></a></div>
            <div class="regist-wrap">
                <div class="regist-form">
                    <div class="mt">
                        <ul class="tab">
                            <li class="curr">新密码</li>
                        </ul>
                    </div>
                    <div class="mc">
                        <div class="form formtwo">
                            <form action="user.php" method="post" name="getPassword2" onSubmit="return submitPwd()">
                            <div class="item">
                                <div class="item-info">
                                	<input name="new_password" type="password" size="25" class="text " placeholder="新密码" />
                                    <i class="i-pass"></i>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-info">
                                    <input name="confirm_password" type="password" size="25"  class="text " placeholder="请确认密码"/>
                                    <i class="i-pass"></i>
                                </div>
                            </div>
                            <?php if ($this->_var['enabled_captcha']): ?>
                            <div class="item">
                                <div class="item-info">
                                    <input type="text" id="captcha" name="captcha" maxlength="6" class="text text-1 text-4" placeholder="验证码"/>
                                    <img src="captcha_verify.php?captcha=is_get_password&<?php echo $this->_var['rand']; ?>" alt="captcha" class="fl ml5" onClick="this.src='captcha_verify.php?captcha=is_get_password&'+Math.random()" />
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="item">
                                <div class="item-info">
                                	<input type="hidden" name="act" value="act_edit_password" />
                                    <input type="hidden" name="uid" value="<?php echo $this->_var['uid']; ?>" />
                                    <input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>" />
                                    <input type="submit" name="submit" value="<?php echo $this->_var['lang']['confirm_submit']; ?>" class="btn-regist" />	
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
<?php endif; ?>
<?php echo $this->fetch('library/page_footer_flow.lbi'); ?>
</body>
<script type="text/javascript" src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/focus.js"></script>
<script type="text/javascript">
$(".tab").tabso({cntSelect:".mc",tabEvent:"click",tabStyle:"normal",onStyle:"curr"});

$(function(){
	
	if(document.getElementById("seccode")){
		$("#seccode").val(<?php echo $this->_var['sms_security_code']; ?>);
	}
	
	$("form[name='formUser'] :input[name='register_type']").val(1);
	
	//验证码切换
	$(".changeNextone").click(function(){
		$("#captcha_img").attr('src', 'captcha.php?'+Math.random());
	});
	$(".changeNexttwo").click(function(){
		$("#authcode_img").attr('src', 'captcha.php?'+Math.random());
	});
	
	var is_passwd_questions = $("form[name='getPassword'] :input[name='is_passwd_questions']").val();
	
	if(typeof(is_passwd_questions) == 'undefined'){
		$("#form_getPassword1").hide();
		$("#form_getPassword2").hide();
		$("#form_getPassword1").siblings().css({'width':'50%'});
	}
	
	/*$(".email_open").click(function(){
		$("#email_yz").show();
		$(this).parent().hide();
		$("#email_yz").find(".tx_rm").show();
	});
	
	$(".email_off").click(function(){
		$("#email_yz").hide();
		$(this).parent().hide();
		$("#phone_yz").find(".tx_rm").show();
	});*/
	
	$(".email_open").click(function(){
	
		var email = $("#regName").val();
		
		if(email){
			checkEmail(email);
		}else{
			$("#phone_notice").html('');
			$("#code_notice").html('');
			$("#phone_verification").val(0);
		}
		
		$("#mobile_phone").val("");
		$("#email_yz").show();
		$(this).parent().hide();
		$("#email_yz").find(".tx_rm").show();
		
		$("#phone_yz").hide();
		$("#code_mobile").hide();
		
		$("form[name='formUser'] :input[name='register_type']").val(0);
		$("#registsubmit").attr("disabled", false);
	});
	
	$(".email_off").click(function(){
		
		var mobile_phone = $("#mobile_phone").val();
		
		if(mobile_phone){
			checkPhone(mobile_phone);
		}else{
			$("#email_notice").html('');
			$("#email_verification").val(0);
		}
		
		$("#regName").val("");
		$("#email_yz").hide();
		$(this).parent().hide();
		$("#phone_yz").find(".tx_rm").show();
		
		$("#phone_yz").show();
		$("#code_mobile").show();
		
		$("form[name='formUser'] :input[name='register_type']").val(1);
		$("#registsubmit").attr("disabled", false);
	});
});

var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
	var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";

//ie6、ie7去除a标签点击后虚线
function ie67(){
	var b_v = navigator.appVersion;
	var IE6 = b_v.search(/MSIE 6/i) != -1;
	var IE7 = b_v.search(/MSIE 7/i) != -1;
	if (IE6||IE7)
	{
		$("a").ready(function(){
			$("a").attr("hidefocus",true);
		});
	}
}
ie67();

$.divselect("#divselect","#passwd_quesetion");
$.divselect("#divselect2","#passwd_quesetion2");
</script>
</html>
