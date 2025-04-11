@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <a href="{{ route('createsupplier')}}" class="btn btn-primary">Create New Supplier</a>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Supplier</h5>

                            @include('_message')

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Name</th>
                                        <th class="text-center" scope="col">Email</th>
                                        <th class="text-center" scope="col">Address</th>
                                        <th class="text-center" scope="col">Contact</th>

                                        @if (Auth::user()->is_role == 2)

                                        <th class="text-center" scope="col">Action</th>

                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $key => $supplier)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $getRecord->firstItem() + $key }}</th>
                                            <td class="text-center">{{ $supplier->name }}</td>
                                            <td class="text-center">{{ $supplier->email }}</td>
                                            <td class="text-center">{{ $supplier->address }}</td>
                                            <td class="text-center">{{ $supplier->contact }}</td>
                                            
                                            @if (Auth::user()->is_role == 2)

                                            <td class="text-center">
                                              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('deletesupplier', $supplier->id)}}"
                                                method="POST">
                        
                                                <a href="{{ route('editsupplier', $supplier->id)}}" class="btn btn-sm btn-warning">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                            </td>

                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">Supplier Data Not Found</td>
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
