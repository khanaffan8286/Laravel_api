<!DOCTYPE html>
<html lang="en" class="bg-[#f5f7fb] min-h-screen">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Orders – Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen flex flex-col font-['Mona Sans',sans-serif] text-[#26324d] bg-gradient-to-br from-[#f5f7fb] to-[#e3e6ef]">

    
    <main class="flex-grow flex items-center justify-center px-4 py-12">
       

        <div class="w-full max-w-6xl mx-auto space-y-8">
            
            <div class="rounded-3xl shadow-[0_8px_40px_rgba(108,115,255,0.10)] bg-white/90 border backdrop-blur-sm">
                
                <div class="p-8 sm:p-12 border-b flex items-center justify-between bg-gradient-to-r from-[#d6e0ff]/50 to-[#e7eafc]/10 rounded-t-3xl">
                    
                    <h1 class="text-[2.4rem] md:text-5xl font-black text-gradient bg-gradient-to-r from-[#9a91f9] via-[#6678ed] to-[#8ec8f9] bg-clip-text text-transparent leading-tight">
                        <svg class="inline-block w-9 h-9 align-text-bottom -ml-2 mr-2" fill="none" viewBox="0 0 40 40">
                            <rect x="3" y="7" width="34" height="27" rx="6" fill="#b7d4fa" />
                            <rect x="8" y="10" width="24" height="6" rx="3" fill="#fff" />
                            <rect x="8" y="19" width="12" height="4" rx="2" fill="#d2e7fe" />
                            <rect x="8" y="25" width="18" height="4" rx="2" fill="#e9f1fe" />
                        </svg>
                        Recent Orders
                    </h1>
                     <div class="px-6 pb-8 pt-4 border-t border-gray-100/30">
    <a href="/razorpay" class="w-full flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-lg text-white bg-gradient-to-r from-[#8e98ff] to-[#606beb] hover:from-[#717dff] hover:to-[#4957eb] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-200 shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Make New Transaction
    </a>
</div>
                </div>
                <div class="p-4 overflow-x-auto">
                    <table class="min-w-full text-left border-separate border-spacing-y-2">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 text-xs font-bold tracking-wider uppercase text-gray-500 bg-gray-100 rounded-l-2xl">Name</th>
                                <th class="px-5 py-3 text-xs font-bold tracking-wider uppercase text-gray-500 bg-gray-100">Email</th>
                                <th class="px-5 py-3 text-xs font-bold tracking-wider uppercase text-gray-500 bg-gray-100">Contact</th>
                                <th class="px-5 py-3 text-xs font-bold tracking-wider uppercase text-gray-500 bg-gray-100">Amount</th>
                                <th class="px-5 py-3 text-xs font-bold tracking-wider uppercase text-gray-500 bg-gray-100">Order&nbsp;ID</th>
                                <th class="px-5 py-3 text-xs font-bold tracking-wider uppercase text-gray-500 bg-gray-100 rounded-r-2xl">Payment&nbsp;ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr class="transition hover:shadow-lg hover:scale-[1.01] bg-white rounded-2xl">
                                <td class="px-5 py-4 font-semibold text-[#395088]">
                                    <span class="inline-flex items-center gap-2">
                                        <span class="w-10 h-10 rounded-full bg-gradient-to-br from-[#d6e2ff] to-[#fafbff] flex items-center justify-center text-lg font-bold shadow-inner">
                                            {{ strtoupper(substr($order->name,0,1)) ?? '?' }}
                                        </span>
                                        <span>{{ $order->name }}</span>
                                    </span>
                                </td>
                                <td class="px-5 py-4 break-all">
                                    <a href="mailto:{{ $order->email }}" class="text-blue-600 hover:underline underline-offset-2">{{ $order->email }}</a>
                                </td>
                                <td class="px-5 py-4">{{ $order->contact }}</td>
                                <td class="px-5 py-4">
                                    <span class="font-medium text-[#218d52] bg-[#e7f7ea] px-2 py-1 rounded-lg">
                                        ₹{{$order->amount }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 monospace text-xs text-gray-500">
                                    {{ $order->order_id ?? '—' }}
                                </td>
                                <td class="px-5 py-4 monospace text-xs text-gray-500">
                                    {{ $order->payment_id ?? '—' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-10 text-gray-500">No orders found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($orders instanceof \Illuminate\Pagination\AbstractPaginator && $orders->hasPages())
                <div class="p-6 flex items-center justify-center">
                    {{ $orders->onEachSide(1)->links() }}
                </div>
                @endif
            </div>
        </div>
    </main>
    <style>
        .monospace {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            letter-spacing: 0.03em;
        }
        .text-gradient {
            background: linear-gradient(90deg,#9a91f9,#6678ed 50%,#8ec8f9 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
    </style>
</body>
</html>
