@extends('frontend.frontend')

@section('news')

    <div class="gallery-container">
        <div class="gallery-header">
            <h1>Photo Gallery</h1>
            <p>Beautiful moments captured in time</p>
        </div>

        <div class="gallery-grid">
            <div class="gallery-item" data-category="nature">
                <img src="https://images.unsplash.com/photo-1501854140801-50d01698950b" alt="Mountain landscape" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="img-title">Mountain View</div>
                    <div class="img-category">Nature</div>
                </div>
            </div>

            

            <div class="gallery-item" data-category="travel">
                <img src="https://images.unsplash.com/photo-1523531294919-4bcd7c65e216" alt="Desert landscape" class="gallery-img">
                <div class="gallery-overlay">
                    <div class="img-title">Desert Adventure</div>
                    <div class="img-category">Travel</div>
                </div>
            </div>
        </div>
    </div>
@endsection
