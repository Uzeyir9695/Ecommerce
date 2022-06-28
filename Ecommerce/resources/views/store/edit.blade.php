@extends('layouts.master')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <a href="{{ route('stores.index') }}" class="btn btn-primary" type="button">View stores</a>
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">
                        <!-- Bootstrap Validation -->
                        <div class="col-8 offset-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Your Store</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="messages"></div>
                                            <div class="alert alert-danger" style="display: none">
                                                <ul class="errors">

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('stores.update', $store->id) }}" method="post" class="store" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-6 offset-0">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" value="{{ $store->name }}" id="name" class="form-control" aria-label="Name" aria-describedby="name" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" name="email" value="{{ $store->email }}" id="email" class="form-control" aria-label="john.doe@email.com" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="select-type">Type <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="type" id="select-country1">
                                                        <option value="">Select Type</option>
                                                        <option @if($store->type == 'LLC') selected @endif value="LLC">LLC</option>
                                                        <option @if($store->type == 'IE') selected @endif value="IE">IE</option>
                                                        <option @if($store->type == 'SLS') selected @endif value="SLS">SLS</option>
                                                        <option @if($store->type == 'LEPL') selected @endif value="LEPL">LEPL</option>
                                                        <option @if($store->type == 'JSC') selected @endif value="JSC">JSC</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="org_name">Organization Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="org_name" id="org_name" class="form-control" value="{{ $store->org_name }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="identification">Identification <span class="text-danger">*</span></label>
                                                    <input type="text" name="identification" id="identification" class="form-control"  value="{{ $store->identification }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                                    <input type="text" name="phone" class="form-control"  value="{{ $store->phone }}" id="phone" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="country">Country <span class="text-danger">*</span></label>
                                                    <input type="text" name="country" class="form-control"  value="{{ $store->country }}" id="country" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="city">City <span class="text-danger">*</span></label>
                                                    <input type="text" name="city" class="form-control" value="{{ $store->city }}" id="city" />
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="agreed" class="custom-control-input @error('agreed') is-invalid @enderror" id="agreed" />
                                                        <label class="custom-control-label" for="agreed">Agree to our terms and conditions <span class="text-danger">*</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 offset-0">
                                                <div class="form-group">
                                                    <label for="street">Street <span class="text-danger">*</span></label>
                                                    <input type="text" name="street" class="form-control" value="{{ $store->street }}" id="street" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="website">Website <span class="text-danger">*</span></label>
                                                    <input type="text" name="website" class="form-control" value="{{ $store->website }}" id="website" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="d-block" for="description">Description <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="description" id="description" rows="3">{{ $store->description }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Store Logo <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" name="logoImage" class="custom-file-input" id="logoImage" />
                                                        <label class="custom-file-label" for="logoImage">Choose logo image</label>
                                                    </div>
                                                    <img src="{{ $store->getFirstMediaUrl('logos') }}" width="65px" height="60px" class="rounded mt-1" alt="image">
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Cover Image <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" name="coverImage" class="custom-file-input" id="coverImage" />
                                                        <label class="custom-file-label" for="coverImage">Choose cover image</label>
                                                    </div>
                                                    <img src="{{ $store->getFirstMediaUrl('covers') }}" width="65px" height="60px" class="rounded mt-1" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center submit"><i class="mr-1" style="width: 18px; height: auto" data-feather="save"></i>Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Bootstrap Validation -->
                    </div>
                </section>
                <!-- /Validation -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
@section('scripts')
    <script type=text/javascript>

        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $( ".store" ).on( "submit", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '{{ route('stores.update', $store->id) }}',
                    data: new FormData(this),
                    cache: false,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    // beforeSend: function(){
                    //    $('.submit').attr('disabled', true).html("Processing...");
                    // },
                    success: function (response) {
                        $(".errors").empty();
                        $(".alert-danger").hide();
                        Swal.fire({
                            title: 'Congrats!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2500,
                        });
                        window.location.reload();
                    },
                    error: function(response) { // handle the error
                        $(".errors").empty();
                        $.each(response.responseJSON.errors, function (key, message) {
                            $(".alert-danger").show();
                            $(".errors").append('<li>'+message+'</li>');
                        });
                    },
                });
                e.preventDefault();
            });
        });
    </script>
@endsection
