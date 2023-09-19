<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\DepartmentMenu;
use App\Models\Menu;
use App\Models\SubCategory;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory($id )
    {
        $id = Crypt::decrypt($id);
        $menu = Menu::where('id',$id)->first();
        // $submenus = SubMenu::where('menu_id',$menu->id)->get();
        return view('admin.submenu.add_category',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeSubmenu(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        DB::beginTransaction();
        try {
            SubMenu::create([
                'name' => $request->name,
                'menu_id' => $request->menu_id,
                'slug' => Str::slug($request->name),
            ]);
            DB::commit();
            return redirect()->back()->withInput()->with('success', 'Submenu added Successfully');;
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            DB::rollback();
            return redirect()->back()->withInput()->with('error', 'Submenu creation failed');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSubContent($id)
    {
        $id = Crypt::decrypt($id);
        $submenu = SubMenu::where('id', $id)->first();
        $content = Content::where('submenu_id', $id)->first();
        if($content != null){
            return view('admin.submenu.view-content', compact('content', 'submenu'));
        }else{
            return view('admin.submenu.add-content', compact('submenu'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeSubContent(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'file' => 'nullable | image | mimes:jpeg,png,jpg | max:5000',
            'content' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $content = $request->content;
            $clean_content = 'App\Helper\Helper'::strip_unsafe($content);
            $menu_content = Content::create([
                'content' => $clean_content,
                'menu_id' => $request->menu_id,
                'submenu_id' => $request->submenu_id,

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
                $file_path = 'uploads/' . $menu_content->id . '/' . $fileName;
                // dd($file_path);
                $menu_content->update([
                    'banner_image' => $file_path,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Content created');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    public function viewSubContent($id)
    {
        $id = Crypt::decrypt($id);
        $submenu = Submenu::where('id',$id)->first();
        $content = Content::where('submenu_id',$id)->first();
        return view('admin.submenu.view-content', compact('content','submenu'));
    }


    public function editSubContent($id)
    {
        $id = Crypt::decrypt($id);
        $submenu = SubMenu::where('id', $id)->first();
        $content = Content::where('submenu_id', $id)->first();
        return view('admin.submenu.edit-content', compact('content', 'submenu'));
    }


    public function updateSubContent(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decrypt($id);
            $content = Content::where('id', $id)->first();
            $clean_content = 'App\Helper\Helper'::strip_unsafe($request->content);
            $content->update([
                'content' => $clean_content,
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
                Request()->file('file')->move(public_path('uploads/' . $content->id), $fileName);
                $file_path = asset('uploads/' . $content->id) . '/' . $fileName;

                $content->update([
                    'banner_image' => $file_path,
                ]);
            }
            DB::commit();
            return redirect()->route('admin.submenu-content',Crypt::encrypt($content->submenu_id))->with('success', 'Content updated');
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
    public function addSubCategory($id)
    {
        $id = Crypt::decrypt($id);
        $submenu = SubMenu::where('id', $id)->first();
        $subcategory = SubCategory::where('submenu_id',$submenu->id)->get();
        return view('admin.submenu.subcatogery.add-sub-category', compact('submenu','subcategory'));
    }

    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'file' => 'nullable | image | mimes:jpeg,png,jpg | max:5000',
            'title' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $slug = Str::slug($request->title);
            $submenu = Submenu::where('id',$request->submenu_id)->first();
            $subcategory = SubCategory::create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'submenu_id' => $request->submenu_id,
                'menu_id' => $submenu->menu_id,
            ]);

            if ($request->frontpage_display == 1) {
                $subcategory->update([
                    'frontpage_display' => $request->frontpage_display
                ]);
            }

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
                Request()->file('file')->move(public_path('uploads/' . $subcategory->id), $fileName);
                $file_path = asset('uploads/' . $subcategory->id) . '/' . $fileName;

                $subcategory->update([
                    'picture' => $file_path,
                ]);

            }

            DB::commit();
            return redirect()->back()->with('success','Sub Category Added');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollBack();
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function addSubCategoryContent($id,$submenu_id)
    {
        $id = Crypt::decrypt($id);
        $submenu_id = Crypt::decrypt($submenu_id);
        $submenu = SubMenu::where('id', $submenu_id)->first();
        $subcategory = SubCategory::where('id', $id)->first();
        $dept_menus = DepartmentMenu::where('status',1)->get();

        // $content = Content::where('submenu_id', $submenu_id)->where('sub_category_id')
        return view('admin.submenu.subcatogery.content.add-subcategory-content', compact('subcategory','dept_menus','submenu_id', 'submenu'));
    }

    public function storeSubCategoryDepartmentContent(Request $request)
    {
        $request->validate([
            'file' => 'nullable | image | mimes:jpeg,png,jpg | max:5000',
            'dept_menu_id' => 'required',
            'description' => 'required'
        ]);
        // dD($request->all());
        DB::beginTransaction();
        try {
            $submenu = Submenu::where('id', $request->submenu_id)->first();
            $content = $request->description;
            $clean_content = 'App\Helper\Helper'::strip_unsafe($content);
            $content = Content::create([
                'content' => $clean_content,
                'menu_id' => $submenu->menu_id,
                'submenu_id' => $request->submenu_id,
                'department_menu_id' => $request->dept_menu_id,
                'sub_category_id' => $request->subcategory_id,

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
                Request()->file('file')->move(public_path('uploads/' . $content->id), $fileName);
                $file_path = asset('uploads/' . $content->id) . '/' . $fileName;

                $content->update([
                    'file' => $file_path,
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success','Content Added');
        } catch (\Throwable $th) {
            //throw $th;

            DB::rollBack();
            return redirect()->back()->with('error','Something went wrong');
        }

    }

    public function viewSubCategoryDepartmentContent($submenu_id,$subcategory_id,$dept_id)
    {

        $submenu_id = Crypt::decrypt($submenu_id);
        $subcategory_id = Crypt::decrypt($subcategory_id);
        $dept_id = Crypt::decrypt($dept_id);
        // $dept_menus = DepartmentMenu::where('status', 1)->get();
        $subcategory = DepartmentMenu::where('id',$dept_id)->first();
        $content = Content::where('department_menu_id', $dept_id )->where('submenu_id',$submenu_id)->where('sub_category_id', $subcategory_id)->first();

        // dD($content);
        return view('admin.submenu.subcatogery.content.view-content', compact('content', 'subcategory'));

    }

    public function updateDepartmentContent(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $content = $request->description;
            $clean_content = 'App\Helper\Helper'::strip_unsafe($content);
            $content = Content::where('id',$request->content_id)->first();
            $content->update([
                'content' => $clean_content,
            ]);
            DB::commit();
            return redirect()->back()->with('success','Content Updated');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }


}
