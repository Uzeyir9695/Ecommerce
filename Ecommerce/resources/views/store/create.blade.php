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
                                    <h4 class="card-title">Create Your Store</h4>
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
                                    <form action="{{ route('stores.store') }}" class="store" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6 offset-0">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"  placeholder="Name" aria-label="Name" aria-describedby="name" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"  placeholder="john.doe@email.com" aria-label="john.doe@email.com" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="select-type">Type <span class="text-danger">*</span></label>
                                                    <select class="form-control  @error('type') is-invalid @enderror" name="type" id="select-country" >
                                                        <option value="">Select Type</option>
                                                        <option value="LLC" {{ old('type') == 'LLC' ? "selected" : "" }}>LLC</option>
                                                        <option value="IE" {{ old('type') == 'IE' ? "selected" : "" }}>IE</option>
                                                        <option value="SLS" {{ old('type') == 'SLS' ? "selected" : "" }}>SLS</option>
                                                        <option value="LEPL" {{ old('type') == 'LEPL' ? "selected" : "" }}>LEPL</option>
                                                        <option value="JSC" {{ old('type') == 'JSC' ? "selected" : "" }}>JSC</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="org_name">Organization Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="org_name" id="org_name" value="{{ old('org_name') }}" class="form-control @error('org_name') is-invalid @enderror"  placeholder="Organization name" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="identification">Identification <span class="text-danger">*</span></label>
                                                    <input type="text" name="identification" id="identification" value="{{ old('identification') }}" class="form-control @error('identification') is-invalid @enderror"  placeholder="000120201" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror"  placeholder="+995555112233" id="phone" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="country">Country <span class="text-danger">*</span></label>
                                                    <input type="text" name="country" value="{{ old('country') }}" class="form-control @error('country') is-invalid @enderror"  placeholder="Georgia" id="country" />
                                                </div>
                                            </div>
                                            <div class="col-6 offset-0">
                                                <div class="form-group">
                                                    <label for="city">City <span class="text-danger">*</span></label>
                                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror"  placeholder="Tbilisi" id="city" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="street">Street <span class="text-danger">*</span></label>
                                                    <input type="text" name="street" value="{{ old('street') }}" class="form-control @error('street') is-invalid @enderror"  placeholder="Pekini #1" id="street" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="website">Website <span class="text-danger">*</span></label>
                                                    <input type="text" name="website" value="{{ old('website') }}" class="form-control @error('website') is-invalid @enderror"  placeholder="www.example.com" id="website" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="d-block" for="description">Description <span class="text-danger">*</span></label>
                                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"  placeholder="Something..." id="description" rows="3">{{ old('description') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Store Logo <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" name="logoImage" class="custom-file-input @error('logoImage') is-invalid @enderror"  id="logoImage" />
                                                        <label class="custom-file-label" for="logoImage">Choose store image</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Cover Image <span class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" name="coverImage" class="custom-file-input @error('coverImage') is-invalid @enderror"  id="coverImage" />
                                                        <label class="custom-file-label" for="coverImage">Choose store image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="agreed" class="custom-control-input @error('agreed') is-invalid @enderror" id="agreed" />
                                                <label class="custom-control-label" for="agreed">Agree to our terms and conditions <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary submit">Create</button>
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
                    url: '{{ route('stores.store') }}',
                    data: new FormData(this),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $(".store")[0].reset();
                        $(".errors").empty();
                        $(".alert-danger").hide();
                        Swal.fire({
                            title: 'Congrats!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2500,
                        })
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
