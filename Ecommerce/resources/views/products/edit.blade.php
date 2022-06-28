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
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Forms</a>
                                    </li>
                                    <li class="breadcrumb-item active">Store
                                    </li>
                                </ol>
                            </div>
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
                        <div class="col-6 offset-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Your Product</h4>
                                </div>

                                <div class="card-body">
                                    <div class="messages"></div>
                                    <div class="alert alert-danger" style="display: none">
                                        <ul class="errors">
                                        </ul>
                                    </div>
                                    @include('messages.message')
                                    <form method="post"  id="media-delete" action="{{ route('products.destroy', $product->id) }}">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    <form action="{{ route('products.update', $product->id) }}" id="products" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control"  placeholder="some name..." />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="price">Price <span class="text-danger">*</span></label>
                                            <input type="number" name="price" id="price" value="{{ $product->price }}" class="form-control"  placeholder="some price..." />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="quantity">Quantity <span class="text-danger">*</span></label>
                                            <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="form-control"  placeholder="some quantity..." />
                                        </div>
                                           <div class="form-group">
                                            <label class="d-block" for="description">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description"  placeholder="Describe your product..." id="description" rows="3">{{ $product->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="discount">Discount (optional - default is 0)</label>
                                            <input type="number" min="0" max="100" name="discount" value="{{ $product->discount }}" class="form-control"  placeholder="Discount in percent..." id="discount" />
                                        </div>
                                        <div class="form-group mt-5 grandparent" style="position:relative;">
                                            @foreach($product->media as $media)
                                                <div class="mr-2 parent" style="position: relative; float: left; width: 65px; height: 65px;">
                                                    <img src="{{ $media->getUrl() }}" width="65px" height="60px" class="rounded" alt="image">
                                                    <input name="media_id" id="media-id" class="media-delete" form="media-delete" type="checkbox" data-id="{{ $media->id }}" style="position:absolute; right: -5px; top: -4px;" >
{{--                                                    <button type="submit" style="position:absolute; right: -12px; top: -4px;" form="media-delete"><i class="text-danger" data-feather="trash"></i></button>--}}
                                                </div>
                                            @endforeach

                                                <button disabled class="btn btn-sm btn-danger media-delete-button" type="submit" style="position:absolute; right: -5px; top: 0px;"  form="media-delete"><i class="text-white" data-feather="trash"></i></button>
                                        </div><br>
                                        <div class="form-group mt-5">
                                            <label for="image">Product Image <span class="text-danger mt-2">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" name="images[]" class="custom-file-input"  id="images" multiple />
                                                <label class="custom-file-label" for="images">Choose product image</label>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="mt-2" id="images_preview"></div>
                                        </div><br>

                                        <hr class="mt-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary" form="products"><i class="mr-1" style="width: 18px; height: auto" data-feather="save"></i>Save</button>
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

    //Disable delete button while at least one media is not checked
    $( ".media-delete" ).on( "click", function() {
        var checkedLength = $( ".media-delete:checked" ).length;
        if(checkedLength >= 1)
        {
            $('.media-delete-button').prop('disabled', false);
        }
        else
        {
            $('.media-delete-button').prop('disabled', true);
        }
    });

    // Delete each checked media
    $( ".media-delete-button" ).on( "click", function(e) {
        e.preventDefault();
        var checked = [];
        $(".media-delete:checked").each(function() {
            checked.push($(this).attr('data-id'));
        });
        var url = '{{ route("products.destroy", $product->id) }}';
        var imagesLength = $('.grandparent').find('div.parent') .length;
        if(imagesLength == 1 || $( ".media-delete:checked" ).length == imagesLength ) {
            Swal.fire({
                title: 'Oops!',
                text: 'Product must have at least one image!',
                icon: 'error',
                showConfirmButton: true,
                confirmButtonText: 'Okay, sorry!',
            });
            return false;
        }

        $.ajax({
            type: "DELETE",
            url: url,
            cache: false,
            data: {media_id: checked},
            success: function (response) {
                $('.media-delete:checked').parents('.parent').slideUp().remove();
                $('.media-delete-button').prop('disabled', true);
                Swal.fire({
                    title: 'Congrats!',
                    text: response.message,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500,
                });
            }
        });
        e.preventDefault();
    });

    //Display image preview
    $('#images').change(function(e){
        var files = e.target.files,
            filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function (e) {
                var file = e.target;
                $("#images_preview").append("<div class=\"div mr-1\" style=\"position: relative; float: left; width: 65px; height: 65px;\">" +
                        "<img class='rounded' width=\"65px;\" height=\"65px\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<br/><a href=\"#\" class=\"remove text-center\" style=\"position:absolute; right: -10px; top: -4px;\">X</a>" +
                        "</div>");
                $(".remove").click(function () {
                    $(this).parent(".div").remove();
                });
            });
            fileReader.readAsDataURL(f);
        }
    });

    // Update product
    $( "#products" ).on( "submit", function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '{{ route('products.update', $product->id) }}',
            data: new FormData(this),
            // data: $(this).serialize(),
            cache: false,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                $("#images_preview").empty();
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
