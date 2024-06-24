<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cache;
use Config;
class Cms extends Model
{
    use HasFactory;
    protected $table = 'cms';

    public function getImageAttribute($value) {
        if (!empty($value) && Storage::disk('public')->exists(Config('constants.CMS_PAGE_IMAGE_ROOT_PATH') . $value)) {
            $file = Storage::disk('public')->url(Config('constants.CMS_PAGE_IMAGE_ROOT_PATH').$value);
        }
        else{
            $file = Storage::disk('public')->url(Config('constants.CMS_PAGE_IMAGE_ROOT_PATH').$value);
        }
        return $file;
    }
    public function descriptions()
    {
        return $this->hasMany(CmsDescription::class, 'parent_id');


    }
}
