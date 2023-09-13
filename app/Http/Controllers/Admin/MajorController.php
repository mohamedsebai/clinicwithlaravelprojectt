<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Requests\MajorRequest;
use Illuminate\Support\Facades\Validator;
class MajorController extends Controller
{

    private $imgPath = 'admin/assets/images/majors';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::paginate(2);

        return view('admin.majros.majors_list',compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.majros.add_major');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajorRequest $request)
    {

        // img validate
        $request->validate([
            'image'       => ['required']
        ]);

        $extension =  $request->image->extension(); // get file extension
        $newImageName = rand(0, mt_getrandmax()) . '-' . "-Img" . '.' . $extension;
        $request->image->move(public_path($this->imgPath), $newImageName);


        //
        Major::create([
            'title' => $request->input('title'),
            'img' => $newImageName,
        ]);

        return redirect()->route('majors.create')->with('success', 'data inserted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view('admin.majros.update_major',compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajorRequest $request, Major $major)
    {


            $exitst_data = Major::findOrFail($major->id);

            $ImageNameFromDataBase =  $exitst_data->img;

            // img validate
            if ( !$request->hasfile('image') ) {
                $newImageName = $ImageNameFromDataBase;
            }else{
                $extension =  $request->image->extension(); // get file extension
                $newImageName = rand(0, mt_getrandmax()) . '-' . "-Img" . '.' . $extension;
                $request->image->move(public_path($this->imgPath), $newImageName);
            }

            //
            Major::where('id', $major->id)->update([
            'title' => $request->input('title'),
            'img' => $newImageName,
            ]);

            return  redirect()->route('majors.edit', $major->id)->with('success', 'data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        Major::where('id', $major->id)->delete();
        return  redirect()->route('majors.index')->with('success', 'data deleted successfully');
    }
}
