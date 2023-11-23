@extends('layouts.frontend')

@section('pageTitle', 'News')

@section('content')
<div class="py-50">
    <div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-9 col-12">

                    @forelse ($blogs as $blog )

                    <x-blog.blog-item :blog-item="$blog"/>
                    @empty
                    <p>No news update yet</p>
                    @endforelse
				</div>
			</div>
		</div>
</div>
@endsection
