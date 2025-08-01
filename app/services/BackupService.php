<?php

namespace App\Services;

use ZipArchive;
use App\Models\BerkasPribadi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BackupService
{
    public function backupFile(BerkasPribadi $berkas)
    {
        // Create backup directory if not exists
        $backupPath = 'backups/' . date('Y-m-d');
        if (!Storage::exists($backupPath)) {
            Storage::makeDirectory($backupPath);
        }

        // Copy file to backup directory
        $originalPath = $berkas->lokasi_berkas;
        $backupFilename = $backupPath . '/' . time() . '_' . $berkas->nama_berkas;

        if (Storage::exists($originalPath)) {
            Storage::copy($originalPath, $backupFilename);

            // Log backup activity
            $berkas->aktivitas()->create([
                'user_id' => Auth::id(),
                'action' => 'backup',
                'description' => 'Backup berkas: ' . $berkas->judul
            ]);

            return [
                'success' => true,
                'message' => 'Berkas berhasil dibackup',
                'backup_path' => $backupFilename
            ];
        }

        return [
            'success' => false,
            'message' => 'Berkas tidak ditemukan'
        ];
    }
}
