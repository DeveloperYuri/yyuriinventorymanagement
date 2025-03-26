@extends('dashboard.layouts.main')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Default Table</h5>
        
                      <!-- Default Table -->
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Part Number</th>
                            <th scope="col">Brands</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Date</th>
                            <th scope="col">Noted</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Brandon Jacob</td>
                            <td>Designer</td>
                            <td>28</td>
                            <td>28</td>
                            <td>28</td>
                            <td>28</td>
                            <td>28</td>
                            <td>2016-05-25</td>
                          </tr>
                          
                        </tbody>
                      </table>
                      <!-- End Default Table Example -->
                    </div>
                  </div>
            </div>

        </div>
        </div>
    </section>
@endsection
