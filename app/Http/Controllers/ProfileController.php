<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\profiles;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }
}
