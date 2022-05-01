<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قالب رزومه شماره یک</title>

    <style>
        @font-face {
        font-family: aria;
        src: url("{{asset('css/templates/template_1/Far_Aria.ttf')}}");
        }
         * {
    font-family: Shabnam;
    text-align: right;
}

body {
    direction: rtl;
}

a {
    display: block;
    text-decoration: none;
}
.container {
    width: 70%;
    margin: 15px auto;
    display: flex;
    justify-content: space-around;
}

aside {
    width: 25%;
    display: flex;
    flex-direction: column;
}

.profile-img {
    width: 200px;
    height: 200px;
    align-self: center;
}

.card {
    display: flex;
    flex-direction: column;
    margin: 15px 0;
}

.card-header {
    border-bottom: 1px solid black;
    margin-bottom: 10px;
}

.card-header h2 {
    font-size: 1.3rem;
    font-weight: normal;
    margin: 0;
    margin-bottom: 5px;
}

.row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.row span {
    margin: 4px;
}
.card-content a {
    margin-bottom: 10px;
}

.bars {
    display: flex;
}

.bar {
    background-color: #D9D9D9;
    width: 14px;
    height: 14px;
    border-radius: 50%;
}

span.bar {
    margin: 0 2px;
}

.green {
    background-color: #5AD47A;
}

main {
    width: 65%;
}
.intro {
    margin-bottom: 30px;
}
h1 {
    margin: 0;
    margin-bottom: 6px;
}

.job {
    font-size: 1.2rem;
}

.value {
    font-weight: bold;
}

.text-area {
    line-height: 2;
    margin: 0;
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 15px;
}

table td, table th {
    border: 1px solid #ddd;
    padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
padding-top: 12px;
padding-bottom: 12px;
}

.box {
    margin-bottom: 20px;
}

.read-more {
    font-size: 0.9rem;
}
    </style>
