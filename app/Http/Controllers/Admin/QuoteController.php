<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuotePricedMail;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Payment::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.graphics.quotes.index', compact('quotes'));
    }

    public function edit($id)
    {
        $quote = Payment::findOrFail($id);
        return view('admin.graphics.quotes.edit', compact('quote'));
    }

    public function update(Request $request, $id)
    {
        $quote = Payment::findOrFail($id);
        
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'admin_notes' => 'nullable|string'
        ]);

        $quote->amount = $request->amount;
        
        $details = $quote->payment_details ?? [];
        $details['admin_notes'] = $request->admin_notes;
        $quote->payment_details = $details;
        
        $quote->save();

        if ($request->has('send_email') && $request->amount > 0) {
            try {
                Mail::to($quote->payer_email)->send(new QuotePricedMail($quote));
                return redirect()->route('admin.graphics.quotes.index')->with('success', 'Price updated and email sent to client.');
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Mail failed: ' . $e->getMessage());
                return redirect()->route('admin.graphics.quotes.index')->with('warning', 'Price updated but failed to send email. Error: ' . $e->getMessage());
            }
        }

        return redirect()->route('admin.graphics.quotes.index')->with('success', 'Quote details updated.');
    }

    public function destroy($id)
    {
        Payment::findOrFail($id)->delete();
        return redirect()->route('admin.graphics.quotes.index')->with('success', 'Quote/Payment deleted successfully.');
    }
}
