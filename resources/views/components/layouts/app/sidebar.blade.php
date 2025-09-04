<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <title>{{ $title ?? 'Visitor Management System' }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" />
    @include('partials.head')
</head>

<body class="min-h-screen font-sans bg-zinc-800 dark:bg-zinc-800">

    {{-- Sidebar Utama --}}
    <flux:sidebar sticky stashable class="font-sans border-e border-zinc-700 bg-zinc-900 text-white w-74 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        {{-- Logo & Judul --}}
        <a href="{{ auth()->check() && auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.registrasi') }}"
           class="flex items-center gap-3 px-3 py-4">
            <img src="{{ asset('favicon.png') }}" class="h-10 w-10 flex-shrink-0" alt="Logo PLN">
            <div class="leading-tight text-white dark:text-white">
                <div class="font-bold text-sm">Visitor Management System</div>
            </div>
        </a>

        {{-- Navigasi Berdasarkan Role --}}
        @auth
            @if (auth()->user()->role === 'admin')
                <flux:navlist.item icon="home" :href="route('admin.dashboard')" :current="request()->routeIs('admin.dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </flux:navlist.item>
                <flux:navlist.item icon="user-plus" :href="route('admin.registrasi')" :current="request()->routeIs('admin.registrasi')" wire:navigate>
                    {{ __('Registrasi') }}
                </flux:navlist.item>
            @elseif (auth()->user()->role === 'user')
                <flux:navlist.item icon="user-plus" :href="route('user.registrasi')" :current="request()->routeIs('user.registrasi')" wire:navigate>
                    {{ __('Registrasi') }}
                </flux:navlist.item>
            @endif
        @endauth

        @guest
            <flux:navlist.item icon="arrow-right-start-on-rectangle" :href="route('login')" wire:navigate>
                {{ __('Login') }}
            </flux:navlist.item>

            @if (Route::has('register'))
                <flux:navlist.item icon="user-plus" :href="route('register')" wire:navigate>
                    {{ __('Register') }}
                </flux:navlist.item>
            @endif
        @endguest

        <flux:spacer />

        {{-- Menu Profil Desktop --}}
        @auth
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()" icon:trailing="chevrons-up-down" />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg bg-neutral-700 text-white items-center justify-center">
                                    {{ auth()->user()->initials() }}
                                </span>
                                <div class="grid flex-1 text-start">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        @endauth
    </flux:sidebar>

    {{-- Burger & Menu Profil Mobile --}}
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
        <flux:spacer />

        @auth
            <flux:dropdown position="top" align="end">
                <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />
                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg bg-neutral-700 text-white items-center justify-center">
                                    {{ auth()->user()->initials() }}
                                </span>
                                <div class="grid flex-1 text-start">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        @endauth
    </flux:header>

    {{-- Konten Halaman --}}
    {{ $slot }}

    @fluxScripts
</body>
</html>
