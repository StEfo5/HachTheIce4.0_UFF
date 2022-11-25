@extends('layouts.app')

@section('content')
    <form action="profile/update" method="POST">
        @csrf
        Команда
        <input type="text" name="team" value="{{$user->team}}">
        Регион
        <input type="text" name="region" value="{{$user->region}}">
        Telegram ID:
        CEO
        <input type="text" name="ceo_id" value="{{$user->ceo_id}}">
        CDO
        <input type="text" name="cdo_id" value="{{$user->cdo_id}}">
        CTO
        <input type="text" name="cto_id" value="{{$user->cto_id}}">
        <button>Обновить</button>
    </form>
    Запустите нашего телеграм-бота: <a href="http://t.me/LeanEvent_bot">http://t.me/LeanEvent_bot</a>
@endsection