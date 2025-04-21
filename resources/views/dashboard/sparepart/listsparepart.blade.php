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

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">List Spare Part</h5>

                                @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
                                    <a href="{{ route('sparepart.cetakpdf') }}" class="btn btn-success"
                                        target="_blank">Cetak
                                        PDF</a>
                                @endif

                            </div>

                            @if (session('success'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: '{{ session('success') }}',
                                        timer: 2000, // 2000 ms = 2 detik
                                        showConfirmButton: false
                                    });
                                </script>
                            @endif

                            <!-- Default Table -->
                            <div class="table-responsive">

                                <table class="table table-hover align-middle">
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
                                    </thead>
                                    <tbody>

                                        @foreach ($spareParts as $index => $part)
                                            <tr>
                                                <td class="text-center">{{ $spareParts->firstItem() + $index }}</td>
                                                <td class="text-center">
                                                    @if ($part->image)
                                                        <img src="{{ asset('images/' . $part->image) }}"
                                                            alt="{{ $part->name }}" width="60">
                                                    @else
                                                        <span class="text-muted">Tidak ada</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $part->name }}</td>
                                                <td class="text-center">Rp {{ number_format($part->price, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">{{ $part->stock }}</td>

                                                @if (Auth::user()->is_role == 2)
                                                    <td class="text-center">
                                                        <a href="{{ route('spare-parts.edit', $part->id) }}"
                                                            class="btn btn-sm btn-warning mt-1">Edit</a>
                                                        <form action="{{ route('spare-parts.destroy', $part->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger mt-1"
                                                                onclick="confirmDelete(this.form)">Hapus</button>
                                                        </form>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Default Table Example -->
                            </div>

                            @push('scripts')
                                <script>
                                    function confirmDelete(form) {
                                        Swal.fire({
                                            title: 'Yakin ingin hapus?',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Ya, hapus!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                form.submit();
                                            }
                                        });
                                    }
                                </script>
                            @endpush

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
