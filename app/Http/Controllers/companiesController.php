<?php

namespace App\Http\Controllers;

use App\Http\Resources\companiesResource;
use App\Models\companies;
use Illuminate\Http\Request;

class companiesController extends Controller
{
    public function index()
    {
        // Retrieve all companies from the database
        $companies = companies::all();

        // Return JSON response with the list of companies
        return response()->json($companies);

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['nullable', 'email', 'max:254'],
            'logo' => ['nullable'],
            'website' => ['nullable'],
        ]);

        return new companiesResource(companies::create($data));
    }

    public function show(companies $companies)
    {

        return new companiesResource($companies);

    }

    public function update(Request $request, companies $companies)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['nullable', 'email', 'max:254'],
            'logo' => ['nullable'],
            'website' => ['nullable'],
        ]);

        $companies->update($data);

        return new companiesResource($companies);
    }

    public function destroy(companies $companies)
    {
        $companies->delete();

        return response()->json();
    }
}
