
<?php if ($this->_var['best_goods']): ?>
<div class="goods-spread">
    <h3>推广商品</h3>
    <ul>
    	<?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_97373500_1483518331');$this->_foreach['best_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['best_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_97373500_1483518331']):
        $this->_foreach['best_goods']['iteration']++;
?>
        <li>
            <div class="gs-item">
                <div class="p-img"><a href="<?php echo $this->_var['goods_0_97373500_1483518331']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['goods_0_97373500_1483518331']['thumb']; ?>" width="166" height="166"/></a></div>
                <div class="p-name"><a href="<?php echo $this->_var['goods_0_97373500_1483518331']['url']; ?>" target="_blank"><?php echo $this->_var['goods_0_97373500_1483518331']['short_style_name']; ?></a></div>
                <div class="p-price">
                	<?php if ($this->_var['goods_0_97373500_1483518331']['promote_price'] != ''): ?>
                        <?php echo $this->_var['goods_0_97373500_1483518331']['promote_price']; ?>
                    <?php else: ?>
                        <?php echo $this->_var['goods_0_97373500_1483518331']['shop_price']; ?>
                    <?php endif; ?>
                </div>
                <div class="p-num">销量：<?php echo $this->_var['goods_0_97373500_1483518331']['sales_volume']; ?></div>
            </div>
        </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
</div>
<?php endif; ?>