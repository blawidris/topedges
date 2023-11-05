<div class="box p-4">
    <div class="row">
        <div class="col-md-8-flex align-items-center justify-content-between d-inline-flex ">
            <div class="box-img h-md-auto">
                <img src="{{ asset('/'.$blogItem->image) }}" alt="" class="img-fluid " >
            </div>
            <div class="box-body">
                <h4 class="mb-10"><a
                        href="{{ route('news.show', ['news' => $blogItem->id]) }}">{{ $blogItem->title }}</a>
                </h4>

                <p class="text-muted">{{ Str::limit($blogItem->description, 250, '...') }}</p>

                <div class="flexbox align-items-center mt-3">
                    <a class="btn btn-sm btn-primary" href="{{ route('news.show', ['news' => $blogItem->id]) }}">Read
                        more</a>
                </div>
            </div>
        </div>
    </div>
</div>
