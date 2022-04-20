<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($product->images as $id => $image)
            <div class="carousel-item {{$id == 0 ? 'active' : ''}}">
                <img src="{{ Storage::url('public/products/'.$image['image_name']) }}" class="d-block w-100" alt="...">
            </div>
        @endforeach

    </div>
</div>
