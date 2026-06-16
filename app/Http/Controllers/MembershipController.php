<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function verifyMembership($id)
    {
        $user = User::findOrFail($id); // ✅ cari by primary key

        $status = $user->is_active ? 'ACTIVE' : 'NOT ACTIVE';
        $color  = $user->is_active ? '#27ae60' : '#e74c3c';

        return "
            <div style='font-family:sans-serif; text-align:center; padding:40px;'>
                <h2>Membership Verification</h2>
                <p><strong>Name:</strong> {$user->name}</p>
                <p><strong>ID:</strong> PNP-" . str_pad($user->id, 5, '0', STR_PAD_LEFT) . "</p>
                <p style='background:{$color}; color:white; padding:10px 20px; border-radius:20px; display:inline-block; font-weight:bold;'>
                    STATUS: {$status}
                </p>
            </div>
        ";
    }
}