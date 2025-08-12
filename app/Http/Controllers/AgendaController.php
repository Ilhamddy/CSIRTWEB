<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $events = Agenda::select('title', 'start_date as start', 'end_date as end')
            ->get()
            ->map(function ($event) {
                return [
                    'title' => $event->title,
                    'start' => $event->start,
                    'end'   => $event->end,
                ];
            });

        return view('pages.agenda', [
            'events' => $events,
        ]);
    }
}
