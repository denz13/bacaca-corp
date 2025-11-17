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
    protected $fillable = ['firstname', 'middlename', 'lastname', 'suffix', 'dateofbirth', 'age', 'gender', 'contact_number','email','position','position','work_schedule','salary', 'address','picture'];
}
