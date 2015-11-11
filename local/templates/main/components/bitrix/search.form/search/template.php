
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);?>
<div class="search">
<form action="<?=$arResult["FORM_ACTION"]?>">
<ul>
			<?if($arParams["USE_SUGGEST"] === "Y"):?><?$APPLICATION->IncludeComponent(
				"bitrix:search.suggest.input",
				"",
				array(
					"NAME" => "q",
					"VALUE" => "",
					"INPUT_SIZE" => 15,
					"DROPDOWN_SIZE" => 10,
				),
				$component, array("HIDE_ICONS" => "Y")
			);?><?else:?>

	<li><input type="text" name="q" value="" size="15" maxlength="50" />

	<li><input name="s" type="submit" value="Поиск" />
		<?endif;?>
</form>
</div>