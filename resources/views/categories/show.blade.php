@extends ("layout")

@section("main")
    <p>{{ $category['name'] }}</p>

    @foreach ($category->products as $product)
        <a href="{{ route('show-product', ['slug' => $product->slug]) }}" wire:navigate>
        <div>
            <img style="height: 100px;" src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}">
            <p>{{ $product->name }}</p>
        </div>
        </a>
       
    @endforeach
@endsection