@extends('layouts.master')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-6 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <a href="{{ route('stores.index') }}" class="btn btn-primary" type="button">View store list</a>
                        <a href="{{ route('products.create', ['store_id' => $store->id]) }}" class="btn btn-primary" type="button">Add a new product</a>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div id="user-profile">
                    <!-- profile header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-header mb-2">
                                <!-- profile cover photo -->
                                <img class="card-img-top" src="{{ $store->getFirstMediaUrl('covers') }}" style="max-width: 100%;height: 400px; object-fit:cover;" alt="User Profile Image" />
                                <!--/ profile cover photo -->

                                <div class="position-relative">
                                    <!-- profile picture -->
                                    <div class="profile-img-container d-flex align-items-center">
                                        <div class="profile-img">
                                            <img src="{{ $store->getFirstMediaUrl('logos') }}" class="rounded img-fluid" alt="Card image" />
                                        </div>
                                        <!-- profile title -->
                                        <div class="profile-title ml-3">
                                            <h2 class="text-white">{{ $store->name }}</h2>
                                        </div>
                                    </div>
                                </div>

                                <!-- tabs pill -->
                                <div class="profile-header-nav">
                                    <!-- navbar -->
                                    <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                        <button class="btn btn-icon navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <i data-feather="align-justify" class="font-medium-5"></i>
                                        </button>

                                        <!-- collapse  -->
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                                <ul class="nav nav-pills mb-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link font-weight-bold active" href="javascript:void(0)">
                                                            <span class="d-none d-md-block">Main</span>
                                                            <i data-feather="rss" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- edit button -->

                                                <div>
                                                    <a type="button" href="{{ route('stores.edit', $store->id) }}" class="btn btn-primary"><i data-feather="edit"></i>Edit</a>
                                                    <a type="button" data-toggle="modal" data-target="#delete" class=" btn btn-danger delete"><i data-feather="trash"></i>Delete</a>
                                                    <div class="modal fade text-start" id="delete" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">Are you sure?</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                                                </div>
                                                                <form method="post" action="{{ route('stores.destroy', $store->id) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <div class="modal-body">
                                                                        <label>Due to delete, enter a word - <strong>"Delete"</strong> in capital case.</label>
                                                                        <div class="mt-1">
                                                                            <input autocomplete="off" name="word" type="text" placeholder="Enter the word..." class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-warning waves-effect waves-float waves-light">OK</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ collapse  -->
                                    </nav>
                                    <!--/ navbar -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ profile header -->

                    <!-- profile info section -->
                    <section id="profile-info">
                        <div class="row">
                            <!-- left profile info section -->
                            <div class="col-lg-3 col-12">
                                <!-- about -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-75">About</h5>
                                        <p class="card-text">{{ $store->description }}</p>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Created:</h5>
                                            <p class="card-text">{{ $store->created_at }}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Location:</h5>
                                            <p class="card-text ml-1"><strong>Country: </strong> {{ $store->country }}</p>
                                            <p class="card-text ml-1"><strong>City: </strong> {{ $store->city }}</p>
                                            <p class="card-text ml-1"><strong>Street: </strong> {{ $store->street }}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Email:</h5>
                                            <p class="card-text">{{ $store->email }}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Phone:</h5>
                                            <p class="card-text">{{ $store->phone }}</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-50">Website:</h5>
                                            <p class="card-text mb-0"><a href="{{ $store->website }}">View Website</a></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- suggestion pages -->
                                <div class="card">
                                    <div class="card-body profile-suggestion">
                                        <h5 class="mb-2">Suggested Stores</h5>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-1">
                                                <img src="/app-assets/images/avatars/12-small.png" alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Peter Reed</h6>
                                                <small class="text-muted">Company</small>
                                            </div>
                                            <div class="profile-star ml-auto"><i data-feather="star" class="font-medium-3"></i></div>
                                        </div>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-1">
                                                <img src="/app-assets/images/avatars/1-small.png" alt="avatar" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Harriett Adkins</h6>
                                                <small class="text-muted">Company</small>
                                            </div>
                                            <div class="profile-star ml-auto"><i data-feather="star" class="font-medium-3"></i></div>
                                        </div>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-1">
                                                <img src="/app-assets/images/avatars/10-small.png" alt="avatar" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Juan Weaver</h6>
                                                <small class="text-muted">Company</small>
                                            </div>
                                            <div class="profile-star ml-auto"><i data-feather="star" class="font-medium-3"></i></div>
                                        </div>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-1">
                                                <img src="/app-assets/images/avatars/3-small.png" alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Claudia Chandler</h6>
                                                <small class="text-muted">Company</small>
                                            </div>
                                            <div class="profile-star ml-auto"><i data-feather="star" class="font-medium-3"></i></div>
                                        </div>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-1">
                                                <img src="/app-assets/images/avatars/5-small.png" alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Earl Briggs</h6>
                                                <small class="text-muted">Company</small>
                                            </div>
                                            <div class="profile-star ml-auto">
                                                <i data-feather="star" class="profile-favorite font-medium-3"></i>
                                            </div>
                                        </div>
                                        <!-- user suggestions -->
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="avatar mr-1">
                                                <img src="/app-assets/images/avatars/6-small.png" alt="avatar img" height="40" width="40" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Jonathan Lyons</h6>
                                                <small class="text-muted">Beauty Store</small>
                                            </div>
                                            <div class="profile-star ml-auto"><i data-feather="star" class="font-medium-3"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ suggestion pages -->
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    @forelse($products as $product)
                                        <div class="col-lg-4">
                                            <div class="card ecommerce-card">
                                                <div class="item-img text-center">
                                                    <a href="javascript:void(0);">
                                                        <img class="img-fluid card-img-top" src="{{ $product->getFirstMediaUrl('productImages') }}" style="width: 350px; height: 250px;" alt="img-placeholder" />
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
                                                    </div>
                                                    <h6 class="item-name">
                                                        <a class="text-body" href="app-ecommerce-details.html">{{ $product->name }}</a>
                                                        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Apple</a></span>
                                                    </h6>
                                                    <p class="card-text item-description">{{ Str::limit($product->description, 35, ' ...') }}
                                                    </p>
                                                </div>
                                                <div class="item-options text-center">
                                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-light col-6 float-left">
                                                        <i data-feather="eye"></i>
                                                        <span>View</span>
                                                    </a>
                                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary col-6 float-right">
                                                        <i data-feather="edit"></i>
                                                        <span class="add-to-cart">Edit</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h3 class="mx-auto mt-3">Product(s) not found for this store!</h3>
                                        <div class="w-100"></div>
                                        <a href="{{ route('products.create', ['store_id' => $store->id]) }}" class="btn btn-info mx-auto mb-3" type="button">Add now</a>
                                    @endforelse
                                </div>
                                <!-- reload button -->
                                <div class="row d-flex justify-content-center">
                                    {!! $products->links() !!}
                                </div>
                                <!--/ reload button -->
                            </div>
                        </div>

                    </section>
                    <!--/ profile info section -->
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
