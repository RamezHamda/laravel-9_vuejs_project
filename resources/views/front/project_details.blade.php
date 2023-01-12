@extends('layouts.front')
@section('content')


        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>{{ $project->title }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="{{ $project->image_url }}" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>{{ $project->category->name }}</h4>
                                    </a>
                                    <ul>
                                        <li>{{ $project->title }}</li>
                                        <li><i class="fas fa-user"></i>{{ $project->client->name }}</li>
                                        <li>${{$project->price}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- job single End -->

                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <p>{{ $project->desc }}</p>
                            </div>
                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                                <ul>
                                    @foreach($project->tags as $tag)
                                    <li>{{$tag->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Overview</h4>
                            </div>
                            <ul>
                                <li>Posted date : <span>{{ $project->created_at->diffForHumans() }}</span></li>
                                <li>Job nature : <span>{{$project->type}}</span></li>
                                <li>Salary :  <span>${{$project->price}}</span></li>
                            </ul>
                            @if(auth()->user()->type == 'freelancer')
                               <apply-job :project=" {{ $project->id }}" :user_id="{{ auth()->id() }}"
                               :check="{{ $check }}"
                               ></apply-job>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->


@stop
