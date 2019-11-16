@extends('layouts.app')

@section('body')
    <h1>{{ $model->title }}</h1>
    <p class="lead">{{ $model->description }}</p>
    <h2>Your name is {{ $model->name }}</h2>
    @if( $model->isAll )
        <p>You are also all these other names.</p>
        <ul>
            @foreach( $model->names as $name )
                <li>{{ $name }}</li>
            @endforeach
        </ul>
    @endif
    @if( $model->isClone )
        <p>BUT WAIT! You are also a clone. You must find someone else who has completed this quiz (or force someone to do it) and replace 50% of your name with 50% of their name.</p>
    @endif
    <h3 class="mt-4">Credits</h3>
    <p>This quiz is based on the 11 page form made by Brian David Gilbert, and published by <a target="_blank" href="https://www.polygon.com/videos/2019/11/11/20959269/unraveled-kojima-name-generator-death-stranding">Polygon</a>. All credit for initial concept goes to them and their wonderful minds.</p>
    <p>The quiz was developed by <a target="_blank" href="http://www.martinsheeks.com">Martin Sheeks</a>, who is still sometimes a programmer.</p>
@endsection
