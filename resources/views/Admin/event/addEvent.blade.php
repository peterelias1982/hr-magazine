@extends('Admin.layouts.master')
@section('Content')
<form class="forms-sample" id="event-create">
    <div class="content-wrapper">
      <h2 class="pt-5 fw-bold">Add Event</h2>
      <div class="row py-3">
        <div class="col-12 col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add Event form</h4>
              <p class="card-description">
                Add a new event to the dashboard
              </p>
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
              </div>
              <div class="form-group">
                <label for="fromDate">From</label>
                <input type="date" class="form-control" id="fromDate" name="fromDate" placeholder="">
              </div>
              <div class="form-group">
                <label for="toDate">To</label>
                <input type="date" class="form-control" id="toDate" name="toDate" placeholder="">
              </div>
              <div class="form-group">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
              </div>
              <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
              </div>
              <div class="form-group">
                <label for="speakers" class="form-label">Speakers</label>
                <input type="text" class="form-control" id="speakers" name="speakers" placeholder="Speakers">
              </div>
              
              <div class="form-group">
                <label for="description" class="form-label">Description
                </label>
                <textarea class="form-control" id="description" name="description" form="event-create" placeholder="Description" style="height: 6rem"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="card-subtitle">Additional information</div>
              <div class="form-group">
                <div class="row justify-content-between mb-2">
                    <label for="map" class="form-label pt-2 col-lg-3">Location Map</label>
                    <div class="col-lg-8 d-flex justify-content-end">
                    <input type="text" id="searchInput" placeholder="e.g. cairo" class="form-control d-inline-block w-75">
                    <button id="searchButton" class="btn btn-dark  btn-sm">
                      Search
                    </button>
                  </div>
                </div>
                <div class="leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-touch-zoom" id="map" style="height: 55vh; position: relative;" tabindex="0"><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, -115px, 0px);"><div class="leaflet-pane leaflet-tile-pane"><div class="leaflet-layer " style="z-index: 1; opacity: 1;"><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 19; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" src="https://tile.openstreetmap.org/13/4806/3378.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(69px, 27px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4806/3377.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(69px, -229px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4805/3378.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-187px, 27px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4807/3378.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(325px, 27px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4806/3379.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(69px, 283px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4805/3377.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-187px, -229px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4807/3377.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(325px, -229px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4805/3379.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-187px, 283px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4807/3379.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(325px, 283px, 0px); opacity: 1;"></div></div></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-shadow-pane"><img src="https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png" class="leaflet-marker-shadow leaflet-zoom-animated" alt="" style="margin-left: -12px; margin-top: -41px; width: 41px; height: 41px; transform: translate3d(270px, 193px, 0px);"></div><div class="leaflet-pane leaflet-marker-pane"><img src="https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="Marker" tabindex="0" role="button" style="margin-left: -12px; margin-top: -41px; width: 25px; height: 41px; transform: translate3d(270px, 193px, 0px); z-index: 193;"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"></div><div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(1.23054e+06px, 864935px, 0px) scale(4096);"></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in" aria-disabled="false"><span aria-hidden="true">+</span></a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out" aria-disabled="false"><span aria-hidden="true">−</span></a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control"><a href="https://leafletjs.com" title="A JavaScript library for interactive maps"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" class="leaflet-attribution-flag"><path fill="#4C7BE1" d="M0 0h12v4H0z"></path><path fill="#FFD500" d="M0 4h12v3H0z"></path><path fill="#E0BC00" d="M0 7h12v1H0z"></path></svg> Leaflet</a></div></div></div></div>
                <div class="form-group mt-2">
                  <label class="form-label">
                    Latitude
                  </label>
                  
                    <input name="latitude" id="lat" form="edit-event" class="form-control" value="30.0444">
                  
                </div>
                <div class="form-group">
                  <label class="form-label">
                    Longitude
                  </label>
                    <input name="longitude" id="long" form="edit-event" class="form-control" value="31.2357">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card" style="
              background-color: #f1f1f1;
              padding: 10px;
              border: 30px solid white;
            ">
            <div class="card-body">
              <h4 class="card-title">Sechedual Event-Agenda</h4>
              <!-- Event Agenda Section -->
              <div class="form-group">
                <label for="event-agenda">Scheduling Event</label>
                <div id="event-agenda">
                  <div class="day-box table-responsive day_1" style="
                      background-color: white;
                      border-radius: 20px;
                      margin-bottom: 20px;
                      padding: 15px;
                      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    ">
                    <h4 class="day-header" style="
                        background-color: #f1f1f1;
                        padding: 10px;
                        border-radius: 7px;
                        position: sticky;
                        left: 0;
                      ">
                      Day 1
                    </h4>
                    <table class="table table-responsive" id="agenda-table-day-1">
                      <thead>
                        <tr>
                          <th>Topic</th>
                          <th>From (Time)</th>
                          <th>To (Time)</th>
                          <th>Speaker</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="day_1">
                          <td>
                            <input type="text" class="form-control" name="topic[1][]" placeholder="Topic">
                          </td>
                          <td>
                            <input type="time" class="form-control" name="from_time[1][]">
                          </td>
                          <td>
                            <input type="time" class="form-control" name="to_time[1][]">
                          </td>
                          <td>
                            <input type="text" class="form-control" name="speaker[1][]" placeholder="Speaker">
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger btn-sm remove-row">
                              -
                            </button>
                            <button type="button" class="btn btn-info btn-sm" onclick="addRowToDay(1, this)">
                              +
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary me-2" form="event-create">
                Submit
              </button>
              <button class="btn btn-light" form="event-create">
                Cancel
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection