<?php

namespace App\Http\Controllers\Admin;

use App\Models\BerkasPribadi;
use SweetAlert2\Laravel\Swal;
use App\Services\BackupService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    protected $backupService;

    public function __construct(BackupService $backupService)
    {
        $this->backupService = $backupService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berkas = BerkasPribadi::with(['user', 'kategori'])->latest()->get();
        return view('berkas.index', compact('berkas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berkas = BerkasPribadi::with(['user', 'kategori', 'aktivitas'])->findOrFail($id);
        return view('berkas.show', compact('berkas'));
    }

    /**
     * Backup the specified resource
     */
    public function backup(string $id)
    {
        try {
            $berkas = BerkasPribadi::findOrFail($id);
            $result = $this->backupService->backupFile($berkas);

            if ($result['success']) {
                Swal::success([
                    'title' => 'Berkas berhasil dibackup!',
                ]);
                return redirect()->back();
            }

            Swal::error([
                'title' => 'Gagal backup berkas!',
                'text' => $result['message'],
            ]);
            return redirect()->back();
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Gagal backup berkas!',
                'text' => $e->getMessage(),
            ]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $berkas = BerkasPribadi::findOrFail($id);

            // Delete file from storage first
            if ($berkas->lokasi_berkas) {
                Storage::delete($berkas->lokasi_berkas);
            }

            // Then delete record
            $berkas->delete();

            // Log activity
            $berkas->aktivitas()->create([
                'user_id' => Auth::id(),
                'action' => 'delete',
                'description' => 'Admin menghapus berkas: ' . $berkas->judul
            ]);

            Swal::success([
                'title' => 'Berkas berhasil dihapus!',
            ]);

            return redirect()->route('admin.berkas.index');
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Gagal menghapus berkas!',
                'text' => $e->getMessage(),
            ]);

            return redirect()->back();
        }
    }
}
