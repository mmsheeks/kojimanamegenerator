<form method="post" action="{{ route('formStepThree' ) }}" class="mb-4">
    {{ csrf_field() }}
    <h2>Section 3: Kojima Information</h2>
    <p>Kojima charater names reflect his own idiosyncrasies. He can't help himself.</p>
    <div class="form-group">
        <label>Who is your favorite film character? (NOTE: must be played by Kurt Russell)</label>
        <input type="text" name="3_16" class="form-control" required>
    </div>
    <div class="form-group">
        <label>What is the last word of the title of your favorite Kubrick film?</label>
        <input type="text" name="3_17" class="form-control" required>
    </div>
    <div class="form-group">
        <label>What is the first word in the title of your favorite Joy Division album?</label>
        <input type="text" name="3_18" class="form-control" required>
    </div>
    <div class="form-group">
        <label>What is a scientific term you picked up from listening to NPR once?</label>
        <input type="text" name="3_19" class="form-control" required>
    </div>
    <div class="form-group">
        <label>What is a piece of military hardware you think looks cool even though war is bad?</label>
        <input type="text" name="3_20" class="form-control" required>
    </div>
    <div class="form-group">
        <label>What is something you'd enjoy watching Mads Mikkelsen do? Please condense into one word.</label>
        <input type="text" name="3_21" class="form-control" required>
    </div>
    <div class="mr-auto">
        <button type="submit" class="btn btn-light">Next</button>
    </div>
</form>
