<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubMenu extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $guarded = ['id'];

    public function sub_menu(){
        return $this->hasMany(SubMenu::class, 'menu_id','id');
    }
}
