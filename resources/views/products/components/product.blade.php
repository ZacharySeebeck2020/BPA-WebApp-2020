<a href="{{ route('products.view', $product->slug) }}">
    <div class="w-full py-2 my-1 flex border-b-2 rounded-b-sm border-gray-400">
        @if (isset($product->image))
            <div style="background-image: url({{ $product->image }}); background-color: white; background-size: contain; width:auto; height: 110px; width: 220px; background-repeat:no-repeat; background-position: center center" class="mx-2 h-64 w-64 rounded mx-auto my-3"></div>
        @else
            <div style="background-image: url({{ asset('/img/image-soon.png') }}); background-color: white; background-size: contain; width:auto; height: 110px; width: 220px; background-repeat:no-repeat; background-position: center center" class="mx-2 h-64 w-64 rounded mx-auto my-3"></div>
        @endif
        <div class="mx-1 ml-3 w-full h-30 rounded-sm">
            <div class="h-1/4 text-gray-600 text-2xl flex md:flex-row flex-col">
                {{ $product->name }} <span class="text-gray-300 text-base ml-1 md:visible hidden">({{ $product->category->name }})</span>
                <form action="{{ route('cart.add', $product->slug) }}" method="POST" class="md:ml-auto md:my-auto py-1">
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
