<div class="flex flex-row gap-6">
    <div class="w-full p-8 ps-24 flex flex-col h-175 justify-center">

        <img src="/assets/safebite-icon.png" width="40px"/>
        <h1 class="text-3xl font-bold mt-4">Welcome back!</h1>
        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />
    
        <form wire:submit="login" class="flex flex-col gap-6">
            <!-- Email Address -->
            <flux:input
                wire:model="email"
                label="{{ __('Email') }}"
                type="email"
                name="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            />
    
            <!-- Password -->
            <flux:input
                wire:model="password"
                label="{{ __('Password') }}"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Password"
            />

            @if (Route::has('password.request'))
                <flux:link class="text-sm" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </flux:link>
            @endif
    
            <!-- Remember Me -->
            <flux:checkbox wire:model="remember" label="{{ __('Remember me') }}" />
    
            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full mb-4">{{ __('Log in') }}</flux:button>
            </div>
        </form>
    
        <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
            Don't have an account?
            <flux:link href="{{ route('register') }}" wire:navigate>Sign up</flux:link>
        </div>
    </div>
    
    <div class="relative w-full px-16 py-24 h-175 pattern rounded-r-3xl">
        <div class="flex slideshow w-full overflow-hidden rounded-3xl bg-white/21 backdrop-blur-lg border-1 border-white/52 w-full text-center py-8">
            @foreach ($slideshows as $key => $slide)
                <div @class([
                        "hidden" => $key !== $selectedSlide,
                        'duration-700 ease-in-out'
                    ])>
                    <h1 class="text-3xl font-bold text-white">{{$slide}}</h1>
                    <div class="px-12 pt-8 mb-4">
                        <img src="http://localhost/assets/register-computer.png" alt="">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="slideshow-buttons flex flex-row gap-4 w-full justify-center mt-4">
            @foreach ($slideshows as $key => $slide)
                <button href="#"
                    wire:click="slide({{$key}})"
                    @class([
                        'bg-white' => $key === $selectedSlide,
                        'bg-white/30' => $key !== $selectedSlide,
                        'rounded-full',
                        'w-[15px]',
                        'h-[15px]',
                        'block',
                        'pointer-events-auto'
                    ])
                ></button>
            @endforeach
        </div>
        <div class="absolute bottom-20 left-5">
            <img src="http://localhost/assets/register-phone.png" class="h-[270px]">
        </div>
    </div>
    <div class="absolute bottom-5 left-10">
        <p class="text-white">Safebite © {{now()->format('Y')}} All rights reserved</p>
    </div>
</div>
