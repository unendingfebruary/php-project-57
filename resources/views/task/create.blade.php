@extends('layouts.app')

@section('content')
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">{{ __('task.create.title') }}</h1>

            {{ Form::open(['url' => route('tasks.store'), 'method' => 'POST', 'class' => 'w-50']) }}
                <div class="flex flex-col">
                    <div class="mt-2">
                        <x-input-label for="name" :value="__('task.common.name')" />
                        <x-text-input id="name" class="rounded w-1/3" type="text" name="name" :value="old('name')"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-3">
                        <x-input-label for="name" :value="__('task.common.description')" />
                        <x-textarea id="description" class="rounded w-1/3 h-32" cols="50" rows="10" name="description">{{ old('description') }}</x-textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mt-3">
                        <x-input-label for="status_id" :value="__('task.common.status')" />
                        {{ Form::select('status_id', $statuses, null, [
                            'class' => 'rounded border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-1/3',
                            'id' => 'status_id',
                            'placeholder' => '----------',
                        ]) }}
                        <x-input-error :messages="$errors->get('status_id')" class="mt-2" />
                    </div>

                    <div class="mt-3">
                        <x-input-label for="assigned_to_id" :value="__('task.common.executor')" />
                        {{ Form::select('assigned_to_id', $executors, null, [
                            'class' => 'rounded border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-1/3',
                            'id' => 'assigned_to_id',
                            'placeholder' => '----------',
                        ]) }}
                        <x-input-error :messages="$errors->get('assigned_to_id')" class="mt-2" />
                    </div>

                    <div class="mt-3">
                        <x-primary-button>
                            {{ __('task.create.button') }}
                        </x-primary-button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
