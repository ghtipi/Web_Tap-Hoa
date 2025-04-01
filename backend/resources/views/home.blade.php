<x-layout>
    <x-slot:title>
        Trang Chủ
    </x-slot:title>
    <div class="container">
        <h1 class="text-center my-4">Danh Sách Sản Phẩm</h1>
        <div class="row">
            @foreach ($products as $product)
            <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</x-layout>