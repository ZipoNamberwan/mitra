<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    use HasFactory;
    protected $table = 'educations';
    protected $primarykey = 'id';
    protected $fillable = 'name';

    public function mitras()
    {
        return $this->hasOne(Mitras::class);
    }
}
