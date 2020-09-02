<?php
function dd($param) {
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}
$catalog ='ff/imp/catalog_test1.csv';
$offers = 'ff/imp/offers1_test1.csv';

$fileCatalog = file_get_contents($catalog);
$fileOffers = file_get_contents($offers);

$arCatalog =  mb_convert_encoding($fileCatalog, 'UTF-8','Windows-1251');
$arOffers =  mb_convert_encoding($fileOffers, 'UTF-8','Windows-1251');
echo '<pre>';
//var_dump($p);
echo '</pre>';

$arrayFile = explode(PHP_EOL, $arCatalog); //строки каталога в массив
$arrayOffers = explode(PHP_EOL, $arOffers); //строки офера в массив

$arrayKey = explode(';', array_shift($arrayFile)); //ключи каталога
$arrayKeyOf = explode(';', array_shift($arrayOffers)); //ключи офера

//Подготовка массива каталога
foreach ($arrayFile as $j => $item) {
    $param = explode(';', $item);
    foreach ($param as $i => $value) {
        $resCatalog[$arrayKey[$i]][] = $value;
    }
}

//Подготовка массива офера
foreach ($arrayOffers as $j => $item) {
    $param = explode(';', $item);
    foreach ($param as $i => $value) {
        $resOffers[$arrayKeyOf[$i]][] = $value;
    }
}

//Добавление цены и количества по XML_ID
foreach ($resOffers['XML_ID'] as $key => $value) {
    $k = array_search($value, $resCatalog['XML_ID']);
    $resCatalog['PRICE'][$k] =  ($resOffers['AB6F91A1-69DA-4132-9556-C2565FCD97B4'][$key]);
    $resCatalog['QUANTITY'][$k] =  intval($resOffers['QUANTITY'][$key]);
}
//dd($resCatalog);


 ////Подготовка массивоа вывода
for ($i = 0; $i < count($resCatalog['XML_ID']); $i++) {
    $blok = explode(' ', $resCatalog['NAME'][$i]);
//    dd($blok);
//    echo  .'<br>';
    $result[$i]['BLOCK_X_Y_Z'] = array_pop($blok);
    $result[$i]['PIC'] = $resCatalog['PIC'][$i];
    $result[$i]['SHTRIHKOD'] = $resCatalog['SHTRIHKODSAJT'][$i];
    $result[$i]['NAME'] = $resCatalog['POLNNAIMENOVANIESAJT'][$i];
    $result[$i]['ARTICLE'] = $resCatalog['ARTICLE'][$i];
    $result[$i]['COUNT_FIRST_RANK'] = $resCatalog['KOLICHESTVOVPERVOMRAZRJADE'][$i];
    $result[$i]['NAME_FIRST_RANK'] = $resCatalog['NAIMENOVANIEPERVOGORAZRJADA'][$i];
    $result[$i]['COUNT_SECOND_RANK'] = $resCatalog['KOLICHESTVOVOVTOROMRAZRJADE'][$i];
    $result[$i]['NAME_SECOND_RANK'] = $resCatalog['NAIMENOVANIEVTOROGORAZRJADA'][$i];
    $result[$i]['COUNT_THIRD_RANK'] = $resCatalog['KOLICHESTVOVTRETEMRAZRJADE'][$i];
    $result[$i]['NAME_THIRD_RANK'] = $resCatalog['NAIMENOVANIETRETEGORAZRJADA'][$i];
    $result[$i]['MIN_ORDER'] = $resCatalog['MINIMALNAJATORGEDINICAVOPTENAIMENOVANIE'][$i];
    $result[$i]['COUNT_OPT'] = $resCatalog['KOLVOOPT'][$i];
    $result[$i]['PRICE_SECOND_BLOCK'] = $resCatalog['PRICE'][$i];
    $result[$i]['QUANTITY_FIRST_BLOCK'] = $resCatalog['QUANTITY'][$i];
}
//dd($result);
include_once 'content.php';







