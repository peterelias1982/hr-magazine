@extends('Admin.layouts.master')
@section('Content')
<div class="content-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between border-bottom py-1">
    <h2 class="fw-bold col-lg-auto">Event Details</h2>
    <div class="btn-wrapper">
      <a href="deleteEvent/{{ $event->slug }}" class="btn btn-sm" style="color: #ed2708" onclick="return confirm('Are you sure you want to delete event?')"><i class="icon-trash"></i> Delete Event</a>
    </div>
  </div>
    <div class="pt-4">
      <div class="row">
        <form id="edit-event" action="{{route('admin.events.update',$event->slug)}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
    		@method('put')
        <div class="col-12 d-flex flex-column">
          <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
              <div class="card card-rounded" id="event">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4 col-6 position-relative" id="change-pic">
                      <input type="file" name="event_image" id="event_pic_input" form="edit-event" class="opacity-0 border-0" disabled="">
                      <img src="{{ asset('admin/images/articles&event/'.$event->image) }}" class="img-fluid" id="event_pic" name="image">
                      <input type="hidden" name="oldImage" value="{{$event->image}}">
                      <i class="mdi mdi-link-variant-plus fs-4 position-absolute bottom-0 end-0 translate-middle btn btn-sm d-none" id="event_change_icon"></i>
                    </div>
                    <div class="col-lg-8 d-flex flex-column justify-content-around">
                      <div class="row pb-2 justify-content-between align-items-center">
                        <h3 class="col-auto card-title card-title-dash">
                          Event Details
                        </h3>
                        <div class="col-auto">
                          <i class="mdi mdi-lead-pencil text-muted btn btn-sm fs-5" id="edit_user_button"></i>
                        </div>
                      </div>
                      <div class="row py-1">
                        <p class="card-text fw-bold lh-1">Title</p>
                        <p class="card-text lh-1">
                          <input name="title" form="edit-event" class="w-100 border-0 text-black" value="{{$event->title}}" disabled="">
                          @error('title')
                          {{$message}}
                          @enderror
                        </p>
                      </div>
                      <div class="row py-1">
                        <p class="card-text fw-bold lh-1">Due date</p>
                        <p class="card-text lh-1">
                          <input name="fromDate" form="edit-event" type="text" id="fromDate" class="border-0 text-black" value="{{ \Carbon\Carbon::parse($event->fromDate)->format('d/m/Y') }}" disabled="">
                          @error('fromDate')
                          {{$message}}
                          @enderror
                          –
                          <input name="toDate" form="edit-event" type="text" id="toDate" class="border-0 text-black" value="{{ \Carbon\Carbon::parse($event->toDate)->format('d/m/Y') }}" disabled="">
                          @error('toDate')
                          {{$message}}
                          @enderror
                        </p>
                      </div>
                      <div class="row py-1">
                        <p class="card-text fw-bold lh-1">Address</p>
                        <p class="card-text lh-1">
                          <input name="address" form="edit-event" class="w-100 border-0 text-black" value="{{$event->streetNo}} {{$event->streetName}}, {{$event->city}}, {{$event->state}}, {{$event->postalCode}}, {{$event->country}}" disabled="">
                          @error('streetNo')
                          {{$message}}
                          @enderror
                          @error('streetName')
                          {{$message}}
                          @enderror
                          @error('city')
                          {{$message}}
                          @enderror
                          @error('state')
                          {{$message}}
                          @enderror
                          @error('postalCode')
                          {{$message}}
                          @enderror
                          @error('country')
                          {{$message}}
                          @enderror
                        </p>
                      </div>
                      <div class="row py-1">
                        <p class="card-text fw-bold lh-1">
                          Description
                        </p>
                        <p class="card-text lh-1">
                          <textarea name="description" form="edit-event" class="w-100 p-0 pe-5 border-0 bg-transparent text-black" style="height: 3.5rem" disabled="">{{$event->description}}
                        </textarea>
                        @error('description')
                          {{$message}}
                          @enderror
                        </p>
                      </div>

                      <div class="row py-1">
                        <p class="card-text fw-bold lh-1">Speakers</p>
                        <p class="card-text lh-1">
                          <input name="speakers" form="edit-event" class="w-100 border-0 text-black" value="{{$event->speakers}}" disabled="">
                          @error('speakers')
                          {{$message}}
                          @enderror
                        </p>
                      </div>
                    </div>
                  </div>
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
              <h4 class="card-title">Event-Agenda</h4>
              <!-- Event Agenda Section -->
              <div class="form-group">
                <label for="event-agenda">Agenda</label>
                <div id="event-agenda">
  <div class="day-box" style="background-color: white; border-radius: 10px; margin-bottom: 20px; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
      <h4 class="day-header" style="background-color: #e9ecef; padding: 10px; border-radius: 10px; position: sticky; left: 0;">Day 1 (19/3/2024)</h4>
      <div class="table-responsive"> <!-- Make the table responsive -->
          <table class="table">
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
@foreach($event->agenda as $agenda)
<td><input type="text" class="form-control" name="topic" placeholder="Topic" value="{{ $agenda['topic'] }}"></td>
<td><input type="time" class="form-control" name="from_time" value="{{ $agenda['fromTime'] }}"></td>
<td><input type="time" class="form-control" name="to_time" value="{{ $agenda['toTime'] }}"></td>
<td><input type="text" class="form-control" name="speaker" placeholder="Speaker" value="{{ $agenda['speaker'] }}"></td>
<td>
  <button type="button" class="btn btn-danger btn-sm remove-row" onclick="removeRow(this)">-</button>
  <button type="button" class="btn btn-info btn-sm" onclick="addRowToDay(1, this)">+</button>
