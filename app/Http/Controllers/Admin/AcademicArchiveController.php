<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicArchieve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AcademicArchiveController extends Controller
{
    public function create(){
        // dd("ok");
        $academic = AcademicArchieve::get();
        return view('admin.academic.create', compact('academic'));
    }

    public function store(Request $request){
        // dd($request->all());

        $request->validate([
            'file' => 'required | image | mimes:jpeg,png,jpg | max:5000',
            // 'file_name' =>'required',
            'student_name' => 'required',
            'class'	=> 'required',
            'percentage' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $file = $request->file('file');
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('file'));

            if (substr_count($request->file('file'), '.') > 1) {
                return redirect()->back()->with('error', 'Doube dot in filename');
            }
            if ($mime_type != "image/png" && $mime_type != "image/jpeg") {
                return redirect()->back()->with('error', 'File type not allowed');
            }
            $extension = $request->file('file')->getClientOriginalExtension();
            if ($extension != "jpg" && $extension != "jpeg" && $extension != "png") {
                return redirect()->back()->with('error', 'File type not allowed');
            }

            $fileName = time() . '.' . $request->file->getClientOriginalExtension();
            Request()->file('file')->move(public_path('uploads/slider'), $fileName);
            $file_path = 'uploads/slider/' . $fileName;
            $slider = AcademicArchieve::create([
                'name' => $request->student_name,
                'class'	=> $request->class,
                'percentage' => $request->percentage,
                'file' => $file_path,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Academic Achievers Added');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function publish($id)
    {
        // dd("ok");
        DB::beginTransaction();
        try {
            $id = Crypt::decrypt($id);
            $slider = AcademicArchieve::where('id', $id)->first();

            $slider->update([
                'status' => $slider->status==1?0:1,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Successfull');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decrypt($id);
            $gallery = AcademicArchieve::where('id', $id)->first();
            $gallery->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Gallery Image Deleted');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
