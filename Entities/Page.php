<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title_fa',	'title_en','menu_id','alias','description_fa','description_en','short_description_en','short_description_fa'];
//    protected $guarded = [];
    protected $table = 'pages';


    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\PageFactory::new();
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
