@extends('layouts.app')
@section('title', 'Add products to supplier ' .$supplier->name)
@section('content')
    <div class="container-fluid mt-5">
        <div class="container mx-auto ">
            <h1 class="text-3xl mb-5 font-bold underline">
                Add products to {{ $supplier->name }}
            </h1>
            <div class="mt-5 mb-6">
            </div>
        </div>
    </div>
@endsection
