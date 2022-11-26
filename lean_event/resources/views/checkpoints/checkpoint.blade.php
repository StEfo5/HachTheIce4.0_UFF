@extends('layouts.app')

@section('content')
    Выступления команд <br>
    @foreach ($performances as $item)
        <a href="
            @if(Auth::user()->role>0)
                {{$checkpoint_id}}/team/{{$item->team_id}}
            @endif
        ">{{DB::table('users')->where('id', $item->team_id)->value('name')}}</a>- {{$item->start}} - {{$item->readiness}} - {{$item->score}} - {{$item->comment}}
        <br>
    @endforeach
    Критерии <br>
    @foreach ($criterias as $item)
        {{$item->name}}:
        @php
            $options = DB::table('options')
                ->where('criteria_id', $item->id)
                ->get();
        @endphp
        @if (count($options)==0)
            Нет вариантов
        @else
            @foreach ($options as $item2)
                {{$item2->name}} - {{$item2->score}}, 
            @endforeach
        @endif
        <form action="{{$checkpoint_id}}/criteria/{{$item->id}}" method="POST">
            @csrf
            <input type="text" name="name">
            <input type="number" name="score">
            <button>Добавить вариант</button>
        </form>
    @endforeach <br>
    @if (Auth::user()->role>0)
        Создать критерий:
        <form action="{{$checkpoint_id}}/criteria/create" method="POST">
            @csrf
            <input type="text" name="name">
            <button>Создать</button>
        </form>

        @if (!$ended)
        <form action="{{$checkpoint_id}}/end" method="GET">
            <button>Завершить чекпоинт</button>
        </form>    
        @endif
        <form action="{{$checkpoint_id}}/notification" method="GET">
            <button>Оповестить всех о чекпоинте</button>
        </form>
    @endif
@endsection