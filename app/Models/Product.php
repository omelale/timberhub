<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'supplier_id',
        'species_id',
        'drying_method_id',
        'treatment_id',
        'grade_option_id',
        'thickness',
        'width',
        'length',
    ];
}
