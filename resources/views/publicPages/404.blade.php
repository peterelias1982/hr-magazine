{{-- This is the error fallback page --}}
@extends('publicPages.layouts.main')

@section('publicPagesContent')

<h1 class="mb-4" style="text-align: center;">Page Not Found</h1>

<div class="container-fluid">
    <div class="row justify-content-center g-0">
        <div class="col-12 text-center g-0">
            <img src="{{asset('publicPages/images/big-logo.svg')}}" alt="logo" class="mb-3 img-fluid" />
        </div>
    </div>
 
@endsection