<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Inscription;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Récupérer tous les produits et toutes les catégories
        $produits = Produit::all();


        // Retourner la vue 'produits.index' avec les produits et catégories
        return view('produits.index', compact('produits'));
    }
    public function recherche(Request $request)
    {
        // Récupérer la catégorie sélectionnée par l'utilisateur
        $categorieCode = $request->input('categorie');

        // Rechercher les produits par catégorie
        $produits = Produit::where('code', $categorieCode)->get();

        // Récupérer toutes les catégories pour le menu déroulant
        $categories = Categorie::all();

        // Retourner la vue avec les produits filtrés par catégorie
        return view('produits.recherche', compact('produits', 'categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();

        // Retourner la vue pour créer un nouveau produit
        return view('produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données d'entrée
        $validatedata = $request->validate([
            'ref' => 'required|string|max:10|unique:produits,ref',
            'design' => 'required|string|max:255',
            'pu' => 'required|numeric',
            'imageprod' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'code' => 'required|integer',
        ]);
        // Traitement de l'image si elle est téléchargée
        if ($request->hasFile('imageprod')) {
            $imagePath = $request->file('imageprod')->store('images', 'public');
            $validatedData['imageprod'] = $imagePath;
        }

        Produit::create($validatedata);

        // Rediriger vers l'index des produits avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        // Retourner la vue pour afficher les détails du produit
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        // Retourner la vue pour modifier les détails du produit
        return view('produits.edit', compact('produit','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        // Valider les données d'entrée
        $validatedata = $request->validate([
            'ref' => 'required|string|max:10|unique:produits,ref,' . $produit->id,
            'design' => 'required|string|max:255',
            'pu' => 'required|numeric',
            'code' => 'required|integer',
        ]);

        // Mettre à jour le produit avec les nouvelles données validées
        $produit->update($validatedata);

        // Rediriger vers l'index des produits avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        // Supprimer le produit de la base de données
        $produit->delete();

        // Rediriger vers l'index des produits avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
    }
}
