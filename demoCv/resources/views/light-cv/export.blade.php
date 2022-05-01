<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/lightCv/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightCv/all.min.css')}}">
    <title>رزومه ساز</title>
</head>
<body>
    <div class="form-box">
        <section class="tab">
            <h1 class="tab-title">
                انتخاب قالب
            </h1>
            <div class="content">
                <div class="templates">

                        <div class="template">
                            <input class="input-hidden" type="radio" name="templates" id="t1">
                            <label for="t1">
                                <img src="{{asset('images/t-1.jpg')}}" alt="">
                                <a href="/template1export/{{$cvId}}"><p class="template-name">قالب شماره 1</p></a>
                            </label>
                        </div>

                    <div class="template">
                        <input class="input-hidden" type="radio" name="templates" id="t2">
                        <label for="t2">
                            <img src="{{asset('images/t-2.jpg')}}" alt="">
                            <p class="template-name">قالب شماره 2</p>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <button type="button" class="btn-primary btn-submit" id="submit">دریافت رزومه</button>
    </div>
    <script src="{{asset('js/lighCv/new-cv.js')}}"></script>
    <script src="{{asset('js/lighCv/mune.js')}}"></script>
</body>
</html>
