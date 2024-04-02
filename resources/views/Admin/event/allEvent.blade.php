@extends('Admin.layouts.master')
@section('Content')
    <div class="content-wrapper">
        <div class="row py-3 justify-content-between align-items-center">
            <h2 class="fw-bold col-lg-auto">Events</h2>
            <div class="col-lg-auto">
                <!-- Search Bar start -->
                <div class="search-bar">
                    <form action="">
                        <div class="row g-1 justify-content-lg-end justify-content-start">
                            <div class="col-6 col-lg-4 form-floating">
                                <input type="text" class="form-control" id="title">
                                <label for="title">Event title</label>
                            </div>
                            <div class="col-6 col-lg-4 form-floating">
                                <input type="date" class="form-control" id="date">
                                <label for="date">Start date</label>
                            </div>
                            <button class="col-auto btn border-0 btn-md" type="submit">
                                <i class="icon-search fs-5"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Search Bar ends -->
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Events Table</h4>
                    <p class="card-description">List of all <code>Events</code></p>
                    <div class="table-responsive content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Event</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Start at</th>
                                <th>Ends at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>
                                        <a href="{{route('admin.events.show', $event->slug)}}"
                                           class="link-primary text-decoration-none">{{$event->title}}</a>
                                    </td>
                                    <td>{{\Illuminate\Support\Str::limit($event->description, 100, $end='...')}}</td>
                                    <td>{{$event->streetNo}} {{$event->streetName}}, {{$event->city}}, {{$event->state}}, 
                                        {{$event->country}}</td>
                                    <td class="text-danger">{{ \Carbon\Carbon::parse($event->fromDate)->format('d/m/Y')}}</td>
                                    <td class="text-danger">{{ \Carbon\Carbon::parse($event->toDate)->format('d/m/Y')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
