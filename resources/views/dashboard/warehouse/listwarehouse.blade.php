@extends('dashboard.layouts.main')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <a href="" class="btn btn-primary">Create New Warehouse</a>
    </div><!-- End Page Title -->

    <form method="get">
      <div class="row">
          <div class="col-4">
              <input id="searchingname" type="text" class="form-control" value="{{ Request()->name }}" placeholder="Search warehouse name" name="name" >
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
              <h5 class="card-title">List Warehouse</h5>

              @include('_message')

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Address</th>
                    <th class="text-center" scope="col">PIC</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($getRecord as $key => $wrh)
                  <tr>
                    <th class="text-center" scope="row">{{ $getRecord->firstItem() + $key }}</th>
                    <td class="text-center">{{ $wrh->name}}</td>
                    <td class="text-center">{{ $wrh->address}}</td>
                    <td class="text-center">{{ $wrh->pic}}</td>
                    <td class="text-center">
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action=""
                        method="POST">

                        <a href="" class="btn btn-sm btn-warning">EDIT</a>
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
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection

 