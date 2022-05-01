<?php

namespace App\Http\Controllers;

use App\Models\LightCv;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class PanelController extends Controller
{
    public function loadUserPanel() {
        $user= User::find(Auth::id());
        $userCvs= $user->cvs;
        $userName= $user->name;
        return view('panels.user-panel', ['cvs'=> $userCvs, 'userName'=>$userName]);
    }

    public function pdf(LightCv $lightCv) {
        set_time_limit(300);
        $pdf = PDF::loadView('cv-templates.template_1', compact('lightCv'));
		return $pdf->stream('document.pdf');
    }
}


