<x-app-layout>
    <div class="max-w-lg mx-auto p-4 sm:p-6 lg:p-8">
        <div class="flex justify-center mt-3">
            <x-secondary-button class="px-3 inline-flex items-center" onclick="location.href='{{ route('contacts.create') }}'">
                <svg viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8">
                    <path d="M8 1a3 3 0 1 0 .002 6.002A3 3 0 0 0 8 1zM6.5 8A4.491 4.491 0 0 0 2 12.5v.5c0 1.11.89 2 2 2h6v-1H7v-4h3V8.027A4.243 4.243 0 0 0 9.5 8zM11 8v3H8v2h3v3h2v-3h3v-2h-3V8zm0 0" fill="#2e3436"/>
                </svg>
                Agregar Nuevo Contacto
            </x-secondary-button>
        </div>
        @foreach ($contacts as $contact)
            <div class="bg-white block mt-6 p-6 border-gray-300 hover:border-indigo-300 hover:ring hover:ring-indigo-200 hover:ring-opacity-50 rounded-md shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img src="{{ $contact->profile_photo_path ? Storage::url($contact->profile_photo_path) : 'https://via.placeholder.com/150' }}" alt="Foto de Perfil" class="h-10 w-10 rounded-full">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{ $contact->first_name }} {{ $contact->last_name }}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{ $contact->email }}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        {{ $contact->phone }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
