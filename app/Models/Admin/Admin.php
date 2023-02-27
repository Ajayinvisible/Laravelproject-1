<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'name',
        'username',
        'email',
        'gender',
        'role',
        'is_active',
        'password'
    ];

    public function getNameAttribute($value){
        return Str::title($value);
    }

    public function gallery(){
        return $this->hasOne(AdminGallery::class)->latest();
    }

    public function allImage(){
        return $this->hasMany(AdminGallery::class,'admin_id','id');
    }
}
