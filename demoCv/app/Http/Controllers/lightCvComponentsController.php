<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\CoursesAndCertificates;
use App\Models\EducationalBackground;
use App\Models\ExperimentalSkills;
use App\Models\FamiliarLanguages;
use App\Models\PersonalInfo;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class lightCvComponentsController extends Controller
{
    public function editPersonalInfo(Request $request) {
        $pInfo= PersonalInfo::findOrFail($request->pInfoId);

        $pInfo->f_name= $request->name;
        $pInfo->current_job= $request->job;
        $pInfo->city= $request->city;
        $pInfo->gender= $request->gender;
        $pInfo->phone_number= $request->phoneNumber;
        $pInfo->email= $request->email;
        $pInfo->birth_date = $request->birthdate;
        $pInfo->marital_status= $request->maritalStatus;
        $pInfo->about_me= $request->aboutMe;

        $pInfo->save();

        return response()->json(array('pInfoId'=> $pInfo->id), 200);
    }

    public function editWexpAjax(Request $request) {
        $wExp= WorkExperience::findOrFail($request->wExpId);
        $wExp->title= $request->jobName;
        $wExp->work_place_name= $request->jobLocation;
        $wExp->start_date= $request->jobStartDate;
        $wExp->end_date= $request->jobEndDate;
        $wExp->additional_info= $request->jobMoreinfo;

        $wExp->save();

        return response()->json(array('wExpId'=> $wExp->id), 200);
    }

    public function editEducationAjax(Request $request) {
        $educ= EducationalBackground::findOrFail($request->educId);
        $educ->degree_name= $request->gradeName;
        $educ->institution_name= $request->gradeLocation;
        $educ->start_date= $request->gradeStartDate;
        $educ->end_date= $request->gradeEndDate;
        $educ->additional_info= $request->gradeMoreinfo;

        $educ->save();
        return response()->json(array('educId'=> $educ->id), 200);
    }

    public function editFlangAjax(Request $request) {
        $fLang= FamiliarLanguages::findOrFail($request->fLangId);
        $fLang->name= $request->languageName;
        $fLang->reading_skill= $request->readingLvl;
        $fLang->writing_skill= $request->writingLvl;
        $fLang->listening_skill= $request->listeningLvl;
        $fLang->speaking_skill= $request->speakingLvl;

        $fLang->save();
        return response()->json(array('fLangId'=> $fLang->id), 200);
    }

    public function editExpSkillAjax(Request $request) {
        $expSkill= ExperimentalSkills::findOrFail($request->expSkillId);
        $expSkill->name= $request->skillName;
        $expSkill->level= $request->skillLvl;
        $expSkill->save();
        return response()->json(array('expSkillId'=> $expSkill->id), 200);
    }

    public function cAndCEditAjax(Request $request) {
        $cAndC= CoursesAndCertificates::findOrFail($request->cAndCId);
        $cAndC->title= $request->certificateName;
        $cAndC->institution_name= $request->instituteName;
        $cAndC->date= $request->certificateDate;

        $cAndC->save();
        return response()->json(array('cAndCId'=> $cAndC->id), 200);
    }

    public function achvEditAjax(Request $request) {
        $achv= Achievement::findOrFail($request->achvId);
        $achv->title= $request->achvName;
        $achv->date= $request->achvDate;

        $achv->save();
        return response()->json(array('achvId'=> $achv->id), 200);
    }
}
