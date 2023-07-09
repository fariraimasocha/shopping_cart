<x-layout>
    <div class="px-4 py-8 mx-auto space-y-4 md:px-20 md:mt-20 md:space-y-8 lg:px-40">
        <div class="container mx-auto px-5 py-5 rounded">
            <h1 class="text-2xl font-bold mb-4">Shopping Cart</h1>

            @if (session('success'))
                <div class="bg-green-200 text-green-800 px-4 py-2 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full table-auto border-gray-400 border rounded">
                <thead>
                <tr>
                    <th class="border-b border-gray-400 px-4 py-2">Name</th>
                    <th class="border-b border-gray-400 px-4 py-2">Quantity</th>
                    <th class="border-b border-gray-400 px-4 py-2">Price</th>
                    <th class="border-b border-gray-400 px-4 py-2">Total</th>
                    <th class="border-b border-gray-400 px-4 py-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td class="border-b border-gray-200 px-4 py-2 text-center">{{ $item->name }}</td>
                        <td class="border-b border-gray-200 px-4 py-2 text-center">
                            <form action="{{ route('update.cart') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                <input type="number" name="quantity" value="{{ $item->qty }}" min="1" class="w-16">
                                <button type="submit" class="ml-2">Update</button>
                            </form>
                        </td>
                        <td class="border-b border-gray-200 px-4 py-2 text-center">{{ $item->price }}</td>
                        <td class="border-b border-gray-200 px-4 py-2 text-center">{{ $item->subtotal }}</td>
                        <td class="border-b border-gray-200 px-4 py-2 text-center">
                            <form action="{{ route('delete.cart.product') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                <button type="submit" class="bg-red-700 text-white rounded px-2 py-1">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>



            <button type="submit" class="bg-black hover:bg-gray-900 text-white rounded px-1 py-1 mt-8">Checkout</button>
        </div>
    </div>
</x-layout>
