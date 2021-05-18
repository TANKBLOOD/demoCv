<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\CoursesAndCertificates;
use App\Models\EducationalBackground;
use App\Models\ExperimentalSkills;
use App\Models\FamiliarLanguages;
use App\Models\PersonalInfo;
use App\Models\PracticalProject;
use App\Models\RelatedLinks;
use App\Models\ResearchAndArticles;
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
        if($request->wExpId != ''){
            $wExp= WorkExperience::findOrFail($request->wExpId);
        }else{
            $wExp= new WorkExperience();
            $wExp->cv_id= $request->parentId;
        }

        $wExp->title= $request->jobName;
        $wExp->work_place_name= $request->jobLocation;
        $wExp->start_date= $request->jobStartDate;
        $wExp->end_date= $request->jobEndDate;
        $wExp->additional_info= $request->jobMoreinfo;

        $wExp->save();

        return response()->json(array('wExpId'=> $wExp->id), 200);
    }

    public function editEducationAjax(Request $request) {
        if($request->educId != '' ) {
            $educ= EducationalBackground::findOrFail($request->educId);
        }else {
            $educ= new EducationalBackground();
            $educ->cv_id= $request->parentId;
        }


        $educ->degree_name= $request->gradeName;
        $educ->institution_name= $request->gradeLocation;
        $educ->start_date= $request->gradeStartDate;
        $educ->end_date= $request->gradeEndDate;
        $educ->additional_info= $request->gradeMoreinfo;

        $educ->save();
        return response()->json(array('educId'=> $educ->id), 200);
    }

    public function editFlangAjax(Request $request) {
        if($request->fLangId != '') {
            $fLang= FamiliarLanguages::findOrFail($request->fLangId);
        }else {
            $fLang=new FamiliarLanguages();
            $fLang->skill_id= $request->parentId;
        }

        $fLang->name= $request->languageName;
        $fLang->reading_skill= $request->readingLvl;
        $fLang->writing_skill= $request->writingLvl;
        $fLang->listening_skill= $request->listeningLvl;
        $fLang->speaking_skill= $request->speakingLvl;

        $fLang->save();
        return response()->json(array('fLangId'=> $fLang->id), 200);
    }

    public function editExpSkillAjax(Request $request) {
        if($request->expSkillId != '') {
            $expSkill= ExperimentalSkills::findOrFail($request->expSkillId);
        }else {
            $expSkill= new ExperimentalSkills();
            $expSkill->skill_id= $request->parentId;
        }

        $expSkill->name= $request->skillName;
        $expSkill->level= $request->skillLvl;
        $expSkill->save();
        return response()->json(array('expSkillId'=> $expSkill->id), 200);
    }

    public function cAndCEditAjax(Request $request) {
        if($request->cAndCId != '') {
            $cAndC= CoursesAndCertificates::findOrFail($request->cAndCId);
        }else {
            $cAndC= new CoursesAndCertificates();
            $cAndC->skill_id= $request->parentId;
        }

        $cAndC->title= $request->certificateName;
        $cAndC->institution_name= $request->instituteName;
        $cAndC->date= $request->certificateDate;

        $cAndC->save();
        return response()->json(array('cAndCId'=> $cAndC->id), 200);
    }

    public function achvEditAjax(Request $request) {
        if($request->achvId != '') {
            $achv= Achievement::findOrFail($request->achvId);
        }else {
            $achv= new Achievement();
            $achv->skill_id= $request->parentId;
        }

        $achv->title= $request->achvName;
        $achv->date= $request->achvDate;

        $achv->save();
        return response()->json(array('achvId'=> $achv->id), 200);
    }

    public function rAndAEditAjax(Request $request) {
        if($request->rAndAId != '') {
            $rAndA= ResearchAndArticles::findOrFail($request->rAndAId);
        }else {
            $rAndA= new ResearchAndArticles();
            $rAndA->project_id= $request->parentId;
        }

        $rAndA->type= $request->researchType;
        $rAndA->name= $request->researchName;
        $rAndA->publisher= $request->researchPublisher;
        $rAndA->related_link= $request->researchLink;
        $rAndA->date= $request->researchDate;
        $rAndA->additional_info= $request->researchMoreinfo;

        $rAndA->save();
        return response()->json(array('rAndAId'=> $rAndA->id), 200);
    }

    public function pracProjectEditAjax(Request $request) {
        if($request->pracProjectId != '') {
            $pracProj= PracticalProject::findOrFail($request->pracProjectId);
        }else {
            $pracProj= new PracticalProject();
            $pracProj->project_id= $request->parentId;
        }

        $pracProj->name= $request->projectName;
        $pracProj->task_master= $request->projectEmployer;
        $pracProj->related_link= $request->projectLink;
        $pracProj->date= $request->researchDate;
        $pracProj->additional_info= $request->projectMoreinfo;

        $pracProj->save();
        return response()->json(array('pracProjId'=> $pracProj->id), 200);
    }

    public function linkEditAjax(Request $request) {
        if($request->linkId != '') {
            $link= RelatedLinks::findOrFail($request->linkId);
        }else {
            $link= new RelatedLinks();
            $link->cv_id= $request->parentId;
        }

        $link->title= $request->linkName;
        $link->url= $request->linkUrl;

        $link->save();
        return response()->json(array('linkId'=> $link->id), 200);

    }
}
