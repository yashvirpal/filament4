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
            return redirect()->route('customer.login')
                ->withErrors(['mobile' => 'Please login first']);
        }

        $customer = Customer::findOrFail($customerId);

        return view('detail', compact('customer'));
    }
    public function loginn(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'ticket_no' => 'required',
        ]);

        $customer = Customer::where('mobile', $request->mobile)
            ->where('ticket_no', $request->ticket_no)
            ->first();

        if ($customer) {
            session(['customer_id' => $customer->id]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Welcome back ' . $customer->name . '!',
                    'redirect' => route('customer.dashboard'),
                ]);
            }

            return redirect()->route('customer.dashboard');
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Mobile or Ticket Number',
            ], 422);
        }

        return back()->withErrors([
            'mobile' => 'Invalid Mobile or Ticket Number',
        ]);
    }
}
