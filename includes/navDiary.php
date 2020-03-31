<!-- Luodaan nav html johon laitoin linkit, otsikon sekä burgerin(auttaa skaalaamisessa) -->
<nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Virtual PT</label>
        <ul>
            <li><a href="#">Etusivu</a></li>
            <li><a class="active" href="#">Päiväkirja</a></li>
            <li><a href="#">Liikunta</a></li>
            <li><a href="#">Tietopankki</a></li>
            <li><a href="logOutUser.php">Kirjaudu ulos</a></li>
        </ul>
        <?php
        echo("<p>** User: " .$_SESSION['suserName']. " " . $_SESSION['suserEmail']);
        ?>
</nav> 