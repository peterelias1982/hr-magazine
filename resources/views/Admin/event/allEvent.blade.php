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
            <div class="col-6 col-lg-3 form-floating">
              <input type="text" class="form-control" id="title">
              <label for="title">Event title</label>
            </div>
            <div class="col-6 col-lg-3 form-floating">
              <input type="date" class="form-control" id="date">
              <label for="date">Start date</label>
            </div>
            <div class="col-6 col-lg-3 form-floating">
              <select class="form-control bg-white">
                <option>-</option>
                <option>categroy #1</option>
                <option>categroy #2</option>
                <option>categroy #3</option>
                <option>categroy #4</option>
              </select>
              <label for="date">Select Category</label>
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
              <tr>
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 1</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr>
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 2</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr>
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 3</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr>
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 4</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr>
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 5</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr>
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 6</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr>
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 7</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr>
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 8</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr>
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 9</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr>
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 10</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr class="hidden">
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 11</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr class="hidden">
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 12</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr class="hidden">
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 13</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr class="hidden">
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 14</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
              <tr class="hidden">
                <td>
                  <a href="event-details.html" class="link-primary text-decoration-none">Event 15</a>
                </td>
                <td>Lorem ipsum dolor</td>
                <td>Lorem ipsum dolor</td>
                <td class="text-danger">8:00 AM</td>
                <td class="text-danger">12:00 PM</td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
@endsection