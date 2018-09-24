<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = [
        'name', 'sex', 'birth_date',
        'image', 'email', 'phone',
        'website', 'bio', 'street',
        'city', 'state', 'country',
        'tag_line', 'image', 'resume_id'
    ];

    protected $dates = [
        'start_date', 'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        $array = [
            $this->street,
            $this->city,
            $this->state,
            $this->country
        ];
        return implode(', ', $array);
    }
}
