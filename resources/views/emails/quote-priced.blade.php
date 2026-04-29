<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
        .header { text-align: center; border-bottom: 2px solid #5188b8; padding-bottom: 20px; margin-bottom: 20px; }
        .header h1 { margin: 0; color: #5188b8; }
        .price-box { background: #f0f7ff; border: 1px solid #cce0ff; padding: 20px; text-align: center; margin: 20px 0; border-radius: 5px; }
        .price-box h2 { margin: 0; color: #0056b3; font-size: 28px; }
        .notes-box { background: #fdfdfd; border-left: 4px solid #5188b8; padding: 15px; margin: 20px 0; }
        .footer { text-align: center; font-size: 12px; color: #777; border-top: 1px solid #eee; padding-top: 20px; margin-top: 20px; }
        .btn { display: inline-block; padding: 12px 25px; background-color: #5188b8; color: #fff; text-decoration: none; border-radius: 5px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Quote Price Updated</h1>
            <p>Your quote request has been reviewed.</p>
        </div>

        <p>Hello {{ $quote->payer_name }},</p>
        <p>We have reviewed your request (Invoice ID: <strong>{{ $quote->invoice_id }}</strong>) and determined the pricing for the requested services.</p>

        <div class="price-box">
            <p style="margin:0; font-size: 14px; color:#555;">Total Amount Payable</p>
            <h2>${{ number_format($quote->amount, 2) }}</h2>
        </div>

        @if(!empty($quote->payment_details['admin_notes']))
            <div class="notes-box">
                <strong>Notes from our team:</strong><br>
                {!! nl2br(e($quote->payment_details['admin_notes'])) !!}
            </div>
        @endif

        <div style="text-align: center; margin-top: 30px;">
            <p>You can now proceed to complete your payment.</p>
            <a href="{{ route('graphics.payment', ['invoice_id' => $quote->invoice_id]) }}" class="btn">Proceed to Payment</a>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Graphics Studio. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
