<?php

namespace App\Http\Controllers;

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

    public function editEducationAjax() {

    }
}
