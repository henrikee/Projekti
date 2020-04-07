<?php
//Database
//Tietokanta
$user = 'henrikee';        //Käytäjänimi /user
$pass = 'tumppionsexy';        //Salasana /Password
$host = 'mysql.metropolia.fi';  //Tietokantapalvelin / Database server
$dbname = 'henrikee';        //Tietokanta/Database
$added='#â‚¬%&&/';          //Suola/ salt
// Muodostetaan yhteys tietokantaan
// Creating connection to the database
try {    
     //Avataan yhteys tietokantaan ($DBH on nyt  yhteysolio)
     //Opening connection to the database ($DBH is the connectioncreature)
     // $DBH yhteysolio on kahva tietokantaan
     //$DBH  data base handle
    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // virheenkäsittely: virheet aiheuttavat poikkeuksen
    // Errors: they cause abnormalities
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // käytetään  merkistöä utf8
    //utf8 strings used
    $DBH->exec("SET NAMES utf8;");
} catch (PDOException $e) {
    echo "Yhteysvirhe: " . $e->getMessage();
    //Kirjoitetaan mahdollinen virheviesti tiedostoon
    //Writes possible error message in the file
    file_put_contents('log/DBErrors.txt', 'Connection: ' . $e->getMessage() . "\n", FILE_APPEND);
}