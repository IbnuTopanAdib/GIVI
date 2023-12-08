<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $donations = Donation::with('donor', 'recipient', 'donatedItem')->get();

        return view('admin.dashboard', compact('donations'));
    }

    public function approveDonation(Donation $donation)
    {
        $donation->update([
            'status' => 'approved',
            'approved_at' => now(),
        ]);

        return redirect('/dashboard')
            ->with('success', 'Permintaan Hibah dilanjutkan ke penghibah');
    }
    public function disapproveDonation(Donation $donation)
    {
        $donation->update([
            'status' => 'disapproved',
        ]);

        return redirect('/dashboard')
            ->with('warning', 'Permintaan Hibah batal disetujui');
    }


}
