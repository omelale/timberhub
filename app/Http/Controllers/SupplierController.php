<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    public function addProducts(Supplier $supplier)
    {   
        $products = Product::with('species', 'dryingMethod', 'treatment', 'gradeOption')->get();
        return view('suppliers.addProducts', compact('supplier', 'products'));
    }
}
