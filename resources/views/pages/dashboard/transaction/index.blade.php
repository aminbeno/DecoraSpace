<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-3xl text-lux-black leading-tight">
            {{ __('Transactions') }}
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
                    {data:'id', name:'id', width:'5%'},
                    {data:'name', name:'name'},
                    {data:'phone', name:'phone'},
                    {data:'payment_method', name:'payment_method'},
                    {data:'total_price', name:'total_price'},
                    {data:'status', name:'status'},
                    {
                        data:'action',
                        name:'action',
                        orderable:false,
                        searchable:false,
                        width:'20%'
                    }
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 md:px-8 py-10 overflow-x-auto">
                    <div class="mb-8">
                        <span class="text-lux-gold uppercase tracking-[0.3em] text-[10px] md:text-xs font-bold mb-2 block">Gestion</span>
                        <h3 class="text-xl md:text-2xl font-serif text-lux-black">Historique des commandes</h3>
                    </div>
                    <table id="crudTable" class="w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Paiement</th>
                                <th>Total</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
