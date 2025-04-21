@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
            <div class="pagetitle">
                <a href="{{ route('asset-out.create') }}" class="btn btn-primary">Create New Asset Tools Out</a>
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <h5 class="card-title">List Asset Tools Out</h5>

                                @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
                                    <a href="{{ route('export.asset-stock-out') }}" class="btn btn-success"
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Jumlah</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($transactions as $index => $assetout)
                                        <tr>
                                            <td class="text-center">{{ $transactions->firstItem() + $index }}</td>
                                            <td class="text-center">{{ $assetout->created_at->format('d-m-Y') }}</td>
                                            <td class="text-center">{{ $assetout->assetTools->name }}</td>
                                            <td class="text-center">{{ $assetout->quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->

                            <div class="d-flex justify-content-center">
                                {{ $transactions->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
