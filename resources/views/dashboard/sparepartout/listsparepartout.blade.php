@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <a href="{{ route('createsparepartout')}}" class="btn btn-primary">Create New Spare Part Out</a>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Spare Part Out</h5>

                            @include('_message')

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Name</th>
                                        <th class="text-center" scope="col">Brand</th>
                                        <th class="text-center" scope="col">Stock</th>
                                        <th class="text-center" scope="col">Location</th>
                                        <th class="text-center" scope="col">Receive By</th>
                                        <th class="text-center" scope="col">Date</th>
                                        @if (Auth::user()->is_role == 2)

                                        <th class="text-center" scope="col">Action</th>

                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $key => $sparepartout)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $getRecord->firstItem() + $key }}</th>
                                            <td class="text-center">{{ $sparepartout->name }}</td>
                                            <td class="text-center">{{ $sparepartout->brand }}</td>
                                            <td class="text-center">{{ $sparepartout->stock }}</td>
                                            <td class="text-center">{{ $sparepartout->location }}</td>
                                            <td class="text-center">{{ $sparepartout->user }}</td>
                                            <td class="text-center">{{ $sparepartout->created_at }}</td>
                                            
                                            @if (Auth::user()->is_role == 2)

                                            <td class="text-center">
                                              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('deletesparepartout', $sparepartout->id)}}"
                                                method="POST">
                        
                                                <a href="{{ route('editsparepartout', $sparepartout->id)}}" class="btn btn-sm btn-warning">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                            </td>
                                            @endif
                                            
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">Spare Part Out Data Not Found</td>
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                            <!-- End Default Table Example -->

                            <div style="padding: 10px; float: right;">
                              {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
