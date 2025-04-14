@extends('layouts.app')

@section('content')
    <h1>Daftar Stok Masuk</h1>
    <a href="{{ route('stock-in.create') }}" class="btn btn-success mb-3">+ Tambah Stok Masuk</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Spare Part</th>
            <th>Jumlah</th>
        </tr>
        @foreach ($transactions as $index => $in)
            <tr>
                <td>{{ $transactions->firstItem() + $index }}</td>
                <td>{{ $in->created_at->format('d-m-Y') }}</td>
                <td>{{ $in->sparePart->name }}</td>
                <td>{{ $in->quantity }}</td>
            </tr>
        @endforeach
    </table>
    
    <div class="d-flex justify-content-center">
        {{ $transactions->links() }}
    </div>
@endsection



