@extends('dashboard.layouts.main')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <a href="{{ route('createbrand')}}" class="btn btn-primary">Add Brand</a>
    </div><!-- End Page Title -->

    <form method="get">
      <div class="row">
          <div class="col-4">
              <input id="searchingname" type="text" class="form-control" value="{{ Request()->name }}" placeholder="Search Brand Name" name="name" >
          </div>
          <div class="col-2">
              <button type="submit" class="btn btn-success mb-2">Search</button>
          </div>
      </div>
  </form>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List Brand</h5>

              @include('_message')

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($getRecord as $key => $br)
                  <tr>
                    <th class="text-center" scope="row">{{ $getRecord->firstItem() + $key }}</th>
                    <td class="text-center">{{ $br->name}}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('deletebrand', $br->id)}}"
                            method="POST">
    
                            <a href="{{ route('editbrand', $br->id)}}" class="btn btn-sm btn-warning">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                  </tr>
                  @empty
                      
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

 