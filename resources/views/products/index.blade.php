<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">Daftar Produk dan Kategori</h3>
                        <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition">
                            Tambah Produk
                        </a>
                    </div>
                    
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">ID</th>
                                    <th scope="col" class="py-3 px-6">Nama Produk (name)</th>
                                    <th scope="col" class="py-3 px-6">Categories</th>
                                    <th scope="col" class="py-3 px-6">Harga (price)</th>
                                    <th scope="col" class="py-3 px-6">Stok (qty)</th>
                                    <th scope="col" class="py-3 px-6">User</th>
                                    <th scope="col" class="py-3 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 px-6">{{ $product->id }}</td>
                                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">{{ $product->name }}</td>
                                    <td class="py-4 px-6">
                                        @foreach($product->kategoris as $cat)
                                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{ $cat->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="py-4 px-6">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td class="py-4 px-6">{{ $product->qty }}</td>
                                    <td class="py-4 px-6">{{ $product->user->name ?? 'N/A' }}</td>
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ route('products.edit', $product->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
