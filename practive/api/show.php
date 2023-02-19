<?php include_once "base.php";
$s = $Movie->find($_GET['id']);
$s['sh'] = ($s['sh']+1)%2;
$Movie->save($s);