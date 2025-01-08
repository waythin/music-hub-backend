<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumentTeacher extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }

    public function instrument()
    {
        return $this->belongsTo(Instrument::class, 'instrument_id', 'id');
    }
}
