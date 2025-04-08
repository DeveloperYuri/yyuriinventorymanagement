@extends('dashboard.layouts.main')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <a href="{{ route('createlistsparepart')}}" class="btn btn-primary">Add Spare Part</a>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List Spare Part</h5>

              @include('_message')

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Image</th>
                    <th class="text-center" scope="col">Part Number</th>
                    <th class="text-center" scope="col">Description</th>
                    <th class="text-center" scope="col">Brand</th>
                    <th class="text-center" scope="col">Price</th>
                    <th class="text-center" scope="col">Stock</th>
                    <th class="text-center" scope="col">Location</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($spareparts as $sp)
                  <tr>
                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                    <td class="text-center">
                      <img src="{{ asset('/storage/sparepart/' . $sp->image) }}"
                                class="rounded" style="width: 100px" height="70px">
                    </td>
                    <td class="text-center">{{ $sp->partnumber }}</td>
                    <td class="text-center">{{ $sp->description }}</td>
                    <td class="text-center">{{ $sp->brand_id }}</td>
                    <td class="text-center">{{ $sp->price }}</td>
                    <td class="text-center">{{ $sp->stock }}</td>
                    <td class="text-center">{{ $sp->location }}</td>
                    <td class="text-center">{{ $sp->status }}</td>

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
                  <tr>
                    <td class="text-center" colspan="100%">Spare Part Not Found</td>
                </tr>
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

 