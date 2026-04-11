<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-3xl text-lux-black leading-tight">
            Edit Transaction #{{ $transaction->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10">
                @if ($errors->any())
                <div class="mb-8 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('dashboard.transaction.update', $transaction->id) }}" method="post" class="max-w-xl">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-8">
                        <span class="text-lux-gold uppercase tracking-[0.3em] text-xs font-bold mb-2 block">Action Required</span>
                        <h3 class="text-2xl font-serif text-lux-black mb-6">Update Order Status</h3>
                        
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label for="status" class="text-[10px] uppercase tracking-[0.2em] text-lux-grey-dark font-bold">Transaction Status</label>
                                <select name="status" id="status"
                                    class="w-full border-b border-lux-grey-medium py-3 focus:outline-none focus:border-lux-gold transition-colors text-sm bg-transparent cursor-pointer">
                                    <option value="PENDING" {{ $transaction->status == 'PENDING' ? 'selected' : '' }}>PENDING (En attente)</option>
                                    <option value="CONFIRMED" {{ $transaction->status == 'CONFIRMED' ? 'selected' : '' }}>CONFIRMED (Confirmé)</option>
                                    <option value="SHIPPING" {{ $transaction->status == 'SHIPPING' ? 'selected' : '' }}>SHIPPING (En cours d'envoi)</option>
                                    <option value="SHIPPED" {{ $transaction->status == 'SHIPPED' ? 'selected' : '' }}>SHIPPED (Expédié)</option>
                                    <option value="SUCCESS" {{ $transaction->status == 'SUCCESS' ? 'selected' : '' }}>SUCCESS (Livré & Payé)</option>
                                    <option value="CANCELLED" {{ $transaction->status == 'CANCELLED' ? 'selected' : '' }}>CANCELLED (Annulé)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit"
                            class="inline-flex items-center px-10 py-4 bg-lux-black border border-transparent font-bold text-xs text-white uppercase tracking-widest hover:bg-lux-gold focus:outline-none transition-all duration-300">
                            Update Status
                        </button>
                        <a href="{{ route('dashboard.transaction.index') }}" class="ml-6 text-xs font-bold uppercase tracking-widest text-lux-grey-dark hover:text-lux-black transition-colors">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>