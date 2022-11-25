@extends('layouts.app')

@section('content')
    Выступления команд <br>
    @foreach ($performances as $item)
        <a href="
            @if(Auth::user()->role>0)
                {{$checkpoint_id}}/{{$item->id}}
            @endif
        ">{{DB::table('users')->where('id', $item->team_id)->value('team')}}</a>- {{$item->start}} - {{$item->readiness}} - {{$item->score}} - {{$item->comment}}
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
                {{$item1->name}} - {{$item->score}} <br>
            @endforeach
        @endif
        <form action="{{$checkpoint_id}}/criteria/{{$item->id}}" method="GET">
            <button>Добавить вариант</button>
        </form>
    @endforeach <br>
    
    Создать критерий:
    <form action="{{$checkpoint_id}}/criteria/create" method="POST">
        @csrf
        <input type="text" name="name">
        <button>Создать</button>
    </form>
@endsection