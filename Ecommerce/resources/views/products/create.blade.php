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
                            <a href="{{ route('products.index') }}" class="btn btn-primary" type="button">View Products</a>
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
                                    <h4 class="card-title">Create Your Product</h4>
                                </div>

                                <div class="card-body">
                                    <div class="messages"></div>
                                    <div class="alert alert-danger" style="display: none">
                                        <ul class="errors">

                                        </ul>
                                    </div>
                                    <form action="{{ route('products.store') }}" method="post" id="products" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6 offset-0">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"  placeholder="some name..." />
                                                </div>
                                                <div class="form-group">
                                                    <label for="select-category">Category <span class="text-danger">*</span></label>
                                                    <select class="form-control " name="category_id" id="category" >
                                                        <option value="" disabled selected>Choose Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="select-subcategory">Subcategory <span class="text-danger">*</span></label>
                                                    <select class="form-control " name="subcategory_id" id="subcategory" >
                                                        <option value="">Choose Subcategory</option>
                                                    </select>
                                                </div>
                                                <input id="hidden_subcategory_id" name="hidden_subcategory_id" type="hidden" value="">

                                                <div class="form-group" id="attributes">
                                                    {{-- Here goes select options of attributes--}}
                                                </div>
                                            </div>
                                            <div class="col-6 offset-0">
                                            <div class="form-group">
                                                <label class="form-label" for="price">Price <span class="text-danger">*</span></label>
                                                <input type="number" name="price" id="price" value="{{ old('price') }}" class="form-control"  placeholder="some price..." />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="quantity">Quantity <span class="text-danger">*</span></label>
                                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control"  placeholder="some quantity..." />
                                            </div>
                                            <div class="form-group">
                                                <label class="d-block" for="description">Description <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="description"  placeholder="Describe your product..." id="description" rows="3">{{ old('description') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="discount">Discount (optional - default is 0)</label>
                                                <input type="number" min="0" max="100" name="discount" value="{{ old('discount') }}" class="form-control"  placeholder="Discount in percent..." id="discount" />
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Product Image <span class="text-danger">*</span></label>
                                                <div class="custom-file">
                                                    <input type="file" name="images[]" class="custom-file-input"  id="images" multiple />
                                                    <label class="custom-file-label" for="images">Choose store image</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="agreed" class="custom-control-input" id="agreed" />
                                                    <label class="custom-control-label" for="agreed">Agree to our terms and conditions <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                                </div>
                                            </div>
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
        $( "#products" ).on( "submit", function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '{{ route('products.store', ['store_id' => request('store_id')]) }}',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (response) {
                    $("#products")[0].reset();
                    $(".errors").empty();
                    $("#subcategory").find('option').remove();
                    $("#attributes").empty();
                    $(".alert-danger").hide();
                    Swal.fire({
                        title: 'Congrats!',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000,
                    })
                },
                error: function(response) { // handle the error messages
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

    $(document).ready(function() {
        $('#category').change(function () {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('products.subcategories') }}?category_id="+category_id,
                    success: function (res) {
                        if (res) {
                            $("#subcategory").find('option').not(':first').remove();
                            $.each(res[0], function (key, value) {
                                $("#subcategory").append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        } else {
                            $("#subcategory").find('option').not(':first').remove();
                        }
                    }
                });
            } else {
                $("#subcategory").find('option').not(':first').remove();
                $("#attributes").empty();
            }
            $("#attributes").empty();

        });
    });
    // var $ = jQuery;
    $(document).ready(function() {
        $('#subcategory').on('change', function () {
            var subcategory_id = $(this).val();
            $("#hidden_subcategory_id").val(subcategory_id);

            if (subcategory_id) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('products.subcategories') }}?subcategory_id="+subcategory_id,
                    success: function (res) {
                        if (res) {
                            $("#attributes").empty();
                            var index = 0;
                            $.each(res[1], function (name, values) {
                                index++
                                var snakeCaseAttribute = name.replace(/ /g,"_");
                                var lowerCaseAttribute = snakeCaseAttribute.toLowerCase();
                                $("#attributes").append('<label for="attribute_'+index+'">'+ name +' <span class="text-danger">*</span></label><select class="form-control mb-2" name="'+lowerCaseAttribute+'" id="attribute_'+index+'" > <option value="" selected disabled>Choose '+snakeCaseAttribute+'</option> </select>');
                                $.each(values, function (key, value) {
                                    // console.log(values);
                                    $("#attribute_"+index).append('<option value="' + value.value + '">' + value.value + '</option>');
                                });
                            });
                        } else {
                            $("#attributes").empty();
                        }
                    }
                });
            } else {
                $("#attributes").empty();
            }
        });
    });
</script>
@endsection
