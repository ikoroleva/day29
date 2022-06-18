<?php

require_once 'DB.php';
require_once 'Region.php';

DB::connect(
    '127.0.0.1',
    'world', // db name
    'root', //username
    '' //password
);


$data = Region::getAll();

//header('Content-type: application/json');
//echo json_encode($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Region page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Regions List</h1>
<div class="list_act_container">
<a href="edit.php" class="add">
    <span class="add_img"></span>
    <p>Add a new region</p>
</a>
</div>

<table class="table">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Slug</th>
        <th></th>
    </tr>

<?php foreach($data as $key => $value) :?>
    <tr>
        <td><?php echo $value->id?></td>
        <td><?php echo $value->name?></td>
        <td><?php echo $value->slug?></td>
        <td>
        <div class="act_container">
            <a class="edit" href="<?php echo 'edit.php?id='.$value->id?>">
                <span class="edit_img"></span>
            </a>
            <a class="delete" href="<?php echo 'delete.php?id='.$value->id?>">
                <span class="delete_img"></span>
            </a>
        </div>
    
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>