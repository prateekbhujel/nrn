@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
    
    <div class="section-header">
            <h1>Dashboard</h1>
    </div>
   
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-image"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Albums</h4>
                    </div>
                    <div class="card-body">
                    {{ \App\Models\Gallery::count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>News</h4>
                    </div>
                    <div class="card-body">
                    {{ \App\Models\News::count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-calendar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Events</h4>
                    </div>
                    <div class="card-body">
                        {{ \App\Models\Event::count() }}
                    </div>
                </div>
            </div>
        </div>    
    </div>
    
@endsection
