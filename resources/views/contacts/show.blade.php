<!-- resources/views/contacts/show.blade.php -->

<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center mb-6">
                @if ($contact->profile_photo_path)
                    <img src="{{ Storage::url($contact->profile_photo_path) }}" alt="Foto de Perfil" class="h-20 w-20 rounded-full mr-4">
                @else
                    <svg class="h-20 w-20 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.31 0-6 2.69-6 6v2h12v-2c0-3.31-2.69-6-6-6z"/>
                    </svg>
                @endif
                <div>
                    <h2 class="text-xl font-bold">{{ $contact->first_name }} {{ $contact->last_name }}</h2>
                    <p class="text-gray-600">{{ $contact->email }}</p>
                    <p class="text-gray-600">{{ $contact->phone }}</p>
                </div>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium">Dirección:</h3>
                <p class="text-gray-600">{{ $contact->address }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium">Compañía:</h3>
                <p class="text-gray-600">{{ $contact->company }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium">Fecha de Nacimiento:</h3>
                <p class="text-gray-600">{{ $contact->birthday }}</p>
            </div>
            <div class="flex justify-end">
                <x-secondary-button onclick="location.href='{{ route('contacts.edit', $contact) }}'">Editar</x-secondary-button>
            </div>
        </div>
    </div>
</x-app-layout>
