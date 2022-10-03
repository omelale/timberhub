<li class="mb-2">
    <a href="{{ route('products.show', $product) }}">
        🪵
        {{ $product->species->name }},
        {{ $product->gradeOption->grade->name . '/' . $product->gradeOption->name }},
        {{ $product->dryingMethod->name }},
        {{ $product->treatment !== null ? $product->treatment->name . ',' : '' }}
        {{ $product->thickness }} x
        {{ $product->width }} x
        {{ $product->length }}
    </a>
</li>
