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
                            <h2 class="content-header-title float-left mb-0">Checkout</h2>
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
                <div class="bs-stepper checkout-tab-steps">
                    <!-- Wizard starts -->
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#step-cart">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="shopping-cart" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Cart</span>
                                    <span class="bs-stepper-subtitle">Your Cart Items</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#step-address">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="home" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Address</span>
                                    <span class="bs-stepper-subtitle">Enter Your Address</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#step-payment">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="credit-card" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Payment</span>
                                    <span class="bs-stepper-subtitle">Select Payment Method</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <!-- Wizard ends -->

                    <div class="bs-stepper-content">
                        <!-- Checkout Place order starts -->
                        <div id="step-cart" class="content">
                            <div id="place-order" class="list-view product-checkout">
                                <!-- Checkout Place Order Left starts -->
                               <div class="checkout-items">
                                    @foreach($carts as $cart)
                                        <div class="card ecommerce-card" id="cart-item-wrapper-{{ $cart->id }}">
                                            <input type="hidden" name="checkout-product-id" value="{{ $cart->product_id }}"/>
                                            <input type="hidden" name="checkout-item-price" value="{{ price($cart->price, $cart->discount) }}"/>
                                            <input type="hidden" name="checkout-item-quantity" value="{{ $cart->quantity }}"/>
                                            <input type="hidden" name="checkout-item-discount" value="{{ $cart->discount }}"/>
                                            <div class="item-img">
                                                <a href="{{ route('products.show', $cart->product_id) }}">
                                                    <img src="{{ $cart->products[0]->getFirstMediaUrl('productImages') }}" class="rounded" alt="img-placeholder" />
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-name">
                                                    <h6 class="mb-0"><a href="{{ route('products.show', $cart->product_id) }}" class="text-body">{{ $cart->products[0]->name }}</a></h6>
                                                    <span class="item-company">By <a href="javascript:void(0)" class="company-name">E-Commerce</a></span>
                                                    <div class="item-rating">
                                                        <ul class="unstyled-list list-inline">
                                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                                            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <span class="text-success mb-1">In Stock</span>
                                                <div class="item-quantity">
                                                    <span class="quantity-title">Qty:</span>
                                                    <div class="checkout-quantity-wrapper d-flex justify-content-center" style="width: 100px;">
                                                        <input type="hidden" name="item-id" value="{{ $cart->id }}"/>
                                                        <input type="hidden" name="item-price" value="{{ price($cart->price, $cart->discount) }}"/>
                                                        <span class="minus mr-1" style="font-size: 20px; cursor: pointer; font-weight: 600">-</span>
                                                        <span class="quantity" style="font-size: 15px; margin-top: 4px; font-weight: 600">1</span>
                                                        <input type="hidden" name="item-quantity" value="1"/>
                                                        <span class="plus ml-1" style="font-size: 20px; cursor: pointer; font-weight: 600">+</span>
                                                    </div>
                                                </div>
                                                <span class="delivery-date text-muted">Delivery by, Wed Apr 25</span>
                                                <span class="text-success">17% off 4 offers Available</span>
                                            </div>
                                            <div class="item-options text-center">
                                                <div class="item-wrapper">
                                                    <div class="item-cost">
                                                        <h4 class="item-price">$<span id="checkout-price-{{ $cart->id }}">{{ price($cart->price, $cart->discount) }}</span></h4>
                                                        <p class="card-text shipping">
                                                            <span class="badge badge-pill badge-light-success">Free Shipping</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="item-id" value="{{ $cart->id }}"/>
                                                <input type="hidden" name="item-price" value="{{ price($cart->price, $cart->discount) }}"/>
                                                <button type="button" class="btn btn-light mt-1 remove-wishlist">
                                                    <i data-feather="x" class="align-middle mr-25"></i>
                                                    <span>Remove</span>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-cart move-cart">
                                                    <i data-feather="heart" class="align-middle mr-25"></i>
                                                    <span class="text-truncate">Add to Wishlist</span>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                               </div>
                                <!-- Checkout Place Order Left ends -->

                                <!-- Checkout Place Order Right starts -->
                                <div class="checkout-options">
                                    <div class="card">
                                        <div class="card-body">
                                            <label class="section-label mb-1">Options</label>
                                            <div class="coupons input-group input-group-merge">
                                                <input type="text" class="form-control" placeholder="Coupons" aria-label="Coupons" aria-describedby="input-coupons" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text text-primary" id="input-coupons">Apply</span>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="price-details">
                                                <h6 class="price-title">Price Details</h6>
                                                <ul class="list-unstyled">

                                                    <li class="price-detail">
                                                        <div class="detail-title">Bag Discount</div>
                                                        <div class="detail-amt discount-amt text-success">-25$</div>
                                                    </li>
                                                    <li class="price-detail">
                                                        <div class="detail-title">Delivery Charges</div>
                                                        <div class="detail-amt discount-amt text-success">Free</div>
                                                    </li>
                                                </ul>
                                                <hr />
                                                <ul class="list-unstyled">
                                                    <li class="price-detail">
                                                        <div class="detail-title detail-total">Total</div>
                                                        <div class="detail-amt font-weight-bolder">$<span id="checkout-total-price">{{ $totalPrice }}</span></div>
                                                        <input type="hidden" name="total_price" id="checkout-total-price" value="{{ $totalPrice }}"/>
                                                    </li>
                                                </ul>
                                                <button type="submit" class="btn btn-primary btn-block btn-next place-order">Place Order</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Checkout Place Order Right ends -->
                                </div>
                                <!-- E-commerce Pagination Starts -->
                                <section id="ecommerce-pagination">
                                    <div class="row d-flex justify-content-center">
                                        {!! $carts->links() !!}
                                    </div>
                                </section>
                                <!-- E-commerce Pagination Ends -->
                            </div>
                            <!-- Checkout Place order Ends -->
                        </div>
                        <!-- Checkout Customer Address Starts -->

                        <div id="step-address" class="content">
                            <div class="col-6 mt-2">
                                <div class="messages"></div>
                                <div class="alert alert-danger p-1" style="display: none">
                                    <ul class="errors">

                                    </ul>
                                </div>
                            </div>
                            <form id="checkout-address form2" class="list-view product-checkout">
                                @csrf
                                <!-- Checkout Customer Address Left starts -->
                                <div class="card">
                                    <div class="card-header flex-column align-items-start">
                                        <h4 class="card-title">Add New Address</h4>
                                        <p class="card-text text-muted mt-25">Be sure to check "Deliver to this address" when you have finished</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-name">Full Name <span class="text-danger">*</span>:</label>
                                                    <input type="text" id="checkout-name" class="form-control" name="fullname" placeholder="John Doe" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-number">E-Mail <span class="text-danger">*</span>:</label>
                                                    <input type="email" id="checkout-eamil" class="form-control" name="email" placeholder="example@gmail.com" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-number">Mobile Number <span class="text-danger">*</span>:</label>
                                                    <input type="text" id="checkout-mobile" class="form-control" name="mobile" placeholder="+995555444333" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-city">Country <span class="text-danger">*</span>:</label>
                                                    <input type="text" id="checkout-country" class="form-control" name="country" placeholder="Georgia" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-pincode">ZIP-Code <span class="text-danger">*</span>:</label>
                                                    <input type="number" id="checkout-zipcode" class="form-control" name="zipcode" placeholder="201301" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-state">City <span class="text-danger">*</span>:</label>
                                                    <input type="text" id="checkout-city" class="form-control" name="city" placeholder="Tbilisi" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-apt-number">Flat, House No <span class="text-danger">*</span>:</label>
                                                    <input type="number" id="checkout-apt-number" class="form-control" name="aptnumber" placeholder="9447 Glen Eagles Drive" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group mb-2">
                                                    <label for="checkout-landmark">Landmark e.g. near apollo hospital:</label>
                                                    <input type="text" id="checkout-landmark" class="form-control" name="landmark" placeholder="Near Apollo Hospital" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary delivery-address">Save And Deliver Here</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkout Customer Address Left ends -->
                            </form>
                        </div>
                        <!-- Checkout Customer Address Ends -->

                        <!-- Checkout Payment Starts -->
                        <div id="step-payment" class="content">
                                <div class="payment-type">
                                    <div class="card">
                                        <div class="card-header flex-column align-items-start">
                                            <h4 class="card-title">Payment options</h4>
                                            <p class="card-text text-muted mt-25">Be sure to click on correct payment option</p>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('stripe.payment') }}" class="card-form mt-3 mb-3">
                                                @csrf
                                                <input type="hidden" name="total_price" id="checkout-total-price" value="{{ $totalPrice }}" />
                                                <input type="hidden" name="payment_method" class="payment-method" />
                                                <input type="hidden" id="payment_error" class="payment-error" value="yees" />

                                                <input class="StripeElement mb-3" name="card_holder_name" id="holder_name" placeholder="Card holder name" />
                                                <div class="col-lg-4 col-md-6">
                                                    <div id="card-element" class=""></div>
                                                </div>
                                                <div id="card-errors" class="ml-1 text-danger mt-1" role="alert"></div>
                                                <div class="form-group mt-3">
                                                    <a type="button" href="javascript:void(0)" class="btn btn-success">Amount Payable: $<span id="checkout-total-price">{{ $totalPrice }}</span></a>
                                                    <button type="submit" class="btn btn-primary pay-now">Pay now</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              </div>
                        <!-- Checkout Payment Ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection


