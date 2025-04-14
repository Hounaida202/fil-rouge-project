<?php
// app/Http/Controllers/ItemController.php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer la valeur du choix de l'utilisateur (par défaut 5)
        $perPage = $request->get('per_page', 5);  // 5 par défaut si non spécifié

        // Valider que la valeur est correcte (parmi 3, 5 ou 7)
        if (!in_array($perPage, [3, 5, 7])) {
            $perPage = 5;  // Si l'utilisateur entre une valeur invalide, on choisit 5 par défaut
        }

        // Récupérer les éléments avec la pagination
        $items = Item::paginate($perPage);

        // Retourner la vue avec les éléments paginés
        return view('items.index', compact('items'));
    }
}
