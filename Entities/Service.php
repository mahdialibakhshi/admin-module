<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title_fa','image',	'title_en','short_description_fa','short_description_en'];
//    protected $guarded = [];
    protected $table = 'services';

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\ServiceFactory::new();
    }
}
