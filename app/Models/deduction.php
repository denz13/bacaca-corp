<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class deduction extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'payroll_deduction';
    protected $primaryKey = 'id';
    protected $fillable = ['users_id', 'description', 'amount', 'status'];
    public $timestamps = true;

    // Relation to user
    public function user()
    {
        return $this->belongsTo(tbl_employee_info::class, 'users_id');
    }
}
