<?
AddEventHandler("main", "OnBuildGlobalMenu", "MyOnBuildGlobalMenu");
function MyOnBuildGlobalMenu(&$aGlobalMenu, &$aModuleMenu)
{
    global $USER;
    $arGroups = $USER->GetUserGroupArray();
    if (in_array(5, $arGroups)) {
        foreach ($aGlobalMenu as $key => $item) {
            if ($item['menu_id'] != 'content') {
                unset($aGlobalMenu[$key]);
            }
        }
        foreach ($aModuleMenu as $key => $item) {
            if ($item['parent_menu'] != 'global_menu_content') {
                unset($aModuleMenu[$key]);
            }
        }

        $aGlobalMenu['fast'] = array(
            'menu_id' => 'global_menu_fast',
            "text" => "Быстрый доступ",
            "title" => "Быстрый доступ",
            "sort" => 200,
            "items_id" => 'global_menu_fast',
            'items' => Array
                (
                    ['text' => 'Ссылка 1', 'url' => 'https://test1/']
                )
        );
    }

}
?>