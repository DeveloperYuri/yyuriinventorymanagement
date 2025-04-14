@extends('layouts.app')

@section('content')
    <h1>Daftar Spare Part</h1>
    <a href="{{ route('spare-parts.create') }}" class="btn btn-primary mb-3">+ Tambah Spare Part</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        @foreach ($spareParts as $index => $part)
            <tr>
                <td>{{ $spareParts->firstItem() + $index }}</td>
                <td>
                    @if($part->image)
                        <img src="{{ asset('images/'.$part->image) }}" alt="{{ $part->name }}" width="60">
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                </td>
                <td>{{ $part->name }}</td>
                <td>Rp {{ number_format($part->price, 0, ',', '.') }}</td>
                <td>{{ $part->stock }}</td>
                <td>
                    <a href="{{ route('spare-parts.edit', $part->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('spare-parts.destroy', $part->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus spare part ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <!-- PAGINATION LINK -->
    <div class="d-flex justify-content-center">
        {{ $spareParts->links() }}
    </div>
@endsection
