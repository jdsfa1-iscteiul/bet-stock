<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller {

    public function showLeaderboards(){
        return view('leaderboards');
    }

    public function profile(){
        return view('profile');
    }
}