<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone_Numbers extends Model
{
    use HasFactory;
    protected $table = 'phone_number';
    protected $primarykey = 'id';
    protected $fillable = 'name';

    public function mitras()
    {
        return this->belongsTo(Mitras::class);
    }
}
