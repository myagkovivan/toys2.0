<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die(); ?>
<!doctype html>
<html lang="<?=LANGUAGE_ID?>">
<head>
	<?$APPLICATION->ShowHead()?>
	<title><?$APPLICATION->ShowTitle();?></title>
	<?CJSCore::Init(array("jquery"));?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/styles.css", true);?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."js/modernizr.custom.28468.js", true);?>

	<style> @import url("http://allfont.net/allfont.css?fonts=dited")</style>
</head>
<body>
<?$APPLICATION->ShowPanel();?>

<div class="header">

	<div class="header-img">
		<?if($APPLICATION->GetCurPage(false) != SITE_DIR):?><a href="/"><?endif;?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"COMPONENT_TEMPLATE" => ".default",
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => "",
					"PATH" => SITE_TEMPLATE_PATH."/include_areas/logo.php"
				));?>
			<?if($APPLICATION->GetCurPage(false) != SITE_DIR):?></a><?endif;?>
	</div>
	<div class="header-text">
		<strong>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"COMPONENT_TEMPLATE" => ".default",
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => "",
					"PATH" => SITE_TEMPLATE_PATH."/include_areas/name.php"
				));?>
		</strong>

	</div>
	<div class="search">
		<?$APPLICATION->IncludeComponent(
	"bitrix:search.form", 
	"search", 
	array(
		"COMPONENT_TEMPLATE" => "search",
		"PAGE" => "#SITE_DIR#search/index.php",
		"USE_SUGGEST" => "N"
	),
	false
);?>

	</div>
	<div class="header-acount">
		<div class="header-acount-input">

			<ul>
				<li>
					<img src="<?=SITE_TEMPLATE_PATH?>/images/acount.png" width="25" height="25">
				</li>
				<?if(CUser::IsAuthorized()):?>
					<li><strong><a href="/personal"><?=(CUser::GetFirstName())?CUser::GetFirstName():CUser::GetLogin()?></a></strong></li>
				<li><a href="/?logout=yes">Выход</a></ul>
				<?else:?>
					<li><a href="/auth"><strong>Вход</strong></a></li>
					<li><a href="/auth//index.php?register=yes"><strong>Регистрация</strong></a></li>
				<?endif;?>
		

			</div>

		<div class="header-acount-basket">

			<ul> <?$APPLICATION->IncludeComponent(
					"bitrix:sale.basket.basket.small",
					"smallbsk",
					array(
						"COMPONENT_TEMPLATE" => "smallbsk",
						"PATH_TO_BASKET" => "/personal/basket.php",
						"PATH_TO_ORDER" => "/personal/order.php",
						"SHOW_DELAY" => "Y",
						"SHOW_NOTAVAIL" => "Y",
						"SHOW_SUBSCRIBE" => "Y"
					),
					false
				);?>
			</ul>
		</div>

	</div>


</div>
<div class="header-menu">
	<?
	$APPLICATION->IncludeComponent(
		"bitrix:menu",
		"topmenu",
		array(
			"ROOT_MENU_TYPE" => "top",
			"MENU_CACHE_TYPE" => "A",
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"MENU_CACHE_GET_VARS" => array(
			),
			"MAX_LEVEL" => "1",
			"CHILD_MENU_TYPE" => "left",
			"USE_EXT" => "N",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N",
			"COMPONENT_TEMPLATE" => "topmenu"
		),
		false
	);
	?>
</div>

<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => "",
		"PATH" => ""
	),
	false
	);?>

<div class="section">


