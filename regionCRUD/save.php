<?php 
require_once 'DB.php';
require_once 'Region.php';
require_once 'Session.php';

DB::connect(
    '127.0.0.1',
    'world', // db name
    'root', //username
    '' //password
);

$id = $_GET['id'] ?? null;

if ($id) {
    //editing existing record
    $region = Region::getById($id);
} else {
    //creating a new record
    $region = new Region;
}

$valid = true; //everithing is ok
$errors = []; //error messages

if (empty($_POST['name'])) {
    $valid = false;
    $errors [] = 'The name of the region is mandatory';
}

if(!$valid) {
    Session::instance()->flash('errors', $errors);
    Session::instance()->flashRequest();

//redirect back
if($id) {
    header('Location: edit.php?id=' .$id);
} else {
    header('Location: edit.php');
}

exit(); // stop execution of script

}


$region->name = $_POST['name'] ?? $region->name;
$region->slug = $_POST['slug'] ?? $region->slug;
$region->save();

Session::instance()->flash('success_message', 'Region is successfully saved');

var_dump($_POST);
header('Location: edit.php?id=' .$region->id);



//header('Content-type: application/json');
//echo json_encode($region);
//echo json_encode($sahara);

