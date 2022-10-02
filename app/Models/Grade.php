<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';
    protected $fillable = ['name'];

    public function gradeOptions()
    {
        return $this->hasMany(GradeOption::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, GradeOption::class);
    }
}
