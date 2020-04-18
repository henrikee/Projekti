<?php
include("includes/navMain.php");
include("includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contacts.css">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@500&family=Gotu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Document</title>
</head>
<body>
    <span id="date"></span>
    <header>
        <h1>Yhteystiedot</h1>
    </header>
    <section>
        <h2>Omistajat</h2>
        <div class="persons">
            <div class="boxPerson">
                <h3>Scrum Master</h3>
                <p>vastuualueet:<br><br><br><br><br>p.+358 50 911 1593<br>heinina@metropolia.fi</p>
                <img src="img/heini.jpg" alt="heinii">
            </div>
            <div class="boxPerson">
                <h3>Product Owner</h3>
                <p>vastuualueet:<br><br><br><br><br>p.+358 44 528 8389<br>tuomatur@metropolia.fi</p>
                <img src="img/tumppi.jpg" alt="tumppii">
            </div>
            <div class="boxPerson">
                <h3>Code Master [A L F A]</h3>
                <p>vastuualueet:<br><br><br><br><br>p.+358 40 557 1241<br>henrikee@metropolia.fi</p>
                <img src="img/henkka.jpeg" alt="henkkaa">
            </div>
        <div>
    </section>
    <section>
        <h2>Valmentajat</h2>
        <div class="persons">
            <div class="boxPerson">
                <h3>Fysioterapeutti</h3>
                <p>vastuualueet:<br><br><br><br><br>p.+358 12 345 6789<br>fysioterapia@virtualpt.fi</p>
                <img>
            </div>
            <div class="boxPerson">
                <h3>Liikunnanohjaaja</h3>
                <p>vastuualueet:<br><br><br><br><br>p.+358 98 765 4321<br>liikunta@virtualpt.fi</p>
                <img>
            </div>
            <div class="boxPerson">
                <h3>Ravitsemusterapeutti</h3>
                <p>vastuualueet:<br><br><br><br><br>p.+358 32 132 1321<br>ravitsemus@virtualpt.fi</p>
                <img>
            </div>
        </div>
        <h2>Asiakaspalvelu</h2>
        <div class="persons">
            <div class="boxPerson">
                <h3>aspa</h3>
                <p>vastuualueet:<br><br><br><br><br>p.+358 12 312 3123<br>asiakaspalvelu@virtualpt.fi</p>
                <img>
            </div>
        </div>
    </section>

<script>
    var date = new Date();
    //getting and displaying current date on page
    document.getElementById("date").innerHTML = "Tänään on "+date.getDate()+'.'+(date.getMonth()+1)+'.'+date.getFullYear();
</script>
</body>
</html>