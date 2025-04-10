@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <a href="{{ route('createassettoolsout')}}" class="btn btn-primary">Create New Asset Tools Out</a>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Asset Tools Out</h5>

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
                                        <th class="text-center" scope="col">Request By</th>
                                        <th class="text-center" scope="col">Date</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $key => $assettoolsout)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $getRecord->firstItem() + $key }}</th>
                                            <td class="text-center">{{ $assettoolsout->name }}</td>
                                            <td class="text-center">{{ $assettoolsout->brand }}</td>
                                            <td class="text-center">{{ $assettoolsout->stock }}</td>
                                            <td class="text-center">{{ $assettoolsout->location }}</td>
                                            <td class="text-center">{{ $assettoolsout->user_id }}</td>
                                            <td class="text-center">{{ $assettoolsout->created_at }}</td>
                                            <td class="text-center">
                                              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('deleteassettoolsout', $assettoolsout->id)}}"
                                                method="POST">
                        
                                                <a href="{{ route('editassettoolsout', $assettoolsout->id)}}" class="btn btn-sm btn-warning">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">Asset Tools In Data Not Found</td>
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
