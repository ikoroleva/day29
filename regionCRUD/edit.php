<?php 
require_once 'DB.php';
require_once 'Region.php';
require_once 'Session.php';
require_once 'helpers.php';


$success_message = Session::instance()->get('success_message');
$errors          = Session::instance()->get('errors', []);

$id = $_GET['id'] ?? null;

if ($id) {
    //editing existing record

    
    DB::connect('127.0.0.1', 'world', 'root', '' );
    $region = Region::getById($id);

    if ($region === false) {
        echo 'Region with id ' . $id . ' not found.';
        exit();
    }

    //error of id doesn't exist 

} else {
    //creating a new record
    $region = new Region;
}

//var_dump($region);
//var_dump($_POST['name']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Region</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php if ($id) : ?>
        <form action="save.php?id=<?= $region->id ?>" method="post">
    <?php else : ?>
        <form action="save.php" method="post">
    <?php endif; ?>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="<?=old('name', $region->name)?>">
        </div>
        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" value="<?=old('slug', $region->slug)?>">
        </div>
   
        <div class="button_container">
        
            <a href="index.php"><button class="back back_button" type="button">Go to list</button></a>
        
            <button class="add submit_button" type="submit">Save</button>
        <!-- <input  class="add submit_button" type="submit" value="Submit"> -->
       
        <?php if(isset($id)): ?>
            <a href="delete.php?id=<?=$region->id?>">
            <button class="delete delete_button" type="button">Delete</button>
        </a>
        <?php endif; ?>
        
        </div>
    </form>
    
    <?php if ($success_message) : ?>
        <div class="message message_success">
            <?= $success_message ?>
        </div>
    <?php endif; ?>

    <?php foreach ($errors as $error) : ?>
        <div class="message message_error">
            <?= $error ?>
        </div>
    <?php endforeach; ?>

    
</body>
</html>