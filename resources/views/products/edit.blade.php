<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg dark:bg-gray-800">
                @if($errors->any())
                    <div class="mb-6 rounded-lg bg-red-100 p-4 text-sm text-red-800 dark:bg-red-900/40 dark:text-red-200">
                        <ul class="list-inside list-disc">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('product.update', ['product' => $product]) }}" class="space-y-6">
                    @csrf
                    @method('put')
                    @include('products.partials.form')
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Update product') }}</x-primary-button>
                        <a href="{{ route('product.index') }}" class="text-sm text-gray-600 underline dark:text-gray-400">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
