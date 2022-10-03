@extends('layouts.app')
@section('title', 'Product' . $product->id)
@section('content')
    <div class="container-fluid mt-5">
        <div class="container mx-auto ">
            <h1 class="text-3xl mb-5 font-bold underline">
                View product
            </h1>
            <div class="mb-6">
                <label for="species" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Specie</label>
                <h2>{{ $product->species->name }}</h2>
            </div>
            <div class="mb-6">
                <label for="dryingMethod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drying method</label>
                {{ $product->dryingMethod->name }}
            </div>
            <div class="mb-6">
                <label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Grade</label>
                {{ $product->gradeOption->grade->name . '/' . $product->gradeOption->name }}
            </div>
            <div class="mb-6">
                <label for="thickness" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Thickness (mm)</label>
                {{ $product->thickness }}
            </div>
            <div class="mb-6">
                <label for="width" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Width (mm)</label>
                {{ $product->width }}
            </div>
            <div class="mb-6">
                <label for="length" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Length (mm)</label>
                {{ $product->length }}
            </div>
            <div class="mb-6">
                <label for="treatment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Treatment (optional)</label>
                {{ $product->treatment !== null ? $product->treatment->name : 'Not specified' }}
            </div>
            <button type="submit" class="focus:outline-none text-white bg-green-700 px-5 py-3 mr-3 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit </button>
            <button type="submit" class="focus:outline-none text-white bg-red-600 px-5 py-3 mr-3 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Delete </button>
        </div>
    </div>
@endsection
