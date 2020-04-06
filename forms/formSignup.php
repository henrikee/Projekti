<!-- Lomakkeen otsikot ja niiden tunnukset, jotka yhdistetään kirjautumiskoodeihin -->
<!-- login/createaccount headers and ids that are connected to the registeration codes -->
<form method="post">
<br/><label id="labelUsername" for="givenUsername">Käyttäjätunnus</label>
<input type="text" name="givenUsername" id="formUsername" maxlength="40" placeholder="keksi tähän oma käyttäjänimesi"/>
<br/>
<label id="labelEmail" for="givenEmail">Sähköposti</label>
<input type="text" name="givenEmail" id="formEmail" maxlength="40" placeholder="tähän sähköpostiosoitteesi"/>
<br/>
<label id="labelPassword" for="givenPassword">Salasana</label>
<input type="password" id="formPassword"  name="givenPassword"  maxlength="40" placeholder="helposti muistettava salasana"/> <br/>
<label id="labelPasswordVerify" for="givenPasswordVerify">Salasana uudestaan</label>
<input type="password" id="formPasswordVerify"name="givenPasswordVerify" maxlength="40" placeholder="Kirjoita salasana uudestaan"/>
<br/>
<input type="submit" name="submitUser" class="btn"value="Tallenna"/>
<input type="reset" class="btn"  value="Syötä tiedot uudestaan"/>
</form>
