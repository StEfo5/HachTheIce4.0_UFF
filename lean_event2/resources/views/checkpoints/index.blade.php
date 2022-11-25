@extends('layouts.app')

@section('content')
    @foreach ($checkpoints as $item)
        {{$item->name}} - {{$item->description}} - {{$item->start}} - {{$item->time}}min - {{$item->role}}
        <form action="checkpoints/{{$item->id}}" method="GET">
            <button>Перейти</button>
        </form> <br>
    @endforeach
    @if (Auth::user()->role>0)
        Добавить чекпоинт<br>
        <form action="checkpoints/create" method="POST">
            @csrf
            Название
            <input type="text" name="name"><br>
            Описание
            <textarea name="description" id="" cols="30" rows="10"></textarea><br>
            Время начала
            <input type="datetime-local" name="start"><br> 
            Регламентированное время выступления каждой команды в минутах
            <input type="number" name="time"><br>
            Для какой роли
            <select name="role" id="">
                <option value="ceo">CEO</option>
                <option value="cdo">CDO</option>
                <option value="cto">CTO</option>
            </select>
            <button>Саздать</button>
        </form>
    @endif
@endsection