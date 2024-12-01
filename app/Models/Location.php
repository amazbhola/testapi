<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function tenders()
    {
        return $this->hasMany(Tender::class);
    }
}
