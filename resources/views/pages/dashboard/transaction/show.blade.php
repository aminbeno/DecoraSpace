<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-3xl text-lux-black leading-tight">
            Transaction #{{ $transaction->id }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX Datatable
            var datatable = $('#crudTable').DataTable({
                ajax:{
                    url:'{!! url()->current() !!}'
                },
                columns:[
                    {data:'id', name:'id', width:'10%'},
                    {data:'product.name', name:'product.name'},
                    {data:'product.price', name:'product.price'},
                ],
                language: {
                    paginate: {
                        next: '<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>',
                        previous: '<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>'
                    }
                }
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mb-12 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10">
                <div class="mb-8 flex justify-between items-end">
                    <div>
                        <span class="text-lux-gold uppercase tracking-[0.3em] text-xs font-bold mb-2 block">Details</span>
                        <h3 class="text-2xl font-serif text-lux-black">Transaction Information</h3>
                    </div>
                    <div class="text-right">
                        <span class="inline-block px-4 py-1 text-[10px] font-bold uppercase tracking-widest {{ $transaction->status == 'SUCCESS' ? 'bg-green-100 text-green-800' : 'bg-lux-grey-light text-lux-black' }}">
                            {{ $transaction->status }}
                        </span>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-6">
                        <div>
                            <label class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold block mb-1">Customer Name</label>
                            <p class="text-sm text-lux-black font-medium">{{ $transaction->name }}</p>
                        </div>
                        <div>
                            <label class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold block mb-1">Email Address</label>
                            <p class="text-sm text-lux-black font-medium">{{ $transaction->email }}</p>
                        </div>
                        <div>
                            <label class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold block mb-1">Shipping Address</label>
                            <p class="text-sm text-lux-black font-medium leading-relaxed">{{ $transaction->address }}</p>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold block mb-1">Phone</label>
                                <p class="text-sm text-lux-black font-medium">{{ $transaction->phone }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold block mb-1">Courier</label>
                                <p class="text-sm text-lux-black font-medium">{{ $transaction->courier }}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold block mb-1">Payment</label>
                                <p class="text-sm text-lux-black font-medium">{{ $transaction->payment }}</p>
                            </div>
                            <div>
                                <label class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold block mb-1">Total Price</label>
                                <p class="text-lg text-lux-gold font-serif">{{ number_format($transaction->total_price) }} DH</p>
                            </div>
                        </div>
                        @if($transaction->payment_url)
                        <div>
                            <label class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold block mb-1">Payment Link</label>
                            <a href="{{ $transaction->payment_url }}" target="_blank" class="text-xs font-bold text-lux-black underline hover:text-lux-gold transition-colors">Open Payment Window</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10">
                <div class="mb-8">
                    <span class="text-lux-gold uppercase tracking-[0.3em] text-xs font-bold mb-2 block">Items</span>
                    <h3 class="text-2xl font-serif text-lux-black">Purchased Products</h3>
                </div>
                <table id="crudTable" class="w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>