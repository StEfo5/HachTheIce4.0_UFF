<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <form action="profile/role" method="GET">
        @if ($user->role == Null)
            У вас пока нет роли, выберите:
        @else
            Ваша роль {{$user->role}}. Можете поменять:        
        @endif

        <select name="role" id="">
            <option value="designer">
                Designer
            </option>
            <option value="developer">
                Developer
            </option>
            <option value="manager">
                Manager
            </option>
        </select>
        <button>
            Выбрать
        </button>
    </form>
    @if ($user->team_id == Null)
        Вы не состоится в команде.    
    @else
        Вы в команде {{$team_name}} <br>
    @endif
    @if ($user->role == Null)
        Чтобы вступить в команду, укажите роль
    @else
        @if ($user->role=="manager")
            Зарегистрировать новую команду
            <form action="team/create" method="GET">
                Название команды
                <input type="text" name="name">
                <button>Создать</button>
            </form>
        @else
            Выберите команду
            <form action="team/select" method="GET">
                <select name="team_id" id="">
                    @foreach ($teams as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <button>Выбрать</button>
            </form>
        @endif
    @endif
    @if ($user->telegram_id == Null)
        Вы еще не указали свой telegram id.
    @else
        Ваш telegram_id: {{$user->telegram_id}}.
    @endif
    Обновите свой telegram id, узнав его у бота @getmyid_bot: 
    <form action="profile/telegram_id" method="POST">
        @csrf
        <input type="text" name="telegram_id">
        <button>Отправить</button>
    </form>
    Включите нашего бота <a href="http://t.me/LeanEvent_bot">http://t.me/LeanEvent_bot</a>
</body>
</html>