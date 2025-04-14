@extends('layouts.app')

@section('content')
    <h1>Daftar Stok Keluar</h1>
    <a href="{{ route('stock-out.create') }}" class="btn btn-danger mb-3">+ Tambah Stok Keluar</a>

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
        @foreach ($transactions as $index => $out)
            <tr>
                <td>{{ $transactions->firstItem() + $index }}</td>
                <td>{{ $out->created_at->format('d-m-Y') }}</td>
                <td>{{ $out->sparePart->name }}</td>
                <td>{{ $out->quantity }}</td>
            </tr>
        @endforeach
    </table>
    
    <div class="d-flex justify-content-center">
        {{ $transactions->links() }}
    </div>
    

@endsection
