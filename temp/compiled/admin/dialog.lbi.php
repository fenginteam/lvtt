<?php if ($this->_var['temp'] == 'addCategory'): ?>
<div class="dialog_addCategory">
	<dl>
    	<dt><?php echo $this->_var['lang']['category_name']; ?>：</dt>
        <dd><input type="text" class="text text_2" name="addedCategoryName" id="addedCategoryName" value="" autocomplete="off" /></dd>
    </dl>
</div>
<?php endif; ?>

<?php if ($this->_var['temp'] == 'addBrand'): ?>
<div class="dialog_addBrand">
	<dl>
    	<dt><?php echo $this->_var['lang']['brand_name']; ?>：</dt>
        <dd><input type="text" class="text text_2" name="addBrandName" id="addBrandName" value="" autocomplete="off" /></dd>
    </dl>
</div>
<?php endif; ?>

<?php if ($this->_var['temp'] == 'addWarehouse'): ?>
<div class="addWarehouse">
    <dl>
        <dt><?php echo $this->_var['lang']['warehouse_name']; ?>：</dt>
        <dd>
            <div class="imitate_select select_w140">
                <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                <ul>
                	<?php $_from = $this->_var['warehouse_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'warehouse');$this->_foreach['nowarehouse'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nowarehouse']['total'] > 0):
    foreach ($_from AS $this->_var['warehouse']):
        $this->_foreach['nowarehouse']['iteration']++;
?>
                    <li><a href="javascript:;" data-value="<?php echo $this->_var['warehouse']['region_id']; ?>" class="ftx-01"><?php echo $this->_var['warehouse']['region_name']; ?></a></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
                <input name="warehouse_name" type="hidden" value="" id="warehouse_name">
            </div>
        </dd>
    </dl>    
    <dl>
        <dt><?php echo $this->_var['lang']['warehouse_number']; ?>：</dt>
        <dd><input name="warehouse_number" id="warehouse_number" value="0" type="text" size="10" class="text text_2" autocomplete="off" /></dd>
    </dl>
    <dl>
        <dt><?php echo $this->_var['lang']['warehouse_price']; ?>：</dt>
        <dd><input name="warehouse_price" id="warehouse_price" value="0" type="text" size="10" class="text text_2" autocomplete="off" /></dd>
    </dl>
    <dl>
        <dt><?php echo $this->_var['lang']['warehouse_promote_price']; ?>：</dt>
        <dd><input name="warehouse_promote_price" id="warehouse_promote_price" value="0" type="text" size="10" class="text text_2" autocomplete="off" /></dd>
    </dl>
    
    <dl>
        <dt><?php echo $this->_var['lang']['lab_give_integral']; ?></dt>
        <dd>
        	<input name="give_integral" id="warehouse_give_integral" value="0" type="text" size="10" class="text text_2" rev="give" autocomplete="off" />
            <?php if ($this->_var['user_id']): ?>
            &nbsp;<span class="color999" id="give_html">可设置<em id="give">0</em>消费积分</span>
            <?php endif; ?>
        </dd>
    </dl>
    <dl>
        <dt><?php echo $this->_var['lang']['lab_rank_integral']; ?></dt>
        <dd>
        	<input name="rank_integral" id="warehouse_rank_integral" value="0" type="text" size="10" class="text text_2" rev="rank" autocomplete="off" />
            <?php if ($this->_var['user_id']): ?>
            &nbsp;<span class="color999" id="rank_html">可设置<em id="rank">0</em>等级积分</span>
            <?php endif; ?>
        </dd>
    </dl>
    <dl>
        <dt><?php echo $this->_var['lang']['lab_integral']; ?></dt>
        <dd>
        	<input name="pay_integral" id="warehouse_pay_integral" value="0" type="text" size="10" class="text text_2" rev="pay" autocomplete="off" />
            <?php if ($this->_var['user_id']): ?>
            &nbsp;<span class="color999" id="pay_html">可设置积分购买<em id="pay">0</em>金额</span>
            <?php endif; ?>
        </dd>
    </dl>
