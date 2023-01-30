@extends('layouts.app')

@section('content')
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">

            <h2 class="mb-5">
                {{ __('task.show.title') }} {{ $task->name }}

                @can('update', App\Models\TaskStatus::class)
                    <a href="{{ route('tasks.edit', $task) }}">&#9881;</a>
                @endcan
            </h2>

            <p>
                <span class="font-black">{{ __('task.common.name') }}:</span>
                {{ $task->name }}
            </p>

            <p>
                <span class="font-black">{{ __('task.common.status') }}:</span>
                {{ $task->status->name }}
            </p>

            <p>
                <span class="font-black">{{ __('task.common.description') }}:</span>
                {{ $task->description }}
            </p>
        </div>
    </div>
@endsection
