@extends('layouts.app')

@section('content')
    <div id="frame">
        <h1> Device data </h1>
        <a href="{{ route('devices.create') }}"> Create device</a> <br><br>

        @if(session()->has('message')) <p> {{ session()->get('message') }} </p> @endif
        @if($user) <p> Showing devices from the same group as {{ $user->first_name }} {{ $user->last_name }}</p> @endif

        @foreach($devices as $device)
            <b> {{ $device->serial_number }} </b> <br>
        @endforeach
        <p> Page {{ $devices->currentPage() }} of {{ $devices->lastPage() }} ({{ $devices->total() }} total records) </p>
    </div>

    <div id="pagination">
        {{ $devices->appends(request()->query())->links() }}
    </div>
@endsection
