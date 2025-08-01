<x-app title="Dashboard">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center mb-4">
                        <div class="col">
                            <h2 class="h5 page-title">Selamat Datang!</h2>
                        </div>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="mb-0">127</h4>
                                            <p class="small text-muted mb-0">Total Berkas</p>
                                        </div>
                                        <div class="col-auto">
                                            <span class="fe fe-file fe-24 text-primary"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="mb-0">24</h4>
                                            <p class="small text-muted mb-0">Berkas Dibagikan</p>
                                        </div>
                                        <div class="col-auto">
                                            <span class="fe fe-share-2 fe-24 text-success"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="mb-0">8</h4>
                                            <p class="small text-muted mb-0">Kategori</p>
                                        </div>
                                        <div class="col-auto">
                                            <span class="fe fe-folder fe-24 text-warning"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="mb-0">12</h4>
                                            <p class="small text-muted mb-0">Tag</p>
                                        </div>
                                        <div class="col-auto">
                                            <span class="fe fe-tag fe-24 text-info"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Storage Usage -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <strong>Penggunaan Penyimpanan</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center mb-2">
                                        <div class="col">
                                            <strong>2.5 GB</strong> dari <span class="text-muted">10 GB</span>
                                        </div>
                                        <div class="col-auto">
                                            <strong>25%</strong>
                                        </div>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 25%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activities -->
                        <div class="col-md-6 mb-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <strong>Aktivitas Terakhir</strong>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush my-n3">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-upload fe-24 text-primary"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Mengunggah berkas baru</strong></small>
                                                    <div class="my-0 text-muted small">Laporan-2023.pdf</div>
                                                </div>
                                                <div class="col-auto">
                                                    <small class="text-muted">5m lalu</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-share-2 fe-24 text-success"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>Membagikan berkas</strong></small>
                                                    <div class="my-0 text-muted small">Presentasi.pptx</div>
                                                </div>
                                                <div class="col-auto">
                                                    <small class="text-muted">1j lalu</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app>
