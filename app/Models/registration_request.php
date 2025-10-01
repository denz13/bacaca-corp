<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\students;

class registration_request extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'registration_request';
    protected $primaryKey = 'id';
    protected $fillable = ['students_id', 'remarks','status'];
    public $timestamps = true;

    public function students()
    {
        return $this->belongsTo(students::class, 'students_id');
    }
}
