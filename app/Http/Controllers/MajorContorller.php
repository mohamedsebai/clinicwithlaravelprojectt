<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorContorller extends Controller
{
    //
    public function index(){
        $majors = Major::paginate(1);

        return view('clinic.users.majors',[
            'majors' => $majors,
        ]);
    }


}
