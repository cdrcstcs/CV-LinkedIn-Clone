<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Http\Requests\ConnectionRequest;
use App\Http\Resources\ConnectionResource;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function index()
    {
        $connections = Connection::with(['user1', 'user2'])->get();
        return ConnectionResource::collection($connections);
    }

    public function store(ConnectionRequest $request)
    {
        $connection = Connection::create($request->validated());
        return new ConnectionResource($connection);
    }

    public function show(Connection $connection)
    {
        return new ConnectionResource($connection->load(['user1', 'user2']));
    }

    public function update(ConnectionRequest $request, Connection $connection)
    {
        $connection->update($request->validated());
        return new ConnectionResource($connection);
    }

    public function destroy(Connection $connection)
    {
        $connection->delete();
        return response()->noContent();
    }
}
