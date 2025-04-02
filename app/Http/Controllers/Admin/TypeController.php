<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
       //d($types);
        return view('types.create', compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $newType = new Type();
        $newType->name = $data['name'];
        $newType->description = $data['description'];

        $newType->save();

        return redirect()->route('types.show', $newType);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = Type::findOrFail($id);
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $types = Type::all();
        return view('types.edit', compact('type', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->all();
        //Modifichiamo le informazioni contenute nel tipo:
            $type->name = $data['name'];
            $type->description = $data['description'];

            $type->update();

            return redirect()->route("types.show", $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        try {
            $type->delete();
        } catch (QueryException $e) {
            return redirect()->route("types.index")->with('error', 'Il tipo non può essere eliminato perché è una chiave esterna.');
        }

        return redirect()->route("types.index")->with('success', 'Tipo eliminato con successo.');
    }
}
