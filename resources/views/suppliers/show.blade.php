@extends('layouts.app')
@section('title', 'Supplier ' . $supplier->id)
@section('content')
    <div class="container-fluid mt-5">
        <div class="container mx-auto ">
            <h1 class="text-3xl mb-5 font-bold underline">
                View supplier details details
            </h1>
            <div class="mt-5 mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                <h2>{{ $supplier->name }}</h2>
            </div>
            <a href="{{ route('products.edit', ['product' => $supplier]) }}" class="focus:outline-none text-white bg-green-700 px-5 py-3 mr-3 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add products</a>
        </div>
    </div>
@endsection
