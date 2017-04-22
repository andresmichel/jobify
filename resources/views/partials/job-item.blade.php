<li class="list-group-item d-block py-4">
    <div class="flex">
        <div class="flex">
            <div class="avatar" style="background-image:url('{{ asset($job->company->user->avatar) }}')"></div>
        </div>
        <div class="ml-4 flex flex-column w-100">
            <div class="flex w-100">
                <h5 class="card-title"><a href="{{ url('jobs', $job->slug) }}" class="fw-300">{{ $job->title }}</a></h5>
                <p class="card-subtitle mb-2 ml-auto text-nowrap">Full time</p>
            </div>
            <div class="flex w-100">
                <p class="card-subtitle mb-2 text-muted">
                    <a href="{{ url('company', $job->company->slug) }}">{{ $job->company->user->name }}</a>
                </p>
                <p class="card-subtitle mb-2 ml-auto flex">
                    <i class="material-icons mr-1 text-muted">place</i>
                    {{ $job->state }}, {{ $job->city }}
                </p>
            </div>
        </div>
    </div>
</li>
