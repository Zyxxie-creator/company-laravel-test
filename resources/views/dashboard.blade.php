<x-app-layout>

    <div class="py-12 mx-auto px-4">
        <div class="inline-flex flex-wrap gap-4 justify-center">
            @foreach ($companies as $company)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $company->name }}</div>
                        <p class="text-gray-700 text-base">
                            <span class="font-bold">О компании:</span> {{ $company->info }}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <p class="text-gray-600 text-sm">
                            <span class="font-bold">Адрес:</span> {{ $company->address }}
                        </p>
                        <p class="text-gray-600 text-sm">
                            <span class="font-bold">Телефон:</span> {{ $company->phone }}
                        </p>
                        <p class="text-gray-600 pb-3 text-sm">
                            <span class="font-bold">Генеральный директор:</span> {{ $company->director }}
                        </p>
                    </div>
                    <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-16 ml-4 mb-4 font-medium"
                                onclick="return confirm('Вы уверены, что хотите удалить эту информацию?')">Удалить
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
        <button class="mx-auto mt-16 w-full h-9 bg-white rounded-lg shadow-md">
            <a href="{{ url('/new-company') }}" class="font-bold w-full text-center">Новая компания</a>
        </button>
    </div>
</x-app-layout>
