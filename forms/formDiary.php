<form class="diaryMark"method="post"><div>
        <div>
        <label class="diaryMarkingLabel">Päivämäärä</label><br>
        <input name="givenDate" class="markingTxt" type="date"><br>
        <label class="diaryMarkingLabel">Mitä liikuntaa harrastit tänään?<br></label>
        <input type="text" name ="givenEx" class="markingTxt" access="false">
        </div>
<div>
<label class="diaryMarkingLabel">Liikunnan kesto<br></label>
        <div class="radio-group">
                <div>
            <input name="givenLength" name="givenLength" access="false" id="radEx-0" type="radio" checked="unchecked">
                <label class="diaryMarkingLabel">alle 30 min</label>
                 </div>
        <div>
        <input name="givenLength" access="false" id="radEx-1" type="radio">
        <label for="radEx-1" class="diaryMarkingLabel">30-60 min</label>
        </div>
                  <div>
        <input name="givenLength" access="false" id="radEx-2" type="radio">
        <label for="radEx-2" class="diaryMarkingLabel">yli 60 min</label>
                  </div>
         </div>
    </div>
<div>
<label class="diaryMarkingLabel" >Syke treenin jälkeen<br></label>
<input name="givenPulse" type="text" class="markingTxt" access="false">
</div>
<div class="">
<label class="diaryMarkingLabel">Söitkö terveellisesti tänään? Mitä söit?<br></label>
<input type="text" name="givenMeal" class="markingTxt" access="false">
</div>
<div class="">
<label class="diaryMarkingLabel">Miten nukuit viime yönä? <br></label>
<input type="text" class="markingTxt" name="givenSleep" access="false">
</div>
<div><label class="diaryMarkingLabel">Unen kesto viime yönä<br></label>
<div>
<div>
<input access="false" name="givenSleepLength" type="radio" checked="checked">
<label class="diaryMarkingLabel">alle 5h</label>
</div>
<div><input access="false" name="givenSleepLength" type="radio">
<label class="diaryMarkingLabel">6-8 h</label>
</div>
<div class="formbuilder-radio">
<input access="false" name="givenSleepLength" type="radio">
<label class="diaryMarkingLabel">yli 8h</label>
</div>
</div>
</div>
<button type="submit" name="submitEx" class="btn" value="Tallenna">Tallenna</button>
<button type="submit" name="ResetEx" class="btn" value="Peruuta">Peruuta</button>
</div>
</form>