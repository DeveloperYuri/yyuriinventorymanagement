@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <a href="{{ route('asset-tools.create') }}" class="btn btn-primary">Add Asset Tools</a>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Asset Tools</h5>

                            @include('_message')

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

                                    </tr>
                                    {{-- <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Image</th>
                                        <th class="text-center" scope="col">Name</th>
                                        <th class="text-center" scope="col">Brand</th>
                                        <th class="text-center" scope="col">Price</th>
                                        <th class="text-center" scope="col">Stock</th>
                                        <th class="text-center" scope="col">Location</th>
                                        <th class="text-center" scope="col">Status</th>

                                        @if (Auth::user()->is_role == 2)

                                        <th class="text-center" scope="col">Action</th>
                                        
                                        @endif
                                    </tr> --}}
                                </thead>
                                <tbody>
                                    @foreach ($assetTools as $index => $asset)
                                        <tr>
                                            <td class="text-center">{{ $assetTools->firstItem() + $index }}</td>
                                            <td class="text-center">
                                                @if ($asset->image)
                                                    <img src="{{ asset('images/' . $asset->image) }}"
                                                        alt="{{ $asset->name }}" width="60">
                                                @else
                                                    <span class="text-muted">Tidak ada</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $asset->name }}</td>
                                            <td class="text-center">Rp {{ number_format($asset->price, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $asset->stock }}</td>

                                            @if (Auth::user()->is_role == 2)
                                                <td class="text-center">
                                                    <a href="{{ route('asset-tools.edit', $asset->id)}}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('asset-tools.destroy', $asset->id )}}"
                                                        method="POST" style="display:inline-block;"
                                                        onsubmit="return confirm('Yakin ingin hapus spare asset ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach

                                    {{-- @forelse ($assettools as $key => $ast)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-center">
                                                <img src="{{ asset('/storage/assettools/' . $ast->image) }}" class="rounded"
                                                    style="width: 100px" height="70px">
                                            </td>
                                            <td class="text-center">{{ $ast->name }}</td>
                                            <td class="text-center">{{ $ast->brand }}</td>
                                            <td class="text-center">{{ $ast->price }}</td>
                                            <td class="text-center">{{ $ast->stock }}</td>
                                            <td class="text-center">{{ $ast->location }}</td>
                                            <td class="text-center">{{ $ast->status }}</td>

                                            @if (Auth::user()->is_role == 2)

                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('deleteassettools', $ast->id)}}"
                                                    method="POST">

                                                    <a href="{{ route('editassettools', $ast->id)}}" class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @empty
                                    @endforelse --}}


                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
