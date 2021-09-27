<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitras extends Model
{
    use HasFactory;
    protected $table = 'mitras';
    protected $primarykey = 'email';
    protected $fillable = ['code','name','nickname','profession','address','L','P','photo','birthdate'];

    public function educations()
    {
        return $this->hasOne(Mitras::class);
    }

    public function villages()
    {
        return $this->hasOne(Mitras::class);
    }

    public function subdistrict()
    {
        return $this->hasOne(Mitras::class);
    }
    public function mitras_surveys()
    {
        return this->belongsTo(Mitras::class);
    }
    public function phone_number()
    {
        return this->belongsTo(Mitras::class);
    }
}
