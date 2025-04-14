@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Spare Part</h5>

                            <form method="POST" action="{{ route('spare-parts.update', $sparePart->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">IMAGE</label>
                                    <div class="col-sm-10">
                                        @if($sparePart->image)
                                        <img src="{{ asset('images/'.$sparePart->image) }}" alt="{{ $sparePart->name }}" width="100">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                    <br >
                                    <label class="mt-2" >Ganti Gambar (Opsional)</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Spare Part</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" required value="{{ $sparePart->name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="price" class="form-control" required value="{{ $sparePart->price }}">
                                    </div>
                                </div>

                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('spare-parts.index')}}" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
