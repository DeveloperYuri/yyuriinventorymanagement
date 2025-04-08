@extends('dashboard.layouts.main')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <a href="{{ route('')}}" class="btn btn-primary">Add Brand</a>
    </div><!-- End Page Title -->

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
                  @forelse ($brand as $br)
                  <tr>
                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                    <td class="text-center">{{ $br->name}}</td>
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

 