@props(['icon', 'color', 'title', 'description', 'time'])

<div class="list-group-item">
    <div class="row align-items-center">
        <div class="col-auto">
            <span class="fe fe-{{ $icon }} fe-24 text-{{ $color }}"></span>
        </div>
        <div class="col">
            <small><strong>{{ $title }}</strong></small>
            <div class="my-0 text-muted small">{{ $description }}</div>
        </div>
        <div class="col-auto">
            <small class="text-muted">{{ $time }}</small>
        </div>
    </div>
</div>
