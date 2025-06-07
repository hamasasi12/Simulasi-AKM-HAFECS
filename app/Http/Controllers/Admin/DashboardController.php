<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $SD = User::role('SD')->count();
        $SMP = User::role('SMP')->count();
        $SMA = User::role('SMA')->count();
        $users = User::paginate(5);
        return view('dashboard.admin.adminDashboard', [
            'navTitle' => 'Admin Dashboard'
            , 'SD' => $SD,
            'SMP' => $SMP,
            'SMA' => $SMA,
            'users' => $users,
        ] );
    }
}
