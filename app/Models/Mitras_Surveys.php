<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitras_Surveys extends Model
{
    use HasFactory;

    public function statuses()
    {
        return $this->belongsTo(Statuses::class);
    }
    public function mitras()
    {
        return $this->belongsTo(Mitras::class);
    }
    public function surveys()
    {
        return $this->belongsTo(Surveys::class);
    }
}
