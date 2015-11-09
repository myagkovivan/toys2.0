<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

?>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/modernizr.custom.28468.js"

		xmlns="http://www.w3.org/1999/html"></script>

<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<div id="da-slider" class="da-slider">

	<?if($arParams["DISPLAY_TOP_PAGER"]):?>

		<?=$arResult["NAV_STRING"]?><br />

	<?endif;?>

	<?foreach($arResult["ITEMS"] as $arItem):?>

		<?

		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));

		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

		?>

		<div class="da-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

			<h2><?echo $arItem["NAME"]?></h2>

			<p>

				<? echo $arItem['DISPLAY_PROPERTIES']['H2_TITLE']['~VALUE'];?>

				<?=htmlspecialcharsBack($arItem["PROPERTIES"]["RECLAMACIYA"]["VALUE"]["TEXT"])?>

			</p>



			<div class="da-img"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"/></div>
			<div class="button"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">Прочитать всё</a></div>

		</div>

	<?endforeach;?>

	<nav class="da-arrows">

		<span class="da-arrows-prev"></span>

		<span class="da-arrows-next"></span>

	</nav>

</div>

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.cslider.js"></script>

<script type="text/javascript">

	$(function() {

		$('#da-slider').cslider({

			autoplay : true,

			bgincrement : 450

		});

	});

</script>

