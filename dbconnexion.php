<?php
    try{
        $pdo=new PDO('mysql: host=localhost;dbname=crud','root','');
    }
    catch(PDOException $e){
        die("Connection failed". $e->getMessage());
    }
?>