@extends('layouts.frontend')

@section('title', $product->title)

@section('hero')
<section class="hero-section bg-light py-4">
    <div class="container">
        <nav aria-label="breadcrumb" data-aos="fade-right">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.products.index') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
            </ol>
        </nav>
    </div>
</section>
@endsection

@section('content')
<div class="row">
    <!-- Product Details Section -->
    <div class="col-12" data-aos="fade-up">
        <div class="product-details">
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="categories">
                        @foreach($product->categories as $category)
                            <span class="badge bg-light text-dark me-1">{{ $category->name }}</span>
                        @endforeach
                    </div>

                    <div class="product-rating">
                        <span class="text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= 4 ? 'fas' : 'far' }} fa-star"></i>
                            @endfor
                            <span class="ms-1">{{ number_format(rand(40, 49) / 10, 1) }}</span>
                        </span>
                        <span class="text-muted ms-2">({{ rand(10, 150) }} reviews)</span>
                    </div>
                </div>

                <h1 class="display-6 fw-bold mb-3">{{ $product->title }}</h1>

                <div class="product-price mb-4">
                    <div class="d-flex align-items-center">
                        <h2 class="fw-bold text-primary mb-0">${{ $product->price }}</h2>
                        @if(rand(0, 1))
                            <span class="text-decoration-line-through text-muted ms-3">${{ number_format($product->price * 1.2, 2) }}</span>
                            <span class="badge bg-danger ms-2">20% OFF</span>
                        @endif
                    </div>
                    <p class="text-success mt-2 mb-0">
                        <i class="fas fa-check-circle me-1"></i> In Stock
                    </p>
                </div>

                <div class="product-description mb-4">
                    <h5 class="fw-bold">Description</h5>
                    <p class="lead text-muted">{{ $product->description }}</p>
                    <div class="collapse" id="moreDetails">
                        <p>{{ $product->description }} {{ $product->description }}</p>

                    </div>

                </div>

                <div class="product-category mb-4">
                    <h5 class="fw-bold">Category Belongs:</h5>
                    @foreach($product->categories as $category)
                    <a href="#" class="text-decoration-none">{{ $category->name }}</a>{{ !$loop->last ? ', ' : '' }}
                @endforeach                </div>

                <div class="product-actions mb-4">
                    <div class="row g-2 mb-3">
                        <div class="col-md-4">
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="button" id="decreaseQty">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" class="form-control text-center" value="1" min="1" id="quantity">
                                <button class="btn btn-outline-secondary" type="button" id="increaseQty">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <button class="btn btn-primary w-100 btn-lg">
                                <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-outline-secondary me-2">
                            <i class="far fa-heart me-1"></i> Add to Wishlist
                        </button>
                        <button class="btn btn-outline-secondary">
                            <i class="fas fa-share-alt me-1"></i> Share
                        </button>
                    </div>
                </div>

                <div class="product-meta border-top pt-3">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <p class="mb-1"><strong>SKU:</strong> <span class="text-muted">{{ strtoupper(substr(md5($product->id), 0, 8)) }}</span></p>
                            <p class="mb-0"><strong>Categories:</strong>
                                @foreach($product->categories as $category)
                                    <a href="#" class="text-decoration-none">{{ $category->name }}</a>{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <p class="mb-1"><strong>Free shipping:</strong> <span class="text-muted">On orders over $50</span></p>
                            <p class="mb-0"><strong>Delivery:</strong> <span class="text-muted">1-3 business days</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Product Tabs -->
<div class="row mt-5" data-aos="fade-up">
    <div class="col-12">
        <ul class="nav nav-tabs mb-4" id="productTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">
                    Product Details
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button" role="tab" aria-controls="specs" aria-selected="false">
                    Specifications
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">
                    Reviews <span class="badge bg-primary rounded-pill ms-1">{{ rand(10, 150) }}</span>
                </button>
            </li>
        </ul>

        <div class="tab-content p-4 bg-light rounded" id="productTabContent">
            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="mb-3">About {{ $product->title }}</h4>
                        <p>{{ $product->description }}</p>
                        <p>{{ $product->description }}</p>

                        <h5 class="mt-4 mb-3">Features</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-transparent"><i class="fas fa-check-circle text-success me-2"></i> Premium quality materials</li>
                                    <li class="list-group-item bg-transparent"><i class="fas fa-check-circle text-success me-2"></i> Durable construction</li>
                                    <li class="list-group-item bg-transparent"><i class="fas fa-check-circle text-success me-2"></i> Easy to maintain</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-transparent"><i class="fas fa-check-circle text-success me-2"></i> Versatile design</li>
                                    <li class="list-group-item bg-transparent"><i class="fas fa-check-circle text-success me-2"></i> Space-saving solution</li>
                                    <li class="list-group-item bg-transparent"><i class="fas fa-check-circle text-success me-2"></i> 1-year warranty included</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="mb-3">Delivery Information</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-truck text-primary me-2"></i> Free shipping on orders over $50</li>
                                    <li class="mb-2"><i class="fas fa-calendar-alt text-primary me-2"></i> Delivery in 1-3 business days</li>
                                    <li class="mb-2"><i class="fas fa-undo text-primary me-2"></i> 30-day returns policy</li>
                                    <li><i class="fas fa-shield-alt text-primary me-2"></i> Secure payment</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                <h4 class="mb-4">Technical Specifications</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row" width="30%">Dimensions</th>
                                <td>{{ rand(10, 40) }}cm x {{ rand(20, 50) }}cm x {{ rand(5, 15) }}cm</td>
                            </tr>
                            <tr>
                                <th scope="row">Weight</th>
                                <td>{{ number_format(rand(100, 500) / 100, 2) }} kg</td>
                            </tr>
                            <tr>
                                <th scope="row">Material</th>
                                <td>Premium quality materials</td>
                            </tr>
                            <tr>
                                <th scope="row">Color Options</th>
                                <td>Black, White, Silver</td>
                            </tr>
                            <tr>
                                <th scope="row">Warranty</th>
                                <td>1 year limited warranty</td>
                            </tr>
                            <tr>
                                <th scope="row">Made in</th>
                                <td>USA</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="text-center p-4">
                            <h2 class="display-3 fw-bold text-primary mb-0">{{ number_format(rand(40, 49) / 10, 1) }}</h2>
                            <div class="text-warning mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="{{ $i <= 4 ? 'fas' : 'far' }} fa-star"></i>
                                @endfor
                            </div>
                            <p class="text-muted mb-0">Based on {{ rand(10, 150) }} reviews</p>
                        </div>

                        <div class="rating-bars p-4">
                            @for ($i = 5; $i >= 1; $i--)
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-warning me-2">
                                        {{ $i }} <i class="fas fa-star"></i>
                                    </div>
                                    <div class="progress flex-grow-1" style="height: 8px;">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                             style="width: {{ $i > 3 ? rand(60, 95) : rand(5, 40) }}%"></div>
                                    </div>
                                    <span class="ms-2 text-muted small">{{ rand(5, 95) }}%</span>
                                </div>
                            @endfor
                        </div>

                        <div class="text-center mt-3">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                Write a Review
                            </button>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h4 class="mb-3">Customer Reviews</h4>

                        @for ($i = 1; $i <= 3; $i++)
                            <div class="card mb-3 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h5 class="mb-0">Great product, highly recommend!</h5>
                                        <div class="text-warning">
                                            @for ($j = 1; $j <= 5; $j++)
                                                <i class="{{ $j <= rand(3, 5) ? 'fas' : 'far' }} fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-muted small mb-3">By John D. on {{ \Carbon\Carbon::now()->subDays(rand(1, 60))->format('M d, Y') }}</p>
                                    <p>{{ $product->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="badge bg-light text-dark me-1">Verified Purchase</span>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-outline-secondary me-1">
                                                <i class="far fa-thumbs-up me-1"></i> Helpful ({{ rand(0, 30) }})
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="far fa-comment me-1"></i> Reply
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        <div class="text-center mt-4">
                            <button class="btn btn-outline-primary">Load More Reviews</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Write a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="reviewTitle" class="form-label">Review Title</label>
                        <input type="text" class="form-control" id="reviewTitle" placeholder="Summarize your experience">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <div class="rating-stars fs-3">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="far fa-star text-warning cursor-pointer"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reviewContent" class="form-label">Your Review</label>
                        <textarea class="form-control" id="reviewContent" rows="4" placeholder="Share your experience with this product"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="reviewImage" class="form-label">Add Photos (optional)</label>
                        <input class="form-control" type="file" id="reviewImage" multiple>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Submit Review</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quantity buttons
        const quantityInput = document.getElementById('quantity');
        const decreaseBtn = document.getElementById('decreaseQty');
        const increaseBtn = document.getElementById('increaseQty');

        decreaseBtn.addEventListener('click', function() {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', function() {
            const currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        // Rating stars in review modal
        const ratingStars = document.querySelectorAll('.rating-stars .fa-star');

        ratingStars.forEach((star, index) => {
            star.addEventListener('mouseover', function() {
                // Reset all stars
                ratingStars.forEach(s => s.className = 'far fa-star text-warning cursor-pointer');

                // Fill stars up to current star
                for (let i = 0; i <= index; i++) {
                    ratingStars[i].className = 'fas fa-star text-warning cursor-pointer';
                }
            });

            star.addEventListener('click', function() {
                // Set rating value
                const ratingValue = index + 1;
                console.log('Rating selected:', ratingValue);

                // Keep stars filled after click
                for (let i = 0; i <= index; i++) {
                    ratingStars[i].className = 'fas fa-star text-warning cursor-pointer';
                }

                for (let i = index + 1; i < ratingStars.length; i++) {
                    ratingStars[i].className = 'far fa-star text-warning cursor-pointer';
                }
            });
        });

        // Reset stars when mouse leaves container
        document.querySelector('.rating-stars').addEventListener('mouseleave', function() {
            // Find selected rating (filled stars)
            const selectedRating = document.querySelectorAll('.rating-stars .fas.fa-star').length;

            // If no rating selected, reset all stars
            if (selectedRating === 0) {
                ratingStars.forEach(s => s.className = 'far fa-star text-warning cursor-pointer');
            } else {
                // Otherwise, keep selected stars filled
                ratingStars.forEach((s, i) => {
                    s.className = i < selectedRating ?
                        'fas fa-star text-warning cursor-pointer' :
                        'far fa-star text-warning cursor-pointer';
                });
            }
        });
    });
</script>
@endsection
