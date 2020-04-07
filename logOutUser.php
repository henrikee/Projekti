<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php"); //Palataan pääsivulle, ei kirjautunut / return to the main page not logged in
?>