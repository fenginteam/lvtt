
 

<div class="tm-dl-overlay-mask" style="width: 100%; left: 0px; top: 0px; position: fixed; -moz-user-select: none; z-index: 9999; height: 100%;"></div> 
    
<div id="ks-component8199" class="tm-dl-overlay tm-dl-overlay-hidden" style="z-index: 9999; width: 990px; height: 550px; left:50%; top: 50%;margin:-275px 0 0 -495px; position:fixed;">
	<a href="javascript:void('close')" class="tm-dl-overlay-close">
    	<b></b>
        <i class="icon-remove"></i>
    </a>
  	<div class="tm-dl-overlay-content">
  	</div>
</div>  
    
<script type="text/javascript">
$(function(){
	$(".ncs_buy").click(function(){
		
		var str;
		var group;

		str = $(this).attr('rev');
		str = str.split('_');
		group = str[0] + "_" + str[1] + "_" + str[2]; //获取主件组名
		
		//判断是否勾选套餐
		if(!$("."+group).is(':checked')){
			var add_cart_divId = 'flow_add_cart';
			var content = '<div id="flow_add_cart">' + 
							'<div class="tip-box icon-box">' +
								'<span class="warn-icon m-icon"></span>' + 
								'<div class="item-fore">' +
									'<h3 class="rem ftx-04">' + select_shop + '</h3>' +
								'</div>' +
							'</div>' +
						'</div>';
			pb({
				id:add_cart_divId,
				title:'标题',
				width:455,
				height:58,
				content:content, 	//调取内容
				drag:false,
				foot:false
			});
			
			$('#' + add_cart_divId + ' .item-fore').css({
				'padding-top' : '12px'
			});
			//return location.reload();	
			
			return false;
		}else{
			get_cart_combo_list($(this).attr('rev'),group);
		}

	});
	$(".tm-dl-overlay-close,.tm-dl-overlay-mask").click(function(e){
		
		$(".tm-dl-overlay-mask,.tm-dl-overlay").hide();
	});
});
	
//处理添加商品到组合购买购物车
function get_cart_combo_list(rev,group_type){
	
  var number = $('input[name="' + group_type + '_number"]').val();
  var group        = new Object();
 
  group.rev   	= rev;
  group.number  = number;
  
  Ajax.call('flow.php?step=add_cart_combo_list', 'group=' + $.toJSON(group), ec_group_goodsListResponse, 'POST', 'JSON'); //兼容jQuery by mike
}	
//处理添加商品到组合购买购物车的反馈信息
function ec_group_goodsListResponse(result)
{
	if(result.error == 0){
		$(".tm-dl-overlay-content").html(result.content);
		
		$("#m_goods_" + result.groupId).html(result.fittings_minMax);
		$("#m_goods_save_" + result.groupId).html(result.save_minMaxPrice);
		$("#m_goods_reference_" + result.groupId).html(result.market_minMax);
		
		$(".fittings_minMax").html(result.fittings_minMax);
		
		$(".tm-dl-overlay-mask,.tm-dl-overlay").show();
	}
}

function fitt_changeAtt(t, spec_key, group_rev, type, fittings_goods) {

	$(t).parent().parent().find("a").removeClass("tb-txt-a");
	$(t).parent().parent().find("input:checked").prop("checked", false);
	$(t).find(":radio").prop("checked", true);
	$(t).addClass("tb-txt-a");
	
	$(t).find("span").find("img").attr('src');
	
	var fittings_attr = getSelectedAttributesFittings(fittings_goods); /* 获取主商品属性ID */

	isImg = $(t).is(function() {
	  return $(t).find('span > img', this).length === 1;
	});
	if (isImg) {
		var tImg = $(t).find('span > img', this).attr('src');
		var tTitle = $(t).attr('title');
		$('.combo_goods_' + spec_key).find('img').attr({src:"" +tImg+ "", alt:"" +tTitle+ ""});
		
		get_cart_combo_goodsAttr(spec_key, group_rev, tImg, type, fittings_goods, fittings_attr);
	}else{
		get_cart_combo_goodsAttr(spec_key, group_rev, '', type, fittings_goods, fittings_attr);
	}
}

