@extends('layouts.app')

@section('content')
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalLogin" id="open">Login</button>
    @if($user = Auth::user())
        <form action="/logout">
            <button type="submit">Logout</button>
        </form>
    @endif
@stop

