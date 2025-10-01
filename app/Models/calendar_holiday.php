<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class calendar_holiday extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'calendar_holiday';
    protected $primaryKey = 'id';
    protected $fillable = ['repeat_type', 'day', 'date', 'title', 'status'];
    public $timestamps = true;

    // Scope to get only active holidays
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
