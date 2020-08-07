<?php
namespace App\Models;
use App\Models\Blog;
use Illuminate\Foundation\Auth\Admin as Authenticatable;

class Admin extends Authenticatable
{
    protected $guarded=[];
    public function blogs(){
    	return $this->hasMany(Blog::class, 'id_admin', 'id');
    }
}