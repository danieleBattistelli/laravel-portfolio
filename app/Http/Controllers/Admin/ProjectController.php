<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //prendo i Tipi
        $types = Type::all();

        //prendo le tecnologie
        $technologies = Technology::all();

        return view(
            'projects.create',
            compact("types", "technologies")
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $newProject = new Project();
        $newProject->name = $data['title'];
        $newProject->type_id = $data['type_id'];
        $newProject->client = $data['client'];
        $newProject->start_date = $data['start_date'];
        $newProject->end_date = $data['end_date'];
        $newProject->description = $data['description'];

        if (array_key_exists('image', $data)) {
            $img_url = Storage::putFile('projects', $data['image']);
            $newProject->image = $img_url;
        }


        $newProject->save();

        //Dopo aver salvato il progetto controllo se ricevo le tecnlogie
        if ($request->has('technologies')) {
            //li salvo nella tabella ponte
            $newProject->technologies()->attach($data['technologies']);
        }

        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //prendo i tipi
        $types = Type::all();

        //prendo le tecnologie
        $technologies = Technology::all();


        return view(
            'projects.edit',
            compact('project', 'types', 'technologies')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        //Modifichiamo le informazioni contenute nel progetto:
        //dd($data);
        $project->name = $data['name'];
        $project->type_id = $data['type_id'];
        $project->client = $data['client'];
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        $project->description = $data['description'];
        // Se l'utente ha caricato un'immagine,
        if (array_key_exists('image', $data)) {
            // Se esiste già un'immagine, la eliminiamo
            if (!is_null($project->image)) {
                Storage::delete($project->image);
            }
            //carico la nuova immagine
            $img_url = Storage::putFile('projects', $data['image']);
            //aggiorno il db
            $project->image = $img_url;
        }


        $project->update();

        //Dopo il salvataggio verifichiamo se stiamo ricevendo le tecnologie
        if ($request->has('technologies')) {

            //Sincronizziamo i dati nella tabella Pivot
            $project->technologies()->sync($data['technologies']);
        } else {
            //se non riceviamo i tags li eliminiamo tutti quelli collegati al post dalla tabella pivot
            $project->technologies()->detach();
        }

        return redirect()->route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //elimino l'immagine
        if (!is_null($project->image)) {
            Storage::delete($project->image);
        }
        //elimino le tecnologie
        $project->technologies()->detach();
        //elimino il progetto

        $project->delete();

        return redirect()->route("projects.index");
    }
}
