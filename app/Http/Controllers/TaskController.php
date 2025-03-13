<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Gelen request'i doğrula
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'title' => 'required|string|max:255',
            'status' => ['required', Rule::in(array_column(TaskStatus::cases(), 'value'))], // Enum değerlerini kontrol eder
        ]);

        // Yeni task oluştur
        $task = Task::create($validated);

        // Başarılı yanıt dön
        return response()->json([
            'status' => 'success',
            'message' => 'Task successfully created.',
            'data' => $task
        ], 201);
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
    public function update(Request $request, int $id)
    {
        // 1. Geçerli bir Task olup olmadığını kontrol et
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Task not found'
            ], 404);
        }

        // 2. Gelen verileri doğrula
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed', // Enum değerlerini burada belirtiyoruz
        ]);

        // 3. Güncelleme işlemi
        $task->update($validatedData);

        // 4. Güncellenmiş Task verisini döndür
        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getTasks($id){
        // 1. Employee var mı kontrol et
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found'
            ], 404);
        }

        // 2. Employee bulundu, şimdi görevleri çek
        $tasks = Task::where('employee_id', $id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $tasks
        ]);
    }
    public function markComplete($id){
        // 1. Task var mı kontrol et
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'Task not found'
            ], 404);
        }

        // 2. Zaten completed ise tekrar güncellemeye gerek yok
        if ($task->status === TaskStatus::COMPLETED->value) {
            return response()->json([
                'status' => 'info',
                'message' => 'Task is already completed',
                'task' => $task
            ], 200);
        }

        // 3. Status değerini "completed" yap
        $task->update(['status' => TaskStatus::COMPLETED->value]);

        return response()->json([
            'status' => 'success',
            'message' => 'Task marked as completed',
            'task' => $task
        ]);
    }
}
