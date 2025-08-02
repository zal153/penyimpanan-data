@props(['title', 'value', 'icon', 'color'])

<div class="col-md-3 mb-4">
    <div class="card shadow">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="mb-0">{{ $value }}</h4>
                    <p class="small text-muted mb-0">{{ $title }}</p>
                </div>
                <div class="col-auto">
                    <span class="fe fe-{{ $icon }} fe-24 text-{{ $color }}"></span>
                </div>
            </div>
        </div>
    </div>
</div>
