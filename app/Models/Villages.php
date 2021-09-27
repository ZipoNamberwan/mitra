<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villages extends Model
{
    use HasFactory;
    protected $table = 'vilages';
    protected $primarykey = 'id';
    protected $fillable = ['code','name'];

    public function mitras()
    {
        return $this->hasOne(Mitras::class);
    }
    public function subdistricts()
    {
        return $this->belongsTo(Villages::class);
    }
}
