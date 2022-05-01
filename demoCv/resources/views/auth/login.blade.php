<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/lightCv/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightCv/main.css')}}">
    <title>رزومه ساز</title>
</head>
<body>
    <div class="container">
        <img src="{{asset('intro.svg')}}" class="intro-img">
        <div class="intro-content">
            <div class="intro">
                <h1>رزومه ساز</h1>
                <p>رزومه ساز رایگان و حرفه ای</p>
            </div>
            <div class="tabs">
                <p class="tablinks active-tab" onclick="openTab(event, 'login')">ورود</p>
                <p class="tablinks" onclick="openTab(event, 'register')">ثبت نام</p>
            </div>
            <div id="login" class="tabcontent form-container active-tab">
                <form method="POST" action="{{ route('login') }}" class="form-login">
                    @csrf
                    <input type="email" name="email" id="" placeholder="آدرس ایمیل">
                    <input type="password" name="password" id="" placeholder="رمز عبور">
                    <input type="submit" value="ورود">
                    <input type="checkbox" name="remember" id="remember" style="display: none;">
                </form>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('رمز عبور را فراموش کرده اید؟') }}
                    </a>
                @endif
                {{-- <a href="">رمز عبور را فراموش کرده اید؟</a> --}}
            </div>
            <div id="register" class="tabcontent form-container">
                <form action="{{ route('register') }}" method="POST" class="signup-form">
                    <input type="text" name="name" placeholder="نام">
                    <input type="email" name="email" placeholder="ایمیل">
                    <input type="password" name="password" placeholder="رمز عبور">
                    <input type="password" name="password_confirmation" placeholder="تکرار رمز عبور">
                    <input type="submit" value="ثبت نام" class="btn-primary">
                </form>
            </div>
        </div>
    </div>
    <script>
        function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active-tab", "");
        }
        document.getElementById(tabName).style.display = "flex";
        evt.currentTarget.className += " active-tab";
        }
    </script>
</body>
</html>
