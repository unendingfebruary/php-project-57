@extends('layouts.app')

@section('content')
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            @include('flash::message')

            <h1 class="mb-5">{{ __('task.index.title') }}</h1>

            <div class="w-full flex items-center">
                <div>
                    <form method="GET" action="{{ route('tasks.index') }}" accept-charset="UTF-8">
                        <div class="flex">
                            <div>
                                <x-filter-select name="filter[status_id]">
                                    <option selected="selected" value="">{{ __('task.common.status') }}</option>
                                </x-filter-select>
                            </div>
                            <div>
                                <x-filter-select class="ml-2" name="filter[created_by_id]">
                                    <option selected="selected" value="">{{ __('task.common.creator') }}</option>
                                </x-filter-select>
                            </div>
                            <div>
                                <x-filter-select class="ml-2" name="filter[assigned_to_id]">
                                    <option selected="selected" value="">{{ __('task.common.executor') }}</option>
                                </x-filter-select>
                            </div>
                            <div>
                                <x-primary-button class="ml-2">
                                    {{ __('task.filter.button') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>

                @can('create', App\Models\Task::class)
                    <div class="ml-auto">
                        <x-primary-link :href="route('tasks.create')" class="ml-2">
                            {{ __('task.index.button') }}
                        </x-primary-link>
                    </div>
                @endcan
            </div>

            <table class="mt-4">
                <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th>{{ __('task.common.id') }}</th>
                    <th>{{ __('task.common.status') }}</th>
                    <th>{{ __('task.common.name') }}</th>
                    <th>{{ __('task.common.creator') }}</th>
                    <th>{{ __('task.common.executor') }}</th>
                    <th>{{ __('task.common.date') }}</th>
                    @canany(['update', 'delete'], App\Models\Task::class)
                        <th>{{ __('task.common.actions') }}</th>
                    @endcan
                </tr>
                </thead>
                @foreach($tasks as $task)
                    <tr class="border-b border-dashed text-left">
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->status->name }}</td>
                        <td>
                            <a class="text-blue-600 hover:text-blue-900" href="{{ route('tasks.show', $task) }}">
                                {{ $task->name }}
                            </a>
                        </td>
                        <td>{{ $task->creator->name }}</td>
                        <td>{{ $task->executor->name ?? '' }}</td>
                        <td>{{ $task->created_at->format('d-m-Y') }}</td>
                        <td>
                            @can('delete', $task)
                                <x-delete-link :href="route('tasks.destroy', $task)">
                                    {{ __('task.common.destroy') }}
                                </x-delete-link>
                            @endcan

                            @can('update', App\Models\TaskStatus::class)
                                <x-update-link :href="route('tasks.edit', $task)">
                                    {{ __('task.common.edit') }}
                                </x-update-link>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
