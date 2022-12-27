<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\clients\ClientStoreRequest;
use App\Http\Requests\clients\ClientUpdateRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(ClientStoreRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('admin.clients.index');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->route('admin.clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return back();
    }
}
