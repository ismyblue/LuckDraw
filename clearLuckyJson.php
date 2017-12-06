<?php
/**
 * Created by PhpStorm.
 * User: 11413
 * Date: 2017/12/6
 * Time: 21:08
 */

if($_POST["clear"] == "clear")
    file_put_contents("json/lucky.json","");
header("Location: info.php");
?>