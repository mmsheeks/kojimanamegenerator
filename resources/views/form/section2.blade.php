<form method="post" action="{{ route('formStepTwo' ) }}" class="mb-4">
    {{ csrf_field() }}
    <h2>Section 2: Personal Information</h2>
    <p>Kojima's characters have names that are directly related to their own character traits. This information will make sure your name fits your personality.</p>
    <div class="form-group">
        <label>What is your full name?</label>
        <input type="text" name="2_1" class="form-control" required>
    </div>
    <div class="form-group">
        <label>What do you do at your occupation? (in one word)</label>
        <input class="form-control" type="text" name="2_2" required>
    </div>
    <div class="form-group">
        <label>What was your first pet's specific species/breed? If you never had a pet, please answer with an animal you wish you owned.</label>
        <input class="form-control" type="text" name="2_3" required>
    </div>
    <div class="form-group">
        <label>What's your most embarrassing childhood memory? Think of something specific, then condense the story into two words.</label>
        <input class="form-control" type="text" name="2_4" required>
    </div>
    <div class="form-group">
        <label>What is the object you'd least like to be stabbed by?</label>
        <input class="form-control" type="text" name="2_5" required>
    </div>
    <div class="form-group">
        <label>What is something you are good at? (Verb ending in -ing)</label>
        <input class="form-control" type="text" name="2_6" required>
    </div>
    <div class="form-group">
        <label>How many carrots do you believe you could eat in one sitting, if someone, like, forced you to eat as many carrots as possible?</label>
        <input class="form-control" type="text" name="2_7" required>
    </div>
    <div class="form-group">
        <label>What is your greatest intangible fear? (e.g. death, loneliness, fear itself)</label>
        <input class="form-control" type="text" name="2_8" required>
    </div>
    <div class="form-group">
        <label>What is your greatest tangible fear? (e.g. horses)</label>
        <input class="form-control" type="text" name="2_9" required>
    </div>
    <div class="form-group">
        <label>What is the last thing you did before starting this form?</label>
        <input class="form-control" type="text" name="2_10" required>
    </div>
    <div class="form-group">
        <label>What condition is your body currently in? (single word answer)</label>
        <input class="form-control" type="text" name="2_11" required>
    </div>
    <div class="form-group">
        <label>Favorite state of matter?</label>
        <input class="form-control" type="text" name="2_12" required>
    </div>
    <div class="form-group">
        <label>A word your name kind of sounds like? (e.g. Brian -> Brain)</label>
        <input class="form-control" type="text" name="2_13" required>
    </div>
    <div class="form-group">
        <label>What is your Zodiac sign?</label>
        <input class="form-control" type="text" name="2_14" required>
    </div>
    <div class="form-group clearfix">
        <label>If you had to define your personality in one word, what would it be?</label>
        <input class="form-control" type="text" name="2_15" required>
    </div>
    <div class="mr-auto">
        <button type="submit" class="btn btn-light">Next</button>
    </div>
</form>
