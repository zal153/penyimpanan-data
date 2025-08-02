@props(['used', 'total', 'percentage'])

<div class="col-md-6 mb-4">
    <div class="card shadow">
        <div class="card-header">
            <strong>Penggunaan Penyimpanan</strong>
        </div>
        <div class="card-body">
            <div class="row align-items-center mb-2">
                <div class="col">
                    <strong>{{ $used }}</strong> dari <span class="text-muted">{{ $total }}</span>
                </div>
                <div class="col-auto">
                    <strong>{{ $percentage }}%</strong>
                </div>
            </div>
            <div class="progress" style="height: 10px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $percentage }}%"></div>
            </div>
        </div>
    </div>
</div>
