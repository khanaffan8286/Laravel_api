<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Payment</title>
</head>
<body>
  
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{ env('RAZORPAY_KEY') }}", // Use config or pass from controller
    "amount": {{ $amount }}, // Amount in paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "order_id": "{{ $orderId }}",
  
    "handler": function (response){
        window.location.href = "/payment-success?order_id={{$orderId}}&payment_id=" + response.razorpay_payment_id;
        // You may want to send response.razorpay_payment_id to the server via AJAX here
    },

    "prefill": {
        "name": "", // optional
        "email": "",
        "contact": "8104564322"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};

var rzp1 = new Razorpay(options);

rzp1.open();

rzp1.on('payment.failed', function (response){
    alert("Payment failed: " + response.error.description);
});
</script>
</body>
</html>
