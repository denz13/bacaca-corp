<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class attendance extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'attendance';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['users_id', 'action', 'timestamp', 'time', 'is_late','late_minutes', 'is_undertime', 'undertime_minutes', 'overtime_minutes'];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
