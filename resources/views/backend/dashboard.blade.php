@extends('layouts.backend')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')


@section('content')
    <div class="row">


        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $services->count() }}</h3>

                    <p>Services</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('dashboard.service.index') }}" class="small-box-footer">View More <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $projects->count() }}</h3>

                    <p>Projects</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('dashboard.project.index') }}" class="small-box-footer">View More <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $skills->count() }}</h3>

                    <p>Skills</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('dashboard.skill.index') }}" class="small-box-footer">View More <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $educations->count() }}</h3>

                    <p>Educations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('dashboard.education.index') }}" class="small-box-footer">View More <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
@endsection
