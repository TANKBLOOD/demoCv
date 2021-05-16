<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/lightCv/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightCv/main.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ویرایش رزومه</title>
    <style>
        .hidden {
        visibility: hidden;
        }
        .gone {
        display: none;
        }
        .btn-edit {
        display: block;
        margin: 10px auto 20px;
        }
        .value {
        font-weight: bold;
        border-radius: 2px;
        margin-bottom: 1rem;
        padding: 5px;
        }
        .value-box i {
        cursor: pointer;
        }
        .long-text {
        line-height: 2;
        margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="panel-nav">
        <div class="container-nav">
            <div class="user-info">
                <div class="user">
                    <img src="imgs/profile.jpg" alt="profile pic">
                    <p>سلام امیر محمد</p>
                </div>
                <div id="bars-icon">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <ul class="panel-mune">
                <li class="active">رزومه های من</li>
                <li>رزومه جدید</li>
                <li>تنظیمات</li>
                <li>خروج</li>
            </ul>
        </div>
    </nav>
    <div class="form-box">
        <form action="" id="pInfo-{{$lightCv->personalInfo->id}}">
            <input type="hidden" name="pInfoId" value="{{$lightCv->personalInfo->id}}">
            <section class="tab">
                <h1 class="tab-title">اطلاعات شخصی</h1>
                <div class="content">
                    <div class="personal-info">
                        <button type="button" class="btn-secondary btn-edit" onclick="edit(this)" data-btn-group="pInfo" data-form-id="pInfo-{{$lightCv->personalInfo->id}}">ویرایش اطلاعات</button>
                        <div class="row">
                            <div class="col">
                                <img id="img-preview" src="imgs/profile.jpg" alt="">
                                <input class="hidden" type="file" name="img-input" id="img-input">
                            </div>
                            <div class="col">
                                <label for="name">نام و نام خانوادگی</label>
                                <span class="value">{{$lightCv->personalInfo->f_name}}</span>
                                <input class="gone" type="text" name="name" id="name">
                                <label for="job">شغل فعلی</label>
                                <span class="value">{{$lightCv->personalInfo->current_job}}</span>
                                <input class="gone" type="text" name="job" id="job" placeholder="مثال:دانشجو،برنامه نویس">
                                <label for="city">شهر</label>
                                <span class="value">{{$lightCv->personalInfo->city}}</span>
                                <input class="gone" type="text" name="city" id="city">
                                <div class="radio-row">
                                    <label for="gender">جنسیت</label>
                                    @if ($lightCv->personalInfo === 'female')
                                    <span class="value">زن</span>
                                    @else
                                    <span class="value">مرد</span>
                                    @endif
                                    <div class="radio-options gone">
                                        <div class="radio-box">
                                            <label for="male">مرد</label>
                                            <input type="radio" id="male" name="gender" value="male">
                                        </div>
                                        <div class="radio-box">
                                            <label for="female">زن</label>
                                            <input type="radio" id="female" name="gender" value="female">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="phoneNumber">شماره تفلن</label>
                                <span class="value">{{$lightCv->personalInfo->phone_number}}</span>
                                <input class="gone" type="tel" name="phoneNumber" id="phoneNumber">
                                <label for="email">آدرس ایمیل</label>
                                <span class="value">{{$lightCv->personalInfo->email}}</span>
                                <input class="gone" type="email" name="email" id="email">
                                <label for="birthdate">تاریخ تولد</label>
                                <span class="value">{{$lightCv->personalInfo->birth_date}}</span>
                                <input class="gone" type="text" name="birthdate" id="birthdate">
                                <div class="radio-row">
                                    <label for="maritalStatus">وضیعت تاهل</label>
                                    @if ($lightCv->personalInfo->marital_status === 'single')
                                    <span class="value">مجرد</span>
                                    @else
                                    <span class="value">متاهل</span>
                                    @endif
                                    <div class="radio-options gone">
                                        <div class="radio-box">
                                            <label for="single">مجرد</label>
                                            <input type="radio" id="single" name="maritalStatus" value="single">
                                        </div>
                                        <div class="radio-box">
                                            <label for="married">متاهل</label>
                                            <input type="radio" id="married" name="maritalStatus" value="married">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label for="aboutMe">درباره من</label>
                        <p class="long-text value">{{$lightCv->personalInfo->about_me}}</p>
                        <textarea class="gone" name="aboutMe" id="aboutMe" rows="10"></textarea>
                    </div>
                </div>
            </section>
        </form>

        <section class="tab">
            <h1 class="tab-title">سوابق شغلی</h1>
            <div class="content">
                @foreach ($lightCv->workExp as $item)
                <form action="" id="wExp-{{$item->id}}">
                    <input type="hidden" name="wExpId" value="{{$item->id}}">
                    <div class="accordion">
                        <div class="accordion-head">
                            <i class="fas fa-times"></i>
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <div class="accordion-content active">
                            <button type="button" class="btn-secondary btn-edit" onclick="edit(this)" data-btn-group="wExp" data-form-id="wExp-{{$item->id}}">ویرایش اطلاعات</button>
                            <div class="row">
                                <div class="input-box">
                                    <label for="job-name">نام شغل</label>
                                    <span class="value">{{$item->title}}</span>
                                    <input class="gone" type="text" name="jobName" id="job-name">
                                </div>
                                <div class="input-box">
                                    <label for="job-location">نام محل کار</label>
                                    <span class="value">{{$item->work_place_name}}</span>
                                    <input class="gone" type="text" name="jobLocation" id="job-location">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-box">
                                    <label for="job-date_start">تاریخ شروع</label>
                                    <span class="value">{{$item->start_date}}</span>
                                    <input class="gone" type="text" name="jobStartDate" id="job-date_start">
                                </div>
                                <div class="input-box">
                                    <label for="job-date_end">تاریخ پایان</label>
                                    <span class="value">{{$item->end_date}}</span>
                                    <input class="gone" type="text" name="jobEndDate" id="job-date_end">
                                </div>
                            </div>
                            <label for="job-moreinfo">اطلاعات اضافی</label>
                            <span class="value">{{$item->additional_info}}</span>
                            <textarea class="gone" name="jobMoreinfo" id="job-moreinfo" rows="10"></textarea>
                        </div>
                    </div>
                </form>
                @endforeach
                <p class="add-new">افزودن سابقه شغلی جدید</p>
            </div>
        </section>

        <section class="tab">
            <h1 class="tab-title">سوابق تحصیلی</h1>
            <div class="content">
                @foreach ($lightCv->education as $item)
                    <form action="" id="educ-{{$item->id}}">
                        <input type="hidden" name="educId" value="{{$item->id}}">
                        <div class="accordion">
                            <div class="accordion-head">
                                <i class="fas fa-times"></i>
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="accordion-content active">
                                <button type="button" class="btn-secondary btn-edit" onclick="edit(this)" data-btn-group="educ" data-form-id="educ-{{$item->id}}">ویرایش اطلاعات</button>
                                <div class="row">
                                    <div class="input-box">
                                        <label for="grade-name">نام مقطع تحصیلی</label>
                                        <span class="value">{{$item->degree_name}}</span>
                                        <input class="gone" type="text" name="gradeName" id="grade-name">
                                    </div>
                                    <div class="input-box">
                                        <label for="grade-location">نام محل تحصیل</label>
                                        <span class="value">{{$item->institution_name}}</span>
                                        <input class="gone" type="text" name="gradeLocation" id="grade-location">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-box">
                                        <label for="grade-date_start">تاریخ شروع</label>
                                        <span class="value">{{$item->start_date}}</span>
                                        <input class="gone" type="text" name="gradeStartDate" id="grade-date_start">
                                    </div>
                                    <div class="input-box">
                                        <label for="grade-date_end">تاریخ پایان</label>
                                        <span class="value">{{$item->end_date}}</span>
                                        <input class="gone" type="text" name="gradeEndDate" id="grade-date_end">
                                    </div>
                                </div>
                                <label for="grade-moreinfo">اطلاعات اضافی</label>
                                <span class="value">{{$item->additional_info}}</span>
                                <textarea class="gone" name="gradeMoreinfo" id="grade-moreinfo" rows="10"></textarea>
                            </div>
                        </div>
                    </form>
                @endforeach
                <p class="add-new">افزودن سابقه تحصیلی جدید</p>
            </div>
        </section>


        <section class="tab">
            <h1 class="tab-title">مهارت ها</h1>
            <div class="content">
                <section class="sub-section">
                    <div class="sub-section_title">
                        <h2>زبان ها</h2>
                    </div>
                    @foreach ($lightCv->skill->familiarLanguages as $item)
                    <form action="" id="fLang-{{$item->id}}">
                        <input type="hidden" name="fLangId" value="{{$item->id}}">
                        <div class="box">
                            <div class="box-head">
                                <i class="fas fa-times"></i>
                                <button type="button" class="btn-secondary btn-edit" onclick="edit(this)" data-btn-group="fLang" data-form-id="fLang-{{$item->id}}">ویرایش اطلاعات</button>
                            </div>
                            <div class="box-content">
                                <div class="input-box w50">
                                    <label for="language-name">نام زبان</label>
                                    <span class="value">{{$item->name}}</span>
                                    <input class="gone" type="text" name="languageName" id="language-name">
                                </div>
                                <div class="row-2">
                                    <div class="input-box">
                                        <label for="reading-lvl">مهارت خواندن</label>
                                        <span class="value">{{$item->reading_skill}}</span>
                                        <input class="gone" type="number" name="readingLvl" id="reading-lvl" value="1" min="1" max="5">
                                    </div>
                                    <div class="input-box">
                                        <label for="writing-lvl">مهارت نوشتن</label>
                                        <span class="value">{{$item->writing_skill}}</span>
                                        <input class="gone" type="number" name="writingLvl" id="writing-lvl" value="1" min="1" max="5">
                                    </div>
                                </div>
                                <div class="row-2">
                                    <div class="input-box">
                                        <label for="listening-lvl">مهارت شنیداری</label>
                                        <span class="value">{{$item->listening_skill}}</span>
                                        <input class="gone" type="number" name="listeningLvl" id="listening-lvl" value="1" min="1" max="5">
                                    </div>
                                    <div class="input-box">
                                        <label for="speaking-lvl">مهارت گفتاری</label>
                                        <span class="value">{{$item->speaking_skill}}</span>
                                        <input class="gone" type="number" name="speakingLvl" id="speaking-lvl" value="1" min="1" max="5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    <p class="add-new">افزودن زبان تازه</p>
                </section>

                <section class="sub-section">
                    <div class="sub-section_title">
                        <h2>مهارت های تجربی</h2>
                    </div>
                    @foreach ($lightCv->skill->expSkills as $item)
                    <form action="" id="expSkill-{{$item->id}}">
                        <input type="hidden" name="expSkillId" value="{{$item->id}}">
                        <div class="box">
                            <div class="box-head">
                                <i class="fas fa-times"></i>
                                <button type="button" class="btn-secondary btn-edit" onclick="edit(this)" data-btn-group="expSkill" data-form-id="expSkill-{{$item->id}}">ویرایش اطلاعات</button>
                            </div>
                            <div class="box-content">
                                <div class="input-box w70">
                                    <label for="skill-name">نام مهارت</label>
                                    <span class="value">{{$item->name}}</span>
                                    <input class="gone" type="text" name="skillName" id="skill-name">
                                </div>
                                <div class="input-box w20">
                                    <label for="skill-lvl">سطح</label>
                                    <span class="value">{{$item->level}}</span>
                                    <input class="gone" type="number" name="skillLvl" id="skill-lvl" value="1" min="1" max="5">
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    <p class="add-new">افزودن مهارت تازه</p>
                </section>

                <section class="sub-section">
                    <div class="sub-section_title">
                        <h2>
                            دوره ها و گواهینامه ها
                        </h2>
                    </div>
                    @foreach ($lightCv->skill->coursesAndCertificates as $item)
                    <form action="" id="cAndC-{{$item->id}}">
                        <input type="hidden" name="cAndCId" value="{{$item->id}}">
                        <div class="box">
                            <div class="box-head">
                                <i class="fas fa-times"></i>
                                <button type="button" class="btn-secondary btn-edit" onclick="edit(this)" data-btn-group="cAndC" data-form-id="cAndC-{{$item->id}}">ویرایش اطلاعات</button>
                            </div>
                            <div class="box-content">
                                <div class="input-box w50">
                                    <label for="certificate-name">عنوان</label>
                                    <span class="value">{{$item->title}}</span>
                                    <input class="gone" type="text" name="certificateName" id="certificate-name">
                                </div>
                                <div class="input-box w20">
                                    <label for="institute-name">نام موسسه</label>
                                    <span class="value">{{$item->institution_name}}</span>
                                    <input class="gone" type="text" name="instituteName" id="institute-name">
                                </div>
                                <div class="input-box w20">
                                    <label for="certificate-date">تاریخ</label>
                                    <span class="value">{{$item->date}}</span>
                                    <input class="gone" type="text" name="certificateDate" id="certificate-date">
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    <p class="add-new">افزودن</p>
                </section>

                <section class="sub-section">
                    <div class="sub-section_title">
                        <h2>
                            افتخارات
                        </h2>
                    </div>
                    @foreach ($lightCv->skill->achivements as $item)
                    <form action="" id="achv-{{$item->id}}">
                        <input type="hidden" name="achvId" value="{{$item->id}}">
                        <div class="box">
                            <div class="box-head">
                                <i class="fas fa-times"></i>
                                <button type="button" class="btn-secondary btn-edit" onclick="edit(this)" data-btn-group="achv" data-form-id="achv-{{$item->id}}">ویرایش اطلاعات</button>
                            </div>
                            <div class="box-content">
                                <div class="input-box w70">
                                    <label for="honor-name">عنوان</label>
                                    <span class="value">{{$item->title}}</span>
                                    <input class="gone" type="text" name="achvName" id="honor-name">
                                </div>
                                <div class="input-box w20">
                                    <label for="honor-date">تاریخ</label>
                                    <span class="value">{{$item->date}}</span>
                                    <input class="gone" type="text" name="achvDate" id="honor-date">
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    <p class="add-new">افزودن</p>
                </section>

            </div>
        </section>

        <section class="tab">
            <h1 class="tab-title">
                پروژه ها
            </h1>
            <div class="content">
                <section class="sub-section">
                    <div class="sub-section_title">
                        <h2>
                            تحقیقات و مقالات
                        </h2>
                    </div>
                    @foreach ($lightCv->projects->researchsAndArticles as $item)
                    <form action="" id="rAndA-{{$item->id}}">
                        <input type="hidden" name="rAndAId" value="{{$item->id}}">
                        <div class="accordion">
                            <div class="accordion-head">
                                <i class="fas fa-times"></i>
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="accordion-content active">
                                <button type="button" class="btn-secondary btn-edit" onclick="edit(this)" data-btn-group="rAndA" data-form-id="rAndA-{{$item->id}}">ویرایش اطلاعات</button>
                                <div class="row">
                                    <div class="input-box-2 w20">
                                        <label for="research-type">نوع اثر</label>
                                        @if ($item->type == 'book')
                                        <span class="value">کتاب</span>
                                        @elseif ($item->type == 'article')
                                        <span class="value">مقاله</span>
                                        @elseif ($item->type == 'thesis')
                                        <span class="value">پایان نامه</span>
                                        @elseif ($item->type == 'others')
                                        <span class="value">سایر</span>
                                        @endif
                                        <select class="gone" name="researchType" id="research-type">
                                            <option value="book">کتاب</option>
                                            <option value="article">مقاله</option>
                                            <option value="thesis">پایان نامه</option>
                                            <option value="others">سایر</option>
                                        </select>
                                    </div>
                                    <div class="input-box-2 w70">
                                        <label class="w10" for="research-name">نام اثر</label>
                                        <span class="value">{{$item->name}}</span>
                                        <input class="gone" type="text" name="researchName" id="research-name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-box-2 w30">
                                        <label class="w20" for="research-publisher">ناشر</label>
                                        <span class="value">{{$item->publisher}}</span>
                                        <input class="gone" type="text" name="researchPublisher" id="research-publisher">
                                    </div>
                                    <div class="input-box-2 w30">
                                        <label class="w20" for="research-link">لینک مرتبط</label>
                                        <span class="value">{{$item->related_link}}</span>
                                        <input class="gone" type="text" name="researchLink" id="research-link">
                                    </div>
                                    <div class="input-box-2 w30">
                                        <label class="w20" for="research-date">تاریخ</label>
                                        <span class="value">{{$item->date}}</span>
                                        <input class="gone" type="text" name="researchDate" id="research-date">
                                    </div>
                                </div>
                                <label for="research-moreinfo">اطلاعات اضافی</label>
                                <span class="long-text value">{{$item->additional_info}}</span>
                                <textarea class="gone" name="researchMoreinfo" id="research-moreinfo" rows="10"></textarea>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    <p class="add-new">افزودن</p>
                </section>

                <section class="sub-section">
                    <div class="sub-section_title">
                        <h2>
                            پروژه ها
                        </h2>
                    </div>
                    @foreach ($lightCv->projects->practicalProjects as $item)
                    <form action="" id="pracProj-{{$item->id}}">
                        <input type="hidden" name="pracProjectId" value="{{$item->id}}">
                        <div class="accordion">
                            <div class="accordion-head">
                                <i class="fas fa-times"></i>
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="accordion-content active">
                                <button type="button" class="btn-secondary btn-edit" onclick="edit(this)" data-btn-group="pracProj" data-form-id="pracProj-{{$item->id}}">ویرایش اطلاعات</button>
                                <div class="row">
                                    <div class="input-box">
                                        <label for="project-name">نام اثر</label>
                                        <span class="value">{{$item->name}}</span>
                                        <input class="gone" type="text" name="projectName" id="project-name">
                                    </div>
                                    <div class="input-box">
                                        <label for="project-employer">کار فرما</label>
                                        <span class="value">{{$item->task_master}}</span>
                                        <input class="gone" type="text" name="projectEmployer" id="project-employer">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-box">
                                        <label for="project-link">لینک مرتبط</label>
                                        <span class="value">{{$item->related_link}}</span>
                                        <input class="gone" type="text" name="projectLink" id="project-link">
                                    </div>
                                    <div class="input-box">
                                        <label for="research-date">تاریخ</label>
                                        <span class="value">{{$item->date}}</span>
                                        <input class="gone" type="text" name="researchDate" id="research-date">
                                    </div>
                                </div>
                                <label for="project-moreinfo">اطلاعات اضافی</label>
                                <span class="long-text value">{{$item->additional_info}}</span>
                                <textarea class="gone" name="projectMoreinfo" id="project-moreinfo" rows="10"></textarea>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    <p class="add-new">افزودن</p>
                </section>
            </div>
        </section>


        <section class="tab">
            <h1 class="tab-title">
                لینک ها
            </h1>
            <div class="content">
                @foreach ($lightCv->links as $item)
                <form action="" id="link-{{$item->id}}">
                    <input type="hidden" name="linkId" value="{{$item->id}}">
                    <div class="box">
                        <div class="box-head">
                            <i class="fas fa-times"></i>
                            <button type="button" class="btn-secondary btn-edit" onclick="edit(this)" data-btn-group="link" data-form-id="link-{{$item->id}}">ویرایش اطلاعات</button>
                        </div>
                        <div class="box-content">
                            <div class="input-box w45">
                                <label for="link-name">عنوان</label>
                                <span class="value">{{$item->title}}</span>
                                <input class="gone" type="text" name="linkName" id="link-name">
                            </div>
                            <div class="input-box w45">
                                <label for="link-url">لینک</label>
                                <span class="value">{{$item->url}}</span>
                                <input class="gone" type="text" name="linkUrl" id="link-url">
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
                <p class="add-new">افزودن</p>
            </div>
        </section>

        <div class="step-buttons">
            <button type="button" class="btn-primary" id="nextBtn" onclick="nextPrev(1)">بعد</button>
            <button type="button" class="btn-secondary" id="prevBtn" onclick="nextPrev(-1)">قبلی</button>
        </div>

        <div class="steps">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/lighCv/new-cv.js')}}"></script>
    <script src="{{asset('js/lighCv/mune.js')}}"></script>
    <script src="{{asset('js/lighCv/edit-cv.js')}}"></script>
</body>
</html>
