<?php

namespace App\Http\Controllers;

use App\Wagon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class WagonsController extends Controller
{
    public function index()
    {
        $wagons = Auth::user()->wagons()->paginate(10);

        return view('wagons.index', compact('wagons'));
    }

    /**
     * @param Wagon $wagon
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Wagon $wagon)
    {
        $this->authorize('manage', $wagon);

        return view('wagons.show', compact('wagon'));
    }

    public function create()
    {
        return view('wagons.create');
    }

    public function store()
    {
        Auth::user()->wagons()->create($this->validateRequest());

        return redirect('/wagons');
    }

    public function edit(Wagon $wagon)
    {
        return view('wagons.edit', compact('wagon'));
    }

    public function update(Wagon $wagon)
    {
        $wagon->update($this->validateRequest());

        return redirect(route('wagons.index'));
    }

    /**
     * @param Wagon $wagon
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Wagon $wagon)
    {
        $this->authorize('manage', $wagon);

        $wagon->delete();

        return redirect(route('wagons.index'));
    }

    /**
     * @return mixed
     */
    protected function validateRequest()
    {
        return Request::validate([
            'inw' => 'required|regex:/^\d{8}$/',
            'arrived_at' => 'required|date',
            'detained_at' => 'required|date',
            'released_at' => 'nullable|date',
            'departed_at' => 'nullable|date',
            'detained_by' => 'required|max:255',
            'reason' => 'required:max:255',
            'cargo' => 'required|max:255',
            'forwarder' => 'nullable',
            'ownership' => 'nullable',
            'departure_station' => 'required|max:255',
            'destination_station' => 'required|max:255',
            'taken_measure' => 'nullable',
        ]);
    }

}
