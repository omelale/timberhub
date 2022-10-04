<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function show(Supplier $supplier)
    {
        $products = $supplier->products;
        return view('suppliers.show', compact('supplier', 'products'));
    }

    public function addProducts(Supplier $supplier)
    {
        $products = Product::with('species', 'dryingMethod', 'treatment', 'gradeOption')->get();
        return view('suppliers.addProducts', compact('supplier', 'products'));
    }

    public function postAddProducts(Supplier $supplier, Request $request)
    {
        // validate products in request
        $products = Product::all()->pluck('id')->toArray();
        $validated = $request->validate([
            'values' => 'required|string|min:1',
        ]);
        $data = explode(',', $validated['values']);
        foreach ($data as $value) {
            if (!in_array($value, $products)) {
                Session::flash('message', 'Invalid product id: ' . $value);
                return redirect()->route('suppliers.addProducts', $supplier->id);
            }
        }
        $supplier->products()->sync($data);
        Session::flash('message', 'Successfully added products!');
        return redirect()->route('suppliers.show', $supplier);
    }
}
