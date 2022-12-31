<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title_fa',	'title_en','menu_id','alias','description_fa','description_en','short_description_fa','short_description_en','image'];
//    protected $guarded = [];
    protected $table = 'blogs';

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\BlogFactory::new();
    }
    public function menus()
    {
        return $this->belongsToMany(Menu::class,'menu_blog');
    }
}
