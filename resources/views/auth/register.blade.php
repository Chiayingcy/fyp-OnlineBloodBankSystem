<title>Donor Registration</title>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                 <img src="{{ asset('Images/logo.gif') }}" style="width: 150px" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Identifiaction Number -->
            <div class="mt-4">
                <x-input-label for="ic" :value="__('Identification Number (I.C. No.')" />

                <x-text-input id="ic" class="block mt-1 w-full" type="number" name="ic" :value="old('ic')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Blood Type -->
            <div class="mt-4">
                <x-input-label for="bloodType" :value="__('Blood Type')" />
                <select id="bloodType" class="block mt-1 w-full" wire:model="bloodType" required>
                <option selected>Select Blood Type</option>
                
                <option value="A+">
                    A+
                </option>

                <option value="A-">
                    A-
                </option>

                <option value="B+">
                    B+
                </option>

                <option value="B-">
                    B-
                </option>

                <option value="AB+">
                    AB+
                </option>

                <option value="AB-">
                    AB-
                </option>

                <option value="O+">
                    O+
                </option>

                <option value="O-">
                    O-
                </option>

            </select>
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" class="block mt-1 w-full" wire:model="gender" required>
                <option selected>Select Gender</option>

                <option value="m">
                    Male
                </option>
                <option value="f">
                    Female
                </option>
                </select>
            </div>

            <!-- Contact Number -->
            <div class="mt-4">
                <x-input-label for="phoneNo" :value="__('Contact Number')" />
                <x-text-input id="phoneNo" class="block mt-1 w-full" type="tel" name="phoneNo" :value="old('phoneNo')" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>

            <!-- Zip Code -->
            <div class="mt-4">
                <x-input-label for="zipCode" :value="__('Zip Code')" />
                <x-text-input id="zipCode" class="block mt-1 w-full" type="number" name="zipCode" :value="old('zipCode')" required />
            </div>

            <!-- State -->
            <div class="mt-4">
                <x-input-label for="state" :value="__('State')" />
                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered? Login Here!') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
        
    </x-auth-card>
</x-guest-layout>
