<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class TodosController extends Controller
{

    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }

 

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $todos = Todo::select('id', 'deadline', 'title', 'is_finished', 'created_at')
            ->where('user_id', Auth::id())
            ->where('is_finished', 0)
            ->orderBy('deadline', 'asc')
            ->get();

        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'deadline' => ['required', 'string', 'max:10'],
            'is_finished' => ['required', 'boolean'],
            'title' => ['required', 'string', 'max:30'],
        ]);

        Todo::create([
            'user_id' => Auth::id(),
            'deadline' => $request->deadline,
            'is_finished' => $request->is_finished,
            'title' => $request->title,
        ]);

        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $todo = Todo::findOrFail($id);

        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $todo = Todo::findOrFail($id);

        $todo->deadline = $request->deadline;
        $todo->is_finished = $request->is_finished;
        $todo->title = $request->title;
        $todo->save();

        return redirect()
            ->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::findOrFail($id)->delete();

        return redirect()
            ->route('todos.index');
    }

    // public function finished(): View
    // {
    //     $todos = Todo::select('id', 'deadline', 'title', 'is_finished', 'created_at')
    //         ->where('user_id', Auth::id())
    //         ->where('is_finished', 1)
    //         ->get();

    //     return view('todos.finished', compact('todos'));
    // }

    public function finished()
    {

        $todos = Todo::select('id', 'deadline', 'title', 'is_finished', 'created_at')
                ->where('user_id', Auth::id())
                ->where('is_finished', 1)
                ->get();

            return view('todos.finished', compact('todos'));
    }

}
