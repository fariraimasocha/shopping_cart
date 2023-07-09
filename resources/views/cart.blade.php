<x-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Shopping Cart</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border border-gray-200">
            <thead>
            <tr>
                <th class="border-b border-gray-200">Name</th>
                <th class="border-b border-gray-200">Quantity</th>
                <th class="border-b border-gray-200">Price</th>
                <th class="border-b border-gray-200">Total</th>
                <th class="border-b border-gray-200"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td class="border-b border-gray-200">{{ $item->name }}</td>
                    <td class="border-b border-gray-200">
                        <form action="{{ route('update.cart') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                            <input type="number" name="quantity" value="{{ $item->qty }}" min="1" class="w-16">
                            <button type="submit" class="ml-2">Update</button>
                        </form>
                    </td>
                    <td class="border-b border-gray-200">{{ $item->price }}</td>
                    <td class="border-b border-gray-200">{{ $item->subtotal }}</td>
                    <td class="border-b border-gray-200">
                        <form action="{{ route('delete.cart.product') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
