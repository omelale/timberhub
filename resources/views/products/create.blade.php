{{-- create form to create product --}}
@extends('layouts.app')
@section('title', 'Create Product')
@section('content')
    <div class="container-fluid mt-5">
        <div class="container mx-auto ">
            <h1 class="text-3xl font-bold underline">
                Create product
            </h1>
            <form action="{{ route('products.store') }}" class="mt-5" method="post">
                @csrf
                <div class="mb-6">
                    <label for="species" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Species</label>
                    <select id="species" name="species" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($species as $specie)
                            <option value="{{ $specie->id }}" {{ old('species') == $specie->id ? "selected" : "" }}>{{ $specie->name }}</option>
                        @endforeach
                    </select>
                    @error('species')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="dryingMethod" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drying method</label>
                    <select id="dryingMethod" name="dryingMethod" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($dryingMethods as $dryingMethod)
                            <option value="{{ $dryingMethod->id }}" {{ old('dryingMethod') == $dryingMethod->id ? "selected" : "" }}>{{ $dryingMethod->name }}</option>
                        @endforeach
                    </select>
                    @error('dryingMethods')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Grade</label>
                    <select id="grade" name="grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('grade') border-red-500 text-red-900 @enderror">
                        @foreach ($grades as $grade)
                            @isset($options[$grade->id])
                                @foreach ($options[$grade->id] as $option)
                                    <option value="{{ $option->id }}" {{ old('grade') == $option->id ? "selected" : "" }}>{{ $grade->name }} - {{ $option->name }}</option>
                                @endforeach
                            @endisset
                        @endforeach
                    </select>
                    @error('grade')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="thickness" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Thickness (mm)</label>
                    <input type="number" id="thickness" name="thickness" value="{{ old('thickness') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                    @error('thickness')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="width" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Width (mm)</label>
                    <input type="number" id="width" name="width" value="{{ old('width') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                    @error('width')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="length" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Length (mm)</label>
                    <input type="number" id="length" name="length" value="{{ old('length') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                    @error('length')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="treatment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Treatment (optional)</label>
                    <select id="treatment" name="treatment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value>-</option>
                        @foreach ($treatments as $treatment)
                            <option value="{{ $treatment->id }}" {{ old('treatment') == $treatment->id ? "selected" : "" }}>{{ $treatment->name }}</option>
                        @endforeach
                    </select>
                    @error('treatments')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">This field is not required</p>
                </div>
                <button type="submit" class="focus:outline-none text-white bg-green-700 px-5 py-3 mr-3 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create new product</button>
            </form>
        </div>
    </div>
@endsection
