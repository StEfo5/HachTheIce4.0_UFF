@extends('laypouts.app')

@section('content')
    @foreach ($teams as $item)
        {{$item->name}} - {{$item->region}} - {{$item->ceo_score}} - {{$item->cdo_score}} - {{$item->cto_score}} - {{$item->score}}
    @endforeach
@endsection