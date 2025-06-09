@extends('layouts.main')
@section('container')
<main class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-uppercase">{{ $page_title }}</h2>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form id="submitForm" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="product_name" value="">
                    </div>
                    <div class="mb-3">
                        <label for="product_description" class="form-label">Product Description</label>
                        <textarea name="product_description" id="product_description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="product_video" class="form-label">Product Video</label>
                        <input type="file" class="form-control" name="product_video" id="product_video" value="">
                    </div>

                    {{-- preview video --}}
                    <div class="mb-3">
                        <label class="form-label">Video Preview</label><br>
                        <video id="video_preview" width="100%" controls style="display: none;"></video>
                    </div>


                    <div class="mb-3 d-flex justify-content-end">
                        <button type="Submit" class="btn btn-primary submit-data">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection