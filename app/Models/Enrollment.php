<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }


}
