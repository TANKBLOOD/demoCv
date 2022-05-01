<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/lightCv/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightCv/all.min.css')}}">
    <title>پنل کاربری</title>
</head>
<body>
    <nav class="panel-nav">
        <div class="container-nav">
            <div class="user-info">
                <div class="user">
                    <p>{{$userName}} سلام</p>
                </div>
                <div id="bars-icon">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <ul class="panel-mune">
                <li class="active">رزومه های من</li>
                <li><a href="/createCv">رزومه جدید</a></li>
                <li><a href="/user/profile">تنظیمات</a></li>
                <li><form method="POST" action="http://127.0.0.1:8000/logout">@csrf<button type="submit">خروج</button> </form></li>
            </ul>
        </div>
    </nav>
    <div class="panel-container">
        <div class="tabel">
            <div class="tabel-meta">
                <p>شما  <strong>{{count($cvs)}}</strong> رزومه دارید</p>
                <a href="/createCv">افزودن</a>
            </div>
            <ul>
                @foreach ($cvs as $item)
                <li class="tabel-row">
                    <strong>{{$item->title}}</strong>
                    <span>{{$item->created_at}}</span>
                    <div class="options">
                        <form action="/deleteLightCv" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="cvId" value="{{$item->id}}">
                        <button type="submit"><i class="far fa-trash-alt"></i></button></form>
                        <button><a href="/editCv/{{$item->id}}"><i class="fas fa-edit"></i></a></button>
                        <button><a href="/exportPage/{{$item->id}}"><i class="fas fa-file-download"></i></a></button>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script src="{{asset('js/lighCv/mune.js')}}"></script>
</body>
</html>

