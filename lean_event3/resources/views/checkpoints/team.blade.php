@extends('layouts.app')

@section('content')
    {{$team}} <br>
    <form action="{{$team_id}}/expertise" method="POST">
        @csrf
        @foreach ($criterias as $item)
            {{$item->name}}
            @php
                $options = DB::table('options')
                    ->where('criteria_id', $item->id)
                    ->get();
            @endphp
            @foreach ($options as $item2)
                <input type="radio" name="{{$item->id}}" value="{{$item2->score}}">{{$item2->name}}
            @endforeach
            <br>
        @endforeach
        <textarea name="comment" id="" cols="30" rows="10"></textarea>
        <button>Оценить</button>
    </form>
@endsection