</div>
<script type="text/javascript">
<?php if ($this->_var['user_id']): ?>
$(function(){
	$('#warehouse_price, #warehouse_promote_price').blur(function(){
		var warehouse_price = Number($("#warehouse_price").val());
		var warehouse_promote_price = Number($("#warehouse_promote_price").val());
		var shop_price;
		
		if(warehouse_price > warehouse_promote_price && warehouse_promote_price == 0){
			shop_price = warehouse_price;
		}else if(warehouse_price < warehouse_promote_price && warehouse_promote_price != 0){
			shop_price = warehouse_price;
		}else{
			shop_price = warehouse_promote_price;
		}
		
		var give_integral = Math.floor(shop_price * <?php echo $this->_var['grade_rank']['give_integral']; ?>);

		$("#give").html(give_integral);
		
		var rank_integral = Math.floor(shop_price * <?php echo $this->_var['grade_rank']['rank_integral']; ?>);
		$("#rank").html(rank_integral);
		
		var pay_integral = Math.floor(shop_price / 100 * <?php echo $this->_var['integral_scale']; ?> * <?php echo $this->_var['grade_rank']['pay_integral']; ?>);
		$("#pay").html(pay_integral);
		
		$("#warehouse_give_integral").val('');
		$("#warehouse_rank_integral").val('');
		$("#warehouse_pay_integral").val('');
	});
	
	$('#warehouse_give_integral, #warehouse_rank_integral, #warehouse_pay_integral').blur(function(){
		var give = $('#give').html();
		var rank = $('#rank').html();
		var pay = $('#pay').html();
		var val = $(this).val();
		var rev = $(this).attr('rev');
		var integral = $("#" + rev).html();
		if(val > integral){
			if(rev == 'give'){
				alert("可设置" + integral + "消费积分");
			}else if(rev == 'rank'){
				alert("可设置" + integral + "等级积分");
			}else{
				alert("可设置积分购买" + integral + "金额");
			}
			$(this).val(integral);
		}
	});
	
});
<?php endif; ?>
</script>
<?php endif; ?>
<?php if ($this->_var['temp'] == 'addBatchWarehouse'): ?>
<div class="warehouse_warpper" id="batchWarehouelist">
	<div class="add_warehouse_list">
		<div class="warehouse_item">
			<span class="item">
				<span class="tit">仓库名称</span>
				
                <div class="imitate_select select_w140">
                    <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                    <ul>
                        <?php $_from = $this->_var['warehouse_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'warehouse');$this->_foreach['nowarehouse'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nowarehouse']['total'] > 0):
    foreach ($_from AS $this->_var['warehouse']):
        $this->_foreach['nowarehouse']['iteration']++;
?>
                        <li><a href="javascript:;" data-value="<?php echo $this->_var['warehouse']['region_id']; ?>" class="ftx-01"><?php echo $this->_var['warehouse']['region_name']; ?></a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                    <input name="warehouse_name" type="hidden" value="0" id="warehouse_name">
                </div>						
			</span>
			<span class="item"><span class="tit">仓库库存</span><input type="text" value="0" name="warehouse_number" class="text w65" autocomplete="off" /></span>
			<span class="item"><span class="tit">仓库价格</span><input type="text" value="0" name="warehouse_price" class="text w65" autocomplete="off" /></span>
			<span class="item last"><span class="tit">仓库促销价格</span><input type="text" value="0" name="warehouse_promote_price" class="text w65" autocomplete="off" /></span>
			<div class="hide">
				<span class="item"><span class="tit">赠送消费积分数</span><input type="text" value="0" name="give_integral" class="text w65" autocomplete="off" /></span>
				<span class="item"><span class="tit">赠送等级积分数</span><input type="text" value="0" name="rank_integral" class="text w65" autocomplete="off" /></span>
				<span class="item"><span class="tit">积分购买金额</span><input type="text" value="0" name="pay_integral" class="text w65" autocomplete="off" /></span>
			</div>
		</div>
		<a href="javascript:void(0);" class="addList"></a>
	</div>
