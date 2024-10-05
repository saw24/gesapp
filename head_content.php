<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Gestion des Stagiaires</title>
<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
<link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

<!-- Fonts and icons -->
<script src="assets/js/plugin/webfont/webfont.min.js"></script>
<script>
WebFont.load({
    google: {
        families: ["Public Sans:300,400,500,600,700"]
    },
    custom: {
        families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
        ],
        urls: ["assets/css/fonts.min.css"],
    },
    active: function() {
        sessionStorage.fonts = true;
    },
});
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/css/plugins.min.css" />
<link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="assets/css/demo.css" />

<style>
/* Appliquer des styles de base pour le select */
select {
    appearance: none;
    /* Retire les styles par défaut pour unifier sur tous les navigateurs */
    background: url('data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns%3D%22http%3A//www.w3.org/2000/svg%22 viewBox%3D%220 0 10 5%22%3E%3Cpath fill%3D%22%23000%22 d%3D%22M0 0l5 5 5-5H0z%22/%3E%3C/svg%3E') no-repeat right 10px center;
    background-size: 10px;
    padding-right: 30px;
    /* Espace pour l'icône */
}

/* Ajout de bordure et autres styles pour le distinguer des champs input */
select {
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    height: 38px;
    /* Ajuste selon la taille souhaitée */
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    cursor: pointer;
}

/* Pour être compatible avec Safari */
select::-ms-expand {
    display: none;
}
</style>