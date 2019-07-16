<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(TodoResource::collection(Todo::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\TodoRequest $request ;
     *
     * @return \Illuminate\Http\JsonResponseResponse
     */
    public function store(TodoRequest $request)
    {
        $todo = Todo::create($request->only(['name', 'status']));
        return response()->json(new TodoResource($todo), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Todo $todo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Todo $todo)
    {
        return response()->json(new TodoResource($todo), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\TodoRequest $request ;
     * @param \App\Models\Todo $todo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $todo->name = $request->name;
        $todo->status = $request->status;
        $todo->save();
        return response()->json(new TodoResource($todo), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Todo $todo
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Todo $todo)
    {
        return response()->json($todo->delete(), 200);
    }
}
