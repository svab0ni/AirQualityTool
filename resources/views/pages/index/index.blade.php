@extends('layouts.app')

@section('content')
    @foreach($data as $item)
        Air quality index: {{ $item->air_quality_index }} <br>
        Taken at: {{ $item->taken_at }} <br>
        Hazard level: {{ $item->healthHazardLevel->name }} <br><br><br>
    @endforeach
@stop