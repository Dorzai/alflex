@extends('layouts.app')

@section('content')
    <div id="frame">
        <h1> Create device </h1>
        <!-- Print out the errors if there are any -->
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <br>
        <!-- CSRF Token is created automatically with Laravel Collective -->
        <!-- https://laravelcollective.com/docs/6.x/html under the header CSRF Protection -->
        {!! Form::open(['route' => 'devices.store', 'method' => 'post']) !!}
            {!! Form::label('group', 'Group') !!} <br>
            {!! Form::select('group', $dropdown, old('group')) !!} <br><br>

            {!! Form::label('serial_number', 'Serial number') !!} <br>
            {!! Form::number('serial_number', old('serial_number'), ['placeholder' => 'Serial number...']) !!} <br><br>

            {!! Form::submit('Submit') !!}
        {!! Form::close() !!}
    </div>
@endsection
