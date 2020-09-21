@extends('layout.layout')

@section('content')
            <h1>Showing  {{ $User->name }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>name:</strong> {{ $User->name }}<br>
            <strong>email:</strong> {{ $User->email }}<br>
            <strong>phone:</strong> {{ $User->phone }}<br>
            <strong>image:</strong> {{ $User->image }}<br>
        </p>
    </div>
@endsection