<?php
/**
 * Created by PhpStorm.
 * User: 11413
 * Date: 2017/12/6
 * Time: 21:08
 */

if($_POST["update"] == "clear") {
    //$luckyString = file_get_contents("json/lucky.json");
    //$luckyArray = json_decode($luckyString,true);
    $confString = file_get_contents("json/conf.json");
    $confArray = json_decode($confString,true);
    $luckySet = $confArray["luckySet"];
    $luckyArray = array();
    $luckyArray["result"] = array();
    for($i = 0 ;$i < count($luckySet);$i++){
        $luckyArray["result"][$i]["luckyName"] = $luckySet[$i]["luckyName"];
        $luckyArray["result"][$i]["id"] = array();
    }
    file_put_contents("json/lucky.json", json_encode($luckyArray));
    $url="info.php";
    echo "<script LANGUAGE='Javascript'>";
    echo "location.href='$url'";
    echo "</script>";

}
elseif ($_POST["update"] == "add"){
    $luckyString = file_get_contents("json/lucky.json");
    $luckyArray = json_decode($luckyString,true);
    $checkIndex = $_POST["checkIndex"];
    $number = $_POST["number"];
    array_push($luckyArray["result"][$checkIndex]["id"],$number);
    file_put_contents("json/lucky.json",json_encode($luckyArray));

    $url="index.php";
    echo "<script LANGUAGE='Javascript'>";
    echo "location.href='$url'";
    echo "</script>";
}

?>