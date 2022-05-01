<?php

namespace App\Http\Controllers;

use App\Models\LightCv;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    //
    public function temp1(LightCv $lightCv) {
        return view('cv-templates.template_1', ['lightCv'=>$lightCv]);
    }
    public function temp2(LightCv $lightCv) {

    }
}
