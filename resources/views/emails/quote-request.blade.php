<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
        .header { text-align: center; border-bottom: 2px solid #5188b8; padding-bottom: 20px; margin-bottom: 20px; }
        .header h1 { margin: 0; color: #5188b8; }
        .invoice-details { margin-bottom: 20px; }
        .invoice-details p { margin: 5px 0; }
        .table { w-full; border-collapse: collapse; margin-bottom: 20px; width: 100%; }
        .table th, .table td { border: 1px solid #eee; padding: 10px; text-align: left; }
        .table th { background: #f9f9f9; }
        .footer { text-align: center; font-size: 12px; color: #777; border-top: 1px solid #eee; padding-top: 20px; margin-top: 20px; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #5188b8; color: #fff; text-decoration: none; border-radius: 5px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div style="margin-bottom: 15px;">
                <span style="background: {{ ($quoteData['request_type'] ?? '') === 'FREE TRIAL' ? '#22c55e' : '#5188b8' }}; color: #fff; padding: 5px 15px; rounded-radius: 20px; font-size: 12px; font-weight: bold; text-transform: uppercase; border-radius: 50px;">
                    {{ $quoteData['request_type'] ?? 'Standard Quote' }}
                </span>
            </div>
            <h1>Quote Request Received</h1>
            <p>Thank you for reaching out to Graphics Studio.</p>
        </div>

        <div class="invoice-details">
            <p><strong>Invoice / Reference ID:</strong> {{ $invoiceId }}</p>
            <p><strong>Name:</strong> {{ $quoteData['name'] ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $quoteData['email'] ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $quoteData['phone'] ?? 'N/A' }}</p>
        </div>

        <h3>Requested Services</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Service Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quoteData['services'] ?? [] as $service)
                <tr>
                    <td>{{ $service }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Instructions</h3>
        <p style="background: #f5f5f5; padding: 15px; border-radius: 5px;">
            {{ $quoteData['instructions'] ?? 'No special instructions provided.' }}
        </p>

        @if(!empty($quoteData['uploaded_files']))
            <h3>Attached Files</h3>
            <ul>
                @foreach($quoteData['uploaded_files'] as $fileUrl)
                    <li><a href="{{ $fileUrl }}" target="_blank">View / Download File</a></li>
                @endforeach
            </ul>
        @endif

        <div style="text-align: center; margin-top: 30px;">
            <p>We will review your files and instructions and send you the exact pricing shortly. You can use your Invoice ID to complete the payment once the price is updated.</p>
            <a href="{{ route('graphics.payment', ['invoice_id' => $invoiceId]) }}" class="btn">View Payment Page</a>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Graphics Studio. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
