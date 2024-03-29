<?php

namespace App\Http\Controllers;

use App\Http\Resources\employeesResource;
use App\Models\employees;
use Illuminate\Http\Request;

class employeesController extends Controller
{
    public function index()
    {
        return employeesResource::collection(employees::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['nullable'],
            'email' => ['nullable', 'email', 'max:254'],
            'phone' => ['nullable'],
        ]);

        return new employeesResource(employees::create($data));
    }

    public function show(employees $employees)
    {
        return new employeesResource($employees);
    }

    public function update(Request $request, employees $employees)
    {
        $data = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['nullable'],
            'email' => ['nullable', 'email', 'max:254'],
            'phone' => ['nullable'],
        ]);

        $employees->update($data);

        return new employeesResource($employees);
    }

    public function destroy(employees $employees)
    {
        $employees->delete();

        return response()->json();
    }
}
