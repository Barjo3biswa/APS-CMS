<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\DepartmentMenu;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\SliderImage;
use App\Models\SubCategory;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{

    public function index()
    {
        $sliders = SliderImage::where('status', 1)->get();
        $news_events = Event::where('status', 1)->get();

        $gallery = Gallery::where('status', 1)->get();

        $std_corner = SubMenu::where('menu_id', 5)->get();

        $searchvalue = '2';
        $upcoming_news = DB::table('events')
            ->whereRaw('FIND_IN_SET(?, news_type_id)', [$searchvalue])
            ->get();
        // dd($upcoming_news);
        return view('index', compact('sliders', 'news_events', 'gallery', 'std_corner', 'upcoming_news'));
    }

    public function getMenuContent($menu_id,$submenu_id)
    {
        // $menu_id = Crypt::decrypt($menu_id);
        // $submenu_id = Crypt::decrypt($submenu_id);
        $menu_id = Menu::where('slug',$menu_id)->first()->id;
        $submenu_id = SubMenu::where('slug',$submenu_id)->first()->id;
        $content = Content::with('menu','sub_menu','sub_category')->where('menu_id',$menu_id)->where('submenu_id',$submenu_id)->first();
        $menu = Menu::where('id',$menu_id)->first();
        // dd($menu->sub_menu);
        return view('content.page',compact('content','menu', 'submenu_id','menu_id'));
    }


    public function getSubCategory($menu_id,$submenu_id)
    {
        // dd("ok");
        $menu_id = Crypt::decrypt($menu_id);
        $submenu_id = Crypt::decrypt($submenu_id);
        $menu = Menu::where('id', $menu_id)->first();
        $submenu = Menu::where('id', $submenu_id)->first();
        $category = SubCategory::where('menu_id', $menu_id)->where('submenu_id',$submenu_id)->get();
        // dd($category);
        return view('content.department',compact('category','menu','submenu'));

    }

    public function getdepartmentData($menu,$submenu, $subcategory)
    {
        $menu = Menu::where('slug', $menu)->first();
        $submenu = Menu::where('slug', $submenu)->first();
        $subcategory = SubCategory::where('slug', $subcategory)->first();
        $dept_menu = DepartmentMenu::where('status',1)->get();

        // dd($menu,$submenu,$subcategory);
        $content = Content::where('menu_id',$menu->id)->where('submenu_id',$submenu->id)->where('sub_category_id', $subcategory->id)->first();
        return view('content.department-details',compact('menu','submenu', 'subcategory', 'dept_menu','content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gallery(Request $request)
    {
        // dd("ok");
        $gallery = Gallery::where('status',1)->orderby('id','desc')->paginate(40);
        return view('content.gallery', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
    public function loadMore($id)
    {
        // dd("ok");
        try {
            $decrypted = Crypt::decrypt($id);
        } catch (\Exception $e) {

        }
        // dd($decrypted);
        // $event = Event::where($decrypted['field'],'LIKE', '%'.$decrypted['args'].'%')->get();
        $event = Event::where('news_type_id','LIKE', '%'.$decrypted.'%')->orderBy('date','DESC')->get();
        return view('content.event-page',compact('event'));
    }

    public function eventSubPage($id){
        $decr = Crypt::decrypt($id);
        $important_links = Event::where('news_type_id', 'LIKE', '%3%')
                            ->where('id', $decr)
                            ->first();
                            // dd($important_links);
        return view("content.event-subpage",compact('important_links'));

    }
}
