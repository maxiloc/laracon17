<?php

Route::get('/', function () {
    return view('speakers');
});

Route::get('/speaker/add', function () {
   return view('speaker_form')->with('speaker', null);
});

Route::get('/speaker/{speaker}/edit', function (\App\Speaker $speaker) {
    return view('speaker_form')->with('speaker', $speaker);
});

Route::post('/speaker/{id}', function (\Illuminate\Http\Request $request, $id) {
    $speaker = $id == 0 ? new \App\Speaker(): \App\Speaker::find($id);

    $speaker->name = $request->input('name');
    $speaker->title = $request->input('title');

    $speaker->save();

    $speaker->conferences()->detach();

    if ($request->input('events')) {
        foreach ($request->input('events') as $event_id) {
            $speaker->conferences()->attach($event_id);
        }
    }

    return redirect('/');
});

Route::get('/speaker/{id}/delete', function ($id) {
   $speaker = \App\Speaker::find($id);

   if ($speaker) {
       $speaker->delete();
   }

   return redirect('/');
});