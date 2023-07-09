<x-layout>
    <div class="flex flex-wrap mt-16 px-36">
        @foreach($products as $product)
            <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-1/4 mb-4 mx-4 my-4">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <h4 class="text-xl font-bold">{{ $product->name }}</h4>
                        <p class="mt-2">{{ $product->description }}</p>
                        <p class="mt-2"><strong>Price: </strong> ${{ $product->price }}</p>
                        <p class="mt-4">
                            <a href="#" class="inline-block px-4 py-2 text-white bg-black rounded hover:bg-red-600">Add to cart</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
