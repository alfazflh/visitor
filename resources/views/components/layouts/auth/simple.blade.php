<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <title>Visitor Management System</title>
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" />
        @include('partials.head')
    </head>
    
    <body class="min-h-screen bg-zinc-800 antialiased dark:bg-zinc-800 dark:from-neutral-950 dark:to-neutral-900">
        <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-2">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <span class="flex h-14 w-14 mb-1 items-center justify-center rounded-md">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" alt="Logo PLN" class="w-14 h-14 object-contain" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'Visitor Management System') }}</span>
                </a>                
                <div class="flex flex-col gap-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
