<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\Client;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Affiche la liste des commandes.
     */
    public function index()
    {
        $commandes = Commande::all(); // Récupère toutes les commandes
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle commande.
     */
    public function create()
    {
        $clients = Client::all(); // Récupère tous les clients pour le formulaire
        $produits = Produit::all(); // Récupère tous les produits pour le formulaire
        return view('commandes.create', compact('clients', 'produits'));
    }

    /**
     * Enregistre une nouvelle commande dans la base de données.
     */
    public function store(Request $request)
    {
      
        // Validation des données
        // $validatedData = $request->validate([
        //     'date' => now(),
        //     'etat' => 'bon',
        //     'qte' => 'required|integer|min:1',
        //     // 'numcli' => 'required|exists:clients,numcli',
        //     'numcli' => '1',
        //     'ref' => 'required|exists:produits,ref',
        // ]);

        // Crée une nouvelle commande avec les données validées
        Commande::create($request->all());

        // Redirige vers la liste des commandes avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Commande créée avec succès');
    }

    /**
     * Affiche les détails d'une commande spécifique.
     */
    public function show(Commande $commande)
    {
        return view('commandes.show', compact('commande'));
    }

    /**
     * Affiche le formulaire pour modifier une commande spécifique.
     */
    public function edit(Commande $commande)
    {
        // Récupère tous les clients et produits pour les sélectionner dans le formulaire
        $clients = Client::all();
        $produits = Produit::all();

        return view('commandes.edit', compact('commande', 'clients', 'produits'));
    }

    /**
     * Met à jour une commande spécifique dans la base de données.
     */
    public function update(Request $request, Commande $commande)
    {
        // Validation des données
        $validatedData = $request->validate([
            'date' => 'date',
            'etat' => 'required|string|max:50',
            'qte' => 'required|integer|min:1',
            'numcli' => 'required|exists:clients,numcli',
            'ref' => 'required|exists:produits,ref',
        ]);

        // Met à jour la commande avec les données validées
        $commande->update($validatedData);

        // Redirige vers la liste des commandes avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Commande mise à jour avec succès');
    }

    /**
     * Supprime une commande spécifique de la base de données.
     */
    public function destroy(Commande $commande)
    {
        // Supprime la commande
        $commande->delete();

        // Redirige vers la liste des commandes avec un message de succès
        return redirect()->route('commandes.index')->with('success', 'Commande supprimée avec succès');
    }
}
