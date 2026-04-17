<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1f2937] overflow-hidden shadow-sm sm:rounded-lg text-gray-300">
                <div class="p-6 border-b border-gray-700">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </a>
                            <div>
                                <h3 class="text-2xl font-bold text-white tracking-tight">Product Detail</h3>
                                <p class="text-sm text-gray-400 mt-1">Viewing product #{{ $product->id }}</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <x-button-edit :url="route('products.edit', $product->id)"/>
                            <x-button-delete :url="route('products.destroy', $product->id)"/>
                        </div>
                    </div>
                    
                    <div class="border border-gray-700 rounded-lg divide-y divide-gray-700">
                        <div class="grid grid-cols-3 p-4 items-center">
                            <div class="text-gray-400">Product Name</div>
                            <div class="col-span-2 font-bold text-white">{{ $product->name }}</div>
                        </div>
                        <div class="grid grid-cols-3 p-4 items-center">
                            <div class="text-gray-400">Quantity</div>
                            <div class="col-span-2">
                                <span class="bg-green-900 border border-green-700 text-green-300 text-xs font-semibold px-2.5 py-1 rounded">{{ $product->qty }} In Stock</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 p-4 items-center">
                            <div class="text-gray-400">Price</div>
                            <div class="col-span-2 font-bold text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        </div>
                        <div class="grid grid-cols-3 p-4 items-center">
                            <div class="text-gray-400">Owner</div>
                            <div class="col-span-2 flex items-center gap-2">
                                <div class="bg-indigo-600 rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold text-white">{{ substr($product->user->name ?? 'U', 0, 1) }}</div>
                                {{ $product->user->name ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="grid grid-cols-3 p-4 items-center">
                            <div class="text-gray-400">Created At</div>
                            <div class="col-span-2">{{ $product->created_at ? $product->created_at->format('d M Y, H:i') : '' }}</div>
                        </div>
                        <div class="grid grid-cols-3 p-4 items-center">
                            <div class="text-gray-400">Updated At</div>
                            <div class="col-span-2">{{ $product->updated_at ? $product->updated_at->format('d M Y, H:i') : '' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
