<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveys extends Model
{
    use HasFactory;
    protected $table = 'surveys';
    protected $primaryKey = 'id';
    protected $fillable = ['name','start_date','end_date'];

    public function Mitras_Surveys()
    {
        return $this->hasMany(Mitras_Surveys::class);
    }
}
