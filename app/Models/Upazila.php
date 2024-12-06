<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $table = 'upazilas';

    protected $fillable = [
        'name',
        'bn_name',
        'lat',
        'long',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function tenders()
    {
        return $this->hasMany(Tender::class);
    }

}
