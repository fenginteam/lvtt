<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title">门店 - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">			
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4>操作提示</h4><span id="explanationZoom" title="收起提示"></span></div>
                <ul>
                	<li>商城所有门店相关信息管理。</li>
                    <li>可对门店进行开启或关闭状态。</li>
                    <li>可对门店名称关键字进行搜索，侧边栏进行高级搜索。</li>
                </ul>
            </div>
            <div class="flexilist">
            	<!--商品列表-->
                <div class="common-head">
                    <div class="fl">
                    	<a href="<?php echo $this->_var['action_link']['href']; ?>"><div class="fbutton"><div class="add" title="<?php echo $this->_var['action_link']['text']; ?>"><span><i class="icon icon-plus"></i><?php echo $this->_var['action_link']['text']; ?></span></div></div></a>
                    </div>
                    <div class="refresh">
                    	<div class="refresh_tit" title="刷新数据"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span">刷新 - 共<?php echo $this->_var['record_count']; ?>条记录</div>
                    </div>
					<div class="search">
                    	<div class="input">
                        	<input type="text" name="stores_name" class="text nofocus" placeholder="门店名称" autocomplete="off">
							<button class="btn" name="secrch_btn"></button>
                        </div>
                    </div>
                </div>
                <div class="common-content">
					<form method="post" action="offline_store.php?act=batch_remove" name="listForm">
                	<div class="list-div" id="listDiv">
						<?php endif; ?>
                    	<table cellpadding="0" cellspacing="0" border="0">
                        	<thead>
                            	<tr>
                                	<th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>
                                	<th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['stores_user']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['shop_name']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['stores_name']; ?></div></th>
                                    <th width="18%"><div class="tDiv"><?php echo $this->_var['lang']['area_info']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['stores_opening_hours']; ?></div></th>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['stores_img']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['is_confirm']; ?></div></th>
                                    <th width="15%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $_from = $this->_var['offline_store']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                            	<tr>
                                    <td class="sign">
                                        <div class="tDiv">
                                            <input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['list']['id']; ?>" class="checkbox" id="checkbox_<?php echo $this->_var['list']['id']; ?>" />
                                            <label for="checkbox_<?php echo $this->_var['list']['id']; ?>" class="checkbox_stars"></label>
                                        </div>
                                    </td>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['id']; ?></div></td>
									<td><div class="tDiv"><?php echo htmlspecialchars($this->_var['list']['stores_user']); ?></div></td>
									<td><div class="tDiv red"><?php echo htmlspecialchars($this->_var['list']['shop_name']); ?></div></td>
									<td><div class="tDiv"><?php echo htmlspecialchars($this->_var['list']['stores_name']); ?></div></td>
									<td><div class="tDiv">[<?php echo $this->_var['list']['country']; ?>&nbsp;&nbsp;<?php echo $this->_var['list']['province']; ?>&nbsp;&nbsp;<?php echo $this->_var['list']['city']; ?>&nbsp;&nbsp;<?php echo $this->_var['list']['district']; ?>]<?php echo htmlspecialchars($this->_var['list']['stores_address']); ?><p><?php echo htmlspecialchars($this->_var['list']['stores_tel']); ?></p></div></td>
                                    <td><div class="tDiv"><?php echo htmlspecialchars($this->_var['list']['stores_opening_hours']); ?></div></td>
                                    <td><div class="tDiv">
										<span class="show">
											<a href="../<?php echo $this->_var['list']['stores_img']; ?>" class="nyroModal"><i class="icon icon-picture" onmouseover="toolTip('<img src=../<?php echo $this->_var['list']['stores_img']; ?>>')" onmouseout="toolTip()"></i></a>
										</span>
									</div></td>
                                    <td><div class="tDiv">
										<div class="switch <?php if ($this->_var['list']['is_confirm'] == 1): ?>active<?php endif; ?>" title="<?php if ($this->_var['list']['is_confirm'] == 1): ?>是<?php else: ?>否<?php endif; ?>" onclick="listTable.switchBt(this, 'toggle_show', <?php echo $this->_var['list']['id']; ?>)">
											<div class="circle"></div>
										</div>
										<input type="hidden" value="0" name="">									
									</div></td>                               
                                    <td class="handle">
                                    <div class="tDiv a3_3">
										<a href="order.php?act=list&store_id=<?php echo $this->_var['list']['id']; ?>" class="btn_see"><i class="sc_icon sc_icon_see"></i>门店订单</a>
										<a href="offline_store.php?act=edit&id=<?php echo $this->_var['list']['id']; ?>" class="btn_edit"><i class="icon icon-edit"></i>编辑</a>
										<a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['list']['id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" class="btn_trash"><i class="icon icon-trash"></i>删除</a>
									</div>
                                    </td>
                                </tr>
								<?php endforeach; else: ?>
								<tr><td class="no-records"  colspan="20"><?php echo $this->_var['lang']['no_records']; ?></td></tr>								
								<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                            <tfoot>
                            	<tr>
                                	<td colspan="12">
                                        <div class="tDiv">
                                            <div class="tfoot_btninfo">
                                              <div class="shenhe">
                                                <div id="" class="imitate_select select_w120">
                                                    <div class="cite">请选择</div>
                                                    <ul>
                                                        <li><a href="javascript:;" data-value="" class="ftx-01"><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                                        <li><a href="javascript:;" data-value="drop_batch" class="ftx-01"><?php echo $this->_var['lang']['drop_batch']; ?></a></li>
                                                        <li><a href="javascript:;" data-value="open_batch" class="ftx-01"><?php echo $this->_var['lang']['open_batch']; ?></a></li>
                                                        <li><a href="javascript:;" data-value="off_batch" class="ftx-01"><?php echo $this->_var['lang']['off_batch']; ?></a></li>
                                                    </ul>
                                                    <input name="batch_handle" type="hidden" value="" id="">
                                                </div>
                                                <input type="submit" name="drop" id="btnSubmit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="btn btn_disabled" disabled="true" ectype="btnSubmit" />							  
                                              </div>
                                            </div>
                                            <div class="list-page">
                                               <?php echo $this->fetch('library/page.lbi'); ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
						<?php if ($this->_var['full_page']): ?>
                    </div>
					</form>
                </div>
                <!--商品列表end-->
            </div>
		</div>
	</div>
	
	<div class="gj_search">
		<div class="search-gao-list" id="searchBarOpen">
			<i class="icon icon-zoom-in"></i>高级搜索
		</div>
		<div class="search-gao-bar">
			<div class="handle-btn" id="searchBarClose"><i class="icon icon-zoom-out"></i>收起边栏</div>
			<div class="title"><h3>高级搜索</h3></div>
			<form action="javascript:searchStore()" name="searchForm">
				<div class="searchContent">
					<div class="layout-box">
						<dl>
							<dt><?php echo $this->_var['lang']['stores_user']; ?></dt>
							<dd><input name="stores_user" type="text" id="stores_user" size="15" class="s-input-txt"></dd>
						</dl>
						<dl>
							<dt><?php echo htmlspecialchars($this->_var['lang']['stores_name']); ?></dt>
							<dd><input name="stores_name" type="text" id="stores_name" size="15" class="s-input-txt"></dd>
						</dl>
						<dl>
							<dt><?php echo htmlspecialchars($this->_var['lang']['shop_name']); ?></dt>
							<dd><input name="shop_name" type="text" id="stores_name" size="15" class="s-input-txt"></dd>
						</dl>						
						<dl>
							<dt><?php echo htmlspecialchars($this->_var['lang']['is_confirm']); ?></dt>
							<dd>
								<div id="" class="imitate_select select_w145">
									<div class="cite">请选择</div>
									<ul>
									   <li><a href="javascript:;" data-value="-1"><?php echo $this->_var['lang']['select_please']; ?></a></li>
									   <li><a href="javascript:;" data-value="0">关闭</a></li>
									   <li><a href="javascript:;" data-value="1">开启</a></li>
									</ul>
									<input name="is_confirm" type="hidden" value="-1" id="">
								</div>
							</dd>
						</dl>
					</div>
				</div>
				<div class="bot_btn">
					<input type="submit" class="btn red_btn" name="tj_search" value="提交查询" /><input type="reset" class="btn btn_reset" name="reset" value="重置" />
				</div>
			</form>
		</div>
	</div>	
	 <?php echo $this->fetch('library/pagefooter.lbi'); ?>
	<script type="text/javascript" src="js/jquery.picTip.js"></script>
	<script type="text/javascript" language="JavaScript">
		listTable.recordCount = '<?php echo $this->_var['record_count']; ?>';
		listTable.pageCount = '<?php echo $this->_var['page_count']; ?>';

		<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
		listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		 /**
		 * 搜索订单
		 */
		function searchStore()
		{
			listTable.filter['stores_user'] = Utils.trim(document.forms['searchForm'].elements['stores_user'].value);
			listTable.filter['stores_name'] = Utils.trim(document.forms['searchForm'].elements['stores_name'].value);
			listTable.filter['is_confirm'] = document.forms['searchForm'].elements['is_confirm'].value;
			listTable.filter['shop_name'] = document.forms['searchForm'].elements['shop_name'].value;
			listTable.filter['page'] = 1;
			listTable.loadList();
		}
		
		$.gjSearch("-240px");  //高级搜索
		
		$(function(){
			$('.nyroModal').nyroModal();
		})
	</script>
</body>
</html>
<?php endif; ?>
