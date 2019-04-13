<?php
	
if (isset($_GET["ID"])) {
    $ID = (int) $_GET["ID"];
    $all = file_get_contents('datapesan.json');
    $all = json_decode($all, true);
    $jsonfile = $all["data"];
    $jsonfile = $jsonfile[$ID];
    if ($jsonfile) {
        unset($all["data"][$ID]);
        $all["data"] = array_values($all["data"]);
        file_put_contents("datapesan.json", json_encode($all));
    }
    header("Location: index.php");
}