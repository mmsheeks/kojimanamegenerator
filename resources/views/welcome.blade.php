@extends('layouts.app')

@section('body')
    <h1>What's your Kojima Name?</h1>
    <p class="lead">This is a name generator based on the work of <a href="https://www.polygon.com/videos/2019/11/11/20959269/unraveled-kojima-name-generator-death-stranding" target="_blank">Brian David Gilbert at Polygon</a>. All credit for the initial idea and the worksheet this is based off of goes to them.</p>
    {{ csrf_field() }}
    <h2>Section 1: Determining How Many Names You have</h2>
    <p>Kojima often creates characters that have many alternate names, so we must first figure out how many names you will have.</p>
    <div class="form-group">
        <label><button class="diceroller btn btn-light" data-die="6" data-callback="numberOfNames">Roll a D6</button></label>
        <p id="numberOfNames"></p>
        <input type="hidden" id="numberOfNamesField" name="numberOfNames">
        <input id="sectionOneUrl" type="hidden" value="{{ route('formStepOne') }}">
    </div>
    <div id="formStepTwo">
    </div>
    <script>
        function numberOfNames( roll ) {
            if( roll < 6 ) {
                $("#numberOfNames").html('You have 1 name.');
            } else {
                $("#numberOfNames").html('You have 1 name + 6 other alternate names.');
            }
            $.ajax({
                url: $("#sectionOneUrl").val(),
                data: { 'roll': roll, _token: $("input[name='_token']").val() },
                type: 'post',
                success: function( data ) {
                    $("#formStepTwo").html(data.html);
                }
            })
        }
    </script>
@endsection
