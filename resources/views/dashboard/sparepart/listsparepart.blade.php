@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)

        <div class="pagetitle">
            <a href="{{ route('spare-parts.create') }}" class="btn btn-primary">Add Spare Part</a>
        </div><!-- End Page Title -->

        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Spare Part</h5>

                            @include('_message')

                            {{-- <table class="table table-bordered">
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
                                            @if ($part->image)
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
                            </div> --}}

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Stok</th>

                                        @if (Auth::user()->is_role == 2)

                                        <th class="text-center">Aksi</th>

                                        @endif

                                        {{-- <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Image</th>
                                        <th class="text-center" scope="col">Description</th>
                                        <th class="text-center" scope="col">Brand</th>
                                        <th class="text-center" scope="col">Price</th>
                                        <th class="text-center" scope="col">Stock</th>
                                        <th class="text-center" scope="col">Location</th>
                                        <th class="text-center" scope="col">Status</th>
                                        @if (Auth::user()->is_role == 2)
                                            <th class="text-center" scope="col">Action</th>
                                        @endif --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($spareParts as $index => $part)
                                        <tr>
                                            <td class="text-center">{{ $spareParts->firstItem() + $index }}</td>
                                            <td class="text-center">
                                                @if ($part->image)
                                                    <img src="{{ asset('images/' . $part->image) }}" alt="{{ $part->name }}"
                                                        width="60">
                                                @else
                                                    <span class="text-muted">Tidak ada</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $part->name }}</td>
                                            <td class="text-center">Rp {{ number_format($part->price, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $part->stock }}</td>
                                            
                                            @if (Auth::user()->is_role == 2)

                                            <td class="text-center">
                                                <a href="{{ route('spare-parts.edit', $part->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('spare-parts.destroy', $part->id) }}" method="POST"
                                                    style="display:inline-block;"
                                                    onsubmit="return confirm('Yakin ingin hapus spare part ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>

                                            @endif

                                        </tr>
                                    @endforeach

                                    {{-- @forelse ($spareparts as $sp)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-center">
                                                <img src="{{ asset('/storage/sparepart/' . $sp->image) }}" class="rounded"
                                                    style="width: 100px" height="70px">
                                            </td>
                                            <td class="text-center">{{ $sp->description }}</td>
                                            <td class="text-center">{{ $sp->brand_id }}</td>
                                            <td class="text-center">{{ $sp->price }}</td>
                                            <td class="text-center">{{ $sp->stock }}</td>
                                            <td class="text-center">{{ $sp->location }}</td>
                                            <td class="text-center">{{ $sp->status }}</td>

                                            @if (Auth::user()->is_role == 2)
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('deletesparepart', $sp->id) }}" method="POST">

                                                        <a href="{{ route('editsparepart', $sp->id) }}"
                                                            class="btn btn-sm btn-warning">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                    </form>
                                                </td>
                                            @endif

                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">Spare Part Not Found</td>
                                        </tr>
                                    @endforelse --}}




                                </tbody>
                            </table>
                            <!-- End Default Table Example -->

                            <!-- PAGINATION LINK -->
                            <div class="d-flex justify-content-center">
                                {{ $spareParts->links() }}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
