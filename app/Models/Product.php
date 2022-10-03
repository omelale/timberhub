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

    public function supplier()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_products', 'product_id', 'supplier_id');
    }

    public function species()
    {
        return $this->belongsTo(Specie::class);
    }

    public function dryingMethod()
    {
        return $this->belongsTo(DryingMethod::class);
    }

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }

    public function gradeOption()
    {
        return $this->belongsTo(GradeOption::class);
    }
}
