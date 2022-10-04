@extends('layouts.app')
@section('title', 'Supplier ' . $supplier->id)
@section('content')
    <div class="container-fluid mt-5">
        <div class="container mx-auto ">
            <h1 class="text-3xl mb-5 font-bold underline">
                View supplier details
            </h1>
            <div class="mt-5 mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                <h2>{{ $supplier->name }}</h2>
            </div>
            <h2 class="text-xl mb-5 font-bold">
                Products
            </h2>
            @if (count($products) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-5">
                    @foreach ($products as $product)
                        @include('partials.productList', ['product' => $product])
                    @endforeach
                </div>
            @else
                <div class="container mx-auto ">
                    <h2 class="text-xl mb-4 font-bold ">
                        There are currently no products available
                    </h2>
                </div>
            @endif
            <a href="{{ route('suppliers.addProducts', ['supplier' => $supplier]) }}" class="focus:outline-none text-white bg-green-700 px-5 py-3 mr-3 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add products to supplier</a>
        </div>
    </div>
@endsection
