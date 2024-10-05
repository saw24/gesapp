<?php
function genererCodeUnique() {
    // Obtenir la date et l'heure actuelle au format 'YmdHis'
    $dateHeure = date('YmdHis');
    
    // Générer un nombre aléatoire entre 1000 et 9999
    $numeroAleatoire = rand(1000, 9999);
    
    // Combiner la date, l'heure et le numéro aléatoire
    $codeUnique = $dateHeure . $numeroAleatoire;
    
    // S'assurer que la longueur est inférieure ou égale à 50 caractères
    $codeUnique = substr($codeUnique, 0, 50);
    
    return $codeUnique;
}