</div>
<!--添加仓库html end-->
<?php endif; ?>
<?php if ($this->_var['temp'] == 'addRegion'): ?>
<div class="addWarehouse">
    <dl>
        <dt><?php echo $this->_var['lang']['warehouse_region_name']; ?>：</dt>
        <dd>
            <select name="warehouse_area_name" onchange="get_warehouse_area_name(this.value, this.id, <?php echo $this->_var['goods_id']; ?>, <?php echo $this->_var['user_id']; ?>)" id="1" class="select" style=" margin:0 10px 0 0;">
                <option value="0" selected><?php echo $this->_var['lang']['select_please']; ?></option>
                <?php $_from = $this->_var['warehouse_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'warehouse');$this->_foreach['nowarehouse'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nowarehouse']['total'] > 0):
    foreach ($_from AS $this->_var['warehouse']):
        $this->_foreach['nowarehouse']['iteration']++;
?>
                <option value="<?php echo $this->_var['warehouse']['region_id']; ?>"><?php echo $this->_var['warehouse']['region_name']; ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
            <font style="font-size:12px; float:left;" id="warehouse_area_list_1" name="warehouse_area_list"></font>
        </dd>
    </dl>    
    <dl>
        <dt><?php echo $this->_var['lang']['region_number']; ?>：</dt>
        <dd><input name="region_number" id="region_number" value="0" type="text" size="10" class="text text_2" autocomplete="off" /></dd>
    </dl>
    <dl>
        <dt><?php echo $this->_var['lang']['region_price']; ?>：</dt>
        <dd><input name="region_price" id="region_price" value="0" type="text" size="10" class="text text_2" autocomplete="off" /></dd>
    </dl>
    <dl>
        <dt><?php echo $this->_var['lang']['region_promote_price']; ?>：</dt>
        <dd><input name="region_promote_price" id="region_promote_price" value="0" type="text" size="10" class="text text_2" autocomplete="off" /></dd>
    </dl>
    
    <dl>
        <dt><?php echo $this->_var['lang']['lab_give_integral']; ?></dt>
        <dd>
        	<input name="give_integral" id="region_give_integral" value="0" type="text" size="10" class="text text_2" rev="give" autocomplete="off" />
            <?php if ($this->_var['user_id']): ?>
        	&nbsp;<span class="color999" id="give_html">可设置<em id="give">0</em>消费积分</span>
            <?php endif; ?>
        </dd>
    </dl>
    <dl>
        <dt><?php echo $this->_var['lang']['lab_rank_integral']; ?></dt>
        <dd>
        	<input name="rank_integral" id="region_rank_integral" value="0" type="text" size="10" class="text text_2" rev="rank" autocomplete="off" />
        	<?php if ($this->_var['user_id']): ?>
            &nbsp;<span class="color999" id="rank_html">可设置<em id="rank">0</em>等级积分</span>
            <?php endif; ?>
        </dd>
    </dl>
    <dl>
        <dt><?php echo $this->_var['lang']['lab_integral']; ?></dt>
        <dd>
        	<input name="pay_integral" id="region_pay_integral" value="0" type="text" size="10" class="text text_2" rev="pay" autocomplete="off" />
        	<?php if ($this->_var['user_id']): ?>
        	&nbsp;<span class="color999" id="pay_html">可设置积分购买<em id="pay">0</em>金额</span>
            <?php endif; ?>
        </dd>
    </dl>
</div>

