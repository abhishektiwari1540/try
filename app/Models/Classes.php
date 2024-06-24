<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cache;
use Config;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';


    public function getImageAttribute($value) {
        if (!empty($value) && Storage::disk('public')->exists(Config('constants.CLASS_ROOT_PATH') . $value)) {
            $file = Storage::disk('public')->url(Config('constants.CLASS_ROOT_PATH').$value);
        }
        else{
            $file = Storage::disk('public')->url(Config('constants.CLASS_ROOT_PATH').$value);
        }
        return $file;
    }
}
