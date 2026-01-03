<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\tbl_employee_info;

class work_schedule extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'work_schedule';
    protected $primaryKey = 'id';
    protected $fillable = ['users_id', 'day', 'time_in','time_out', 'status'];
    public $timestamps = true;

    // Relation to users
    public function users()
    {
        return $this->belongsTo(tbl_employee_info::class, 'users_id');
    }
}