</head>
<body>
    <div class="container">
        <aside>
            {{-- <img class="profile-img" src="profile.jpg" alt=""> --}}
            <div class="card">
                <div class="card-header">
                    <h2>اطلاعات تماس</h2>
                </div>
                <div class="card-content">
                    <div class="row">
                        <span>{{$lightCv->personalInfo->city}}</span>
                    </div>
                    <div class="row">
                        <span>{{$lightCv->personalInfo->phone_number}}</span>
                    </div>
                    <div class="row">
                        <span>{{$lightCv->personalInfo->email}}</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>اطلاعات فردی</h2>
                </div>
                <div class="card-content">
                    <div class="row">
                        <span>تاریخ تولد</span>
                        <span>{{$lightCv->personalInfo->birth_date}}</span>
                    </div>
                    <div class="row">
                        <span>جنسیت</span>
                        <span>{{$lightCv->personalInfo->gender}}</span>
                    </div>
                    <div class="row">
                        <span>وضیعت تاهل</span>
                        <span>{{$lightCv->personalInfo->marital_status}}</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>مهارت های تجربی</h2>
                </div>
                <div class="card-content">
                    @foreach ($lightCv->skill->expSkills as $item)
                    <div class="row">
                        <span class="name">{{$item->name}}</span>
                        <div class="bars">
                            @for ($i=1; $i<= 5; $i++)
                                @if ($i<= $item->level )
                                <span class="bar green"></span>
                                @else
                                <span class="bar"></span>
                                @endif
                            @endfor
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>لینک ها</h2>
                </div>
                <div class="card-content">
                    @foreach ($lightCv->links as $item)
                    <a href="{{$item->url}}">{{$item->title}}</a>
                    @endforeach
                </div>
            </div>
        </aside>
        <main>
            <div class="intro">
                <h1>
                    {{$lightCv->personalInfo->f_name}}
                </h1>
                <p class="job">
                    {{$lightCv->personalInfo->current_job}}
                </p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>
                        درباره من
                    </h2>
                </div>
                <div class="card-content">
                    <p class="text-area">
                        {{$lightCv->personalInfo->about_me}}
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>
                        سوابق شغلی
                    </h2>
                </div>
                @foreach ($lightCv->workExp as $item)
                <div class="card-content" style="border-bottom:2px dashed gray; margin: 20px 0; padding: 0 0 15px 0;">
                    <div class="row">
                        <span>نام شغل :</span>
                        <span class="value">{{$item->title}}</span>
                        <span>محل کار :</span>
                        <span class="value">{{$item->work_place_name}}</span>
                    </div>
                    <div class="row">
                        <span>شروع :</span>
                        <span class="value">{{$item->start_date}}</span>
                        <span>اتمام :</span>
                        <span class="value">{{$item->end_date}}</span>
                    </div>
                    <p class="text-area">
                        {{$item->additional_info}}
                    </p>
                </div>
                @endforeach

            </div>
            <div class="card">
                <div class="card-header">
                    <h2>
                        سوابق تحصیلی
                    </h2>
                </div>
                @foreach ($lightCv->education as $item)
                <div class="card-content" style="border-bottom:2px dashed gray; margin: 20px 0; padding: 0 0 15px 0;">
                    <div class="row">
                        <span>مقطع تحصیلی :</span>
                        <span class="value">{{$item->degree_name}}</span>
                        <span>محل تحصیل :</span>
                        <span class="value">{{$item->institution_name}}</span>
                    </div>
                    <div class="row">
                        <span>شروع :</span>
                        <span class="value">{{$item->start_date}}</span>
                        <span>اتمام :</span>
                        <span class="value">{{$item->end_date}}</span>
                    </div>
                    <p class="text-area">
                        {{$item->additional_info}}
                    </p>
                </div>
                @endforeach

            </div>
            <div class="card">
                <div class="card-header">
                    <h2>
                        زبان ها
                    </h2>
                </div>
                <div class="card-content">
                    <table>
                        <tr>
                            <th>نام زبان</th>
                            <th>خواندن</th>
                            <th>شنیدن</th>
                            <th>نوشتن</th>
                            <th>گفتار</th>
                        </tr>
                        @foreach ($lightCv->skill->familiarLanguages as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->reading_skill}}/10</td>
                            <td>{{$item->listening_skill}}/10</td>
                            <td>{{$item->writing_skill}}/10</td>
                            <td>{{$item->speaking_skill}}/10</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>
                    دوره ها و گواهینامه ها
                    </h2>
                </div>
                <div class="card-content">
                    @foreach ($lightCv->skill->coursesAndCertificates as $item)
                    <div class="box">
                        <div class="row">
                            <span class="value">
                                {{$item->title}}
                            </span>
                            <span>
                                {{$item->date}}
                            </span>
                        </div>
                        <span>
                            {{$item->institution_name}}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>
                    افتخارات
                    </h2>
                </div>
                @foreach ($lightCv->skill->achivements as $item)
                <div class="card-content">
                    <div class="box">
                        <div class="row">
                            <span class="value">
                                {{$item->title}}
                            </span>
                            <span>
                                {{$item->date}}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>
                        تحقیقات و مقالات
                    </h2>
                </div>
                <div class="card-content">
                    @foreach ($lightCv->projects->researchsAndArticles as $item)
                    <div class="box">
                        <div class="row">
                            <span class="value">
                                {{$item->name}}
                            </span>
                            <span>
                                {{$item->date}}
                            </span>
                        </div>
                        <div class="row">
                            <span><!--here should be a if to replace the name of the type in persion.    -->
                                {{$item->type}}
                            </span>
                            <span>
                                {{$item->publisher}}
                            </span>
                        </div>
                        <p class="text-area">
                            {{$item->additional_info}}
                        </p>
                        <a class="read-more" href="{{$item->related_link}}">اطلاعات بیشتر</a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>
                        پروژه ها
                    </h2>
                </div>
                <div class="card-content">
                    @foreach ($lightCv->projects->practicalProjects as $item)
                    <div class="box">
                        <div class="row">
                            <span class="value">
                                {{$item->name}}
                            </span>
                            <span>
                                {{$item->date}}
                            </span>
                        </div>
                        <div class="row">
                            <span>
                                {{$item->task_master}}
                            </span>
                        </div>
                        <p class="text-area">
                            {{$item->additional_info}}
                        </p>
                        <a class="read-more" href="{{$item->related_link}}">اطلاعات بیشتر</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

</body>
</html>
