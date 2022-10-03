@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <h1 class="text-3xl font-bold underline">
        Products
    </h1>
    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('products.show', $product) }}">
                    {{ $product->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
