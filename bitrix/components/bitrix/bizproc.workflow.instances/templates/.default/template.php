<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!empty($_REQUEST['action_button_'.$arResult["GRID_ID"]]))
{
	//@TODO remake
	unset($_REQUEST['bxajaxid'], $_REQUEST['AJAX_CALL']);
}

if (strlen($arResult["FatalErrorMessage"]) > 0)
{
	?>
	<div class="bp-errortext">
		<?= $arResult["FatalErrorMessage"] ?>
	</div>
	<?
}
else
{
	?>
	<div class="bp-interface-toolbar-container">
		<div class="bp-interface-toolbar">
			<table cellpadding="0" cellspacing="0" border="0" class="" style="width: 100%;">
				<tbody>
				<tr>
					<td>
						<table cellpadding="0" cellspacing="0" border="0">
							<tbody>
							<tr>
								<?foreach ($arResult['DOCUMENT_TYPES'] as $uid => $dt):?>
									<td>
										<a href="<?=$APPLICATION->GetCurPage().($uid!='*'?'?type='.$uid:'')?>" hidefocus="true" class="bp-context-button <?=!empty($dt['ACTIVE'])?'active':''?>">
											<span class="bp-context-button-text"><?=htmlspecialcharsbx($dt['NAME'])?></span>
										</a>
									</td>
								<?endforeach;?>
							</tr>
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
	<?

	if (strlen($arResult["ErrorMessage"]) > 0)
	{
		?>
		<div class="bp-errortext">
			<p><?= $arResult["ErrorMessage"] ?></p>
		</div>
		<?
	}

	$navString = '';
	$nextNavString = $prevNavString = $innerNavString = '';
	if($arResult['CURRENT_PAGE'] > 1)
	{
		$prevNavString = '<a href="' . $APPLICATION->getCurPageParam('pageNumber=' . ($arResult['CURRENT_PAGE'] - 1), array('pageNumber')) . '">' . GetMessage('BPWIT_PREV') . '</a>';
	}
	if($arResult['SHOW_NEXT_PAGE'])
	{
		$nextNavString = '<a href="' . $APPLICATION->getCurPageParam('pageNumber=' . ($arResult['CURRENT_PAGE'] + 1), array('pageNumber')) . '">' . GetMessage('BPWIT_NEXT') . '</a>';
	}
	if($arResult['CURRENT_PAGE'] > 1)
	{
		for($i = $arResult['CURRENT_PAGE'] - 2; $i < $arResult['CURRENT_PAGE']; $i++)
			if($i > 0)
				$innerNavString .= '<a href="' . $APPLICATION->getCurPageParam('pageNumber=' . $i, array('pageNumber')) . '">' . $i . '</a>&nbsp;';

		if($arResult['CURRENT_PAGE'] > 3)
			$innerNavString = '<a href="' . $APPLICATION->getCurPageParam('pageNumber=1', array('pageNumber')) . '">' . 1 . '</a>...&nbsp;' . $innerNavString;
	}
	if($prevNavString || $nextNavString)
	{
		$navString = GetMessage('BPWIT_PAGES') . ": {$prevNavString} {$innerNavString} <span>{$arResult['CURRENT_PAGE']}</span> {$nextNavString}";
	}

	$gridParams = array(
		"GRID_ID"=>$arResult["GRID_ID"],
		"HEADERS"=>$arResult["HEADERS"],
		"SORT"=>$arResult["SORT"],
		"ROWS"=>$arResult["RECORDS"],
		"FOOTER"=> array(
			array("title"=>GetMessage("BPWIT_TOTAL"), "value"=>$arResult["ROWS_COUNT"]),
			array('custom_html' => '<td>' . $navString . '</td>'),
		),
		"AJAX_MODE"=>"Y",
		"AJAX_OPTION_JUMP"=>"Y",
		"FILTER"=>$arResult["FILTER"],
		"FILTER_PRESETS" => $arResult['FILTER_PRESETS'],
		'ERROR_MESSAGES' => $arResult['ERRORS']
	);

	$gridParams['EDITABLE'] = true;
	$gridParams['ACTIONS'] = array(
		'delete' => true,
	);

	$APPLICATION->IncludeComponent(
		'bitrix:bizproc.interface.grid',
		"",
		$gridParams,
		$component
	);
}