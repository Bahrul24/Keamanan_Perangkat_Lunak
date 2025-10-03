        <?php

        use App\Livewire\Actions\Logout;
        use Livewire\Volt\Component;

        new class extends Component
        {
            /**
             * Log the current user out of the application.
             */
            public function logout(Logout $logout): void
            {
                $logout();

                $this->redirect('/', navigate: true);
            }
        }; ?>

    <nav x-data="{ open: false }" class="bg-white border-b border-gray-300">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" wire:navigate>
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate class="text-gray-800 hover:text-gray-600 transition duration-300">
                        <img src="{{ asset('images/home-home-svgrepo-com.svg') }}" alt="Icon" class="w-5 h-5 mr-2" />
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('home.cycle')" :active="request()->routeIs('home.cycle')" wire:navigate class="text-gray-800 hover:text-gray-600 transition duration-300">
                        <img src="{{ asset('images/soap-svgrepo-com.svg') }}" alt="Icon" class="w-5 h-5 mr-2" />
                            {{ __('Product') }}
                        </x-nav-link>
                        <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')" wire:navigate class="text-gray-800 hover:text-gray-600 transition duration-300">
                        <img src="{{ asset('images/cart-large-minimalistic-svgrepo-com.svg') }}" alt="Icon" class="w-5 h-5 mr-2" />
                            {{ __('Cart') }}
                        </x-nav-link>
                        <x-nav-link :href="route('home.contact')" :active="request()->routeIs('home.contact')" wire:navigate class="text-gray-800 hover:text-gray-600 transition duration-300">
                        <img src="{{ asset('images/contact-email-mail-svgrepo-com.svg') }}" alt="Icon" class="w-5 h-5 mr-2" />
                            {{ __('Contact Us') }}
                        </x-nav-link>

                        @if(auth()->user() && auth()->user()->hasRole('admin'))
                            <x-nav-link :href="route('products.manage')" :active="request()->routeIs('products.manage')" wire:navigate class="text-gray-800 hover:text-gray-600 transition duration-300">
                                {{ __('CRUD') }}
                            </x-nav-link>
                            <x-nav-link :href="route('contact.list')" :active="request()->routeIs('contact.list')" wire:navigate class="text-gray-800 hover:text-gray-600 transition duration-300">
                                {{ __('Contact List') }}
                            </x-nav-link>
                        @endif
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:text-gray-800 focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                                <div class="ms-1">
                                    <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('home.cycle')" :active="request()->routeIs('home.cycle')" wire:navigate>
                    {{ __('Product') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')" wire:navigate>
                    {{ __('Cart') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('home.contact')" :active="request()->routeIs('home.contact')" wire:navigate>
                    {{ __('Contact Us') }}
                </x-responsive-nav-link>

                @if(auth()->user() && auth()->user()->hasRole('admin'))
                    <x-responsive-nav-link :href="route('products.manage')" :active="request()->routeIs('products.manage')" wire:navigate>
                        {{ __('CRUD') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('contact.list')" :active="request()->routeIs('contact.list')" wire:navigate>
                        {{ __('Contact List') }}
                    </x-responsive-nav-link>
                @endif
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-300">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                    <div class="font-medium text-sm text-gray-600">{{ auth()->user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile')" wire:navigate>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-start">
                        <x-responsive-nav-link>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                </div>
            </div>
        </div>
    </nav>

