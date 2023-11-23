@extends('layouts.frontend')

@section('pageTitle', $blog->title)

@section('content')
    <section class="py-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-8 px-0">
                    <div class="blog-post mb-30">
                        <div class="entry-image clearfix">
                          <img src="{{asset('/'.$blog->image)}}" class="img-fluid"/>
                        </div>
                        <div class="blog-detail px-0"  style="background: transparent">

                            <div class="entry-title mb-10">
                                <h2 class="fs-24 text-white">{{ $blog->title }}</h2>
                            </div>
                            <div class="entry-content">
                                <p>{!! $blog->description !!}</p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
