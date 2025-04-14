@extends('layouts.app')

@section('content')
    <h1>Tambah Spare Part</h1>
    <form method="POST" action="{{ route('spare-parts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Spare Part</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gambar Barang</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
