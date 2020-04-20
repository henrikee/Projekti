<?php
//Lisätään navigaatio sekä https+konfigurointi tiedostoon
//including navigation and https+configuration to the file
include("includes/navMain.php");
include("includes/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@500&family=Gotu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <!-- Valmis ikoni (w3 school) -->
    <!-- Ready to use icon (w3 school) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Document</title>
</head>
<body>
    <span id="date"></span>
    <header>
        <h1>Mukava nähdä sinua<?php echo("<p> " .$_SESSION['suserName']. "!</p>");?></h1>
    </header>
    <section>
        <div class="card">
            <h3>Päiväkirja aktiivisuuden seurantaan.</h3>
            <p>nönnönnööö</p>
            <a class="button" href="diary.php">Näe lisää...</a>
        </div>
        <div class="card">
            <h3>Ideoita liikkumiseen ja harjoitteluun.</h3>
            <p>setit tähä</p>
            <a class="button" href="exersice.php">Näe lisää...</a>
        </div>
        <div class="card">
            <h3>Aktiivinen seniori on terve seniori, mutta miksi?</h3>
            <p>päläpäläpälä</p>
            <a class="button" href="info.php">Näe lisää...</a>
        </div>
    </section>

<script>
    var date = new Date();
    //getting and displaying current date on page
    document.getElementById("date").innerHTML = "Tänään on "+date.getDate()+'.'+(date.getMonth()+1)+'.'+date.getFullYear();
</script>
</body>

</html>