</td>
@endforeach
</tr>
</tbody>
            </table>
          </div>
        </div>
  </div>
              </div>
            </div>
          </div>
        </div>
      </form>
        <div class="col-12 d-flex flex-column">
          <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body">
                  <div class="row py-3">
                    <div class="col-lg-auto">
                      Location<i class="mdi mdi-map-marker"></i>
                    </div>
                    <div class="row py-1">
                        <p class="card-text fw-bold lh-1">Google Map Link</p>
                        <p class="card-text lh-1">
                          <input name="googleMapLink" form="edit-event" class="w-100 border-0 text-black" value="{{$event->googleMapLink}}" disabled="">
                        </p>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-7 leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-touch-zoom" id="map" style="height: 55vh; position: relative;" tabindex="0"><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, -115px, 0px);"><div class="leaflet-pane leaflet-tile-pane"><div class="leaflet-layer " style="z-index: 1; opacity: 1;"><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 19; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" src="https://tile.openstreetmap.org/13/4806/3378.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(146px, 27px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4807/3378.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(402px, 27px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4806/3377.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(146px, -229px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4807/3377.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(402px, -229px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4806/3379.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(146px, 283px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4807/3379.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(402px, 283px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4805/3378.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-110px, 27px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4808/3378.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(658px, 27px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4805/3377.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-110px, -229px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4808/3377.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(658px, -229px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4805/3379.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-110px, 283px, 0px); opacity: 1;"><img alt="" src="https://tile.openstreetmap.org/13/4808/3379.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(658px, 283px, 0px); opacity: 1;"></div></div></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-shadow-pane"><img src="https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png" class="leaflet-marker-shadow leaflet-zoom-animated" alt="" style="margin-left: -12px; margin-top: -41px; width: 41px; height: 41px; transform: translate3d(347px, 193px, 0px);"></div><div class="leaflet-pane leaflet-marker-pane"><img src="https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png" class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt="Marker" tabindex="0" role="button" style="margin-left: -12px; margin-top: -41px; width: 25px; height: 41px; transform: translate3d(347px, 193px, 0px); z-index: 193;"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"></div><div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(1.23054e+06px, 864935px, 0px) scale(4096);"></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in" aria-disabled="false"><span aria-hidden="true">+</span></a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out" aria-disabled="false"><span aria-hidden="true">−</span></a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control"><a href="https://leafletjs.com" title="A JavaScript library for interactive maps"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" class="leaflet-attribution-flag"><path fill="#4C7BE1" d="M0 0h12v4H0z"></path><path fill="#FFD500" d="M0 4h12v3H0z"></path><path fill="#E0BC00" d="M0 7h12v1H0z"></path></svg> Leaflet</a></div></div></div></div>
                    <div class="col-lg-5">
                      <div class="form-group d-flex align-items-center justify-content-between invisible" id="mapSearch">
                        <input type="text" id="searchInput" placeholder="e.g. cairo" class="form-control w-75 d-inline-block border-0" disabled="">
                        <button id="searchButton" class="btn btn-dark py-1 px-3 btn-sm">
                          Search
                        </button>
                      </div>
                      <div class="d-flex flex-column justify-content-evenly h-75">
                        <div>
                          <p class="card-text fw-bold fs-4 lh-1">
                            Latitude
                          </p>
                          <p class="card-text lh-1 fs-5">
                            <input name="latitude" id="lat" form="edit-event" class="w-100 border-0 text-black" value="{{$event->latitude}}" disabled="">
                          </p>
                        </div>
                        <div class="form-group">
                          <p class="card-text fw-bold lh-1 fs-4">
                            Longitude
                          </p>
                          <p class="card-text lh-1 fs-5">
                            <input name="longitude" id="long" form="edit-event" class="w-100 border-0 text-black" value="{{$event->longitude}}" disabled="">
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-sm-flex align-items-center justify-content-start border-top py-2">
      <div class="btn-wrapper d-none" id="submit_pannel">
        <button type="submit" class="btn btn-primary me-2" form="edit-event">
          Submit
        </button>
        <button class="btn btn-light" form="edit-event">
          Cancel
        </button>
      </div>
    </div>
</div>
@endsection