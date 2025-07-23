@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Spare Part In</h5>

                            <!-- Horizontal Form -->
                            <form id="myForm" action="{{ route('stock-in.store') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Spare Part</label>
                                    <div class="col-sm-10">
                                        <select name="spare_part_id" class="form-control" required>
                                            @foreach ($spareParts as $part)
                                                <option value="{{ $part->id }}">{{ $part->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="quantity" class="form-control" required min="1">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="user" class="col-sm-2 col-form-label">Penerima Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="user" id="user" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('stock-in.index') }}" class="btn btn-secondary">Back</a>
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
