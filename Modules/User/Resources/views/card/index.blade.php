@extends('user::layouts.master')

@section('content')
    <h1>user.card.index</h1>
    <a href="{{route('user.card.create')}}">Ekle</a>
    <a href="#">Sil</a>
@endsection
