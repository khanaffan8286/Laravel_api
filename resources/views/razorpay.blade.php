<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Razorpay Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Razorpay Payment</h2>
        <form method="POST" action="{{route('razorpay.payment')}}" class="space-y-4">
            {{-- CSRF Token --}}
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Name
                </label>
                <input type="text" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Email
                </label>
                <input type="email" name="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Amount
                </label>
                <input type="number" name="amount" min="1" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter amount">
            </div>
            <button type="submit" class="bg-blue-500 w-full text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Pay with Razorpay
            </button>
        </form>
    </div>
</body>
</html>
