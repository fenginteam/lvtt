<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?php echo $this->fetch('library/seller_html_head.lbi'); ?></head>

<body>
<?php echo $this->fetch('library/seller_header.lbi'); ?>
<?php echo $this->fetch('library/url_here.lbi'); ?>
<div class="ecsc-layout">
    <div class="site wrapper">
		<?php echo $this->fetch('library/seller_menu_user.lbi'); ?>
		<div class="ecsc-layout-right">
            <div class="main-content" id="mainContent">
				<?php echo $this->fetch('library/seller_menu_tab.lbi'); ?>
                <div class="ecsc-form-default">
                    <form id="add_form" name="theForm" action="#" method="post" onsubmit="return validate();">
						<table width="90%" class="table_item">
						  <tr>
							<td class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['user_name']; ?>：</td>
							<td>
							  <input type="text" name="user_name" maxlength="20" value="<?php echo htmlspecialchars($this->_var['user']['user_name']); ?>" size="34" class="text text_2"/>
							</td>
						  </tr>
						  <tr>
							<td class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['email']; ?>：</td>
							<td>
							  <input type="text" name="email" value="<?php echo htmlspecialchars($this->_var['user']['email']); ?>" size="34" class="text text_2"/>
							</td>
						  </tr>
						 <?php if ($this->_var['action'] == "add"): ?>
						  <tr>
							<td class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['password']; ?>：</td>
							<td>
							  <input type="password" name="password" maxlength="32" size="34" class="text text_2"/>
							</td>
						  </tr>
						  <tr>
							<td class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['pwd_confirm']; ?>：</td>
							<td>
							  <input type="password" name="pwd_confirm" maxlength="32" size="34" class="text text_2"/></td>
						  </tr>
						  <?php endif; ?>
						  <?php if ($this->_var['action'] != "add"): ?>
						  <tr>
							<td class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['old_password']; ?>：</td>
							<td>
							  <input type="password" name="old_password" size="34" class="text text_2"/>
							  <label class="blue_label" id="passwordNotic"><?php echo $this->_var['lang']['password_notic']; ?></label>
							</td>
						  </tr>
						  <tr>
							<td class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['new_password']; ?>：</td>
							<td>
							  <input type="password" name="new_password" maxlength="32" size="34" class="text text_2"/>
							</td>
						  </tr>
						  <tr>
							<td class="label"><?php echo $this->_var['lang']['require_field']; ?>&nbsp;<?php echo $this->_var['lang']['pwd_confirm']; ?></td>
							<td>
							  <input type="password" name="pwd_confirm" value="" size="34" class="text text_2"/>
							</td>
						  </tr>
						  <?php if ($this->_var['user']['agency_name']): ?>
						  <tr>
							<td class="label"><?php echo $this->_var['lang']['agency']; ?>：</td>
							<td><div class="lh"><?php echo $this->_var['user']['agency_name']; ?></div></td>
						  </tr>
						  <?php endif; ?>
						  <?php endif; ?>
						   <?php if ($this->_var['select_role']): ?>
							<tr>
						   <td class="label"><?php echo $this->_var['lang']['select_role']; ?>：</td>
							<td>
							  <select name="select_role" class="select">
								<option value=""><?php echo $this->_var['lang']['select_please']; ?></option>
								<?php $_from = $this->_var['select_role']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
								<option value="<?php echo $this->_var['list']['role_id']; ?>" <?php if ($this->_var['list']['role_id'] == $this->_var['user']['role_id']): ?> selected="selected" <?php endif; ?> ><?php echo $this->_var['list']['role_name']; ?></option>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							  </select>
							</td>
						  </tr>
						  <?php endif; ?>
						  <?php if ($this->_var['action'] == "modif"): ?>
						  <tr style="display:none">
						  <td align="left" class="label"><?php echo $this->_var['lang']['edit_navi']; ?></td>
						  <td>
							  <table style="width:300px" cellspacing="0">
								<tr>
								<td valign="top">
								  <input type="hidden" name="nav_list[]" id="nav_list[]" />
								  <select name="menus_navlist" id="menus_navlist" multiple="true" style="width: 120px; height: 180px" onclick="setTimeout('toggleButtonSatus()', 1);">
								  <?php echo $this->html_options(array('options'=>$this->_var['nav_arr'])); ?>
								  </select></td>
								<td align="center">
								 <input type="button" class="button" value="<?php echo $this->_var['lang']['move_up']; ?>" id="btnMoveUp" onclick="moveOptions('up')" disabled="true" />
								 <input type="button" class="button" value="<?php echo $this->_var['lang']['move_down']; ?>" id="btnMoveDown" onclick="moveOptions('down')" disabled="true" />
								 <input type="button" value="<?php echo $this->_var['lang']['add_nav']; ?>" id="btnAdd" onclick="JavaScript:addItem(theForm.all_menu_list,theForm.menus_navlist); this.disabled=true; " class="button" disabled="true" /><br />
								 <input type="button" value="<?php echo $this->_var['lang']['remove_nav']; ?>" onclick="JavaScript:delItem(theForm.menus_navlist); toggleButtonSatus()" class="button" disabled="true" id="btnRemove" /></td>
								<td>
								  <select id="all_menu_list" name="all_menu_list" size="15" multiple="true" style="width:150px; height: 180px" onchange="toggleAddButton()">
									<?php $_from = $this->_var['menus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'menu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['menu']):
?>
									  <?php if ($this->_var['key'] != "admin_home" && $this->_var['menus'][$this->_var['key']]): ?>
									  <option value="" style="font-weight:bold;"><?php echo $this->_var['lang'][$this->_var['key']]; ?></option>
									  <?php $_from = $this->_var['menus'][$this->_var['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['item']):
?>
									  <option value="<?php echo $this->_var['item']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_var['lang'][$this->_var['k']]; ?></option>
									  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									  <?php endif; ?>
									 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								   </select></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php endif; ?>
						  <tr class="no-line">
							<td class="label">&nbsp;</td>
							<td class="pt10 pb20">
							  <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button fl" />
							  <input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button button_reset fl" />
							  <input type="hidden" name="act" value="<?php echo $this->_var['form_act']; ?>" />
							  <input type="hidden" name="token" value="<?php echo $this->_var['token']; ?>" />
							  <input type="hidden" name="id" value="<?php echo $this->_var['user']['user_id']; ?>" />
							</td>
						  </tr>
						</table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->fetch('library/seller_footer.lbi'); ?>
<script type="text/javascript">
var action = "<?php echo $this->_var['action']; ?>";
function validate()
{
  validator = new Validator("theForm");
  validator.password = function (controlId, msg)
  {
    var obj = document.forms[this.formName].elements[controlId];
    obj.value = Utils.trim(obj.value);
    if (!(obj.value.length >= 6 && /\d+/.test(obj.value) && /[a-zA-Z]+/.test(obj.value)))
    {
      this.addErrorMsg(msg);
    }

  }

  validator.required("user_name", user_name_empty);
  validator.required("email", email_empty, 1);
  validator.isEmail("email", email_error);

  if (action == "add")
  {
    if (document.forms['theForm'].elements['password'])
    {
      validator.password("password", password_invaild);
      validator.eqaul("password", "pwd_confirm", password_error);
    }
  }
  if (action == "edit" || action == "modif")
  {
    if (document.forms['theForm'].elements['old_password'].value.length > 0)
    {
      validator.password("new_password", password_invaild);
      validator.eqaul("new_password", "pwd_confirm", password_error);
    }
  }

  return validator.passed();
}
</script>
</body>
</html>
