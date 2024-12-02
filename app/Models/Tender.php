<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tender extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tender_id',
        'description',
        'document_price',
        'tender_security',
        'last_sale_date',
        'opening_date',
        'closing_date',
        'similar_works',
        'turnover',
        'liquid_amount',
        'department_id',
        'location_id',
        'method',
        'tender_capacity',
        'note',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department', 'id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
