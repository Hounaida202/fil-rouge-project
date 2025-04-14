<!-- resources/views/items/index.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Pagination des articles</title>
</head>
<body>
    <h1>Articles</h1>

    <!-- Formulaire de choix de la pagination -->
    <form method="GET" action="{{ url('/items') }}">
        <label for="per_page">Choisissez le nombre d'articles par page :</label>
        <select name="per_page" id="per_page" onchange="this.form.submit()">
            <option value="3" {{ request('per_page') == 3 ? 'selected' : '' }}>3 par page</option>
            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5 par page</option>
            <option value="7" {{ request('per_page') == 7 ? 'selected' : '' }}>7 par page</option>
        </select>
    </form>

    <!-- Liste des articles -->
    <ul>
        @foreach ($items as $item)
            <li>{{ $item->name }}</li>
        @endforeach
    </ul>

    <!-- Liens de pagination -->
    <div>
        {{ $items->links() }}
    </div>
</body>
</html>
