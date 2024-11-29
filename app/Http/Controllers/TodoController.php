<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $todos = Todo::where('user_id', Auth::id())
                ->latest()
                ->paginate(10);
            return view('dashboard', compact('todos'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
            ]);

            Todo::create([
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'status' => 'pending',
                'user_id' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Todo başarıyla eklendi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Todo eklenirken bir hata oluştu: ' . $e->getMessage());
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        try {
            if ($todo->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Bu todo üzerinde işlem yapmaya yetkiniz yok.');
            }

            if ($request->has('status')) {
                $todo->update([
                    'status' => $request->status === 'completed' ? 'completed' : 'pending'
                ]);
                return redirect()->back()->with('success', 'Todo durumu güncellendi.');
            }

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
            ]);

            $todo->update([
                'title' => $validated['title'],
                'description' => $validated['description'] ?? $todo->description,
            ]);

            return redirect()->back()->with('success', 'Todo başarıyla güncellendi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Todo güncellenirken bir hata oluştu: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        try {
            if ($todo->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Bu todo üzerinde işlem yapmaya yetkiniz yok.');
            }

            $todo->delete();
            return redirect()->back()->with('success', 'Todo başarıyla silindi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Todo silinirken bir hata oluştu: ' . $e->getMessage());
        }
    }
}
