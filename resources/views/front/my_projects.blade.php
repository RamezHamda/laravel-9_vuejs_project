@extends('layouts.front')
@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>My Jobs</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($projects as $project)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <a href="#" class="blog_item_date">
                                    <h3>{{ $project->created_at->diffForHumans() }}</h3>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2>{{ $project->title }}</h2>
                                </a>
                                <p>{{ $project->desc }}</p>
                                <accept-offer :project="{{$project}}" :offers="{{ $project->offers }}"></accept-offer>
{{--                                <ul class="blog-info-link">--}}
{{--                                    @forelse($project->offers as $offer)--}}
{{--                                    <li><a href="#"><i class="fa fa-user"></i> {{$offer->user->name}}</a></li>--}}
{{--                                        @empty--}}
{{--                                        <li><a href="#">No offers yet</li>--}}
{{--                                    @endforelse--}}

{{--                                </ul>--}}
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
