<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Product List') }}
            </h2>
            <a href="{{ route('product.create') }}"
               class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                {{ __('Create a Product') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="rounded-lg bg-green-100 p-4 text-sm font-medium text-green-800 dark:bg-green-900/40 dark:text-green-200">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="overflow-x-auto p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full min-w-[700px] table-fixed text-left text-sm">
                        <thead class="border-b border-gray-200 text-xs uppercase text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="w-[8%] px-4 py-3 text-center">ID</th>
                                <th class="w-[18%] px-4 py-3 !text-left">Name</th>
                                <th class="w-[14%] px-4 py-3 text-center">Quantity</th>
                                <th class="w-[16%] px-4 py-3 text-right">Price</th>
                                <th class="w-[29%] px-4 py-3 !text-left">Description</th>
                                <th class="w-[15%] px-4 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($products as $product)
                                <tr class="transition-colors hover:bg-gray-700/50">
                                    <td class="px-4 py-4 text-center">{{ $product->id }}</td>
                                    <td class="px-4 py-4 text-left font-medium">{{ $product->name }}</td>
                                    <td class="px-4 py-4 text-center">{{ $product->qty }}</td>
                                    <td class="px-4 py-4 text-right">₱{{ number_format($product->price, 2) }}</td>
                                    <td class="truncate px-4 py-4 text-left" title="{{ $product->description ?: '' }}">{{ $product->description ?: '—' }}</td>
                                    <td class="px-4 py-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <a href="{{ route('product.edit', ['product' => $product]) }}"
                                               class="font-medium text-indigo-600 hover:underline dark:text-indigo-400">
                                                {{ __('Edit') }}
                                            </a>
                                            <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}"
                                                  onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="font-medium text-red-600 hover:underline dark:text-red-400">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-10 text-center text-gray-500 dark:text-gray-400">
                                        {{ __('No products found. Create your first product to get started.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
