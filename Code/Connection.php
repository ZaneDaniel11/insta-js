<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $data_base = 'insta';

    $conn = mysqli_connect($host,$username,$password,$data_base);

    if($conn)
    {
        echo'Connected Succesfully';
    }

?>