<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShareUpdateController extends Controller
{
    public function index(){
        return view('shares.index');
    }
}
