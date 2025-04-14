@extends('layouts.app')

@section('content')
    <h1>Edit Spare Part</h1>

    <form method="POST" action="{{ route('spare-parts.update', $sparePart->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Spare Part</label>
            <input type="text" name="name" class="form-control" required value="{{ $sparePart->name }}">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" required value="{{ $sparePart->price }}">
        </div>

        <div class="mb-3">
            <label>Gambar Saat Ini</label><br>
            @if($sparePart->image)
                <img src="{{ asset('images/'.$sparePart->image) }}" alt="{{ $sparePart->name }}" width="100">
            @else
                <span class="text-muted">Tidak ada</span>
            @endif
        </div>

        <div class="mb-3">
            <label>Ganti Gambar (Opsional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
