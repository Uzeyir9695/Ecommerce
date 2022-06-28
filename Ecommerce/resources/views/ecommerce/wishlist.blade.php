@extends('layouts.master')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">WishList</h2>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row empty-wishlist">
                    {{--  Here goes default mepty wishlist image --}}
                </div>
                <!-- Wishlist Starts -->
                <section id="wishlist" class="grid-view wishlist-items">
                    @foreach($wishlists as $wishlist)
                        <div class="card ecommerce-card wishlist-remove">
                            <div class="item-img text-center">
                                <a href="{{ route('products.show', $wishlist->product->id) }}">
                                    <img src="{{ $wishlist->product->getFirstMediaUrl('productImages') }}" class="img-fluid" style="width: 350px; height: 250px;"  alt="img-placeholder" />
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="item-wrapper">
                                    <div class="item-rating">
                                        <ul class="unstyled-list list-inline">
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="item-cost">
                                        <h6>$<span class="wishlist-price">{{ price($wishlist->product->price, $wishlist->product->discount) }}</span> </h6>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a href="{{ route('products.show', $wishlist->product->id) }}">{{ $wishlist->product->name }}</a>
                                </div>
                                <p class="card-text item-description">{{ $wishlist->product->description }}</p>
                            </div>
                            <div class="item-options text-center">
                                <form method="post" action="{{ route('wishlists.destroy', $wishlist->id) }}" id="wishlist-remove">
                                    <button type="submit" class="btn btn-light ">
                                        <i class="text-danger" data-feather="trash"></i>
                                        <span>Remove</span>
                                    </button>
                                </form>

                                <button type="button" class="btn btn-primary btn-cart">
                                    <i data-feather="shopping-cart"></i>
                                    <span class="add-to-cart">Move to cart</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </section>
                <!-- Wishlist Ends -->
                <section id="ecommerce-pagination">
                    <div class="row d-flex justify-content-center">
                        {!! $wishlists->links() !!}
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
