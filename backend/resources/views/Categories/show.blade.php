<x-layout>
    <h1 class="text-center">Danh mục: {{ $category->name }}</h1>
    <div class="container-fluid mt-4">
        <div class="row">
            @if ($products && $products->count() > 0)
                @foreach ($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow">
                        <img src="{{ asset('images') }}/{{ $product->photo }}" alt="{{ $product->name }}"
                            class="card-img-top img-fluid rounded">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $product->name }}</h5>
                            <p class="card-text text-danger fw-bold">
                                {{ number_format($product->price, 0, ',', '.') }}.000 VND
                            </p>
                            <p class="card-text">{{ Str::limit(strip_tags($product->description), 50) }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
                                chi tiết
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center">Không có sản phẩm nào trong danh mục này.</p>
            @endif
        </div>
    </div>
</x-layout>
