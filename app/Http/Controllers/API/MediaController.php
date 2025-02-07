<?php

namespace App\Http\Controllers\API;

use App\Models\Media;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::with('article')->get();
        return response()->json($media);
    }

    public function lastMedia()
    {
        $lastMedia = Media::latest()->first();
        return response()->json($lastMedia);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $latestArticle = Article::latest()->first();
        $media = new Media();
        $media->article_id = $latestArticle->id;
        $formFields = $request->validate([
            'media' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_media' => 'required|string',
            'article_id' => 'required|integer|exists:articles,id',
        ]);
        $filename = "";
        if ($request->hasFile('media')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg" 
            $filenameWithExt = $request->file('media')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg" 
            $extension = $request->file('media')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg" 
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app 
            $request->file('media')->storeAs('uploads', $filename);
        } else {
            $filename = Null;
        }
        $formFields['media'] = $filename;
        
        $media->fill($formFields);
        $media->save();
        return response()->json($media);
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        return response()->json($media);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        $formFields = $request->validate([
            'media' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_media' => 'required',
            'article_id' => 'required|integer',
        ]);
        if ($request->file('media') && File::exists(public_path($media->media))) {
            File::delete(public_path($media->media));
        }
        $filename = "";
        if ($request->hasFile('media')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg" 
            $filenameWithExt = $request->file('media')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg" 
            $extension = $request->file('media')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg" 
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app 
            $request->file('media')->storeAs('uploads', $filename);
        } else {
            $filename = Null;
        }
        $formFields['media'] = $filename;
        $media->fill($formFields);
        $media->save();
        return response()->json($media);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        if (File::exists(public_path($media->media))) {
            File::delete(public_path($media->media));
        }
        $media->delete();
        return response()->json('Media supprimé');
    }
}
