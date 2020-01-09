<a href="{{ route('products.view', $product->slug) }}">
    <div class="w-full py-2 my-1 flex border-b-2 rounded-b-sm border-gray-400">
        @if (isset($product->image))
            <img src="{{ $product->image }}" class="mx-2 h-32 w-32 shadow-lg rounded">
        @else
            <img src="{{ asset('/img/image-soon.png') }}" class="mx-2 h-32 w-32 shadow-lg rounded">
        @endif
        <div class="mx-1 ml-3 w-full h-30 rounded-sm">
            <div class="h-1/4 text-gray-600 text-2xl flex">
                {{ $product->name }} <span class="text-gray-300 text-base ml-1">({{ $product->category->name }})</span>
                <form action="{{ route('cart.add', $product->slug) }}" method="POST" class="ml-auto">
                    @csrf
                    <button type="submit" class="button_sm button_gray text-sm my-auto">Add To Cart</button>
                </form>
            </div>
            <div class="h-1/4 text-gray-500 text-sm">
                ${{ $product->price }}
            </div>
            <div class="h-2/4 pt-2 text-gray-700 text-lg">
                {{ $product->short_description }}
            </div>
        </div>
    </div>
</a>
