<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Major;
use App\Models\Quote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){

        $majors = Major::skip(0)->take(10)->get();

        $doctors = Doctor::skip(0)->take(10)->get();


        return view('clinic.users.index',[
            'majors' => $majors,
            'doctors' => $doctors,
        ]);


    }
}
