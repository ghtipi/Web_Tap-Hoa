<div class="col-md-3 mb-4">
    <div class="card h-100 shadow">
        <img src="{{ asset('images') }}/{{ $product->photo }}" alt="{{ $product->name }}"
            class="card-img-top img-fluid rounded">
        <div class="card-body">
            <h5 class="card-title text-truncate">{{ $product->name }}</h5>
            <p class="card-text text-danger fw-bold">
                {{ number_format($product->price, 0, ',', '.') }}.000 VND
            </p>
            @foreach ($product->categories as $category)
            <span class="badge rounded-pill text-bg-success">{{ $category->name }}</span>
            @endforeach
            <p class="card-text">{{ Str::limit(strip_tags($product->description), 50) }}</p>
            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
                chi tiết
            </a>
        </div>
    </div>
</div>