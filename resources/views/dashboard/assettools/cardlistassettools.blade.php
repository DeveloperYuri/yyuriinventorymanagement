@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
            <div class="pagetitle d-flex justify-content-between align-items-center">
                <a href="{{ route('asset-tools.create') }}" class="btn btn-primary">Add Asset Tools</a>
                <a href="{{ route('asset-tools.index') }}" class="btn btn-secondary"><i class="bi bi-list"></i></a>
            </div>
        @endif

        <section class="section">

            <div class="row">

                @foreach ($assetTools as $index => $asset)
                    <div class="col-lg-4 mt-3">
                        <!-- Card with titles, buttons, and links -->
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="text-center mt-3" style="height: 100px;">
                                    @if ($asset->image)
                                        <img src="{{ asset('images/' . $asset->image) }}" alt="{{ $asset->name }}"
                                            style="width: 200px; height: 80px; object-fit: contain;">
                                    @else
                                        <div class="text-muted d-flex align-items-center justify-content-center"
                                            style="height: 80px;">
                                            Tidak ada
                                        </div>
                                    @endif
                                </div>

                                <h5 class="card-title text-center">{{ $asset->name }}</h5>
                                <p class="card-text mb-1">Rp {{ number_format($asset->price, 0, ',', '.') }}</p>
                                <p class="card-text">Stock : {{ $asset->stock }}</p>
                                <div class="d-flex gap-2 mt-2">
                                    <a href="{{ route('asset-tools.edit', $asset->id) }}"
                                        class="btn btn-sm btn-warning mt-1">Edit</a>

                                    <form action="{{ route('asset-tools.destroy', $asset->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger mt-1"
                                            onclick="confirmDelete(this.form)">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End Card with titles, buttons, and links -->

                    </div>
                @endforeach
            </div>

            <!-- PAGINATION LINK -->
            <div class="d-flex justify-content-center mt-5">
                {{ $assetTools->links() }}
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

        </section>


    </main><!-- End #main -->
@endsection
