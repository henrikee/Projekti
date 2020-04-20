<!-- Lomakkeen otsikot ja niiden tunnukset, jotka yhdistetään kirjautumiskoodeihin -->
<!-- login/createaccount headers and ids that are connected to the registeration codes -->
<form method="post">
    <div class="form">
        <br /><label id="labelUsername" for="givenUsername">Käyttäjätunnus</label>
        <input type="text" name="givenUsername" id="formUsername" maxlength="40" placeholder="Keksi tähän oma käyttäjänimesi." required />
        <br />
        <label id="labelEmail" for="givenEmail">Sähköposti</label>
        <input type="text" name="givenEmail" id="formEmail" maxlength="40" placeholder="Kirjoita tähän sähköpostiosoitteesi." required />
        <br />
        <label id="labelPassword" for="givenPassword">Salasana</label>
        <input type="password" id="formPassword" name="givenPassword" maxlength="40" placeholder="Keksi itsellesi salasana." required /> <br />
        <label id="labelPasswordVerify" for="givenPasswordVerify">Salasana uudestaan</label>
        <input type="password" id="formPasswordVerify" name="givenPasswordVerify" maxlength="40" placeholder="Kirjoita salasana uudestaan." required />
        <br />
        <button type="submit" name="submitUser" class="btn" value="Tallenna">Tallenna</button>
        <button type="reset" class="btn" value="Hylkää muutokset">Hylkää muutokset</button>
    </div>
</form>