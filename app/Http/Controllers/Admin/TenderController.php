<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenders = Tender::latest()->get();
        return view('admin.tender.index',compact('tenders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tender.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'file' => 'required',
            'type' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $m_id = Menu::where('slug','tenders')->value('id');
            $tender = Tender::create([
                'menu_id' => $m_id,
                'event_date' => $request->date,
                'title' => $request->title,
                'type' => $request->type,
            ]);
            if($request->type == '1'){
                $file = $request->file('file');
                $name = time() . '.' . $file->getClientOriginalExtension();
                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                $mime_type = $finfo->file($request->file('file'));
                if (substr_count($request->file('file'), '.') > 1) {
                    return redirect()->back()->with('error', 'Doube dot in filename');
                }
                if ($mime_type != "application/pdf" && $mime_type != "application/vnd.ms-excel" && $mime_type != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" && $mime_type != "application/zip" && $mime_type != "application/vnd.rar") {
                    return redirect()->back()->with('error', 'File type not allowed');
                }
                $extension = $request->file('file')->getClientOriginalExtension();
                if ($extension != "pdf" && $extension != "xls" && $extension != "xlsx" && $extension != "zip" && $extension != "rar") {
                    return redirect()->back()->with('error', 'File type not allowed');
                }
                $filename = asset('uploads/tender/') . '/' . $name;
                $file->move('uploads/tender/', $name);
                $tender->update([
                    'link' => $filename,
                ]);

            }elseif ($request->type == '2') {
                $tender->update([
                    'link' => $request->file,
                ]);
            }
            DB::commit();
            return redirect()->route('admin.tender.index')->with('success','Tender Added Succesfully');

        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()->with('success','Something went wrong');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        try {
            $tender = Tender::where('id', $id)->first();
            return view('admin.tender.edit', compact('tender'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error','Tender Not Found');
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
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'type' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $id = Crypt::decrypt($id);
            $tender = Tender::where('id',$id)->first();
            $tender->update([
                'title' => $request->title,
                'date' => $request->date,
                'type' => $request->type,
            ]);
            if ($request->file != null) {
                if ($request->type == '1') {
                    $file = $request->file('file');
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $finfo = new \finfo(FILEINFO_MIME_TYPE);
                    $mime_type = $finfo->file($request->file('file'));
                    if (substr_count($request->file('file'), '.') > 1) {
                        return redirect()->back()->with('error', 'Doube dot in filename');
                    }
                    if ($mime_type != "application/pdf" && $mime_type != "application/vnd.ms-excel" && $mime_type != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" && $mime_type != "application/zip" && $mime_type != "application/vnd.rar") {
                        return redirect()->back()->with('error', 'File type not allowed');
                    }
                    $extension = $request->file('file')->getClientOriginalExtension();
                    if ($extension != "pdf" && $extension != "xls" && $extension != "xlsx" && $extension != "zip" && $extension != "rar") {
                        return redirect()->back()->with('error', 'File type not allowed');
                    }
                    $filename = asset('uploads/tender/') . '/' . $name;
                    $file->move('uploads/tender/', $name);
                    $tender->update([
                        'link' => $filename,
                    ]);
                } elseif ($request->type == '2') {
                    $tender->update([
                        'link' => $request->file,
                    ]);
                }# code...
            }
            DB::commit();
            return redirect()->route('admin.tender.index')->with('success','Tender Updated');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            dd($th);
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        try {
            $tender = Tender::where('id', $id)->first();
            $tender->delete();
            return redirect()->back()->with('success', 'Tender Deleted');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Tender Not Found');
        }
    }
}
