<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $newType = new Type();
        $newType->name = $data['name'];
        $newType->description = $data['description'];

        $newType->save();

        return redirect()->route('types.show', $newType);
    }

    public function show(string $id)
    {
        $type = Type::findOrFail($id);
        return view('types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $data = $request->all();
        $type->name = $data['name'];
        $type->description = $data['description'];

        $type->update();

        return redirect()->route("types.show", $type);
    }

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
