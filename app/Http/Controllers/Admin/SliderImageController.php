<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class SliderImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = SliderImage::get();
        // dD($sliders);
        return view('admin.slider.create',compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required | image | mimes:jpeg,png,jpg | max:5000',
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
                $file_path = 'uploads/slider/'.$fileName;

                $slider = SliderImage::create([
                    'file_name' => $fileName,
                    'file' => $file_path,
                ]);
            DB::commit();
            return redirect()->back()->with('success', 'Slider Image Added');
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish($id)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decrypt($id);
            $slider = SliderImage::where('id',$id)->first();
            $slider->update([
                'status' => 1,
            ]);

            DB::commit();
            return redirect()->back()->with('success','Slider Image Published');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unpublish($id)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decrypt($id);
            $slider = SliderImage::where('id', $id)->first();
            $slider->update([
                'status' => 0,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Slider Image Unpublished');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decrypt($id);
            $gallery = SliderImage::where('id', $id)->first();
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
