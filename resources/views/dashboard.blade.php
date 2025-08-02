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
                        <x-stats-card title="Total Berkas" value="127" icon="file" color="primary" />

                        <x-stats-card title="Berkas Dibagikan" value="24" icon="share-2" color="success" />

                        <x-stats-card title="Kategori" value="8" icon="folder" color="warning" />

                        <x-stats-card title="Tag" value="12" icon="tag" color="info" />
                    </div>

                    <!-- Storage and Activities -->
                    <div class="row">
                        <x-storage-usage used="2.5 GB" total="10 GB" percentage="25" />

                        <div class="col-md-6 mb-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <strong>Aktivitas Terakhir</strong>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush my-n3">
                                        <x-activity-item icon="upload" color="primary" title="Mengunggah berkas baru"
                                            description="Laporan-2023.pdf" time="5m lalu" />

                                        <x-activity-item icon="share-2" color="success" title="Membagikan berkas"
                                            description="Presentasi.pptx" time="1j lalu" />
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
