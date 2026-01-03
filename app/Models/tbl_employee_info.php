<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tbl_employee_info extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_employee_info';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['firstname', 'middlename', 'lastname', 'suffix', 'dateofbirth', 'age', 'gender', 'contact_number','email','position','work_schedule','salary', 'address','picture'];

    public function workSchedules()
    {
        return $this->hasMany(work_schedule::class, 'users_id');
    }

    public function attendance()
    {
        return $this->hasMany(attendance::class, 'users_id');
    }

    public function earnings()
    {
        return $this->hasMany(earnings::class, 'users_id');
    }

    public function deductions()
    {
        return $this->hasMany(deduction::class, 'users_id');
    }

    public function positionInfo()
    {
        return $this->belongsTo(position::class, 'position', 'pos_id');
    }
}
