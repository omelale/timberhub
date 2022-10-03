@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="container-fluid mt-5">
        @if (count($products) > 0)
            <div class="container mx-auto">
                <h1 class="text-3xl mb-5 font-bold underline">
                    Browse our products
                </h1>
                <ul >
                    @foreach ($products as $product)
                        @include('partials.productList', ['product' => $product])
                    @endforeach
                </ul>
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
