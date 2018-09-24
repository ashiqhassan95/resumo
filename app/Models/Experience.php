<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';
    protected $fillable = [
        'company', 'title', 'description', 'start_date', 'end_date', 'is+present', 'location', 'resume_id'
    ];

//    protected $dates = [
//        'start_date', 'end_date'
//    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
