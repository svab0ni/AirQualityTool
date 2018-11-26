@extends('layouts.app')

@section('content')
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalLogin" id="openLoginModal">Login</button>
    @if($user = Auth::user())
        <form action="/logout">
            <button type="submit">Logout</button>
        </form>
    @endif
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalNewsletter" id="openNewsletterModal">Newsletter</button>
@stop

