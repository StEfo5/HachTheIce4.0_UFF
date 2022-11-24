<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event</title>
</head>
<body>
    <h1>
        Нынешние мероприятия
    </h1>
    @foreach ($events as $item)
        <form action="/event/{{$item->id}}" method="POST">
            @csrf
            <h2>
                {{$item->name}}    
            </h2>    
            <p>
                {{$item->description}}
            </p>
            <button>
                Перейти
            </button>
        </form>
    @endforeach
    <h1>
        Новое мероприятие
    </h1>
    <form action="/event/create" method="POST">
        @csrf
        <input type="text" name="name">
        <textarea type="text" name="description"></textarea>
        <button>
            Создать
        </button>
    </form>
</body>
</html>