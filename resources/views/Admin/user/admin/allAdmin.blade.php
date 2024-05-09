@extends("Admin.layouts.master")
@section('Content')

    <div class="content-wrapper">
        <div class="row py-3 justify-content-between align-items-center">
            <h2 class="fw-bold col-lg-auto">Admins</h2>
            <div class="col-lg-auto">
                <!-- Search Bar start -->
                <div class="search-bar">
                    <form action="{{ route('admin.admins.index') }}" method="GET">
                        <div
                            class="row g-1 justify-content-lg-end justify-content-start"
                        >
                            <div class="col-6 col-lg-3 form-floating">
                                <input type="text" class="form-control" id="title" name="name"/>
                                <label for="title">Name</label>
                            </div>
                            <div class="col-6 col-lg-3 form-floating">
                                <input type="text" class="form-control" id="title" name="email"/>
                                <label for="title">Email</label>
                            </div>
                            <div class="col-4 col-lg-2 d-flex flex-column justify-content-center">
                                <div class="row">
                                    <label for="active" class="form-check-label">
                                        <input
                                            type="checkbox"
                                            id="active"
                                            class="form-check-input"
                                            name="status"
                                            value="active"
                                        />
                                        Active
                                    </label>
                                </div>
                                <div class="row">
                                    <label for="blocked" class="form-check-label">
                                        <input
                                            type="checkbox"
                                            id="blocked"
                                            class="form-check-input"
                                            name="status"
                                            value="blocked"
                                        />
                                        Blocked
                                    </label>
                                </div>
                            </div>
                            <button
                                class="col-auto btn border-0 btn-md"
                                type="submit"
                            >
                                <i class="icon-search fs-5"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Search Bar ends -->
            </div>
        </div>
        <!-- admin table start -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Admins Table</h4>
                        <p class="card-description">List of all <code>Admins</code></p>
                        <div class="table-responsive content">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Admin</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No.</th>
                                    <th>Position</th>
                                    <th>Active</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($admins as $admin)

                                    <tr>
                                        <td class="py-1">
                                            <img
                                                src="{{ asset('assets/images/users/'.$admin->image)}}"
                                                alt="image"
                                                class="img-fluid rounded-circle"
                                            />
                                        </td>
                                        <td>
                                            <a
                                                href="{{route('admin.admins.show', $admin->slug)}}"
                                                class="link-primary text-decoration-none"
                                            >
                                                {{$admin->firstName}} {{$admin->secondName}}
                                            </a>
                                        </td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->mobile }}</td>
                                        <td>{{ $admin->position }}</td>
                                        <td>{{$admin->active? '✔️':'❌'}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- admin table end -->
    </div>
@endsection
