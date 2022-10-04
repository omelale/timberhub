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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('species', 'dryingMethod', 'treatment', 'gradeOption')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->getOptions();
        return view('products.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validateProduct($request);
        $potential = Product::where('species_id', $validated['species'])
            ->where('drying_method_id', $validated['dryingMethod'])
            ->where('treatment_id', $validated['treatment'])
            ->where('grade_option_id', $validated['grade'])
            ->where('thickness', $validated['thickness'])
            ->where('width', $validated['width'])
            ->where('length', $validated['length'])
            ->first();
        if ($potential) {
            Session::flash('error', 'Product already exists');
            return Redirect::back();
        }
        $product = new Product();
        $this->saveProduct($validated, $product);
        Session::flash('message', 'Successfully created the product!');
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
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = $this->getOptions();
        return view('products.edit', compact('data', 'product'));
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
        $validated = $this->validateProduct($request);
        $this->saveProduct($validated, $product);
        Session::flash('message', 'Successfully updated the product!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Session::flash('message', 'Successfully deleted the product!');
        return Redirect::to('products');
    }

    /**
     * Generate the options to populate the select forms
     *
     * @param  null
     * @return Array
     */
    private function getOptions()
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
        return compact('suppliers', 'species', 'treatments', 'grades', 'gradeOptions', 'dryingMethods', 'options');
    }

    /**
     * Validate the product data
     *
     * @param  \Illuminate\Http\Request $request
     * @return Array
     */
    private function validateProduct(Request $request)
    {
        $species = Specie::all();
        $speciesIds = $species->pluck('id');
        $treatments = Treatment::all();
        $treatmentIds = $treatments->pluck('id');
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
        return $validated;
    }

    /**
     * Save the product data
     *
     * @param  Array $validated
     * @param  \App\Models\Product $product
     * @return null
     */
    private function saveProduct($validated, $product)
    {
        $product->species_id = $validated['species'];
        $product->drying_method_id = $validated['dryingMethod'];
        $product->grade_option_id = $validated['grade'];
        $product->thickness = $validated['thickness'];
        $product->width = $validated['width'];
        $product->length = $validated['length'];
        $product->treatment_id = $validated['treatment'] !== null ? $validated['treatment'] : null;
        $product->save();
    }
}
