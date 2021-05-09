<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function loadUserPanel(User $user) {
        $userCvs= $user->cvs;

        return view('panels.user-panel', ['cvs'=> $userCvs]);
    }
}
