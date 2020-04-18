<!-- Tehtiin kirjautumis file, mihin käyttäjä antaa tiedot sisäänkirjautumista varten -->
<!-- Käyttäjä antaa syöttämäänsä sähköpostia, sekä salasanaansa sisäänkirjatumista varten -->
<header>
  <h1>Kirjaudu sisään</h1>
</header>
<div class="boxLogin">
<form method="post">
  <p>
  <h2>Sähköposti</h2> 
  <input type="text" name="givenEmail" placeholder="valid email address" maxlength="40"/>
  </p>
  <p>
    <h2>Salasana</h2>
    <input type="password" name="givenPassword" placeholder="password min 8 chars" maxlength="40"/>
  </p> 
  <div class="btns">
    <button type="submit" name="submitUser" value="Kirjaudu">Kirjaudu</button>
    <button type="reset"  value="Resetoi">Tyhjennä</button>
    <button type="submit" name="submitBack" value="Luovuta">Peruuta</button>
  </div>
</form>
</fieldset>
</div>


  