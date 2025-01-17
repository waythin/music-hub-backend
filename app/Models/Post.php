<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function instrument()
    {
        return $this->belongsTo(Instrument::class, 'instrument_id', 'id');
    }


    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }


    public function enrollment()
    {
        return $this->hasMany(Enrollment::class, 'post_id', 'id');
    }

  



}
