<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'nik', 'nama_lengkap', 'alamat', 'nohp', 'tgl_lahir'];

    public function user(){
        return $this->belongsTo(User::class,'id','id_user');
    }
}
