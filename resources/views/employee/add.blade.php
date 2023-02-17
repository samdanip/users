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
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <!-- Age -->
                        <div class="mt-4">
                            <x-input-label for="age" :value="__('Age')" />
                            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" min="1" max="100" step="1" :value="old('age')" required />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>
                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
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
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
                        <!-- Address 1 -->
                        <div class="mt-4">
                            <x-input-label for="address1" :value="__('Address Line 1')" />
                            <x-text-input id="address1" class="block mt-1 w-full" type="text" name="address1" :value="old('address1')" />
                            <x-input-error :messages="$errors->get('address1')" class="mt-2" />
                        </div>
                        <!-- Address 2 -->
                        <div class="mt-4">
                            <x-input-label for="address2" :value="__('Address Line 2')" />
                            <x-text-input id="address2" class="block mt-1 w-full" type="text" name="address2" :value="old('address2')" />
                            <x-input-error :messages="$errors->get('address2')" class="mt-2" />
                        </div>
                        <!-- State -->
                        <div class="mt-4">
                            <x-input-label for="state" :value="__('State')" />
                            <select id="state" name="state" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                <option value="Mr.">Mr.</option>
                            </select>
                        </div>
                        <!-- District -->
                        <div class="mt-4">
                            <x-input-label for="district" :value="__('District')" />
                            <select id="district" name="district" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                <option value="Mr.">Mr.</option>
                            </select>
                        </div>
                        <!-- Options -->
                        <div class="mt-4">
                            <x-primary-button class="mt-7">
                                {{ __('Add') }}
                            </x-primary-button>
                            <x-primary-button class="mt-7">
                                {{ __('Remove') }}
                            </x-primary-button>
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-primary-button class="mt-4">
                            {{ __('Save Employee Details') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>