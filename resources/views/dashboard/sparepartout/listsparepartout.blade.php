@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
            <div class="pagetitle">
                <a href="{{ route('stock-out.create') }}" class="btn btn-primary">Create New Spare Part Out</a>
            </div><!-- End Page Title -->
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <h5 class="card-title">List Spare Part Out</h5>

                                @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
                                    <a href="{{ route('export.stock-out') }}" class="btn btn-success">Cetak PDF</a>
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

                                    </tbody>
                                </table>
                                <!-- End Default Table Example -->
                            </div>

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
