<x-layout>
    <h1 class=" text-center">Chi tiết sản Phẩm {{ $product->name }} </h1>
    <div class="container-fluid">
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-5 text-center">
                <img src="{{ asset('images') }}/{{ $product->photo }}" alt="{{ $product->name }}"
                    class="img-fluid rounded shadow-lg w-100">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-7">
                <h2 class="text-primary fw-bold">{{ $product->name }}</h2>
                <h4 class="text-danger fw-bold">{{ number_format($product->price, 0, ',', '.') }}.000 VND</h4>
                <p>{!! $product->description !!}</p>

            </div>
        </div>
    </div>
</x-layout>