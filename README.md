# 2exBitrix-New

![alt text](image-1.png)

Устанавливаем материалы в папку local/templates
Меняем шаблон в настройках сайта

В bitrix/.settings.php меняем в exception_handling debug на true

В настройках главного модуля настраиваем журнал событий
![alt text](image-2.png)


![alt text](image-3.png)

в шаблоне в <head>
<meta name="ex2_meta" content="<?=$APPLICATION->ShowProperty('ex2_meta'); ?>" />

и создаем свойство страницы в настройках модуля Управление структурой
![alt text](image-4.png)

![alt text](image-5.png)

