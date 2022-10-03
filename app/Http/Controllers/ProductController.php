<?php

namespace App\Http\Controllers;

use App\Models\DryingMethod;
use App\Models\Grade;
use App\Models\GradeOption;
use App\Models\Product;
use App\Models\Specie;
use App\Models\Supplier;
use App\Models\Treatment;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $species = Specie::all();
        $treatments = Treatment::all();
        $grades = Grade::all();
        $gradeOptions = GradeOption::all();
        $options = [];
        foreach ($grades as $grade) {
            $filtered = $gradeOptions->filter(function ($value, $key) use ($grade) {
                return $value->grade_id == $grade->id;
            });
            $options[$grade->id] = $filtered;
        }
        $dryingMethods = DryingMethod::all();
        return view('products.create', compact('suppliers', 'species', 'treatments', 'grades', 'gradeOptions', 'dryingMethods', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $species = Specie::all();
        $speciesIds = $species->pluck('id');
        $treatments = Treatment::all();
        $treatmentIds = $treatments->pluck('id');
        $grades = Grade::all();
        $gradeIds = $grades->pluck('id');
        $gradeOptions = GradeOption::all();
        $gradeOptionIds = $gradeOptions->pluck('id');
        $dryingMethods = DryingMethod::all();
        $dryingMethodIds = $dryingMethods->pluck('id');
        $validated = $request->validate([
            'species' => 'required|in:' . $speciesIds->join(','),
            'dryingMethod' => 'required|in:' . $dryingMethodIds->join(','),
            'grade' => 'required|in:' . $gradeOptionIds->join(','),
            'thickness' => 'required|numeric|gt:0',
            'width' => 'required|numeric|gt:0',
            'length' => 'required|numeric|gt:0',
            'treatment' => 'nullable|in:' . $treatmentIds->join(','),
        ]);
        // check if i should save like this or save through relationship
        $product = new Product();
        $product->species_id = $validated['species'];
        $product->drying_method_id = $validated['dryingMethod'];
        $product->grade_option_id = $validated['grade'];
        $product->thickness = $validated['thickness'];
        $product->width = $validated['width'];
        $product->length = $validated['length'];
        // $product->treatment_id = $validated['treatment'] !== null ? $validated['treatment'] : null;
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
