<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6 dark:text-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Create New Product</h2>

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block">Product Name</label>
                            <input type="text" id="name" name="name" class="w-full p-2 border dark:bg-gray-700" required>
                            @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block">Description</label>
                            <textarea id="description" name="description" class="w-full p-2 border dark:bg-gray-700" required></textarea>
                            @error('description')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block">Price</label>
                            <input type="number" id="price" name="price" class="w-full p-2 border dark:bg-gray-700" required>
                            @error('price')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="stock" class="block">Stock</label>
                            <input type="number" id="stock" name="stock" class="w-full p-2 border dark:bg-gray-700" required>
                            @error('stock')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
