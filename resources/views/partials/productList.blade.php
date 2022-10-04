    <a href="{{ route('products.show', $product) }}">
        <div class="bg-white shadow-md rounded-md p-4">
            <div class="flex justify-between">
                <div class="flex">
                    <div class="flex-shrink-0">
                        {{-- <img class="h-12 w-12 rounded-full" src="{{ $product->image }}" alt="{{ $product->name }}"> --}}
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $product->species->name }},
                            {{ $product->gradeOption->grade->name . '/' . $product->gradeOption->name }},
                            {{ $product->dryingMethod->name }}{{ $product->treatment !== null ? ', ' . $product->treatment->name : '' }}
                        </h2>
                        <p class="text-md mt-2 leading-5 text-gray-500">
                            {{ $product->thickness }} x {{ $product->width }} x {{ $product->length }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="text-lg font-bold text-gray-900">
                        🪵
                    </span>
                </div>
            </div>
        </div>
    </a>
