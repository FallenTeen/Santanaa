<div class="p-4">
    <!-- Form untuk membuat report baru -->
    <form wire:submit.prevent="create" class="mb-4">
        <div class="mb-4">
            <label for="divisi" class="block text-sm font-medium text-gray-700">Divisi:</label>
            <input wire:model="divisi" type="text" id="divisi" name="divisi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('divisi') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="detail" class="block text-sm font-medium text-gray-700">Detail:</label>
            <textarea wire:model="detail" id="detail" name="detail" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            @error('detail') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        
        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Submit</button>
    </form>
</div>