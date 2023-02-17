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
                    <form action="{{ URL::route('employees.store') }}" method="post">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
                            <!-- Title -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <select id="title" name="title" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                </select>
                            </div>
                            <!-- fullname -->
                            <div class="mt-4">
                                <x-input-label for="fullname" :value="__('Fullname')" />
                                <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus />
                                <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                            </div>
                            <!-- Age -->
                            <div class="mt-4">
                                <x-input-label for="age" :value="__('Age')" />
                                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" min="1" max="100" step="1" :value="old('age')" required />
                                <x-input-error :messages="$errors->get('age')" class="mt-2" />
                            </div>
                            <!-- Email -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email (Optional)')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <!-- Gender -->
                            <div class="mt-4">
                                <x-input-label for="gender" :value="__('Gender')" />
                                <select id="gender" name="gender" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <h3 class="mt-6 font-semibold">Address List</h3>
                        <!-- Address Area -->
                        <div class="overflow-auto">
                            <table class="border w-full" id="addresstable">
                                <tr>
                                    <th class="p-2 border">Address Line 1</th>
                                    <th class="p-2 border">Address Line 2</th>
                                    <th class="p-2 border">District</th>
                                    <th class="p-2 border">State</th>
                                    <th class="p-2 border">Options</th>
                                </tr>
                                <tr>
                                    <input type="hidden" id="count" name="count" value="1" />
                                    <td class="p-2 border"><x-text-input id="address11" class="block mt-1 md:w-full" type="text" name="address11" :value="old('address1')" required/></td>
                                    <td class="p-2 border"><x-text-input id="address21" class="block mt-1 md:w-full" type="text" name="address21" :value="old('address2')" /></td>
                                    <td class="p-2 border"><x-text-input id="district1" class="block mt-1 md:w-full" type="text" name="district1" :value="old('district')" required/></td>
                                    <td class="p-2 border"><x-text-input id="state1" class="block mt-1 md:w-full" type="text" name="state1" :value="old('state')" required/></td>
                                    <td class="p-2 border">
                                        <div class="md:flex md:justify-between">
                                            <x-secondary-button class="bg-green-100 add-tr">{{ __('Add') }}</x-secondary-button>
                                            <x-secondary-button class="bg-red-100 remove-tr">{{ __('Remove') }}</x-secondary-button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="mt-4">
                            <x-primary-button class="mt-4">
                                {{ __('Save Employee Details') }}
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
                <input type="hidden" id="count" name="count" value="${i}" />
                <td class="p-2 border"><x-text-input id="address1${i}" class="block mt-1 md:w-full" type="text" name="address1${i}" :value="old('address1')" required /></td>
                <td class="p-2 border"><x-text-input id="address2${i}" class="block mt-1 md:w-full" type="text" name="address2${i}" :value="old('address2')" /></td>
                <td class="p-2 border"><x-text-input id="district${i}" class="block mt-1 md:w-full" type="text" name="district${i}" :value="old('district')" required /></td>
                <td class="p-2 border"><x-text-input id="state${i}" class="block mt-1 md:w-full" type="text" name="state${i}" :value="old('state')" required /></td>
                <td class="p-2 border">
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