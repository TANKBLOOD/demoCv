<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\CoursesAndCertificates;
use App\Models\EducationalBackground;
use App\Models\ExperimentalSkills;
use App\Models\FamiliarLanguages;
use App\Models\LightCv;
use App\Models\PersonalInfo;
use App\Models\PracticalPoject;
use App\Models\PracticalProject;
use App\Models\Projects;
use App\Models\RelatedLinks;
use App\Models\ResearchAndArticles;
use App\Models\Skills;
use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class LightCvController extends Controller
{
    public function create() {
        return view('light-cv.create');
    }
    public function store(Request $request) {
        $newLightCv= new LightCv();
        $newLightCv->user_id= 1;
        $newLightCv->title= 'test';
        $newLightCv->save();

        $personalInfo= new PersonalInfo();
        $personalInfo->image_path= 'defualt';
        $personalInfo->f_name= $request->name;
        $personalInfo->current_job= $request->job;
        $personalInfo->city= $request->city;
        $personalInfo->gender= $request->gender;
        $personalInfo->phone_number= $request->phoneNumber;
        $personalInfo->email= $request->email;
        $personalInfo->birth_date= $request->birthdate;
        $personalInfo->marital_status= $request->maritalStatus;
        $personalInfo->about_me= $request->aboutMe;
        $newLightCv->personalInfo()->save($personalInfo);

        $workExpsName= $request->jobName;
        $workExpsLocations= $request->jobLocation;
        $workExpsStartDate= $request->jobDateStart;
        $workExpsEndDate= $request->jobDateEnd;
        $workExpsMoreInfo= $request->jobMoreinfo;
        $workExpsCount= count($workExpsName);
        for($i=0; $i< $workExpsCount; $i++) {
            $newWorkExp= new WorkExperience();
            $newWorkExp->title= $workExpsName[$i];
            $newWorkExp->work_place_name= $workExpsLocations[$i];
            $newWorkExp->start_date= $workExpsStartDate[$i];
            $newWorkExp->end_date= $workExpsEndDate[$i];
            $newWorkExp->additional_info= $workExpsMoreInfo[$i];
            $newLightCv->workExp()->save($newWorkExp);
        }

        $educationBgNames= $request->gradeName;
        $educationBgInstitutionNames= $request->gradeLocation;
        $educationBgStartDates= $request->gradeDateStart;
        $educationBgEndDates= $request->gradeDateEnd;
        $educationBgMoreInfos= $request->gradeMoreinfo;
        $educationBgCount= count($educationBgNames);
        for($i=0; $i< $educationBgCount; $i++) {
            $newEducationBG= new EducationalBackground();
            $newEducationBG->degree_name= $educationBgNames[$i];
            $newEducationBG->institution_name= $educationBgInstitutionNames[$i];
            $newEducationBG->start_date= $educationBgStartDates[$i];
            $newEducationBG->end_date= $educationBgEndDates[$i];
            $newEducationBG->additional_info= $educationBgMoreInfos[$i];
            $newLightCv->education()->save($newEducationBG);
        }

        $newSkill= new Skills();
        $newLightCv->skill()->save($newSkill);
        $newSkill->save();

        $fmLanguageNames= $request->languageName;
        $fmlanguageReadingLvls= $request->readingLvl;
        $fmlanguageWritingLvls= $request->writingLvl;
        $fmlanguageListeningLvls= $request->listeningLvl;
        $fmLanguageSpeakingLvls= $request->speakingLvl;
        $fmlanguagesCount= count($fmLanguageNames);
        for($i=0; $i< $fmlanguagesCount; $i++) {
            $newFmLanguage= new FamiliarLanguages();
            $newFmLanguage->name= $fmLanguageNames[$i];
            $newFmLanguage->reading_skill= $fmlanguageReadingLvls[$i];
            $newFmLanguage->writing_skill= $fmlanguageWritingLvls[$i];
            $newFmLanguage->speaking_skill= $fmLanguageSpeakingLvls[$i];
            $newFmLanguage->listening_skill= $fmlanguageListeningLvls[$i];
            $newSkill->familiarLanguages()->save($newFmLanguage);
        }

        $expSkillNames= $request->skillName;
        $expSkillLvls= $request->skillLvl;
        $expSkillsCount= count($expSkillNames);
        for($i=0; $i< $expSkillsCount; $i++) {
            $newExpSkill= new ExperimentalSkills();
            $newExpSkill->name= $expSkillNames[$i];
            $newExpSkill->level= $expSkillLvls[$i];
            $newSkill->expSkills()->save($newExpSkill);
        }

        $courAndCertNames= $request->certificateName;
        $courAndCertInstituteNames= $request->instituteName;
        $courseAndCertDates= $request->certificateDate;
        $courAndCertCount= count($courAndCertNames);
        for($i=0; $i< $courAndCertCount; $i++) {
            $newCourAndCert= new CoursesAndCertificates();
            $newCourAndCert->title= $courAndCertNames[$i];
            $newCourAndCert->institution_name= $courAndCertInstituteNames[$i];
            $newCourAndCert->date= $courseAndCertDates[$i];
            $newSkill->coursesAndCertificates()->save($newCourAndCert);
        }

        $achvTitles= $request->honorName;
        $achvDates= $request->honorDate;
        $achvCount= count($achvTitles);
        for($i=0; $i< $achvCount; $i++) {
            $newAchv= new Achievement();
            $newAchv->title= $achvTitles[$i];
            $newAchv->date= $achvDates[$i];
            $newSkill->achivements()->save($newAchv);
        }



        $newProject= new Projects();
        $newLightCv->projects()->save($newProject);


        $resAndArtTypes= $request->researchType;
        $resAndArtNames= $request->researchName;
        $resAndArtPublishers= $request->researchPublisher;
        $resAndArtLinks= $request->researchLink;
        $resAndArtDates= $request->researchDate;
        $resAndArtMoreinfos= $request->researchMoreinfo;
        $resAndArtCount= count($resAndArtTypes);
        for($i=0; $i< $resAndArtCount; $i++) {
            $newResAndArt= new ResearchAndArticles();
            $newResAndArt->type= $resAndArtTypes[$i];
            $newResAndArt->name= $resAndArtNames[$i];
            $newResAndArt->publisher= $resAndArtPublishers[$i];
            $newResAndArt->related_link= $resAndArtLinks[$i];
            $newResAndArt->date= $resAndArtDates[$i];
            $newResAndArt->additional_info= $resAndArtMoreinfos[$i];
            $newProject->researchsAndArticles()->save($newResAndArt);
        }

        $pracProjNames= $request->projectName;
        $pracProjEmployers= $request->projectEmployer;
        $pracProjLinks= $request->projectLink;
        $pracProjDates= $request->researchDate;
        $pracProjMoreInfos= $request->projectMoreinfo;
        $pracProjCount= count($pracProjNames);
        for($i=0; $i< $pracProjCount; $i++) {
            $newPracProj= new PracticalProject();
            $newPracProj->name= $pracProjNames[$i];
            $newPracProj->task_master= $pracProjEmployers[$i];
            $newPracProj->related_link= $pracProjLinks[$i];
            $newPracProj->date= $pracProjDates[$i];
            $newPracProj->additional_info= $pracProjMoreInfos[$i];

            $newProject->practicalProjects()->save($newPracProj);
        }

        $relatedLinkTitles= $request->linkTitle;
        $relatedLinkUrls= $request->linkUrl;
        $relatedLinkCount= count($relatedLinkTitles);
        for($i=0; $i< $relatedLinkCount; $i++) {
            $newRelatedLink= new RelatedLinks();
            $newRelatedLink->title= $relatedLinkTitles[$i];
            $newRelatedLink->url= $relatedLinkUrls[$i];

            $newLightCv->links()->save($newRelatedLink);
        }

        $newLightCv->user_id= 1;
        $newLightCv->title= 'test';
        $newLightCv->save();

    }

    public function loadCvTemplate(LightCv $lightCv){
        return view('cv-templates.template_1', ['lightCv'=> $lightCv]);
    }
}
