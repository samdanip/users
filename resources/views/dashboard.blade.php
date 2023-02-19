<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>All Employee List</p>
                    @if (session('status'))
                        <div
                            class="mb-4 font-medium rounded text-sm border border-green-400 text-green-600 dark:text-green-400  p-4">
                            {{ __(session('status')) }}
                        </div>
                    @endif
                    <form action="{{ URL::route('dashboard') }}" method="post">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                            <div class="mt-4">
                                <x-input-label for="searchterm" :value="__('Enter Name to Search')"/>
                                <x-text-input id="searchterm" class="block mt-1 w-full" type="search" name="searchterm"
                                              :value="old('searchterm')" required autofocus/>
                                <x-input-error :messages="$errors->get('searchterm')" class="mt-2"/>
                            </div>
                            <div class="mt-4">
                                <x-primary-button class="mt-7">
                                    {{ __('Search Employee') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                    <div class="overflow-auto">
                        <table class="border w-full mt-4" id="addresstable">
                            <thead>
                            <th class="p-2 border dark:border-gray-600">Employee Name</th>
                            <th class="p-2 border dark:border-gray-600">Age</th>
                            <th class="p-2 border dark:border-gray-600">Email</th>
                            <th class="p-2 border dark:border-gray-600">Address</th>
                            <th class="p-2 border dark:border-gray-600">Options</th>
                            </thead>
                            <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <td class="p-2 border dark:border-gray-600">
                                        {{ $employee->title }} {{ $employee->fullname }}
                                    </td>
                                    <td class="p-2 border dark:border-gray-600">
                                        {{ $employee->age }}
                                    </td>
                                    <td class="p-2 border dark:border-gray-600">
                                        {{ $employee->email }}
                                    </td>
                                    @isset($employee->locations)
                                        <td class="p-2 border dark:border-gray-600">
                                            @foreach ($employee->locations as $item)
                                                {!! '<b>' !!}{{ 'Address '.$loop->iteration }}{!! '</b>' !!} {!! '<br>' !!}
                                                {{ $item->address1 }} {!! '<br>' !!} {{ $item->address2 }} {!! '<br>' !!}
                                                {{ $item->district }} {!! '<br>' !!} {{ $item->state }} {!! '</br>' !!}
                                            @endforeach
                                        </td>
                                    @endisset
                                    <td class="p-2 border dark:border-gray-600">
                                        <form action="{{ route('visitors.edit', $employee->id) }}" method="get">
                                            <x-primary-button class="mt-4 add-tr">{{ __('Edit') }}</x-primary-button>
                                        </form>
                                        <form action="{{ route('visitors.destroy', $employee->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <x-primary-button class="mt-3 add-tr">{{ __('Delete') }}</x-primary-button>
                                        </form>
                                    </td>
                                    @empty
                                        <td colspan="3" class="p-2 border dark:border-gray-600">
                                            No records found.
                                        </td>
                            @endforelse
                            {{ $employees->links() }}
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
