<?php

$db_name = 'mysql:host=localhost;dbname=dm';
$user_name = 'root';
$user_password = '';
try{
    $conn = new PDO($db_name, $user_name, $user_password);

}

catch(Exception $e){
    echo "<script type='text/javascript'>alert('Failed to Establish Connection. Contact Admin: shravanhj@gmail.com');window.location.href='error.php';</script>";
}
?>