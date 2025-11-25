@extends ("layout")

@section("main")
    <p>{{ $category['name_en'] }}</p>

    @foreach ($category->products as $product)
        <a href="{{ route('show-product', ['slug' => $product->slug_en]) }}" wire:navigate>
        <div>
            <img style="height: 100px;" src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name_en }}">
            <p>{{ $product->name_en }}</p>
        </div>
        </a>
       
    @endforeach
@endsection