<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
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
                    {data:'image', name:'image'},
                    {
                        data:'action',
                        name:'action',
                        orderable:false,
                        searchable:false,
                        width:'25%'
                    }
                ]
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.category.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded shadow-lg">
                    + Créer une catégorie
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6 overflow-x-auto">
                    <table id="crudTable" class="w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Image</th>
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
