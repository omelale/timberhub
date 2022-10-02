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
        return $this->belongsTo(Supplier::class);
    }

    public function species()
    {
        return $this->belongsTo(Specie::class);
    }

    public function dryingMethod()
    {
        return $this->belongsTo(DryingMethod::class);
    }
}