//处理添加商品属性到组合购买购物车
function get_cart_combo_goodsAttr(spec_key, group_rev, tImg, type, fittings_goods, fittings_attr){
  
  var fitt_goods = [];
  var attr = fitt_getSelectedAttributes(document.forms['ECS_FORMBUY_' + spec_key]);
  var group        = new Object();
  
  $('.tm-meta').each(function(index, element) {
  		fitt_goods.push($(element).attr('rev'));  
  });
  
  group.fitt_goods  		= fitt_goods;
  group.attr   				= attr;
  group.group_rev   		= group_rev;
  group.goods_id   			= spec_key;
  group.tImg   				= tImg;
  group.type   				= type;
  group.fittings_goods   	= fittings_goods;
  group.fittings_attr   	= fittings_attr;

  Ajax.call('flow.php?step=add_cart_combo_goodsAttr', 'group=' + $.toJSON(group), ec_group_goodsAttrResponse, 'POST', 'JSON'); //兼容jQuery by mike
}	
//处理添加商品属性到组合购买购物车的反馈信息
function ec_group_goodsAttrResponse(result)
{
	if(result.error == 0){
		if(result.message != ''){
			var add_cart_divId = 'flow_add_cart';
			var content = '<div id="flow_add_cart">' + 
							'<div class="tip-box icon-box">' +
								'<span class="warn-icon m-icon"></span>' + 
								'<div class="item-fore">' +
									'<h3 class="rem ftx-04">' + result.message + '</h3>' +
								'</div>' +
							'</div>' +
						'</div>';
			pb({
				id:add_cart_divId,
				title:'标题',
				width:455,
				height:58,
				content:content, 	//调取内容
				drag:false,
				foot:false
			});
			
			$('#' + add_cart_divId + ' .item-fore').css({
				'padding-top' : '12px'
			});
			
			$('.tm-stock_' + result.goods_id).html(result.attr_number);
		}else{
			$('.tm-stock_' + result.goods_id).html(result.attr_number);
		}
		
		if(result.attr_equal == 1){
			$('#tm-combo-item_' + result.goods_id).removeClass('hover');
		}
		
		if(result.amount > 0){
			$('.fittings_minMax').html(result.goods_amount);
			$('.market_minMax').html(result.goods_market_amount);
			$('.save_minMaxPrice').html(result.save_amount);
			
			$("#m_goods_" + result.groupId).html(result.goods_amount);
			$("#m_goods_reference_" + result.groupId).html(result.goods_market_amount);
			$("#m_goods_save_" + result.groupId).html(result.save_amount);
		}
		
		if(result.attr_number > 0){
			$('.tm-stock_title_' + result.goods_id).hide();
		}else{
			$('.tm-stock_title_' + result.goods_id).show();
		}
		
		if(result.list_select == 1){
			$('.tm-combo-notice').hide();
		}
	}
}

/**
 * 获得选定的商品属性
 */
function fitt_getSelectedAttributes(formBuy)
{
  var spec_arr = new Array();
  var j = 0;

  for (i = 0; i < formBuy.elements.length; i ++ )
  {
    var prefix = formBuy.elements[i].name.substr(0, 10);
	
    if (prefix == 'fitt_spec_' && (
      ((formBuy.elements[i].type == 'radio' || formBuy.elements[i].type == 'checkbox') && formBuy.elements[i].checked) ||
      formBuy.elements[i].tagName == 'SELECT'))
    {
      spec_arr[j] = formBuy.elements[i].value;
      j++ ;
    }
  }

  return spec_arr;
}

/**
 * 获得选定的商品属性组
 */
function getSelectedAttributesFittings(fittings_goods)
{
	var spec_arr = new Array();
	var j = 0;
	
	$("#tm-combo-item_" + fittings_goods + " li.tb-txt").each(function(index, element) {
		if($(this).find("a").hasClass("tb-txt-a")){
			spec_arr[j] = $(this).find("a.tb-txt-a :input").val();
			j++;
		}
	});
	
	return spec_arr;
}
</script>
 