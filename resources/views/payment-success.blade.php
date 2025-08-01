<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Payment Success</title>
    <style>
        /* Reset some default styles */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7fc;
            color: #333;
        }

        .container {
            max-width: 500px;
            margin: 80px auto;
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        .success-icon {
            font-size: 72px;
            color: #4BB543; /* Green */
            margin-bottom: 20px;
        }

        h1 {
            color: #2F855A; /* Dark green */
            margin-bottom: 12px;
            font-weight: 700;
        }

        p.message {
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 30px;
            color: #555;
        }

        .info-box {
            text-align: left;
            background: #E6FFFA;
            border: 1px solid #81E6D9;
            border-radius: 8px;
            padding: 20px 25px;
            margin-bottom: 25px;
            font-size: 16px;
            color: #2C7A7B;
        }

        .info-label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: #285E61;
        }

        .btn-home {
            display: inline-block;
            background-color: #3182CE;
            color: white;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 6px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(49, 130, 206, 0.3);
            transition: background-color 0.3s ease;
        }

        .btn-home:hover {
            background-color: #2C5282;
        }

        /* Responsive for mobile */
        @media (max-width: 600px) {
            .container {
                margin: 40px 20px;
                padding: 30px 20px;
            }

            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container" role="main" aria-labelledby="success-title">
        <div class="success-icon" aria-hidden="true">&#10004;</div> <!-- Checkmark unicode -->
        <h1 id="success-title">Payment Successful!</h1>
        <p class="message">Thank you for your purchase! Your payment was processed successfully.</p>

        <div class="info-box" aria-label="Order details">
            <span class="info-label">Order ID:</span>
            <span>{{ $orderId }}</span>
        </div>
        <div class="info-box" aria-label="Payment details">
            <span class="info-label">Payment ID:</span>
            <span>{{ $paymentId }}</span>
        </div>
        <div class="info-box" aria-label="Customer details">
            <span class="info-label">Name:</span>
            <span>{{ $name }}</span>
            <span class="info-label">Email:</span>
            <span>{{ $email }}</span>
            <span class="info-label">Contact:</span>
            <span>{{ $contact }}</span>
        </div>
        <p class="message">You can now return to the home page or continue shopping.</p>    

        <a href="{{ url('/') }}" class="btn-home" role="button">Return to Home</a>
    </div>
</body>
</html>
