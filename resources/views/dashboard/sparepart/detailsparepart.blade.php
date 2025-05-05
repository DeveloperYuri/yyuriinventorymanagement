@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle mb-3 text-start ">
            <h1>History Spare Part : {{ $sparePart->name }}</h1>
        </div>

        <div class="d-flex justify-content-end align-items-end gap-3 flex-wrap mb-3">

            <form method="GET" class="d-flex align-items-end gap-2 flex-wrap">
                <div class="col">
                    <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control">
                </div>
                <div class="col">
                    <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control">
                </div>
                <div class="col d-flex gap-2">
                    <button class="btn btn-primary">Filter</button>
                    <a href="{{ route('sparepartdetail.history', ['id' => $sparePart->id]) }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        
            @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
                <div>
                    <a href="{{ route('sparepartdetail.history.pdf', ['id' => $sparePart->id]) }}?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}"
                        class="btn btn-success">Cetak PDF</a>
                </div>
            @endif
        
        </div>


        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">



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
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jenis</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">User</th>
                                        <th class="text-center">Tanggal</th>
                                    </tr>
                                    <tbody>
                                        @php $totalStock = 0; @endphp

                                        @foreach ($transactions as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge {{ $item->type == 'in' ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $item->type == 'in' ? 'Masuk' : 'Keluar' }}
                                                    </span>
                                                </td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-center">{{ $item->user ?? ($item->user ?? '-') }}</td>
                                                <td class="text-center">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                            </tr>
                                            @php
                                                $totalStock += $item->type == 'in' ? $item->quantity : -$item->quantity;
                                            @endphp
                                        @endforeach

                                        <tr>
                                            <td colspan="2" class="text-center"><strong>Jumlah Akhir Stok</strong></td>
                                            <td class="text-center"><strong>{{ $totalStock }}</strong></td>
                                            <!-- User and Tanggal columns are now hidden by colspan -->
                                            <td colspan="2"></td>
                                        </tr>

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
