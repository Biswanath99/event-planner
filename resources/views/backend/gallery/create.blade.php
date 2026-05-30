@extends('layouts.backend.app')

@section('title', 'Create Gallery')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <h5 class="card-header">
            Create Gallery
        </h5>

        <div class="card-body">

            <form action="{{ route('admin.gallery.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <!-- CATEGORY -->
                <div class="row mb-4">

                    <div class="col-md-4">

                        <label class="form-label">
                            Category
                        </label>

                        <select name="category"
                                class="form-select">

                            <option value="">
                                Select Category
                            </option>

                            <option value="Wedding">
                                Wedding
                            </option>

                            <option value="Reception">
                                Reception
                            </option>

                            <option value="Birthday">
                                Birthday
                            </option>

                            <option value="Corporate Event">
                                Corporate Event
                            </option>

                            <option value="Engagement">
                                Engagement
                            </option>

                        </select>

                    </div>

                </div>

                <!-- IMAGE WRAPPER -->
                <div id="gallery-wrapper">

                    <!-- SINGLE ROW -->
                    <div class="gallery-row row align-items-center mb-3">

                        <!-- IMAGE INPUT -->
                        <div class="col-md-4">

                            <input type="file"
                                   name="images[]"
                                   class="form-control image-input">

                        </div>

                         <div class="col-md-2">

                            <button type="button"
                                    class="btn btn-danger btn-sm remove-row">

                                <i class="bx bx-trash"></i>

                            </button>

                        </div>

                        <!-- IMAGE PREVIEW -->
                        <div class="col-md-1">

                            <img src=""
                                 class="preview-image d-none"
                                 style="width:70px;
                                        height:70px;
                                        object-fit:cover;
                                        border-radius:5px;">

                        </div>

                        <!-- DELETE BUTTON -->
                       

                    </div>

                </div>

                <!-- ADD MORE BUTTON -->
                <button type="button"
                        id="add-row"
                        class="btn btn-dark">

                    <i class="bx bx-plus"></i>
                    Add More

                </button>

                <!-- SUBMIT BUTTONS -->
                <div class="d-flex justify-content-end gap-2 mt-4">

                    <a href="{{ route('admin.gallery.index') }}"
                       class="btn btn-dark">

                        Back

                    </a>

                    <button type="submit"
                            class="btn btn-success">

                        <i class="bx bx-save"></i>
                        Save 

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$(document).ready(function () {

    // ADD ROW
    $('#add-row').click(function () {

        let row = `

            <div class="gallery-row row align-items-center mb-3">

                <!-- IMAGE INPUT -->
                <div class="col-md-4">

                    <input type="file"
                           name="images[]"
                           class="form-control image-input">

                </div>

                 <div class="col-md-2">

                    <button type="button"
                            class="btn btn-danger btn-sm remove-row">

                        <i class="bx bx-trash"></i>

                    </button>

                </div>

                <!-- IMAGE PREVIEW -->
                <div class="col-md-1">

                    <img src=""
                         class="preview-image d-none"
                         style="width:70px;
                                height:70px;
                                object-fit:cover;
                                border-radius:5px;">

                </div>

                <!-- DELETE BUTTON -->
               

            </div>

        `;

        $('#gallery-wrapper').append(row);

    });

    // REMOVE ROW
    $(document).on('click', '.remove-row', function () {

        $(this).closest('.gallery-row').remove();

    });

    // IMAGE PREVIEW
    $(document).on('change', '.image-input', function (e) {

        let reader = new FileReader();

        let preview = $(this)
            .closest('.gallery-row')
            .find('.preview-image');

        reader.onload = function (event) {

            preview.attr('src', event.target.result);
            preview.removeClass('d-none');

        }

        if (e.target.files[0]) {

            reader.readAsDataURL(e.target.files[0]);

        }

    });

});

</script>

@endsection