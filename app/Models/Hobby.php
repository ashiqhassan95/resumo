<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $table = 'hobbies';
    protected $fillable = [
        'title', 'resume_id'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }


}
