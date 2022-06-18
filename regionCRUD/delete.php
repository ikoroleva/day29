<?php 
require_once 'DB.php';
require_once 'Region.php';



$id = $_GET['id'] ?? null;

if ($id) {
    //editing existing record
    DB::connect('127.0.0.1', 'world', 'root', '');
    $region = Region::getById($id);
    if ($region === false) {
        echo 'Region with id ' . $id . ' not found.';
        exit();
    }
    $region->delete();
}

header('Location: index.php');