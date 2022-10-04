@extends('layouts.app')
@section('title', 'Suppliers')
@section('content')
    <div class="container-fluid mt-5">
        @if (count($suppliers) > 0)
            <div class="container mx-auto">
                <div class="flex mb-5">
                    <h1 class="text-3xl mb-5 font-bold underline">
                        Browse our suppliers
                    </h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($suppliers as $supplier)
                        @include('partials.suppliersList', ['supplier' => $supplier])
                    @endforeach
                </div>
            </div>
        @else
            <div class="container mx-auto ">
                <h2 class="text-3xl mb-4 font-bold ">
                    There are currently no suppliers available
                </h2>
            </div>
        @endif
    </div>

@endsection
