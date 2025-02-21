<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone','profile_image'];

    public function subjects()
{
    return $this->belongsToMany(Subject::class);
}

}
