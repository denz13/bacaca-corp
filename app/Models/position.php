<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class position extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'position';
    protected $primaryKey = 'pos_id';
    protected $fillable = [
        'position',
        'job',
        'salary',
        'status',
        'nature',
    ];
}
