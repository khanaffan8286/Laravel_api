<!DOCTYPE html>
<html lang="en" class="bg-[#f5f7fb] min-h-screen">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center font-['Mona Sans',sans-serif] bg-gradient-to-br from-[#f5f7fb] to-[#e3e6ef]">
    <main class="w-full max-w-md mx-auto">
        <div class="rounded-3xl shadow-[0_8px_40px_rgba(108,115,255,0.10)] bg-white/90 border backdrop-blur-sm overflow-hidden">
            <div class="px-8 py-8 border-b flex items-center justify-center bg-gradient-to-r from-[#d6e0ff]/50 to-[#e7eafc]/10">
                <h2 class="text-3xl font-black text-gradient bg-gradient-to-r from-[#9a91f9] via-[#6678ed] to-[#8ec8f9] bg-clip-text text-transparent leading-tight">
                    <svg class="inline-block w-7 h-7 align-text-bottom -ml-2 mr-2" fill="none" viewBox="0 0 40 40">
                        <rect x="3" y="7" width="34" height="27" rx="6" fill="#b7d4fa" />
                        <rect x="8" y="10" width="24" height="6" rx="3" fill="#fff" />
                        <rect x="8" y="19" width="12" height="4" rx="2" fill="#d2e7fe" />
                        <rect x="8" y="25" width="18" height="4" rx="2" fill="#e9f1fe" />
                    </svg>
                    Razorpay Payment
                </h2>
            </div>
            <form method="POST" action="{{ route('razorpay.payment') }}" class="p-6 space-y-5">
                @csrf
                <div class="space-y-3">
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-600 pb-2">Name</label>
                        <input type="text" name="name" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-all placeholder-gray-400"
                            placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-600 pb-2">Email</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-all placeholder-gray-400"
                            placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-600 pb-2">Contact</label>
                        <input type="tel" name="contact" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-all placeholder-gray-400"
                            placeholder="Enter mobile number">
                    </div>
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-600 pb-2">Amount (INR)</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input type="number" name="amount" min="1" required
                                class="w-full pl-10 px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-200 focus:outline-none transition-all placeholder-gray-400"
                                placeholder="Enter amount (₹)">
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="w-full flex items-center justify-center px-6 py-4 mt-6 border border-transparent text-lg font-medium rounded-xl text-white bg-gradient-to-r from-[#8e98ff] to-[#606beb] hover:from-[#717dff] hover:to-[#4957eb] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Pay with Razorpay
                </button>
            </form>
        </div>
    </main>
    <style>
        .text-gradient {
            background: linear-gradient(90deg,#9a91f9,#6678ed 50%,#8ec8f9 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
    </style>
</body>
</html>
