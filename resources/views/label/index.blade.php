@extends('layouts.app')

@section('content')
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            @include('flash::message')

            <h1 class="mb-5">{{ __('label.index.title') }}</h1>

            @can('create', App\Models\Label::class)
                <div>
                    <x-primary-link :href="route('labels.create')">
                        {{ __('label.index.button') }}
                    </x-primary-link>
                </div>
            @endcan

            <table class="mt-4">
                <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('label.common.name') }}</th>
                    <th>{{ __('label.common.description') }}</th>
                    <th>{{ __('label.common.date') }}</th>
                    @canany(['update', 'delete'], App\Models\TaskStatus::class)
                        <th>{{ __('label.common.actions') }}</th>
                    @endcan
                </tr>
                </thead>
                @foreach($labels as $label)
                    <tr class="border-b border-dashed text-left">
                        <td>{{ $label->id }}</td>
                        <td>{{ $label->name }}</td>
                        <td>{{ $label->description }}</td>
                        <td>{{ $label->created_at->format('d.m.Y') }}</td>
                        <td>
                            @can('delete', App\Models\Label::class)
                                <x-delete-link :href="route('labels.destroy', $label)">
                                    {{ __('label.common.destroy') }}
                                </x-delete-link>
                            @endcan

                            @can('update', App\Models\Label::class)
                                <x-update-link :href="route('labels.edit', $label)">
                                    {{ __('label.common.edit') }}
                                </x-update-link>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
