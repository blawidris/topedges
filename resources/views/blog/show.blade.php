@extends('layouts.frontend')

@section('content')
    <section class="py-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-8">
                    <div class="blog-post mb-30">
                        <div class="entry-image clearfix">
                          <img class="{{asset('/'.$blogItem->image)}}"/>
                        </div>
                        <div class="blog-detail">

                            <div class="entry-title mb-10">
                                <a href="#" class="fs-24">{{ $blog->title }}</a>
                            </div>
                            <div class="entry-content">
                                <p>{{ $blog->description }}</p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
