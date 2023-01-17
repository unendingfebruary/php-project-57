<header class="fixed w-full">
    <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900 shadow-md">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <a href="{{ route('welcome') }}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Менеджер задач</span>
            </a>

            <div class="flex items-center lg:order-2">
                @auth
                    <x-auth-nav-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Выход') }}
                    </x-auth-nav-link>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <x-auth-nav-link :href="route('login')">
                        {{ __('Вход') }}
                    </x-auth-nav-link>

                    <x-auth-nav-link :href="route('register')" class="ml-2">
                        {{ __('Регистрация') }}
                    </x-auth-nav-link>
                @endauth
            </div>

            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('tasks')">
                            {{ __('Задачи') }}
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('statuses')">
                            {{ __('Статусы') }}
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('labels')">
                            {{ __('Метки') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
