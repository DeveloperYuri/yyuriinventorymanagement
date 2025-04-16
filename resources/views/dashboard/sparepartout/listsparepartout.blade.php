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
                            <h5 class="card-title">List Spare Part Out</h5>

                            @include('_message')

                            <!-- Default Table -->
                            <table class="table">

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
