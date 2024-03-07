<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'nama', 'photo', 'keterangan'];

    public function user()
    {
        return $this->belongsTo(User::class,'id','id_user');
    }

}
