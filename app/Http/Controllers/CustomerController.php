<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'ticket_no' => 'required',
        ]);

        $customer = Customer::where('mobile', $request->mobile)
            ->where('ticket_no', $request->ticket_no)
            ->first();

        if ($customer) {
            // Save ID in session
            session(['customer_id' => $customer->id]);

            return response()->json([
                'success' => true,
                'redirect' => route('customer.detail'),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid Mobile or Ticket Number',
        ], 422);
    }

    public function detail()
    {
        $customerId = session('customer_id');

        if (!$customerId) {
            return redirect()->route('customer.home')
                ->withErrors(['mobile' => 'Please login first']);
        }

        $customer = Customer::findOrFail($customerId);

        return view('step1', compact('customer'));
    }
}
