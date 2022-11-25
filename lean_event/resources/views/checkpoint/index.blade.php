<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkpoints</title>
</head>
<body>
    Чекпоинты
    @foreach ($checkpoints as $item)
        <form action="checkpoint/{{$item->id}}" method="GET">
            {{$item->name}} - {{$item->description}} - {{$item->time}} - {{$item->performance_time}}min
            <button>Перейти</button><br>
        </form>
    @endforeach
    @if (Auth::user()->role == 'expert')
        Новый чекпоинт
        <form action="checkpoint/create" method="GET">
            Название
            <input type="text" name="name"><br>
            Описание
            <textarea name="description" id="" cols="30" rows="10"></textarea><br>
            Для
            <select name="role" id="">
                <option value="designer">Designer</option>
                <option value="developer">Developer</option>
                <option value="manager">Manager</option>
            </select><br>
            Начало
            <input type="datetime-local" name="time"><br>
            Время выступления команд в минутах
            <input type="number" name="performance_time"><br>
            <button>
                Создать
            </button>
        </form>
    @endif
</body>
</html>