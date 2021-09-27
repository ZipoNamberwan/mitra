<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistricts extends Model
{
    use HasFactory;
    protected $table = 'subdistricts';
    protected $primarykey = 'id';
    protected $fillable = ['name','code'];

    public function mitras()
    {
        return $this->hasOne(Mitras::class);
    }

    public function villages()
    {
        return $this->hasOne(Subdistricts::class);
    }
}
