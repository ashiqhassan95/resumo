<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = [
        'institution' , 'location', 'description', 'is_present', 'start_date', 'end_date', 'course'
    ];

//    protected $dates = [
//        'start_date', 'end_date'
//    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
