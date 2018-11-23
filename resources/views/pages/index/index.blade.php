@extends('layouts.app')

@section('content')
    @foreach($data as $index => $dataPart)
        {{$index}} <br>
        @foreach($dataPart as $key => $item)
            {{$key}}: &nbsp; {{ $item }} <br>
        @endforeach
    @endforeach
@stop