<x-layout>
    <x-slot:title>
        Search
    </x-slot:title>
    <div class="container ">
        <div class="row">
            <h1 class="text-center my-4">Danh Sách Tìm Kiếm Sản Phẩm</h1>
            @foreach ($products as $product)
            <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</x-layout>