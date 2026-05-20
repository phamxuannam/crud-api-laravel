<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'original_name',
        'file_name',
        'file_path',
        'mime_type',
        'size',
        'description',
        'user_id',
        'visibility'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
