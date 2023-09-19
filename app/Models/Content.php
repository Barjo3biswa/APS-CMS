<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function menu(){
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

    public function sub_menu(){
        return $this->hasOne(SubMenu::class, 'id', 'submenu_id');
    }

    public function sub_category(){
        return $this->hasOne(SubCategory::class, 'id', 'sub_category_id');
    }
}
