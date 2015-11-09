<!doctype html>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <?$APPLICATION->ShowHead()?>
    <title><?$APPLICATION->ShowTitle();?></title>
    <?CJSCore::Init(array("jquery"));?>
    <link rel="stylesheet" type="text/css" href=<?=SITE_TEMPLATE_PATH;?>"/styles.css">
    <script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
   <style> @import url("http://allfont.net/allfont.css?fonts=dited")</style>

</head>
<body link="black" vlink="black">
<?$APPLICATION->ShowPanel();?>

    <div class="header"> <div class="header-img">
		<a href="/"> <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" width="110px" height="110px"></a>
        </div>
        <div class="header-text">
			<a href="/"> <p><strong>TOYS STORE...</strong></p></a>
        </div>

        <div class="header-acount">
            <div class="header-acount-input">

                <ul>
                    <li><img src="<?=SITE_TEMPLATE_PATH?>/images/acount.png" width="25" height="25"></li>
                <?if(CUser::IsAuthorized()):?>
                    <li><strong><a href="/personal"><?=(CUser::GetFirstName())?CUser::GetFirstName():CUser::GetLogin()?></a></strong></li>
					<li><a href="/?logout=yes">Выход</a>
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
		"PATH_TO_BASKET" => "/personal/cart/",
		"PATH_TO_ORDER" => "/personal/order/make/",
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

<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
?><?if ($APPLICATION->GetCurDir()=='/'):?>
<div class="slider">
    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"topslider", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "topslider",
		"DETAIL_URL" => "sales/#ELEMENT_CODE#",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "RECLAMACIYA",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	),
	false
);?>

</div>

    <div class="top">
        <H2> ---ЛИДЕРЫ-ПРОДАЖ---</H2>
</div>
<?endif;?>
<div class="section">
