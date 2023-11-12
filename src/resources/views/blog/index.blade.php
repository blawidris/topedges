@extends('layouts.frontend')


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

					{{-- <div aria-label="Page navigation example">
					  <ul class="pagination mb-0">
						<li class="page-item"><a class="page-link" href="#">Previous</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					  </ul>
					</div> --}}
				</div>
			</div>
		</div>
</div>
@endsection
