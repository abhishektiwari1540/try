<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cache;
use Config;

class System_document extends Model
{
    use HasFactory;
    protected $table = 'system_document';


    public function getImageAttribute($value) {
        if (!empty($value) && Storage::disk('public')->exists(Config('constants.SYSTEM_DOCUMENT_IMAGE_ROOT_PATH') . $value)) {
            $file = Storage::disk('public')->url(Config('constants.SYSTEM_DOCUMENT_IMAGE_ROOT_PATH').$value);
        }
        else{
            $file = Storage::disk('public')->url(Config('constants.SYSTEM_DOCUMENT_IMAGE_ROOT_PATH').$value);
        }
        return $file;
    }
}
