@if (!empty($status))
<div x-data="{ open: true }" x-show="open"  x-init="setTimeout(()=> open = false, 3000)">
    <div class="alert alert-{{ $status === 'error' ? 'danger' : $status }} alert-dismissible fade show" role="alert">
        {{-- <div class=""> --}}
        <h4 class="alert-heading">{{ ucfirst($status) }}</h4>
        <p class="text-white"> {{ $message }} </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
 
@endif

