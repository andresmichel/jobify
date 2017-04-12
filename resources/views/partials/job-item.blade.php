<li class="list-group-item d-block py-4">
    <div class="flex">
        <div class="flex">
            <img src="" alt="" width="64" height="64">
        </div>
        <div class="ml-4 flex flex-column w-100">
            <div class="flex w-100">
                <h5 class="card-title"><a href="{{ url('jobs', $job->slug) }}">{{ $job->title }}</a></h5>
                <h6 class="card-subtitle mb-2 text-muted ml-auto text-nowrap">Full time</h6>
            </div>
            <div class="flex w-100">
                <h6 class="card-subtitle mb-2 text-muted">
                    <a href="{{ url('company', $job->company->slug) }}">{{ $job->company->user->name }}</a>
                </h6>
                <h6 class="card-subtitle mb-2 text-muted ml-auto flex">
                    {{-- <i class="material-icons mr-1" style="opacity:0.5">place</i> --}}
                    {{ $job->state }}, {{ $job->city }}
                </h6>
            </div>
        </div>
    </div>
</li>
