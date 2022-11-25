@extends('layouts.app')

@section('content')
    <form action="profile/update" method="POST">
        @csrf
        Команда
        <input type="text" name="name" value="{{$user->name}}">
        Регион
        <input type="text" name="region" value="{{$user->region}}">
        <button>Обновить</button>
    </form>
@endsection