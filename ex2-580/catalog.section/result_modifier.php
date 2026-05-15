<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as $key => $arItem)
{
	$arItem['PRICES']['PRICE']['PRINT_VALUE'] = number_format((float)$arItem['PRICES']['PRICE']['PRINT_VALUE'], 0, '.', ' ');
	$arItem['PRICES']['PRICE']['PRINT_VALUE'] .= ' '.$arItem['PROPERTIES']['PRICECURRENCY']['VALUE_ENUM'];

	$arResult['ITEMS'][$key] = $arItem;

	if(CModule::IncludeModule("iblock"))
	{
		$feedbackItems = CIBlockElement::GetList(Array("SORT"=>"ASC"), array('PROPERTY_PRODUCT'=>$arItem["ID"], "IBLOCK_ID"=>5), false,  false, array("ID", "PROPERTY_PRODUCT", "PROPERTY_AUTHOR"));
		$reviewId = 0;
		while($arFeedback = $feedbackItems->GetNext())
		{
			$reviewId += 1;
			$res = CUser::GetUserGroupList($arFeedback["PROPERTY_AUTHOR_VALUE"]);
			$userGroups = array();
			while ($arGroup = $res->Fetch()){
				$userGroups[] = $arGroup["GROUP_ID"];
			}
			if (in_array(6, $userGroups)) {
				$rsUser = CUser::GetByID($arFeedback["PROPERTY_AUTHOR_VALUE"]);
				$arUser = $rsUser->Fetch();
				if ($arUser['UF_AUTHOR_STATUS'] == 35) {
					$arResult['ITEMS'][$key]['FEEDBACK'][$reviewId] = $arFeedback["ID"];
				}
			}
		}
		$metaProp = $APPLICATION->GetPageProperty("ex2_meta");
		$metaProp = str_replace("#count#", $reviewId, $metaProp);
		$APPLICATION->SetPageProperty("ex2_meta", $metaProp);
	}
}
