<form method="post" action="{{ route('formStepFour' ) }}" class="mb-4">
    {{ csrf_field() }}
    <h2>Section 4: Determining Your Name Conditions</h2>
    <p>Sometimes, a character will have a pot-based condition that affects their name. You, too, might have a condition that affects your name.</p>
    <div class="form-group">
        <h3>THE -MAN CONDITION</h3>
        <button class="diceroller btn btn-light" data-die="4" data-callback="manConditionCallback">Roll a d4</button>
        <p id="manConditionTarget"></p>
        <input type="hidden" id="manConditionInput" name="4_1">
    </div>
    <div class="form-group">
        <h3>THE CONDITION CONDITION</h3>
        <button class="diceroller btn btn-light" data-die="8" data-callback="conditionConditionCallback">Roll a d8</button>
        <p id="conditionConditionTarget"></p>
        <input type="hidden" id="conditionConditionInput" name="4_2">
    </div>
    <div class="form-group">
        <h3>THE CLONE CONDITION</h3>
        <button class="diceroller btn btn-light" data-die="12" data-callback="cloneConditionCallback">Roll a d12</button>
        <p id="cloneConditionTarget"></p>
        <input type="hidden" id="cloneConditionInput" name="4_3">
    </div>
    <div class="form-group">
        <h3>THE KOJIMA CONDITION</h3>
        <button class="diceroller btn btn-light" data-die="100" data-callback="kojimaConditionCallback">Roll a d100</button>
        <p id="kojimaConditionTarget"></p>
        <input type="hidden" id="kojimaConditionInput" name="4_4">
    </div>
    <button type="submit" class="btn btn-light" id="submit" disabled>Next</button>
</form>
<script>
    function manConditionCallback( result ) {
        $("#manConditionInput").val( result );
        if( result < 4 ) {
            $("#manConditionTarget").html('You do not have this condition.');
        } else {
            $("#manConditionTarget").html("You have this condition. Your last name will include the suffix -man. If your name already has -man at the end of it, I guess you're just going to have -manman at the end of your name.");
        }
    }

    function conditionConditionCallback( result ) {
        $("#conditionConditionInput").val( result );
        if( result < 6 ) {
            $("#conditionConditionTarget").html("You do not have this condition.");
        } else if ( result == 6 ) {
            $("#conditionConditionTarget").html("You're big. Your name must have 'Big' at the beginning of it.");
        } else if ( result == 7 ) {
            $("#conditionConditionTarget").html("You are older than you once were. Your name must have 'Old' at the beginning of it.");
        } else if ( result == 8 ) {
            $("#conditionConditionTarget").html("You are how you currently are. We'll add your answer from Section 2, Number 11 to the beginning of your name.");
        }
    }

    function cloneConditionCallback( result ) {
        $("#cloneConditionInput").val( result );
        if( result < 12 ) {
            $("#cloneConditionTarget").html("You do not have this condition.");
        } else {
            $("#cloneConditionTarget").html("You are a clone of someone else, or you have been brainwashed into becoming a mental doppelganger of someone else. Find someone who has completed this already and replace 50% of your Kojima name with 50% of their Kojima name.");
        }
    }

    function kojimaConditionCallback( result ) {
        $("#kojimaConditionInput").val( result );
        if( result == 69 ) {
            $("#kojimaConditionTarget").html("Oh no. You are Hideo Kojima. Hideo Kojima created you and is also you. You are the man who created himself and there is nothing you can do about it. You're in Kojima's world - your world - and that's just the breaks, pal. Stop this application now. You're Hideo Kojima. Go do the things that Hideo Kojima does.");
        } else {
            $("#kojimaConditionTarget").html("You do not have this condition.");
            $("#submit").attr('disabled',false);
        }
    }
</script>
