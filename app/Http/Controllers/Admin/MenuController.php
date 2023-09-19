<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
       return view('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("ok");
        $request->validate([
            'name'=> 'required',
        ]);
        if ($request->file != null) {
            $request->validate([
                'file' => 'mimes:jpeg,png,jpg,mp4',
            ]);
        }
        DB::beginTransaction();
        try {

            $menu = Menu::create([
                'name' => $request->name,
                'sublink' => $request->sublink??0,
                'slug' => Str::slug($request->name),
            ]);
            if ($request->file) {
                $file = $request->file('file');
                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                $mime_type = $finfo->file($request->file('file'));
                if (substr_count($request->file('file'), '.') > 1) {
                    return redirect()->back()->with('error', 'Doube dot in filename');
                }
                if ($mime_type != "image/png" && $mime_type != "image/jpeg"
                ) {
                    return redirect()->back()->with('error', 'File type not allowed');
                }
                $extension = $request->file('file')->getClientOriginalExtension();
                if ($extension != "jpg" && $extension != "jpeg" && $extension != "png") {
                    return redirect()->back()->with('error', 'File type not allowed');
                }
                $fileName = time() . '.' . $request->file->getClientOriginalExtension();
                Request()->file('file')->move(public_path('uploads/' . $menu->id), $fileName);
                $image_path = asset('uploads/' . $menu->id) . '/' . $fileName;

                $menu->update([
                    'file' => $image_path,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.menu.index')->with('success','Data added Successfully');;
        } catch (\Throwable $th) {
        //    dd($th);
            DB::rollback();
            return redirect()->back()->withInput()->with('error', 'Menu creation failed');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addContent(Request $request ,$id)
    {
        $id = Crypt::decrypt($id);
        $menu = Menu::where('id', $id)->first();
        $content = Content::where('menu_id',$menu->id)->first();
        return view('admin.menu.addcontent',compact('menu','content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeContent(Request $request)
    {
        $request->validate([
            'file' => 'nullable | image | mimes:jpeg,png,jpg | max:5000',
            'content' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $content = $request->content;
            $clean_content = 'App\Helper\Helper'::strip_unsafe($content);
            $menu_content = Content::create([
                'is_full_page' => $request->is_full_page,
                'content' => $clean_content,
                'menu_id' => $request->id,
            ]);

            if ($request->file) {
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
                Request()->file('file')->move(public_path('uploads/' . $menu_content->id), $fileName);
                $file_path = asset('uploads/' . $menu_content->id) . '/' . $fileName;

                $menu_content->update([
                    'banner_image' => $file_path,
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success','Content created');

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error','Something went wrong');
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
        //
    }

    //Image upload
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'required | mimes:jpeg,png,jpg,pdf'
        ]);
        if ($validator->fails()) {
            $message = 'File type not allowed';
            $result = "<script>window.parent.CKEDITOR.tools.callFunction('$message')</script>";
        }
        if ($request->hasFile('upload')) {
            // dd($file);
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('upload'));
            $extension = $request->file('upload')->getClientOriginalExtension();
            if ($mime_type != "image/png" && $mime_type != "image/jpeg" && $mime_type != "application/pdf") {
                $message = 'File type not allowed';
                // $result = "<script>window.parent.CKEDITOR.tools.callFunction('$message')</script>";
                $result = "<script>alert('$message')</script>";
            } elseif ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "pdf") {
                $message = 'File type not allowed';
                // $result = "<script>window.parent.CKEDITOR.tools.callFunction('$message')</script>";
                $result = "<script>alert('$message')</script>";
            } else {
                $filenamewithextension = $request->file('upload')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('upload')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . time() . '.' . $extension;

                //Upload File
                $request->file('upload')->move('public/uploads', $filenametostore);

                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('public/uploads/' . $filenametostore);
                $message = 'File uploaded successfully';
                $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";
            }

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $result;
        }
    }
}
