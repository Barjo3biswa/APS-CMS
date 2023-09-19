<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\NewsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_events = Event::with('newSection')->get();
        // dD($news_events);
        return view('admin.news_events.index', compact('news_events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news_sections = NewsSection::orderBy('name','asc')->get();
        return view('admin.news_events.create',compact('news_sections'));
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
            'news_section_id' => 'required',
            'type' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $news_section_ids = implode(',', $request->input('news_section_id'));
            $event = Event::create([
                'title' => $request->title,
                'date' => $request->date,
                'news_type_id' => $news_section_ids,
                'news_type' => $request->type,
                'description' => $request->description,
            ]);
            // dd($event);
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
                    $filename = 'uploads/event/' . $name;
                    $file->move('uploads/event/', $name);
                    $event->update([
                        'pdf_file' => $filename,
                    ]);
                } elseif ($request->type == '2') {
                    // dd($request->file);
                    $event->update([
                        'url' => $request->url,
                    ]);
                } elseif ($request->type == '3') {
                    $event->update([
                        'details' => $request->details,
                    ]);
                }
                // dd("ok");
            DB::commit();
            return redirect()->back()->with('success', 'Notification Uploaded');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong');
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
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {

        }
        $news_sections = NewsSection::orderBy('name','asc')->get();
        $record = Event::where('id',$decrypted)->first();
        return view('admin.news_events.edit',compact('record','news_sections'));
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
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {

        }
        // dd($decrypted);
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'news_section_id' => 'required',
            'type' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $news_section_ids = implode(',', $request->input('news_section_id'));
            $event = Event::where('id',$decrypted)
            ->update([
                'title' => $request->title,
                'date' => $request->date,
                'news_type_id' => $news_section_ids,
                'news_type' => $request->type,
                'description' => $request->description,
            ]);
            // dd($event);
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
                    $filename = 'uploads/event/' . $name;
                    $file->move('uploads/event/', $name);
                    Event::where('id',$decrypted)->update([
                        'pdf_file' => $filename,
                    ]);
                } elseif ($request->type == '2') {
                    // dd($request->file);
                    Event::where('id',$decrypted)->update([
                        'url' => $request->url,
                    ]);
                } elseif ($request->type == '3') {
                    Event::where('id',$decrypted)->update([
                        'details' => $request->details,
                    ]);
                }
                // dd("ok");
            DB::commit();
            return redirect()->back()->with('success', 'Notification Uploaded');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong');
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
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {

        }
        Event::where('id',$decrypted)->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }
}
