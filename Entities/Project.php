<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title_fa',	'title_en',	'description_fa',	'description_en' ,  'image','alias','short_description_fa','short_description_en'];
//    protected $guarded = [];
    protected $table = 'projects';
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ProjectFactory::new();
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class,'project_menu');
    }
}
