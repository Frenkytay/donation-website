<?php

namespace App\Http\Controllers;

use App\Models\Donation;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    //
    public function partnerPage(){
        return view('partner');
    }
    public function donationPage(){
        return view('donation');
    }
    public function pickUpFormPage(){
        return view('pickUpForm');
    }
    public function pickUpForm(Request $request){
        $request->validate([
            'total_items' => 'required|integer',
            'items.*.name' => 'required|string',
            'items.*.quantity' => 'required|integer',
            'items.*.expiration_date' => 'required|date',
        ]);

        // Create Pickup Request
        // $pickupRequest = Donation::create([
        //     'user_id' => Auth::id(), // Get the ID of the logged-in user
        
        //     'name' => $request->name,
        //     'quantity' => $request->quantity,
        //     'expiration_date' => $request->expiration_date,
        //     'total_items' => $request->total_items,
        // ]);
        foreach ($request->items as $item) {
            Donation::create([
                'user_id' => Auth::id(),
                
                'total_items' => $request->total_items,
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'expiration_date' => $item['expiration_date'],
            ]);
        }
        return redirect()->route('home.view')->with('success', 'Pickup request created successfully!');
    }
}
