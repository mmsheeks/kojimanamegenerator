<form method="post" action="{{ route('formStepFive' ) }}" class="mb-4">
    {{ csrf_field() }}
    <h2>Section 5: Determining Your Name Category</h2>
    <p>Kojima names fall into a finite number of categories. This section will determine the category in which your name belongs.</p>
    <div class="form-group">
        <h3>Determine your category!</h3>
        <button class="diceroller btn btn-light" data-die="20" data-callback="categoryCallback">Roll a d20</button>
        <p id="categoryTarget"></p>
        <input type="hidden" id="categoryInput" name="5_1">
    </div>
    <button type="submit" class="btn btn-light">Next</button>
</form>
<script>
    function categoryCallback( result ) {
        $("#categoryInput").val( result );
        switch( result ) {
            case 1:
                $("#categoryTarget").html("You have a NORMAL NAME.");
                break;
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                $("#categoryTarget").html("You have an OCCUPATIONAL NAME.");
                break;
            case 7:
            case 8:
            case 9:
            case 10:
                $("#categoryTarget").html("You have a HORNY NAME.");
                break;
            case 11:
            case 12:
            case 13:
                $("#categoryTarget").html("You have a THE NAME.");
                break;
            case 14:
            case 15:
            case 16:
            case 17:
                $("#categoryTarget").html("You have a COOL NAME.");
                break;
            case 18:
            case 19:
                $("#categoryTarget").html("You have a VIOLENT NAME.");
                break;
            case 20:
                $("#categoryTarget").html("You have a NAME THAT LACKS SUBTEXT");
                break;
        }
    }
</script>
