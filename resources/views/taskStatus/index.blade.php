@extends('layouts.app')

@section('content')
<div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
    <div class="grid col-span-full">
        @include('flash::message')

        <h1 class="mb-5">{{ __('status.index.title') }}</h1>

        @can('create', App\Models\TaskStatus::class)
            <div>
                <x-primary-link :href="route('task_statuses.create')">
                    {{ __('status.index.button') }}
                </x-primary-link>
            </div>
        @endcan

        <table class="mt-4">
            <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('status.common.name') }}</th>
                    <th>{{ __('status.common.date') }}</th>
                    @canany(['update', 'delete'], App\Models\TaskStatus::class)
                        <th>{{ __('status.common.actions') }}</th>
                    @endcan
                </tr>
            </thead>
            @foreach($taskStatuses as $status)
                <tr class="border-b border-dashed text-left">
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->name }}</td>
                    <td>{{ $status->created_at->format('d.m.Y') }}</td>
                    <td>
                        @can('delete', App\Models\TaskStatus::class)
                            <x-delete-link :href="route('task_statuses.destroy', $status)">
                                {{ __('status.common.destroy') }}
                            </x-delete-link>
                        @endcan

                        @can('update', App\Models\TaskStatus::class)
                            <x-update-link :href="route('task_statuses.edit', $status)">
                                {{ __('status.common.edit') }}
                            </x-update-link>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection
