<fieldset class="healthform"><legend class="healthformfs">Terveystiedot</legend>
    <form method="post">
        <p>
            Sukupuoli:  <input type="radio" name="givenGender" value="mies"> Mies</option>
                        <input type="radio" name="givenGender" value="nainen"> Nainen</option>
                        <input type="radio" name="givenGender" value="muu"> Muu</option><br> 
        </p>
        <p>Ikä: <input type="text" name="givenAge"/></p>
        <p>Pituus (cm): <input type="text" name="givenHeight"/></p>
        <p>Paino (kg): <input type="text" name="givenWeight"/></p>
        <p>Vyötärönympätys (cm): <input type="text" name="givenWaistCircuit"/></p>
        <p>Verenpaine: </p>
        <p>Systolinen (yläpaine) (Hgmm): <input type="text" name="givenSystolic"/></p>
        <p>Diastolinen (alapaine) (Hgmm): <input type="text" name="givenDiastolic"/></p>
        <p><button type="submit" name="submitHealthydata">Hyväksy terveystiedot</button>
            <button type="reset" name="resetHealthydata">Hylkää terveystiedot</button></p>
        </form>
</fieldset>