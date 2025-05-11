<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de Réservation</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #18534F;
        }
        .section {
            margin-bottom: 25px;
        }
        .section h2 {
            color: #143B39;
            font-size: 16px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        .field {
            margin-bottom: 8px;
        }
        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Confirmation de Réservation</h1>

    <div class="section">
        <h2>Informations sur la publication</h2>
        <div class="field"><span class="label">Titre :</span> {{ $reservation->publication->titre }}</div>
        <div class="field"><span class="label">Ville de départ :</span> {{ $reservation->publication->ville_depart }}</div>
        <div class="field"><span class="label">Adresse de départ :</span> {{ $reservation->publication->adresse_depart }}</div>
        <div class="field"><span class="label">Ville d’arrivée :</span> {{ $reservation->publication->ville_arrivee }}</div>
        <div class="field"><span class="label">Adresse d’arrivée :</span> {{ $reservation->publication->adresse_arrivee }}</div>
        <div class="field"><span class="label">Date de départ :</span> {{ \Carbon\Carbon::parse($reservation->publication->date_depart)->format('d/m/Y H:i') }}</div>
        <div class="field"><span class="label">Type :</span> {{ $reservation->publication->type }}</div>
        <div class="field"><span class="label">Poids :</span> {{ $reservation->publication->poids }} kg</div>
        <div class="field"><span class="label">Description :</span> {{ $reservation->publication->description }}</div>
        <div class="field"><span class="label">Prix :</span> {{ $reservation->publication->prix }} €</div>
        <div class="field"><span class="label">État :</span> {{ $reservation->publication->etat }}</div>
    </div>

    <div class="section">
        <h2>Informations sur la réservation</h2>
        <div class="field"><span class="label">Localisation du rendez-vous :</span> {{ $reservation->localisation }}</div>
        <div class="field"><span class="label">Réservé par :</span> {{ $user->name }}</div>
        <div class="field"><span class="label">Transporteur :</span>  {{ $reservation->autre->name }}</div>
        <div class="field"><span class="label">Email de transporteur :</span> {{ $reservation->autre->email }}</div>
        <div class="field"><span class="label">Date de réservation :</span> {{ $reservation->created_at->format('d/m/Y H:i') }}</div>
    </div>
</body>
</html>
