<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/lightCv/main.css')}}">
    <title>رزومه ساز</title>
</head>
<body>
    <div class="form-box">
        <form action="" id="user-info">
            <section class="tab">
                <h1 class="tab-title">اطلاعات شخصی</h1>
                <div class="content">
                    <div class="personal-info">
                        <div class="col">
                            <img id="img-preview" src="imgs/defualt.png" alt="">
                            <span class="hint">عکسی برای رزومه خود بارگذاری کنید</span>
                            <input type="file" name="img-input" id="img-input">
                        </div>
                        <div class="col">
                            <label for="name">نام و نام خانوادگی</label>
                            <input type="text" name="name" id="name">
                            <label for="job">شغل فعلی</label>
                            <input type="text" name="job" id="job" placeholder="مثال:دانشجو،برنامه نویس">
                            <label for="city">شهر</label>
                            <input type="text" name="city" id="city">
                            <div class="radio-row">
                                <label for="gender">جنسیت</label>
                                <div class="radio-options">
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
                            <input type="tel" name="phoneNumber" id="phoneNumber">
                            <label for="email">آدرس ایمیل</label>
                            <input type="email" name="email" id="email">
                            <label for="birthdate">تاریخ تولد</label>
                            <input type="text" name="birthdate" id="birthdate">
                            <div class="radio-row">
                                <label for="maritalStatus">وضیعت تاهل</label>
                                <div class="radio-options">
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
                        <label for="aboutMe">درباره من</label>
                        <textarea name="aboutMe" id="aboutMe" rows="10"></textarea>
                    </div>
                </div>
            </section>

            <section class="tab">
                <h1 class="tab-title">سوابق شغلی</h1>
                <div class="content">
                    <div class="accordion">
                        <div class="accordion-head">
                            <i class="fas fa-times"></i>
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <div class="accordion-content active">
                            <div class="row">
                                <label for="job-name">نام شغل</label>
                                <input type="text" name="jobName[]" id="job-name">
                                <label for="job-location">نام محل کار</label>
                                <input type="text" name="jobLocation[]" id="job-location">
                            </div>
                            <div class="row">
                                <label for="job-date_start">تاریخ شروع</label>
                                <input type="text" name="jobDateStart[]" id="job-date_start">
                                <label for="job-date_end">تاریخ پایان</label>
                                <input type="text" name="jobDateEnd[]" id="job-date_end">
                            </div>
                            <label for="job-moreinfo">اطلاعات اضافی</label>
                            <textarea name="jobMoreinfo[]" id="job-moreinfo" rows="10"></textarea>
                        </div>
                    </div>
                    <p class="add-new">افزودن سابقه شغلی جدید</p>
                </div>
            </section>

            <section class="tab">
                <h1 class="tab-title">سوابق تحصیلی</h1>
                <div class="content">
                    <div class="accordion">
                        <div class="accordion-head">
                            <i class="fas fa-times"></i>
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <div class="accordion-content active">
                            <div class="row">
                                <label for="grade-name">نام مقطع تحصیلی</label>
                                <input type="text" name="gradeName[]" id="grade-name">
                                <label for="grade-location">نام محل تحصیل</label>
                                <input type="text" name="gradeLocation[]" id="grade-location">
                            </div>
                            <div class="row">
                                <label for="grade-date_start">تاریخ شروع</label>
                                <input type="text" name="gradeDateStart[]" id="grade-date_start">
                                <label for="grade-date_end">تاریخ پایان</label>
                                <input type="text" name="gradeDateEnd[]" id="grade-date_end">
                            </div>
                            <label for="grade-moreinfo">اطلاعات اضافی</label>
                            <textarea name="grade-moreinfo" id="gradeMoreinfo[]" rows="10"></textarea>
                        </div>
                    </div>
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
                        <div class="box">
                            <div class="box-head">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="box-content">
                                <label for="language-name">نام زبان</label>
                                <input type="text" name="languageName[]" id="language-name">
                                <div class="row-2">
                                    <div class="input-box">
                                        <label for="reading-lvl">مهارت خواندن</label>
                                        <input type="number" name="readingLvl[]" id="reading-lvl" value="1" min="1" max="5">
                                    </div>
                                    <div class="input-box">
                                        <label for="writing-lvl">مهارت نوشتن</label>
                                        <input type="number" name="writingLvl[]" id="writing-lvl" value="1" min="1" max="5">
                                    </div>
                                </div>
                                <div class="row-2">
                                    <div class="input-box">
                                        <label for="listening-lvl">مهارت شنیداری</label>
                                        <input type="number" name="listeningLvl[]" id="listening-lvl" value="1" min="1" max="5">
                                    </div>
                                    <div class="input-box">
                                        <label for="speaking-lvl">مهارت گفتاری</label>
                                        <input type="number" name="speakingLvl[]" id="speaking-lvl" value="1" min="1" max="5">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="add-new">افزودن زبان تازه</p>
                    </section>

                    <section class="sub-section">
                        <div class="sub-section_title">
                            <h2>مهارت های تجربی</h2>
                        </div>
                        <div class="box">
                            <div class="box-head">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="box-content">
                                <label for="skill-name">نام مهارت</label>
                                <input type="text" name="skillName[]" id="skill-name">
                                <label for="skill-lvl">سطح</label>
                                <input type="number" name="skillLvl[]" id="skill-lvl" value="1" min="1" max="5">

                            </div>
                        </div>
                        <p class="add-new">افزودن مهارت تازه</p>
                    </section>

                    <section class="sub-section">
                        <div class="sub-section_title">
                            <h2>
                                دوره ها و گواهینامه ها
                            </h2>
                        </div>
                        <div class="box">
                            <div class="box-head">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="box-content">
                                <label for="certificate-name">عنوان</label>
                                <input type="text" name="certificateName[]" id="certificate-name">
                                <label for="institute-name">نام موسسه</label>
                                <input type="text" name="instituteName[]" id="institute-name">
                                <label for="certificate-date">تاریخ</label>
                                <input type="text" name="certificateDate[]" id="certificate-date">
                            </div>
                        </div>
                        <p class="add-new">افزودن</p>
                    </section>

                    <section class="sub-section">
                        <div class="sub-section_title">
                            <h2>
                                افتخارات
                            </h2>
                        </div>
                        <div class="box">
                            <div class="box-head">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="box-content">
                                <label for="honor-name">عنوان</label>
                                <input type="text" name="honorName[]" id="honor-name">
                                <label for="honor-date">تاریخ</label>
                                <input type="text" name="honorDate[]" id="honor-date">
                            </div>
                        </div>
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
                        <div class="accordion">
                            <div class="accordion-head">
                                <i class="fas fa-times"></i>
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="accordion-content active">
                                <div class="row">
                                    <label for="research-type">نوع اثر</label>
                                    <select name="researchType[]" id="research-type">
                                        <option value="book">کتاب</option>
                                        <option value="article">مقاله</option>
                                        <option value="thesis">پایان نامه</option>
                                        <option value="others">سایر</option>
                                    </select>
                                    <label for="research-name">نام اثر</label>
                                    <input type="text" name="researchName[]" id="research-name">
                                </div>
                                <div class="row">
                                    <label for="research-publisher">ناشر</label>
                                    <input type="text" name="researchPublisher[]" id="research-publisher">
                                    <label for="research-link">لینک مرتبط</label>
                                    <input type="text" name="researchLink[]" id="research-link">
                                    <label for="research-date">تاریخ</label>
                                    <input type="text" name="researchDate[]" id="research-date">
                                </div>
                                <label for="research-moreinfo">اطلاعات اضافی</label>
                                <textarea name="researchMoreinfo[]" id="research-moreinfo" rows="10"></textarea>
                            </div>
                        </div>
                        <p class="add-new">افزودن</p>
                    </section>

                    <section class="sub-section">
                        <div class="sub-section_title">
                            <h2>
                                پروژه ها
                            </h2>
                        </div>
                        <div class="accordion">
                            <div class="accordion-head">
                                <i class="fas fa-times"></i>
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <div class="accordion-content active">
                                <div class="row">

                                    <label for="project-name">نام اثر</label>
                                    <input type="text" name="projectName[]" id="project-name">
                                    <label for="project-employer">کار فرما</label>
                                    <input type="text" name="projectEmployer[]" id="project-employer">
                                </div>
                                <div class="row">
                                    <label for="project-link">لینک مرتبط</label>
                                    <input type="text" name="projectLink[]" id="project-link">
                                    <label for="research-date">تاریخ</label>
                                    <input type="text" name="researchDate[]" id="research-date">
                                </div>
                                <label for="project-moreinfo">اطلاعات اضافی</label>
                                <textarea name="project-moreinfo" id="projectMoreinfo[]" rows="10"></textarea>
                            </div>
                        </div>
                        <p class="add-new">افزودن</p>
                    </section>
                </div>
            </section>

            <section class="tab">
                <h1 class="tab-title">
                    لینک ها
                </h1>
                <div class="content">
                    <div class="box">
                        <div class="box-head">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="box-content">
                            <label for="link-name">عنوان</label>
                            <input type="text" name="linkTitle[]" id="link-name">
                            <label for="link-url">لینک</label>
                            <input type="text" name="linkUrl[]" id="link-url">
                        </div>
                    </div>
                    <p class="add-new">افزودن</p>
                </div>
            </section>

            <section class="tab">
                <h1 class="tab-title">
                    انتخاب قالب
                </h1>
                <div class="content">
                    <div class="templates">
                        <div class="template">
                            <img src="imgs/t-1.jpg" alt="">
                            <p class="template-name">قالب شماره 1</p>
                        </div>
                        <div class="template selected">
                            <img src="imgs/t-2.jpg" alt="">
                            <p class="template-name">قالب شماره 2</p>
                        </div>
                    </div>
                </div>
            </section>
        </form>

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
        <span class="step"></span>
        </div>

    </div>
    <script src="https://kit.fontawesome.com/628fc863e1.js" crossorigin="anonymous"></script>

    <script src="{{asset('js/lighCv/new-cv.js')}}"></script>
</body>
</html>
