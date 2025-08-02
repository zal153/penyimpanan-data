<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('pengguna.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get storage statistics
        $storageUsed = $this->getStorageUsed();
        $storageTotal = config('filesystems.quotas.total', 10 * 1024 * 1024 * 1024); // 10GB default
        $storagePercentage = ($storageUsed / $storageTotal) * 100;

        // Get user statistics
        $totalUsers = User::count();
        $activeUsers = User::where('active', true)->count();
        $inactiveUsers = User::where('active', false)->count();

        return view('pengguna.create', compact(
            'storageUsed',
            'storageTotal',
            'storagePercentage',
            'totalUsers',
            'activeUsers',
            'inactiveUsers'
        ));
    }

    /**
     * Calculate total storage used
     */
    private function getStorageUsed()
    {
        // Get total size of all files in storage
        $storageUsed = 0;

        // Sum up file sizes from your berkas_pribadi table
        $storageUsed = \App\Models\BerkasPribadi::sum('ukuran_berkas');

        return $storageUsed;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
