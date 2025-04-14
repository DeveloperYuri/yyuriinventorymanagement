@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Asset Tools In</h5>

                            <!-- Horizontal Form -->
                            <form action="{{ route('asset-in.store')}}" method="POST">
                                {{ csrf_field() }}

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Spare Part</label>
                                    <div class="col-sm-10">
                                        <select name="asset_tools_id" class="form-control" required>
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('asset-in.index') }}" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Spare Part<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="spare_part_id" class="form-control" required>
                                            @foreach ($assetTransactions as $asset)
                                                <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Masuk<span
                                        style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="quantity" class="form-control" required min="1">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('asset-in.index') }}" class="btn btn-secondary">Back</a>
                                    </div>
                                </div> --}}

                                {{-- <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Spare Part<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="name" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="brand">
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Receive By<span
                                            style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="user_id" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Note
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                                    </div>
                                </div> --}}

                                
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
