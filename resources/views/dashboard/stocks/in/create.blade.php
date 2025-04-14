@extends('layouts.app')

@section('content')
    <h1>Tambah Stok Masuk</h1>
    <form method="POST" action="{{ route('stock-in.store') }}">
        @csrf
        <div class="mb-3">
            <label>Spare Part</label>
            <select name="spare_part_id" class="form-control" required>
                @foreach($spareParts as $part)
                    <option value="{{ $part->id }}">{{ $part->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Masuk</label>
            <input type="number" name="quantity" class="form-control" required min="1">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
