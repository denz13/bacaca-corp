<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class earnings extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'earnings';
    protected $primaryKey = 'id';
    protected $fillable = ['users_id', 'earnings', 'status'];
    public $timestamps = true;

    // Relation to user
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
