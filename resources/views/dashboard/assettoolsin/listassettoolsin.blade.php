@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)

        <div class="pagetitle">
            <a href="{{ route('asset-in.create')}}" class="btn btn-primary">Create New Asset Tools In</a>
        </div>

        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Asset Tools In</h5>

                            @include('_message')

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

                                    @foreach ($transactions as $index => $assetin)
                                        <tr>
                                            <td class="text-center">{{ $transactions->firstItem() + $index }}</td>
                                            <td class="text-center">{{ $assetin->created_at->format('d-m-Y') }}</td>
                                            <td class="text-center">{{ $assetin->assetTools->name }}</td>
                                            <td class="text-center">{{ $assetin->quantity }}</td>
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
