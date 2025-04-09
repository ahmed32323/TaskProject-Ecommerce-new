@extends('layouts.frontend')

@section('title', 'Shop Collection')

@section('hero')
<section class="hero-section">
    <div class="container text-center">
        <h1 data-aos="fade-up" class="display-4 fw-bold">Discover Our Collection</h1>
        <p data-aos="fade-up" data-aos-delay="100" class="lead">Explore our curated selection of high-quality products</p>
        <div data-aos="fade-up" data-aos-delay="200" class="d-flex justify-content-center mt-4">
            <form class="d-flex position-relative w-75">
                <input class="form-control form-control-lg rounded-pill" type="search" placeholder="Search products..." aria-label="Search">
                <button class="btn btn-primary rounded-circle position-absolute end-0 top-0 bottom-0 m-1" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2 class="fw-bold">Our Products</h2>
        <p class="text-muted">Showing all {{ count($products) }} products</p>
    </div>
    <div class="col-md-4">
        <div class="d-flex justify-content-md-end align-items-center h-100">
            <select class="form-select">
                <option selected>Sort by: Featured</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
                <option>Newest First</option>
                <option>Best Selling</option>
            </select>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-3 col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="mb-4">Categories</h5>
                <div class="d-grid gap-2">
                    <!-- All Products Button -->
                    <button class="btn btn-outline-primary btn-sm text-start rounded-pill" type="button">
                        All Products
                    </button>

                    <!-- Dynamically Display Categories -->
                    @foreach($categories as $category)
                        <button class="btn btn-outline-secondary btn-sm text-start rounded-pill" type="button">
                            {{ $category->name }}
                        </button>
                    @endforeach

                </div>


                <hr>

                <h5 class="mb-3">Price Range</h5>
                <div class="range">
                    <input type="range" class="form-range" min="0" max="1000" id="priceRange">
                </div>
                <div class="d-flex justify-content-between">
                    <span>$0</span>
                    <span>$1000</span>
                </div>

                <hr>

                <h5 class="mb-3">Ratings</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="rating5">
                    <label class="form-check-label" for="rating5">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="rating4">
                    <label class="form-check-label" for="rating4">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="far fa-star text-warning"></i>
                        & Up
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="rating3">
                    <label class="form-check-label" for="rating3">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="far fa-star text-warning"></i>
                        <i class="far fa-star text-warning"></i>
                        & Up
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9 col-md-8">
        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up">
                    <div class="card h-100">
                        <div class="position-relative overflow-hidden">
                            {{-- <img src="https://via.placeholder.com/800x800?text={{ urlencode($product->title) }}" class="card-img-top" alt="{{ $product->title }}"> --}}
                            <div class="position-absolute top-0 end-0 p-2">
                                <button class="btn btn-light btn-sm rounded-circle shadow-sm" title="Add to Wishlist">
                                    <i class="far fa-heart text-danger"></i>
                                </button>
                            </div>
                            @if(rand(0, 1))
                                <div class="position-absolute top-0 start-0 p-2">
                                    <span class="badge bg-danger">Sale</span>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <div>
                                    @foreach($product->categories as $category)
                                        <span class="badge bg-light text-dark me-1">{{ $category->name }}</span>
                                        @break
                                    @endforeach
                                </div>
                                <div>
                                    <span class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="ms-1">{{ number_format(rand(35, 50) / 10, 1) }}</span>
                                    </span>
                                </div>
                            </div>
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-accent fw-bold mb-0">${{ $product->price }}</h6>
                                @if(rand(0, 1))
                                    <small class="text-decoration-line-through text-muted">${{ number_format($product->price * 1.2, 2) }}</small>
                                @endif
                            </div>
                            <div class="d-grid gap-2">
                                <a href="{{ route('frontend.products.show', $product->id) }}" class="btn btn-primary">
                                    View Details
                                </a>
                                <button type="button" class="btn btn-outline-primary">
                                    <i class="fas fa-shopping-cart me-1"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        No products available at this time. Please check back later.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('additional_scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Product hover effect
        const productCards = document.querySelectorAll('.card');

        productCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                const btn = this.querySelector('.btn-outline-primary');
                if (btn) {
                    btn.classList.remove('btn-outline-primary');
                    btn.classList.add('btn-primary');
                }
            });

            card.addEventListener('mouseleave', function() {
                const btn = this.querySelector('.btn-primary:not(:first-child)');
                if (btn) {
                    btn.classList.remove('btn-primary');
                    btn.classList.add('btn-outline-primary');
                }
            });
        });
    });
</script>
@endsection
