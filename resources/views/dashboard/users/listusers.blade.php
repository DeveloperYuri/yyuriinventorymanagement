@extends('dashboard.layouts.main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <a href="{{ route('createusers') }}" class="btn btn-primary">Create New</a>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Users</h5>

                            @include('_message')

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Name</th>
                                        <th class="text-center" scope="col">Email</th>
                                        <th class="text-center" scope="col">Role</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $u)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $u->name }}</td>
                                            <td class="text-center">{{ $u->email }}</td>
                                            <td class="text-center">
                                                @if ($u->is_role == '0')
                                                    Users
                                                @elseif ($u->is_role == '1')
                                                    Admin
                                                @else
                                                    Super Admin
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('deleteusers', $u->id)}}"
                                                    method="POST">

                                                    <a href="{{ route('editusers', $u->id)}}" class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">Users Not Found</td>
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
