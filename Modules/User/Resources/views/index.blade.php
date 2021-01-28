@extends('user::layouts.master')

@section('content')
    <h1>user-profile sayfası</h1>
    <div>
        <a href="{{ route('user.card.index') }}">Kartlarım</a>
        <a href="{{ route('user.site.index') }}">Sitelerim</a>
    </div>
@endsection
