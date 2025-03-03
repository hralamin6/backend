<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-6 dark:text-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Edit Product</h2>

                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block">Product Name</label>
                            <input type="text" id="name" name="name" class="w-full p-2 border dark:bg-gray-700" value="{{ old('name', $product->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block">Description</label>
                            <textarea id="description" name="description" class="w-full p-2 border dark:bg-gray-700" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block">Price</label>
                            <input type="number" id="price" name="price" class="w-full p-2 border dark:bg-gray-700" value="{{ old('price', $product->price) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="stock" class="block">Stock</label>
                            <input type="number" id="stock" name="stock" class="w-full p-2 border dark:bg-gray-700" value="{{ old('stock', $product->stock) }}" required>
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
