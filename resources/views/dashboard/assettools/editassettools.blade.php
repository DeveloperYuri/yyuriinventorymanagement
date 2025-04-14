@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Asset Tools</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ route('asset-tools.update', $assetTools->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">IMAGE</label>
                                    <div class="col-sm-10">
                                        @if($assetTools->image)
                                        <img src="{{ asset('images/'.$assetTools->image) }}" alt="{{ $assetTools->name }}" width="100">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                    <br >
                                    <label class="mt-2" >Ganti Gambar (Opsional)</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">IMAGE<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image" value="{{ $assetTools->image }}" required>
                                    </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="name" value="{{ $assetTools->name }}" required>
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Brand<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="brand" value="{{ $assetTools->brand }}" required>
                                    </div>
                                </div> --}}
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Price<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="price" value="{{ $assetTools->price }}" required>
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Stock<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="stock" value="{{ $assetTools->stock }}" required>
                                    </div>
                                </div> --}}

                                {{-- <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Location<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="location" value="{{ $assetTools->location }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="status" value="{{ $assettools->status }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Note
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note">{{ $assettools->note }}</textarea>
                                    </div>
                                </div> --}}

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('asset-tools.index')}}" class="btn btn-secondary">Back</a>
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
