@php
    $cartItems = Cart::content();
  $totalItems = $cartItems->sum('qty');
@endphp

@if ($totalItems > 0)
    <span class="bg-red-500 text-white px-2 py-1 rounded-full">{{ $totalItems }}</span>
@else
    <span>0</span>
@endif
