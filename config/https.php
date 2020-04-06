<?php
//Jos https ei ole päällä
//If the HTTPS is not found to be "on"
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{   
    //Kerro selaimelle, että yhdistää HTPPS URL:iin
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //Estä loppu skriptejä toteutumasta
    //Prevent the rest of the script from executing.
    exit;
}
?>