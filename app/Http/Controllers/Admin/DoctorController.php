<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    private $imgPath = 'admin/assets/images/doctors';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::paginate(2);

        return view('admin.doctors.doctors_list',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::get();
        $cities = City::get();
        return view('admin.doctors.add_doctor', compact(['majors', 'cities']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {

        $request->validate([
            'image'       => ['required'],
            'email' =>   'unique:doctors,email',
            'password' => 'required'
        ]);

        $request['password'] = Hash::make($request->password);

        $extension =  $request->image->extension(); // get file extension
        $newImageName = rand(0, mt_getrandmax()) . '-' . "-Img" . '.' . $extension;
        $request->image->move(public_path($this->imgPath), $newImageName);


        Doctor::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request['password'],
            'phone'     => $request->phone,
            'summary'   => $request->summary,
            'major_id'  => $request->major_id,
            'city_id'   => $request->city_id,
            'img'       => $newImageName
        ]);

        return redirect()->route('admin.doctors.create')->with('success', 'data added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $majors = Major::get();
        $cities = City::get();
        return view('admin.doctors.update_doctor', compact(['doctor', 'majors', 'cities']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {

        $request->validate([
            'image'       => ['somtimes'],
            'email' =>   'unique:doctors,email,'.$doctor->id
        ]);

        if($request->hasFile('image')){
            $extension =  $request->image->extension(); // get file extension
            $newImageName = rand(0, mt_getrandmax()) . '-' . "-Img" . '.' . $extension;
            $request->image->move(public_path($this->imgPath), $newImageName);
        }

        $doctor->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'summary'   => $request->summary,
            'major_id'  => $request->major_id,
            'city_id'   => $request->city_id,
            'img'       => $newImageName ?? $doctor->img
        ]);

        return redirect()->route('admin.doctors.edit', $doctor)->with('success', 'data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors.index', $doctor)->with('success', 'data deleted successfully');
    }





    public function changePassword(Doctor $doctor){
        return view('admin.doctors.update_doctor_password', compact('doctor'));
    }

    public function updatePassword(Request $request, Doctor $doctor)
    {
            # Validation
            $request->validate([
                'new_password' => 'required|confirmed',
            ]);

            $doctor->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with("success", "Password changed successfully!");
    }
}
