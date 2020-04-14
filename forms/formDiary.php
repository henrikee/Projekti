<form method="post"><div>
        <div>
        <label>Päivämäärä tänään</label><br>
        <input type="date"><br>
        <label>Mitä liikuntaa harrastit tänään?<br></label>
        <input type="text" class="form-control" access="false">
        </div>
<div>
<label>Liikunnan kesto<br></label>
        <div class="radio-group">
                <div>
            <input name="radEx" access="false" id="radEx-0" type="radio" checked="unchecked">
                <label>alle 30 min</label>
                 </div>
        <div>
        <input name="radEx" access="false" id="radEx-1" type="radio">
        <label for="radEx-1">30-60 min</label>
        </div>
                  <div>
        <input name="radEx" access="false" id="radEx-2" type="radio">
        <label for="radEx-2">yli 60 min</label>
                  </div>
         </div>
    </div>
<div>
<label >Syke treenin jälkeen<br></label>
<input type="text" class="form-control" access="false">
</div>
<div class="">
<label >Söitkö terveellisesti tänään? Mitä söit?<br></label>
<input type="text" class="form-control" access="false">
</div>
<div class="">
<label>Miten nukuit viime yönä? <br></label>
<input type="text" class="form-control" access="false" >
</div>
<div><label >Unen kesto viime yönä<br></label>
<div>
<div>
<input access="false" name="RadSleep" type="radio" checked="checked">
<label>alle 5h</label>
</div>
<div ><input access="false" name="RadSleep" type="radio">
<label >6-8 h</label>
</div>
<div class="formbuilder-radio">
<input access="false" name="RadSleep" type="radio">
<label >yli 8h</label>
</div>
</div>
</div>
<button type="submit" name="submitEx" class="btn" value="Tallenna">Tallenna</button>
<button type="submit" name="ResetEx" class="btn" value="Peruuta">Peruuta</button>
</div>
</form>