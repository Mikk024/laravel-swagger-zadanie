<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\PetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetController extends Controller
{
    public function show(Request $request)
    {
        $petId = $request->get('id');

        $response = Http::get('https://petstore.swagger.io/v2/pet/' . $petId); 

        if ($response->successful()) {
            return view('pets/show', [
                'pet' => $response->object()
            ]);
        }

        return view('pets/show', [
            'pet' => null
        ]);
    }

    public function create()
    {
        return view('pets/create');
    }

    public function store(PetRequest $request)
    {
        $validated = $request->validated();

        $data = [
            'id' => $validated['id'],
            'category' => [
                'name' => $validated['category'],
            ],
            'name' => $validated['name'],
            'photoUrls' => [
                'string',
            ],
            'tags' => [
                [
                    'name' => $validated['tags'],
                ],
            ],
            'status' => $validated['status'],
        ];

        $response = Http::post('https://petstore.swagger.io/v2/pet', $data, [
            'accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Pet was added successfully!');
        }

        return back()->with('error', "Couldn't successfully add Pet");
    }

    public function destroy(DeleteRequest $request)
    {
        $response = Http::delete('https://petstore.swagger.io/v2/pet/' . $request->get('id'), [
            'accept' => 'application/json',
        ]);

        if ($response->successful()) {
            return redirect()->route('pet-show')->with('success', 'You successfully deleted pet!');
        }

        return redirect()->route('pet-show')->with('error', "Couldn't delete this pet!");
    }

    public function edit(int $id)
    {
        $response = Http::get('https://petstore.swagger.io/v2/pet/' . $id); 

        if ($response->successful()) {
            return view('pets/edit', [
                'pet' => $response->object()
            ]);
        }

        return redirect()->route('pet-show')->with('error', "Couldn't find pet with this id");
    }

    public function update(PetRequest $request)
    {
        $validated = $request->validated();

        $data = [
            'id' => $validated['id'],
            'category' => [
                'name' => $validated['category'],
            ],
            'name' => $validated['name'],
            'photoUrls' => [
                'string',
            ],
            'tags' => [
                [
                    'name' => $validated['tags'],
                ],
            ],
            'status' => $validated['status'],
        ];

        $response = Http::put('https://petstore.swagger.io/v2/pet', $data, [
            'accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        if ($response->successful()) {
            return redirect()->route('pet-show')->with('success', 'Successfully updated pet');
        }

        return redirect()->route('pet-show')->with('error', "Couldn't update pet");
    }
}
