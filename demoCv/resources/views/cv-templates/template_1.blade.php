<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/templates/template_1/main.css')}}">
    <title>قالب رزومه شماره یک</title>
</head>
<body>
    <div class="container">
        <aside>
            <img class="profile-img" src="profile.jpg" alt="">
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
                <div class="card-content">
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
                <div class="card-content">
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
