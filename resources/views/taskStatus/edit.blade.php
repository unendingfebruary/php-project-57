@extends('layouts.app')

@section('content')
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">Изменение статуса</h1>

            <form method="POST" action="{{ route('task_statuses.update', $taskStatus) }}" accept-charset="UTF-8" class="w-50">
                @csrf
                @method('PUT')

                <div class="flex flex-col">
                    <div class="mt-2">
                        <x-input-label for="name" :value="__('Имя')" />
                        <x-text-input id="name" class="rounded border-gray-300 w-1/3" type="text" name="name" :value="old('name') ?: $taskStatus->name" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-primary-button>
                            {{ __('Обновить') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
