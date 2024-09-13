
<?php
    $username = "root";
    $dbname = "searchdb";
    $hostname = "localhost";
    $password = "";

    try{
        $connexionDataBase = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password ,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // Le dernier argument permet de récupérer les érreurs liées à la base de données MySql
    }
    catch(Exception $e){
        echo ("Erreur : $e -> getMessage() ");
    }