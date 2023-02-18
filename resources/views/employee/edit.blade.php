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
                    <form action="{{ URL::route('visitors.update', $visitor->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
                            <!-- Title -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <select id="title" name="title"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                    <option value="Mr." {{ $visitor->title == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                    <option value="Mrs." {{ $visitor->title == 'Mrs.' ? 'selected' : '' }}>Mrs.
                                    </option>
                                </select>
                            </div>
                            <!-- fullname -->
                            <div class="mt-4">
                                <x-input-label for="fullname" :value="__('Fullname')" />
                                <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname"
                                    :value="$visitor->fullname" required autofocus />
                                <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                            </div>
                            <!-- Age -->
                            <div class="mt-4">
                                <x-input-label for="age" :value="__('Age')" />
                                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age"
                                    min="1" max="100" step="1" :value="$visitor->age" required />
                                <x-input-error :messages="$errors->get('age')" class="mt-2" />
                            </div>
                            <!-- Email -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email (Optional)')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="$visitor->email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <!-- Gender -->
                            <div class="mt-4">
                                <x-input-label for="gender" :value="__('Gender')" />
                                <select id="gender" name="gender"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                    <option value="Male" {{ $visitor->gender == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ $visitor->gender == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>
                        </div>
                        <h3 class="mt-6 font-semibold">Address List</h3>
                        <!-- Address Area -->
                        <div class="overflow-auto">
                            <table class="border w-full" id="addresstable">
                                <thead>
                                    <th class="p-2 border dark:border-gray-600">Address Line 1</th>
                                    <th class="p-2 border dark:border-gray-600">Address Line 2</th>
                                    <th class="p-2 border dark:border-gray-600">District</th>
                                    <th class="p-2 border dark:border-gray-600">State</th>
                                    <th class="p-2 border dark:border-gray-600">Options</th>
                                </thead>
                                <tbody>
                                    @foreach ($visitor->locations as $item)
                                        <tr>
                                            <td class="p-2 border dark:border-gray-600">
                                                <x-text-input id="address11" class="block mt-1 md:w-full" type="text"
                                                    name="address1[]" :value="$item->address1" required />
                                            </td>
                                            <td class="p-2 border dark:border-gray-600">
                                                <x-text-input id="address21" class="block mt-1 md:w-full" type="text"
                                                    name="address2[]" :value="$item->address2" />
                                            </td>
                                            <td class="p-2 border dark:border-gray-600">
                                                <x-text-input id="district1" class="block mt-1 md:w-full" type="text"
                                                    name="district[]" :value="$item->district" required />
                                            </td>
                                            <td class="p-2 border dark:border-gray-600">
                                                <x-text-input id="state1" class="block mt-1 md:w-full" type="text"
                                                    name="state[]" :value="$item->state" required />
                                            </td>
                                            <td class="p-2 border dark:border-gray-600">
                                                <div class="md:flex md:justify-between">
                                                    <x-secondary-button class="bg-green-100 add-tr">{{ __('Add') }}
                                                    </x-secondary-button>
                                                    <x-secondary-button class="bg-red-100 remove-tr">{{ __('Remove') }}
                                                    </x-secondary-button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <x-primary-button class="mt-4">
                                {{ __('Update Employee Details') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script type="text/javascript">
    let i = 1;
    $("#addresstable").on('click', '.add-tr', function() {
        ++i;
        $('#addresstable').append(`<tr>
                <td class="p-2 border dark:border-gray-600"><x-text-input id="address1${i}" class="block mt-1 md:w-full" type="text" name="address1[]" :value="old('address1')" required /></td>
                <td class="p-2 border dark:border-gray-600"><x-text-input id="address2${i}" class="block mt-1 md:w-full" type="text" name="address2[]" :value="old('address2')" /></td>
                <td class="p-2 border dark:border-gray-600"><x-text-input id="district${i}" class="block mt-1 md:w-full" type="text" name="district[]" :value="old('district')" required /></td>
                <td class="p-2 border dark:border-gray-600"><x-text-input id="state${i}" class="block mt-1 md:w-full" type="text" name="state[]" :value="old('state')" required /></td>
                <td class="p-2 border dark:border-gray-600">
                    <div class="md:flex md:justify-between">
                        <x-secondary-button class="bg-green-100 add-tr">{{ __('Add') }}</x-secondary-button>
                        <x-secondary-button class="bg-red-100 remove-tr">{{ __('Remove') }}</x-secondary-button>
                    </div>
                </td>
            </tr>`);
    });

    $("#addresstable").on('click', '.remove-tr', function() {
        $(this).closest('tr').remove();
    });
</script>
