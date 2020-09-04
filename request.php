<?php
header("Content-type: application/json");
require 'info.php';

$req = $_GET['req'] ??null;
// $req =true;
if ($req) {
    $jsonData = file_get_contents("info.json");
    $menuitems = json_decode($jsonData, true)['menu_items'];
    try {
        $menuitemlist = new abc($menuitems);
    } catch (Exception $th) {
       echo json_encode([$th->getMessage()]);;
       return;
    }
}
switch ($req) {
    case "dishname":
        echo $menuitemlist->menuitems();
        break;

    case "dishinfo":
        $name = $_GET['name'] ?? null;
        echo $menuitemlist->getdishinfoByname($name);
        break;
    
    default:
        echo json_encode(["In-valid request"]);
        break;
}
?>