<script type="text/javascript">
<?php if ($this->_var['user_id']): ?>
$(function(){
	$('#region_price, #region_promote_price').blur(function(){
		var region_price = Number($('#region_price').val());
		var region_promote_price = Number($('#region_promote_price').val());
		var shop_price;
		
		if(region_price > region_promote_price && region_promote_price == 0){
			shop_price = region_price;
		}else if(region_price < region_promote_price && region_promote_price != 0){
			shop_price = region_price;
		}else{
			shop_price = region_promote_price;
		}
		
		var give_integral = Math.floor(shop_price * <?php echo $this->_var['grade_rank']['give_integral']; ?>);

		$("#give").html(give_integral);
		
		var rank_integral = Math.floor(shop_price * <?php echo $this->_var['grade_rank']['rank_integral']; ?>);
		$("#rank").html(rank_integral);
		
		var pay_integral = Math.floor(shop_price / 100 * <?php echo $this->_var['integral_scale']; ?> * <?php echo $this->_var['grade_rank']['pay_integral']; ?>);
		$("#pay").html(pay_integral);
		
		$("#warehouse_give_integral").val('');
		$("#warehouse_rank_integral").val('');
		$("#warehouse_pay_integral").val('');
	});
	
	$('#region_give_integral, #region_rank_integral, #region_pay_integral').blur(function(){
		var give = $('#give').html();
		var rank = $('#rank').html();
		var pay = $('#pay').html();
		var val = $(this).val();
		var rev = $(this).attr('rev');
		var integral = $("#" + rev).html();
		if(val > integral){
			if(rev == 'give'){
				alert("可设置" + integral + "消费积分");
			}else if(rev == 'rank'){
				alert("可设置" + integral + "等级积分");
			}else{
				alert("可设置积分购买" + integral + "金额");
			}
			$(this).val(integral);
		}
	});
	
});
<?php endif; ?>
</script>
<?php endif; ?>
<?php if ($this->_var['temp'] == 'addBatchRegion'): ?>
<div class="warehouse_warpper" id="batchRegionlist">
	<div class="add_warehouse_list">
		<div class="warehouse_item" id="area_1">
			<span class="item">
				<span class="tit">地区名称</span>
                <div class="imitate_select select_w140 warehouse_area_name" data-key="1" data-goodsid="<?php echo $this->_var['goods_id']; ?>" data-userid="<?php echo $this->_var['user_id']; ?>" id="warehouse_area_name_1">
                    <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                    <ul>
                        <?php $_from = $this->_var['warehouse_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'warehouse');$this->_foreach['nowarehouse'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nowarehouse']['total'] > 0):
    foreach ($_from AS $this->_var['warehouse']):
        $this->_foreach['nowarehouse']['iteration']++;
?>
                        <li><a href="javascript:;" data-value="<?php echo $this->_var['warehouse']['region_id']; ?>" class="ftx-01"><?php echo $this->_var['warehouse']['region_name']; ?></a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                    <input name="warehouse_area_name" type="hidden" value="" id="warehouse_area_name_val_1">
                </div>
				<font style="font-size:12px;" id="warehouse_area_list_1" name="warehouse_area_list"></font>									
			</span>
			<span class="item"><span class="tit">地区库存</span><input type="text" value="0" name="region_number" class="text w65" autocomplete="off" /></span>
			<span class="item"><span class="tit">地区价格</span><input type="text" value="0" name="region_price" class="text w65" autocomplete="off" /></span>
			<span class="item"><span class="tit">地区促销价格</span><input type="text" value="0" name="region_promote_price" class="text w65" autocomplete="off" /></span>
			<div class="hide">
				<span class="item"><span class="tit">赠送消费积分数</span><input type="text" value="0" name="give_integral" class="text w65" autocomplete="off" /></span>
				<span class="item"><span class="tit">赠送等级积分数</span><input type="text" value="0" name="rank_integral" class="text w65" autocomplete="off" /></span>
				<span class="item last"><span class="tit">积分购买金额</span><input type="text" value="0" name="pay_integral" class="text w65" autocomplete="off" /></span>
			</div>
		</div>
		<a href="javascript:void(0);" class="addList"></a>
	</div>
</div>
<script type="text/javascript">
/*$(function(){
	$(document).on("click",".warehouse_area_name",function(){
		var key = $(this).data("key");
		var goods_id =$(this).data("goodsid");
		var user_id =$(this).data("userid");
		$.divselect("#warehouse_area_name_" + key,"#warehouse_area_name_val_" + key,function(obj){
			var value = $(obj).data("value");
			get_warehouse_area_name(value, key ,goods_id, user_id);
		});
	});
})*/
</script>
<?php endif; ?>
<?php if ($this->_var['temp'] == 'addImg'): ?>
<form  action="goods.php?act=addImg" id="fileForm" method="post"  enctype="multipart/form-data"  runat="server" >
<div class="addImg" id="addImg">
	<dl>
        <dt><?php echo $this->_var['lang']['img_count']; ?>：</dt>
        <dd><input type="text" class="text_3 mr10"  name="img_desc[]" size="20" autocomplete="off" /></dd>
    </dl>
    <dl>
        <dt><?php echo $this->_var['lang']['img_url']; ?>：</dt>
        <dd><input type="file" name="img_url[]" id="img_url"  class="file mr10 mt5" autocomplete="off" /></dd>
    </dl>
    <dl>
        <dt><?php echo $this->_var['lang']['img_file']; ?>：</dt>
        <dd><input type="text" size="40" value="<?php echo $this->_var['lang']['img_file']; ?>" style="color:#aaa;" autocomplete="off" onfocus="if (this.value == '<?php echo $this->_var['lang']['img_file']; ?>'){this.value='http://';this.style.color='#000';}" name="img_file[]"/></dd>
    </dl>
    <input type="hidden"   value="<?php echo $this->_var['goods_id']; ?>" name="goods_id_img"/>
