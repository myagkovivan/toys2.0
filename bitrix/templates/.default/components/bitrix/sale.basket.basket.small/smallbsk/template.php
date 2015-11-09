
	<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<?php
	function getNumEnding($number, $endingArray)
	{
		$number = $number % 100;
		if ($number>=11 && $number<=19)
		{
			$ending=$endingArray[2];
		} else {
			$i = $number % 10;
			switch ($i) {
				case (1): $ending = $endingArray[0]; break;
				case (2): case (3): case (4): $ending = $endingArray[1]; break;
				default: $ending=$endingArray[2]; }
		}
		return $ending;
	}
	?>
	<?php $defaultCurr = CSaleLang::GetLangCurrency(SITE_ID); ?>
	<?php
	$quant='0';$price='0';
	foreach ($arResult["ITEMS"] as $v)
	{
		if ($v["DELAY"]=="N" && $v["CAN_BUY"]=="Y")
		{
			$quant=$quant+$v["QUANTITY"];
			$pr=$v["QUANTITY"]*$v["PRICE"];
			$price=$price+$pr;
		}
	}
	if($quant==0){?>

	<div class="header-acount-basket">
		<ul>
			<a href="/personal/cart/"><li><img src="<?=SITE_TEMPLATE_PATH;?>/images/basket.png" width="25" height="25"></li>
		<li><p>В Вашей корзине пока пусто</p></li></a></ul>
	<?php }else{?>
		<ul>
		<li><img src="<?=SITE_TEMPLATE_PATH;?>/images/basket.png" width="25" height="25"></li>
		<li><p> <a href="/personal/cart/">В корзине</a>
			<?=$quant?> <?php echo getNumEnding($quant, array("товар", "товара", "товаров")); ?>
			на <?php echo SaleFormatCurrency($price, $defaultCurr); ?></p></li>

	<?php } ?></ul>
	</div>
