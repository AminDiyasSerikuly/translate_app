<?php

namespace App\Http\Controllers;

use App\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $translates = Translation::all();
        return view('translation.index', ['translates' => $translates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('translation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $translation = new Translation();
        $validate = Validator::make($request->all(), [
            'slug' => 'required',
            'en_translate' => 'required',
            'ru_translate' => 'required',
            'uz_translate' => 'required',
            'oz_translate' => 'required',
        ]);
        if ($validate->fails()) {
            \session()->flash('messages', $validate->errors()->all());
            return back()->withInput($request->all());
        }
        $translation->fill($request->all());
        if ($translation->save()) {
            $messages = [0 => 'Вы успешно добавили!'];
        } else {
            $messages = [0 => 'Произошла ошибка'];
        }
        \session()->flash('messages', $messages);
        return back()->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Translation $translation
     * @return \Illuminate\Http\Response
     */
    public function show(Translation $translation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Translation $translation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Translation $translation)
    {
        return view('translation.edit', ['translation' => $translation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Translation $translation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Translation $translation)
    {
        $validate = Validator::make($request->all(), [
            'slug' => 'required',
            'en_translate' => 'required',
            'ru_translate' => 'required',
            'uz_translate' => 'required',
            'oz_translate' => 'required',
        ]);
        if ($validate->fails()) {
            \session()->flash('messages', $validate->errors()->all());
            return back()->withInput($request->all());
        }
        $translation->fill($request->all());
        $translation->is_cached = false;
        if ($translation->save()) {
            $messages = [0 => 'Вы успешно изменили!'];
        } else {
            $messages = [0 => 'Произошла ошибка при изменение'];
        }
        \session()->flash('messages', $messages);
        return back()->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Translation $translation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Translation $translation)
    {
        $translation->delete();
        \session()->flash('messages', [0 => 'Вы успешно удалили запись.']);
        return back();
    }

    public function getTranslation(Request $request)
    {
        $language = $request->input('lang');
        $language ?: $language = 'en_translate';
        Cache::put('translations', Translation::all());
        $translations = Cache::get('translations');

        $translations = (collect($translations)->pluck($language, 'slug'));
        return response()->json($translations);
    }


}