</div>
</form>
<?php endif; ?>
<?php if ($this->_var['temp'] == 'addBatchImg'): ?>
<form  action="goods.php?act=addBatchImg" id="addBatchImg_from" method="post"  enctype="multipart/form-data"  runat="server" >
	<div class="img_item"  >
		<span class="red"><?php echo $this->_var['lang']['remind']; ?></span>
	</div>
	<div class="img_item">
    <a href="javascript:;" onclick="addImg(this)" class="up"></a>
    <?php echo $this->_var['lang']['img_count']; ?>：<input type="text" class="text_2 mr10" name="img_desc[]" size="20" autocomplete="off" />
    <?php echo $this->_var['lang']['img_url']; ?>：<input type="file" name="img_url[]" id="Batch_img_url" class="mr10" autocomplete="off" />
    <input type="text" size="40" value="<?php echo $this->_var['lang']['img_file']; ?>" style="color:#aaa;" autocomplete="off" onfocus="if (this.value == '<?php echo $this->_var['lang']['img_file']; ?>'){this.value='http://';this.style.color='#000';}" name="img_file[]"/>
    <input type="hidden"   value="<?php echo $this->_var['goods_id']; ?>" name="goods_id_img"/>
    </div>

</form>
<?php endif; ?>
<?php if ($this->_var['temp'] == 'privilege'): ?>
<div class="dialog_privilege" id="dialog_privilege">
	<dl>
    	<dt><?php echo $this->_var['lang']['label_region']; ?>：</dt>
        <dd>
        	<select name="country" id="selCountries" onChange="region.changed(this, 1, 'selProvinces')" class="select">
              <?php $_from = $this->_var['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');$this->_foreach['fe_country'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_country']['total'] > 0):
    foreach ($_from AS $this->_var['country']):
        $this->_foreach['fe_country']['iteration']++;
?>
                <option value="<?php echo $this->_var['country']['region_id']; ?>" <?php if (($this->_foreach['fe_country']['iteration'] <= 1)): ?>selected<?php endif; ?>><?php echo htmlspecialchars($this->_var['country']['region_name']); ?></option>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
            <select name="province" id="selProvinces" onChange="region.changed(this, 2, 'selCities')" class="select mr10">
              <option value=""><?php echo $this->_var['lang']['select_please']; ?></option>
            </select>
            <select name="city" id="selCities" onChange="region.changed(this, 3, 'selDistricts')" class="select mr10">
              <option value=""><?php echo $this->_var['lang']['select_please']; ?></option>
            </select>
            <select name="district" id="selDistricts" class="select mr10">
              <option value=""><?php echo $this->_var['lang']['select_please']; ?></option>
            </select>
        </dd>
    </dl>
</div>
<script type="text/javascript">
	var selCountry = document.getElementById("selCountries");
	if (selCountry.selectedIndex >= 0)
	{
		region.loadProvinces(selCountry.options[selCountry.selectedIndex].value);
	}
</script>
<?php endif; ?> 

<?php if ($this->_var['temp'] == 'load_url'): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>
<body>
	<div class="loadSpin">
		<i class="icon-spinner icon-spin"></i>
    </div>
</body>
</html>
<?php endif; ?>
<?php if ($this->_var['temp'] == 'pic_album'): ?>
    <div class="switch_info">
        <div class="items">
            <div class="item">
                <div class="label">选择相册：</div>
                <div class="label_value">
                    <div id="parent_cat" class="imitate_select select_w145">
                      <div class="cite"><?php if ($this->_var['album_mame']): ?><?php echo $this->_var['album_mame']; ?><?php else: ?><?php echo $this->_var['lang']['please_select']; ?><?php endif; ?></div>
                      <ul>
                            <?php $_from = $this->_var['album_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                            <li><a href="javascript:;" data-value="<?php echo $this->_var['item']['album_id']; ?>"  class="ftx-01"><?php echo $this->_var['item']['album_mame']; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                      </ul>
                      <input name="album_id" type="hidden" id="album_number" value="<?php echo $this->_var['album_id']; ?>" >
                    </div>
                </div>
            </div>
            <div class="item">
                    <div class="label"><?php echo $this->_var['lang']['img_url']; ?>：</div>
                    <div class="label_value">
                            <div class="type-file-box">
                            <input type="button" name="button" id="button" class="type-file-button" value="" />
                            <span class="red ml10">按住ctrl可同时批量选择多张图片上传</span>
                        </div>
                        <div class="form_prompt"></div>
                    </div>
                </div>
            <div class="item">
                <div class="label">&nbsp;</div>
                <div class="label_value info_btn">
                    <a href="javascript:;" class="button" id="submitBtn"><?php echo $this->_var['lang']['button_submit']; ?></a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    var uploader_gallery = new plupload.Uploader({//创建实例的构造方法
		runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
		browse_button: 'button', // 上传按钮
		url: "gallery_album.php?is_ajax=1&act=upload_pic", //远程上传地址
		filters: {
			max_file_size: '2mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
			mime_types: [//允许文件上传类型
				{title: "files", extensions: "jpg,png,gif"}
			]
		},
		multi_selection: true, //true:ctrl多文件上传, false 单文件上传
		init: {
			FileUploaded: function(up, file, info) { //文件上传成功的时候触发
				//var data = eval("(" + info.response + ")");
				//$("#" + file.id).html("<div class='img' onclick='img_default("+data.img_id+")'><img src='" + data.pic + "'/></div><div class='info'><span class='zt red'>&nbsp;</span><div class='sort'><span>排序：</span><input type='text' name='sort' value='" + data.img_desc + "' class='stext' /></div><a href='javascript:void(0);' class='delete_img' data-imgid='"+data.img_id+"'><i class='icon icon-trash'></i></a></div>");
			},
                        UploadComplete:function(up,file){//所有文件上传成功时触发
                            window.location.href="gallery_album.php?act=view&id=<?php echo $this->_var['album_id']; ?>"; 
                        },
			Error: function(up, err) { //上传出错的时候触发
				alert(err.message);
			}
		}
	});
	uploader_gallery.init();
        $(document).on("click","#submitBtn",function(){
            var album_id = $("#album_number").val();
            var data = {
                album_id: album_id
            };
            uploader_gallery.setOption("multipart_params", data);
            uploader_gallery.start();
        });
        
</script>
<?php endif; ?>
<?php if ($this->_var['temp'] == 'album_move'): ?>
    <div class="switch_info">
        <div class="items">
            <div class="item">
                <div class="label">选择相册：</div>
                <div class="label_value">
                    <div id="parent_cat" class="imitate_select select_w145">
                      <div class="cite"><?php if ($this->_var['album_mame']): ?><?php echo $this->_var['album_mame']; ?><?php else: ?><?php echo $this->_var['lang']['please_select']; ?><?php endif; ?></div>
                      <ul>
                            <?php $_from = $this->_var['album_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                            <li><a href="javascript:;" data-value="<?php echo $this->_var['item']['album_id']; ?>"  class="ftx-01"><?php echo $this->_var['item']['album_mame']; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                      </ul>
                      <input name="album_id" type="hidden" value="<?php echo $this->_var['album_id']; ?>" >
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(function(){
    //select下拉默认值赋值
	$('.imitate_select').each(function()
	{
		var sel_this = $(this)
		var val = sel_this.children('input[type=hidden]').val();
		sel_this.find('a').each(function(){
			if($(this).attr('data-value') == val){
				sel_this.children('.cite').html($(this).html());
			}
		})
	});
})
</script>
<?php endif; ?>