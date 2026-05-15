<?
$feedbackItems = CIBlockElement::GetList(Array("SORT"=>"ASC"), array('PROPERTY_PRODUCT'=>$arItem["ID"], "IBLOCK_ID"=>5), false,  false, array("ID", "NAME", "PROPERTY_PRODUCT", "PROPERTY_AUTHOR"), 1);
while($arFeedback = $feedbackItems->GetNext()){
			$APPLICATION->SetPageProperty("first_news", $arFeedback['NAME']);
}

?>