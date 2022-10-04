@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="container-fluid mt-5">
        @if (count($products) > 0)
            <div class="container mx-auto">
                <div class="flex mb-5">
                    <h1 class="text-3xl mb-5 font-bold underline">
                        Browse our products
                    </h1>
                    {{-- show inline link to create new product tailwind --}}
                    <a href="{{ route('products.create') }}" class="ml-auto inline-flex items-center px-5 py-3 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition duration-150 ease-in-out">
                        Create new product
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($products as $product)
                        @include('partials.productList', ['product' => $product])
                    @endforeach
                </div>
            </div>
        @else
            <div class="container mx-auto ">
                <h2 class="text-3xl mb-4 font-bold ">
                    There are currently no products available
                </h2>
                <a href="{{ route('products.create') }}" class="focus:outline-none text-white bg-green-700 px-5 py-3 mr-3 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create a new product now</a>
            </div>
        @endif
    </div>

@endsection
