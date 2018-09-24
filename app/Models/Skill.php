<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = [
        'title', 'level', 'resume_id'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function levelText()
    {
        if($this->level == 1) {
            return 'Beginner';
        }
        else if($this->level == 2) {
            return 'Competent';
        }
        else if($this->level == 3) {
            return 'Intermediate';
        }
        else if($this->level == 4) {
            return 'Advanced';
        }
        else if($this->level == 5) {
            return 'Expert';
        }
    }
}
