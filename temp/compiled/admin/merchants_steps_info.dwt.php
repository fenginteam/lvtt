<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><a href="merchants_steps.php?act=title_list&id=<?php echo $this->_var['title_info']['tid']; ?>" class="s-back"><?php echo $this->_var['lang']['back']; ?></a>商家 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                	<li>标识“<em>*</em>”的选项为必填项，其余为选填项。</li>
                    <li>请谨慎填写表单创建相关数据。</li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
                	<div class="mian-info">
						<form method="post" action="merchants_steps.php" name="theForm" id="merchants_steps_form">
						<div class="switch_info">
                        	<div class="items">
                            	<div class="item">
                                	<div class="label"><?php echo $this->_var['lang']['require_field']; ?><?php echo $this->_var['lang']['fields_steps']; ?>：</div>
                                    <div class="label_value">
                                    	<div id="fields_steps" class="imitate_select select_w140">
                                            <div class="cite"><?php if ($this->_var['title_info']['fields_steps']): ?><?php echo $this->_var['title_info']['process_title']; ?><?php else: ?>请选择<?php endif; ?></div>
                                            <ul>
											<?php $_from = $this->_var['process_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'process');if (count($_from)):
    foreach ($_from AS $this->_var['process']):
?>
                                                <li><a href="javascript:;" data-value="<?php echo $this->_var['process']['id']; ?>" class="ftx-01"><?php echo $this->_var['process']['process_title']; ?></a></li>
											<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </ul>
                                        	<input name="fields_steps" type="hidden" value="<?php if ($this->_var['title_info']['fields_steps']): ?><?php echo $this->_var['title_info']['fields_steps']; ?><?php endif; ?>" id="fields_steps_val">
                                        </div>
                                        <div class="form_prompt"></div>
                                    </div>
                                </div>
                                <div class="item">
                                	<div class="label"><?php echo $this->_var['lang']['require_field']; ?><?php echo $this->_var['lang']['fields_titles']; ?>：</div>
                                    <div class="label_value"><input type="text" class="text" value="<?php echo $this->_var['title_info']['fields_titles']; ?>" name="fields_titles" autocomplete="off" /><div class="form_prompt"></div></div>
                                </div>
                                <div class="item">
                                	<div class="label"><?php echo $this->_var['lang']['titles_annotation']; ?>：</div>
                                    <div class="label_value"><input type="text" class="text"  value="<?php echo $this->_var['title_info']['titles_annotation']; ?>" name="titles_annotation" autocomplete="off" /></div>
                                </div>
                                <div class="item">
                                	<div class="label"><?php echo $this->_var['lang']['steps_style']; ?>：</div>
                                    <div class="label_value">
                                    	<div id="steps_style" class="imitate_select select_w140">
                                            <div class="cite">请选择</div>
                                            <ul>
                                                <li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['basic_info']; ?></a></li>
                                                <li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['steps_shop_type']; ?></a></li>
                                                <li><a href="javascript:;" data-value="2" class="ftx-01"><?php echo $this->_var['lang']['directory_info']; ?></a></li>
                                                <li><a href="javascript:;" data-value="3" class="ftx-01"><?php echo $this->_var['lang']['content_name']; ?></a></li>
                                                <li><a href="javascript:;" data-value="4" class="ftx-01"><?php echo $this->_var['lang']['store_info']; ?></a></li>
                                            </ul>
                                            <input name="steps_style" type="hidden" value="1" id="steps_style_val">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-step-section">
                            	<div class="m-item m-item-curr">
                                	<div class="handle" ectype="addMerchants"><i class="sc_icon sc_icon_jia"></i></div>
                                    <div class="info">
                                    	<div class="p-item">
                                            <span class="ipt_text">
                                                <strong class="fl"><?php echo $this->_var['lang']['merchants_date']; ?>：</strong>
                                                <input type="text" name="merchants_date[]" class="text w150" />
                                            </span>
                                            <span class="ipt_text">
                                                <strong class="fl"><?php echo $this->_var['lang']['merchants_dateType']; ?>：</strong>
                                                <div class="imitate_select select_w140">
                                                    <div class="cite">VARCHAR</div>
                                                    <ul>
                                                        <li><a href="javascript:;" data-value="VARCHAR" class="ftx-01">VARCHAR</a></li>
                                                        <li><a href="javascript:;" data-value="CHAR" class="ftx-01">CHAR</a></li>
                                                        <li><a href="javascript:;" data-value="INT" class="ftx-01">INT</a></li>
                                                        <li><a href="javascript:;" data-value="MEDIUMINT" class="ftx-01">MEDIUMINT</a></li>
                                                        <li><a href="javascript:;" data-value="SMALLINT" class="ftx-01">SMALLINT</a></li>
                                                        <li><a href="javascript:;" data-value="TINYINT" class="ftx-01">TINYINT</a></li>
                                                        <li><a href="javascript:;" data-value="TEXT" class="ftx-01">TEXT</a></li>
                                                        <li><a href="javascript:;" data-value="DECIMAL" class="ftx-01">DECIMAL</a></li>
                                                    </ul>
                                                    <input name="merchants_dateType[]" type="hidden" value="VARCHAR" id="merchants_dateType_val" />
                                                </div>
                                            </span>
                                            <span class="ipt_text">
                                                <strong class="fl"><?php echo $this->_var['lang']['merchants_formName']; ?>：</strong>
                                                <input type="text" name="merchants_formName[]" class="text w150" autocomplete="off" />
                                            </span>
                                            <span class="ipt_text">
                                                <strong class="fl"><?php echo $this->_var['lang']['merchants_length']; ?>：</strong>
                                                <input type="text" name="merchants_length[]" class="text w50" autocomplete="off" />
                                            </span>
											<span style="display:none">
												&nbsp;&nbsp;
												<?php echo $this->_var['lang']['merchants_notnull']; ?>&nbsp;
												<select name="merchants_notnull[]">
												<option value="NOT NULL" selected="selected">NOT NULL</option>
												<option value="NULL">NULL</option>
												</select>
												&nbsp;&nbsp;
												<?php echo $this->_var['lang']['merchants_coding']; ?>&nbsp;
												<select name="merchants_coding[]">
												<option value="GBK">GBK</option>
												<option value="UTF8" selected="selected">UTF8</option>
												</select>	
											</span>
                                            <span class="ipt_text">
                                                <strong class="fl"><?php echo $this->_var['lang']['display_sort']; ?>：</strong>
                                                <input type="text" name="fields_sort[]" class="text w50" autocomplete="off" />
                                            </span>
                                            <span class="ipt_text">
                                                <strong class="fl"><?php echo $this->_var['lang']['must_options']; ?>：</strong>
                                                <div class="imitate_select select_w60">
                                                    <div class="cite"><?php echo $this->_var['lang']['no']; ?></div>
                                                    <ul>
                                                        <li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['no']; ?></a></li>
                                                        <li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['yes']; ?></a></li>
                                                    </ul>
                                                    <input name="will_choose_0" type="hidden" value="0" />
                                                </div>
                                            </span>
                                    	</div>
                                        <div class="p-item">
                                        	<span class="ipt_text">
                                            	<strong class="fl"><?php echo $this->_var['lang']['formName_special']; ?>：</strong>
                                                <input type="text" name="formName_special[]" class="text w400" autocomplete="off" />
                                            </span>
                                            <span class="ipt_text">
                                            	<strong class="fl"><?php echo $this->_var['lang']['merchants_form']; ?>：</strong>
                                                <div class="imitate_select select_w140" data-tab="formType">
                                                    <div class="cite"><?php echo $this->_var['lang']['text_input']; ?>(input)</div>
                                                    <ul>
                                                        <li><a href="javascript:;" data-value="input" class="ftx-01"><?php echo $this->_var['lang']['text_input']; ?>(input)</a></li>
                                                        <li><a href="javascript:;" data-value="textarea" class="ftx-01"><?php echo $this->_var['lang']['text_textarea']; ?>(textarea)</a></li>
                                                        <li><a href="javascript:;" data-value="radio" class="ftx-01"><?php echo $this->_var['lang']['text_radio']; ?>(radio)</a></li>
                                                        <li><a href="javascript:;" data-value="checkbox" class="ftx-01"><?php echo $this->_var['lang']['text_checkbox']; ?>(checkbox)</a></li>
                                                        <li><a href="javascript:;" data-value="select" class="ftx-01"><?php echo $this->_var['lang']['text_select']; ?>(select)</a></li>
                                                        <li><a href="javascript:;" data-value="other" class="ftx-01"><?php echo $this->_var['lang']['other']; ?>(other)</a></li>
                                                    </ul>
                                                    <input name="merchants_form[]" type="hidden" value="input" />
                                                </div>
                                            </span>
                                            <span class="ipt_text merchantsForm" ectype="merchantsForm_text">
                                            	<strong class="fl"><?php echo $this->_var['lang']['form_length']; ?>：</strong>
                                                <input type="text" name="merchants_formSize[]" class="text w50" autocomplete="off" />
                                            </span>
                                            <span class="ipt_text merchantsForm" ectype="merchantsForm_textarea">
                                            	<strong class="fl"><?php echo $this->_var['lang']['row_width']; ?>：</strong>
                                                <input type="text" name="merchants_rows[]" class="text w50" autocomplete="off" />
                                                <span class="bolang">&nbsp;&nbsp;~&nbsp;&nbsp;</span>
                                                <input type="text" name="merchants_cols[]" class="text w50" autocomplete="off" />
                                            </span>
											<span class="ipt_text merchantsForm" style="<?php if ($this->_var['fields']['chooseForm'] == 'other'): ?>display:block;<?php endif; ?>" ectype="merchantsForm_select">
												<strong class="fl"><?php echo $this->_var['lang']['select_type']; ?>：</strong>
												<div class="imitate_select select_w140">
													<div class="cite"><?php echo $this->_var['lang']['region_type']; ?></div>
													<ul>
														<li><a href="javascript:;" data-value="textArea" class="ftx-01"><?php echo $this->_var['lang']['region_type']; ?></a></li>
														<li><a href="javascript:;" data-value="dateTime" class="ftx-01"><?php echo $this->_var['lang']['time_type']; ?></a></li>
														<li><a href="javascript:;" data-value="dateFile" class="ftx-01"><?php echo $this->_var['lang']['file_upload']; ?></a></li>
													</ul>
													<input name="merchants_formOther[]" type="hidden" value="<?php echo $this->_var['fields']['otherForm']; ?>" />
												</div>
												
												<span name="merchantsForm_dateTime[]" ectype="merchantsForm_select_content" class="fl <?php if ($this->_var['fields']['otherForm'] == 'dateTime'): ?>show<?php else: ?>hide<?php endif; ?>">
													<strong class="fl"><?php echo $this->_var['lang']['time_form_length']; ?>：</strong>
													<input name="merchants_formOtherSize[]" type="text" size="10" value="<?php echo $this->_var['fields']['dateTimeForm']; ?>" class="text w50 valid" />
												</span>	
											</span>	
                                            <span class="ipt_text merchantsForm relative" ectype="merchantsForm_checkbox" style="width:580px;">
                                            	<div class="ipt-icon"><i class="sc_icon sc_icon_jia2"></i></div>
                                                <div class="item-item">
                                                	<strong class="fl"><?php echo $this->_var['lang']['radio_checkbox']; ?>：</strong>
                                                    <input type="text" name="radio_checkbox_0[]" class="text w150" autocomplete="off" />
                                                    <strong class="fl"><?php echo $this->_var['lang']['display_sort']; ?>：</strong>
                                                    <input type="text" name="rc_sort_0[]" class="text w50" autocomplete="off" />
                                                    <a href="javascript:;" class="btn_trash"><i class="icon icon-trash"></i>删除</a>
                                                </div>
                                            </span>
                                            <span class="ipt_text merchantsForm relative" ectype="merchantsForm_select_opt">
                                            	<div class="ipt-icon"><i class="sc_icon sc_icon_jia2"></i></div>
                                                <div class="item-item">
                                                    <strong class="fl"><?php echo $this->_var['lang']['select_value']; ?>：</strong>
                                                    <input type="text" name="select_0[]" class="text w150" autocomplete="off" />
                                                    <a href="javascript:;" class="btn_trash"><i class="icon icon-trash"></i>删除</a>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="m-btn-trash"><a href="javascript:;" class="btn_trash"><i class="icon icon-trash"></i>删除</a></div>
                                </div>
								<?php $_from = $this->_var['cententFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'fields');$this->_foreach['field'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['field']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['fields']):
        $this->_foreach['field']['iteration']++;
?> 
									<div class="m-item">
										<div class="handle"></div>
										<div class="info">
											<div class="p-item">
												<span class="ipt_text">
													<strong class="fl"><?php echo $this->_var['lang']['merchants_date']; ?>：</strong>
													<input type="text" name="merchants_date[]" value="<?php echo $this->_var['fields']['textFields']; ?>" class="text w150" />
												</span>
												<span class="ipt_text">
													<strong class="fl"><?php echo $this->_var['lang']['merchants_dateType']; ?>：</strong>
													<div class="imitate_select select_w140">
														<div class="cite">VARCHAR</div>
														<ul>
															<li><a href="javascript:;" data-value="VARCHAR" class="ftx-01">VARCHAR</a></li>
															<li><a href="javascript:;" data-value="CHAR" class="ftx-01">CHAR</a></li>
															<li><a href="javascript:;" data-value="INT" class="ftx-01">INT</a></li>
															<li><a href="javascript:;" data-value="MEDIUMINT" class="ftx-01">MEDIUMINT</a></li>
															<li><a href="javascript:;" data-value="SMALLINT" class="ftx-01">SMALLINT</a></li>
															<li><a href="javascript:;" data-value="TINYINT" class="ftx-01">TINYINT</a></li>
															<li><a href="javascript:;" data-value="TEXT" class="ftx-01">TEXT</a></li>
															<li><a href="javascript:;" data-value="DECIMAL" class="ftx-01">DECIMAL</a></li>
														</ul>
														<input name="merchants_dateType[]" type="hidden" value="<?php echo $this->_var['fields']['fieldsDateType']; ?>" id="merchants_dateType_val" />
													</div>
												</span>
												<span class="ipt_text">
													<strong class="fl"><?php echo $this->_var['lang']['merchants_formName']; ?>：</strong>
													<input type="text" name="merchants_formName[]" value="<?php echo $this->_var['fields']['fieldsFormName']; ?>" class="text w150" autocomplete="off" />
												</span>
												<span class="ipt_text">
													<strong class="fl"><?php echo $this->_var['lang']['merchants_length']; ?>：</strong>
													<input type="text" name="merchants_length[]" value="<?php echo empty($this->_var['fields']['fieldsLength']) ? '255' : $this->_var['fields']['fieldsLength']; ?>" class="text w50" autocomplete="off" />
												</span>
												<span style="display:none">
													&nbsp;&nbsp;
													<?php echo $this->_var['lang']['merchants_notnull']; ?>&nbsp;
													<select name="merchants_notnull[]">
													<option value="NOT NULL" <?php if ($this->_var['fields']['fieldsNotnull'] == ' ! NULL '): ?>selected="selected"<?php endif; ?>>NOT NULL</option>
													<option value="NULL" <?php if ($this->_var['fields']['fieldsNotnull'] == 'NULL'): ?>selected="selected"<?php endif; ?>>NULL</option>
													</select>
													&nbsp;&nbsp;
													<?php echo $this->_var['lang']['merchants_coding']; ?>&nbsp;
													<select name="merchants_coding[]">
													<option value="GBK" <?php if ($this->_var['fields']['fieldsCoding'] == 'GBK'): ?>selected="selected"<?php endif; ?>>GBK</option>
													<option value="UTF8" <?php if ($this->_var['fields']['fieldsCoding'] == 'UTF8'): ?>selected="selected"<?php endif; ?>>UTF8</option>
													</select>	
												</span>
												<span class="ipt_text">
													<strong class="fl"><?php echo $this->_var['lang']['display_sort']; ?>：</strong>
													<input type="text" name="fields_sort[]"  value="<?php echo empty($this->_var['fields']['fields_sort']) ? '0' : $this->_var['fields']['fields_sort']; ?>" class="text w50" autocomplete="off" />
												</span>
												<span class="ipt_text">
													<strong class="fl"><?php echo $this->_var['lang']['must_options']; ?>：</strong>
													<div class="imitate_select select_w60">
														<div class="cite"><?php echo $this->_var['lang']['no']; ?></div>
														<ul>
															<li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['no']; ?></a></li>
															<li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['yes']; ?></a></li>
														</ul>
														<input name="will_choose_<?php echo $this->_var['key']; ?>" type="hidden" value="<?php echo $this->_var['fields']['will_choose']; ?>" />
													</div>
												</span>
											</div>
											<div class="p-item">
												<span class="ipt_text">
													<strong class="fl"><?php echo $this->_var['lang']['formName_special']; ?>：</strong>
													<input type="text" name="formName_special[]" value="<?php echo $this->_var['fields']['formSpecial']; ?>" class="text w400" autocomplete="off" />
												</span>
												<span class="ipt_text">
													<strong class="fl"><?php echo $this->_var['lang']['merchants_form']; ?>：</strong>
													<div class="imitate_select select_w140" data-tab="formType">
														<div class="cite"><?php echo $this->_var['lang']['text_input']; ?>(input)</div>
														<ul>
															<li><a href="javascript:;" data-value="input" class="ftx-01"><?php echo $this->_var['lang']['text_input']; ?>(input)</a></li>
															<li><a href="javascript:;" data-value="textarea" class="ftx-01"><?php echo $this->_var['lang']['text_textarea']; ?>(textarea)</a></li>
															<li><a href="javascript:;" data-value="radio" class="ftx-01"><?php echo $this->_var['lang']['text_radio']; ?>(radio)</a></li>
															<li><a href="javascript:;" data-value="checkbox" class="ftx-01"><?php echo $this->_var['lang']['text_checkbox']; ?>(checkbox)</a></li>
															<li><a href="javascript:;" data-value="select" class="ftx-01"><?php echo $this->_var['lang']['text_select']; ?>(select)</a></li>
															<li><a href="javascript:;" data-value="other" class="ftx-01"><?php echo $this->_var['lang']['other']; ?>(other)</a></li>
														</ul>
														<input name="merchants_form[]" type="hidden" value="<?php echo $this->_var['fields']['chooseForm']; ?>" />
													</div>
												</span>
												<span class="ipt_text merchantsForm" ectype="merchantsForm_text" <?php if ($this->_var['fields']['chooseForm'] == 'input'): ?>style="display:block;"<?php endif; ?>>
													<strong class="fl"><?php echo $this->_var['lang']['form_length']; ?>：</strong>
													<input type="text" name="merchants_formSize[]" value="<?php echo empty($this->_var['fields']['inputForm']) ? '20' : $this->_var['fields']['inputForm']; ?>" class="text w50" autocomplete="off" />
												</span>
												<span class="ipt_text merchantsForm" ectype="merchantsForm_textarea" <?php if ($this->_var['fields']['chooseForm'] == 'textarea'): ?>style="display:block"<?php endif; ?>>
													<strong class="fl"><?php echo $this->_var['lang']['row_width']; ?>：</strong>
													<input type="text" name="merchants_rows[]" value="<?php echo empty($this->_var['fields']['rows']) ? '8' : $this->_var['fields']['rows']; ?>" class="text w50" autocomplete="off" />
													<span class="bolang">&nbsp;&nbsp;~&nbsp;&nbsp;</span>
													<input type="text" name="merchants_cols[]" class="text w50" autocomplete="off" />
												</span>
												<span class="ipt_text merchantsForm" style="<?php if ($this->_var['fields']['chooseForm'] == 'other'): ?>display:block;<?php endif; ?>" ectype="merchantsForm_select">
													<strong class="fl"><?php echo $this->_var['lang']['select_type']; ?>：</strong>
													<div class="imitate_select select_w140">
														<div class="cite"><?php echo $this->_var['lang']['region_type']; ?></div>
														<ul>
															<li><a href="javascript:;" data-value="textArea" class="ftx-01"><?php echo $this->_var['lang']['region_type']; ?></a></li>
															<li><a href="javascript:;" data-value="dateTime" class="ftx-01"><?php echo $this->_var['lang']['time_type']; ?></a></li>
															<li><a href="javascript:;" data-value="dateFile" class="ftx-01"><?php echo $this->_var['lang']['file_upload']; ?></a></li>
														</ul>
														<input name="merchants_formOther[]" type="hidden" value="<?php echo $this->_var['fields']['otherForm']; ?>" />
													</div>
													
													<span name="merchantsForm_dateTime[]" ectype="merchantsForm_select_content" class="fl <?php if ($this->_var['fields']['otherForm'] == 'dateTime'): ?>show<?php else: ?>hide<?php endif; ?>">
														<strong class="fl"><?php echo $this->_var['lang']['time_form_length']; ?>：</strong>
														<input name="merchants_formOtherSize[]" type="text" size="10" value="<?php echo $this->_var['fields']['dateTimeForm']; ?>" class="text w50 valid" />
													</span>	
												</span>											
												
												<span class="ipt_text merchantsForm relative" ectype="merchantsForm_checkbox"  style="width:580px; display:<?php if ($this->_var['fields']['chooseForm'] == 'radio' || $this->_var['fields']['chooseForm'] == 'checkbox'): ?>block<?php else: ?>none<?php endif; ?>;">
													<div class="ipt-icon"><i class="sc_icon sc_icon_jia2"></i></div>
													<div class="item-item">
														<strong class="fl"><?php echo $this->_var['lang']['radio_checkbox']; ?>：</strong>
														<input type="text" name="radio_checkbox_<?php echo $this->_var['key']; ?>[]" class="text w150" autocomplete="off" />
														<strong class="fl"><?php echo $this->_var['lang']['display_sort']; ?>：</strong>
														<input type="text" name="rc_sort_<?php echo $this->_var['key']; ?>[]" class="text w50" autocomplete="off" />
														<a href="javascript:;" class="btn_trash"><i class="icon icon-trash"></i>删除</a>
													</div>
												<?php if ($this->_var['fields']['radioCheckboxForm']): ?>
												<?php $_from = $this->_var['fields']['radioCheckboxForm']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rc');if (count($_from)):
    foreach ($_from AS $this->_var['rc']):
?> 
													<div class="item-item">
														<strong class="fl"><?php echo $this->_var['lang']['radio_checkbox']; ?>：</strong>
														<input type="text" name="radio_checkbox_<?php echo $this->_var['key']; ?>[]" value="<?php echo $this->_var['rc']['radioCheckbox']; ?>" class="text w150" autocomplete="off" />
														<strong class="fl"><?php echo $this->_var['lang']['display_sort']; ?>：</strong>
														<input type="text" name="rc_sort_<?php echo $this->_var['key']; ?>[]" value="<?php echo empty($this->_var['rc']['rc_sort']) ? '0' : $this->_var['rc']['rc_sort']; ?>" class="text w50" autocomplete="off" />
														<a href="javascript:;" class="btn_trash" style="display:inline;"><i class="icon icon-trash"></i>删除</a>
													</div>
												<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
												<?php endif; ?>
												</span>
												
												<span class="ipt_text merchantsForm relative" ectype="merchantsForm_select_opt" style="display:<?php if ($this->_var['fields']['chooseForm'] == 'select'): ?>block<?php else: ?>none<?php endif; ?>;">
													<div class="ipt-icon"><i class="sc_icon sc_icon_jia2"></i></div>
													<?php if ($this->_var['fields']['selectList']): ?>
													<?php $_from = $this->_var['fields']['selectList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'select');if (count($_from)):
    foreach ($_from AS $this->_var['select']):
?>
														<div class="item-item">
															<strong class="fl"><?php echo $this->_var['lang']['select_value']; ?>：</strong>
															<input type="text" name="select_<?php echo $this->_var['key']; ?>[]" class="text w150" value="<?php echo $this->_var['select']; ?>" autocomplete="off"  />
															<a href="javascript:;" class="btn_trash"><i class="icon icon-trash"></i>删除</a>
														</div>
													<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
													<?php endif; ?>
												</span>
												
											</div>
										</div>
										<div class="m-btn-trash" style="display:block;"><a href="javascript:;" class="btn_trash"><i class="icon icon-trash"></i>删除</a></div>
									</div>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</div>
                            <div class="clear"></div>
                            <div class="items mt20">
                            	<div class="item">
                                	<div class="label"><?php echo $this->_var['lang']['fields_special_instructions']; ?>：</div>
                                    <div class="label_value">
                                    	<textarea name="fields_special" class="textarea"><?php echo $this->_var['title_info']['fields_special']; ?></textarea>
                                    </div>
                                </div>
                                <div class="item">
                                	<div class="label"><?php echo $this->_var['lang']['fields_special_type']; ?>：</div>
                                    <div class="label_value">
                                    	<div id="special_type" class="imitate_select select_w85">
                                            <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                            <ul>
                                                <li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['merchants_top']; ?></a></li>
												<li><a href="javascript:;" data-value="2" class="ftx-01"><?php echo $this->_var['lang']['merchants_bottom']; ?></a></li>
                                            </ul>
                                            <input name="special_type" type="hidden" value="<?php echo $this->_var['title_info']['special_type']; ?>" id="special_type_val">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                	<div class="label">&nbsp;</div>
                                    <div class="label_value info_btn">
									  <?php if ($this->_var['fieldsCount'] > 0): ?>
									  <input name="numAdd" value="<?php echo $this->_var['fieldsCount']; ?>" id="numAdd" type="hidden" />
									  <?php else: ?>
									  <input name="numAdd" value="1" id="numAdd" type="hidden" />
									  <?php endif; ?>
									  <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" id="submitBtn" />
									  <input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button button_reset" />
									  <input type="hidden" name="act" value="<?php echo $this->_var['form_action']; ?>" />
									  <input type="hidden" name="tid" value="<?php echo $this->_var['title_info']['tid']; ?>" />
                                    </div>
                                </div>
							</div>    
                        </div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php echo $this->fetch('library/pagefooter.lbi'); ?>
    <script type="text/javascript">
    	$(function(){
			//表单验证
			$("#submitBtn").click(function(){
				if($("#merchants_steps_form").valid()){
					$("#merchants_steps_form").submit();
				}
			});
		
			$('#merchants_steps_form').validate({
				errorPlacement:function(error, element){
					var error_div = element.parents('div.label_value').find('div.form_prompt');
					element.parents('div.label_value').find(".notic").hide();
					error_div.append(error);
				},
				rules:{
					fields_steps :{
						required : true
					},
					fields_titles:{
						required : true
					}
				},
				messages:{
					fields_steps :{
						required : '<i class="icon icon-exclamation-sign"></i>请选择所属流程'
					},
					fields_titles:{
						required : '<i class="icon icon-exclamation-sign"></i>内容标题不能为空'
					}
				}			
			});
		
			//添加字段
			$("*[ectype='addMerchants']").on('click',function(){
				var mitem = $(this).parents(".m-item");
				var div = mitem.clone();
				div.removeClass("m-item-curr");
				div.find("div.handle").remove();
				div.find("div.m-btn-trash").show();
				
				$(".m-step-section").append(div);
			});
			
			//删除字段
			$(document).on("click",".m-btn-trash .btn_trash",function(){
				var mitem = $(this).parents(".m-item");
				mitem.remove();
			});
			
			//div仿select下拉选框
			$(document).on("click",".imitate_select .cite",function(){
				$(this).parents(".imitate_select").find("ul").show();
			});
			
			$(document).on("click",".imitate_select li  a",function(){
				var _this = $(this);
				var val = _this.data('value');
				var text = _this.html();
				_this.parents(".imitate_select").find(".cite").html(text);
				_this.parents(".imitate_select").find("input[type=hidden]").val(val);
				_this.parents(".imitate_select").find("ul").hide();
				var pitem = _this.parents(".p-item");
				if(_this.parents(".imitate_select").data("tab") == 'formType'){
					pitem.find(".merchantsForm").hide();
					switch(val){
						case 'input':
							pitem.find("*[ectype='merchantsForm_text']").show();
							break;
						case 'textarea':
							pitem.find("*[ectype='merchantsForm_textarea']").show();
							break;
						case 'radio':
							pitem.find("*[ectype='merchantsForm_checkbox']").show();
							break;
						case 'checkbox':
							pitem.find("*[ectype='merchantsForm_checkbox']").show();
							break;
						case 'select':
							pitem.find("*[ectype='merchantsForm_select_opt']").show();
							break;
						default :
							pitem.find("*[ectype='merchantsForm_select']").show();
					}
				}
				if(val == 'dateTime'){
					pitem.find("*[ectype='merchantsForm_select_content']").show();
				}else{
					pitem.find("*[ectype='merchantsForm_select_content']").hide();
				}
			});
			
			$(document).click(function(e){
				if(e.target.className !='cite' && !$(e.target).parents("div").is(".imitate_select")){
					$('.imitate_select ul').hide();
				}
			});
			
			$(document).on("click",".ipt-icon .sc_icon",function(){
				var _div  = $(this).parent().next(".item-item").clone();
				_div.find(".btn_trash").show();
				$(this).parents(".ipt_text").append(_div);
			});
			
			$(document).on("click",".item-item .btn_trash",function(){
				var mitem = $(this).parents(".item-item");
				mitem.remove();
			});
		});
    </script>
</body>
</html>
