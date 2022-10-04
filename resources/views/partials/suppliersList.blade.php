    {{-- <a href="{{ route('products.show', $product) }}"> --}}
    <div class="bg-white shadow-md rounded-md p-4">
        <div class="flex justify-between">
            <div class="flex">
                <div class="flex-shrink-0">
                    {{-- <img class="h-12 w-12 rounded-full" src="{{ $product->image }}" alt="{{ $product->name }}"> --}}
                </div>
                <div class="ml-4">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $supplier->name }}
                    </h2>
                </div>
            </div>
            <div class="flex items-center">
                <span class="text-lg font-bold text-gray-900">
                    🏪
                </span>
            </div>
        </div>
    </div>
    {{-- </a> --}}
