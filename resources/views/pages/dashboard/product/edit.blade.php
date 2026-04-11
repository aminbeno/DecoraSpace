<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard.product.index') }}">Product</a> &raquo; {{ $item->name }}&raquo; Edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        There's something wrong!
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </p>
                    </div>
                </div>
                @endif

                <form action="{{ route('dashboard.product.update', $item->id) }}" method="post"
                    enctype="multipart/form-data" class="w-full">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="name"
                                class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">Name</label>
                            <input type="text" placeholder="Product Name" name="name" id="name"
                                value="{{ old('name') ?? $item->name}}"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="description"
                                class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">Description</label>
                            <textarea name="description" id="description"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{!! old('description') ?? $item->description !!}</textarea>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="category_id"
                                class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">Category</label>
                            <select name="category_id" id="category_id"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id') ?? $item->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="price"
                                class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">Price</label>
                            <input type="number" placeholder="Product Price" name="price" id="price"
                                value="{{ old('price') ?? $item->price }}"
                                class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h3 class="text-lg font-bold mb-4">Promotions</h3>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_promoted" value="1" {{ (old('is_promoted') ?? $item->is_promoted) ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-lux-gold">
                                    <span class="ml-2 text-gray-700 font-bold uppercase tracking-widest text-xs">Activer la promotion</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="promo_price" class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">Prix Promotionnel</label>
                                <input type="number" name="promo_price" id="promo_price" value="{{ old('promo_price') ?? $item->promo_price }}" placeholder="Ex: 50000"
                                    class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label for="promo_label" class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">Label Promo</label>
                                <input type="text" name="promo_label" id="promo_label" value="{{ old('promo_label') ?? $item->promo_label }}" placeholder="Ex: Offre Spéciale"
                                    class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="promo_start_at" class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">Date de début</label>
                                <input type="datetime-local" name="promo_start_at" id="promo_start_at" value="{{ old('promo_start_at') ?? ($item->promo_start_at ? \Carbon\Carbon::parse($item->promo_start_at)->format('Y-m-d\TH:i') : '') }}"
                                    class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label for="promo_end_at" class="block uppercase tracking-widest text-gray-700 text-xs font-bold mb-2">Date de fin</label>
                                <input type="datetime-local" name="promo_end_at" id="promo_end_at" value="{{ old('promo_end_at') ?? ($item->promo_end_at ? \Carbon\Carbon::parse($item->promo_end_at)->format('Y-m-d\TH:i') : '') }}"
                                    class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">Update
                                Product</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
</x-app-layout>
