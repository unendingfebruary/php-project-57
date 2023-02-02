<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelStoreRequest;
use App\Http\Requests\LabelUpdateRequest;
use App\Models\Label;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Label::class);
    }

    public function index(): View
    {
        return view('label.index', [
            'labels' => Label::all()->sortBy('id'),
        ]);
    }

    public function create(): View
    {
        return view('label.create');
    }

    public function store(LabelStoreRequest $request): RedirectResponse
    {
        $taskStatus = new Label();
        $taskStatus->fill($request->validated());
        $taskStatus->save();

        flash(__('flash.label.store'))->success();

        return redirect()->route('labels.index');
    }

    public function edit(Label $label): View
    {
        return view('label.edit', [
            'label' => $label,
        ]);
    }

    public function update(LabelUpdateRequest $request, Label $label): RedirectResponse
    {
        $label->fill($request->validated());
        $label->save();

        flash(__('flash.label.update'))->success();

        return redirect()->route('labels.index');
    }

    public function destroy(Label $label): RedirectResponse
    {
        if ($label->tasks->isNotEmpty()) {
            flash(__('flash.label.destroy_error'))->error();
        } else {
            $label->delete();
            flash(__('flash.label.destroy_success'))->success();
        }

        return redirect()->route('labels.index');
    }
}
