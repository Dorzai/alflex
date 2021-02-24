@extends('layouts.app')

@section('content')
    All users:
    <br/>

    @foreach($allUsers as $user)
        - {{ $user->first_name . ' ' . $user->last_name }} <br/>
    @endforeach

@endsection
