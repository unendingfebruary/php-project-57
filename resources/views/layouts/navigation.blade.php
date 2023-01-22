<header class="fixed w-full">
    <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900 shadow-md">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <a href="{{ route('welcome') }}" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
                    {{ __('views.logo') }}
                </span>
            </a>

            <div class="flex items-center lg:order-2">
                @auth
                    <x-primary-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('views.nav.logout') }}
                    </x-primary-link>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <x-primary-link :href="route('login')">
                        {{ __('views.nav.login') }}
                    </x-primary-link>

                    <x-primary-link :href="route('register')" class="ml-2">
                        {{ __('views.nav.register') }}
                    </x-primary-link>
                @endauth
            </div>

            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('tasks')">
                            {{ __('views.nav.tasks') }}
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('task_statuses.index')" :active="request()->routeIs('task_statuses.index')">
                            {{ __('views.nav.task-statuses') }}
                        </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('labels')">
                            {{ __('views.nav.labels') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
