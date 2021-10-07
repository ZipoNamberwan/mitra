<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitras extends Model
{
    use HasFactory;
    protected $primaryKey = 'email';
    protected $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

    public function educationdetail()
    {
        return $this->belongsTo(Educations::class, 'education');
    }
    public function villagedetail()
    {
        return $this->belongsTo(Villages::class, 'village');
    }
    public function subdistrictdetail()
    {
        return $this->belongsTo(Subdistricts::class, 'subdistrict');
    }
    public function surveys()
    {
        return $this->belongsToMany(Surveys::class, 'mitras_surveys', 'mitra_id', 'survey_id', 'email', 'id');
    }
    public function phonenumbers()
    {
        return $this->hasMany(PhoneNumbers::class, 'mitra_id', 'email');
    }
}
