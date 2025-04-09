@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Asset Tools</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ route('createassettoolspost')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">IMAGE<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="name" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Brand<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="brand" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Price<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="price" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Stock<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="stock" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Location<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="location" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="status" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Note
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('indexassettools')}}" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
