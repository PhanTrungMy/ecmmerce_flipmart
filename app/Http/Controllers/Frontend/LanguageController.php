<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class LanguageController extends Controller
{
    public function Hindi(){
        session()->get('Language');
        session()->forget('Language');
        session::put('Language', 'hindi');
        return redirect()->back();
    }
    public function English(){
        session()->get('Language');
        session()->forget('Language');
        session::put('Language', 'english');
        return redirect()->back();

    }
}
