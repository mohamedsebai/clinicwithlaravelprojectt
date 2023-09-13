<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index($major_id = null){


        if($major_id !== null){
            $doctors = Doctor::where('major_id', $major_id)->paginate(1);
        }else{
            $doctors = Doctor::paginate(1);
        }

        $cities = City::get();
        $majors = Major::get();

        return view('clinic.doctors.index',[
            'doctors' => $doctors,
            'cities'  => $cities,
            'majors'  => $majors,
        ]);

    }




    public function filterByCity($city_id = null){


        if($city_id !== null){
            $doctors = Doctor::where('city_id', $city_id)->paginate(1);
        }else{
            $doctors = Doctor::paginate(1);
        }



        $cities = City::get();
        $majors = Major::get();

        return view('clinic.doctors.index',[
            'doctors' => $doctors,
            'cities'  => $cities,
            'majors'  => $majors,
        ]);

    }


    public function show($doctor_id){

        $doctor = Doctor::where('id', $doctor_id)->first();

        return view('clinic.doctors.doctor',[
            'doctor' => $doctor,
        ]);

    }

}
