<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeOption extends Model
{
    use HasFactory;

    protected $table = 'grade_options';
    protected $fillable = ['name', 'grade_id'];
    protected $with = ['grade'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
