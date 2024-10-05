CREATE TABLE IF NOT EXISTS `t_stages` (
  `code` varchar(50) NOT NULL PRIMARY KEY,
  `code_stagiaire` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `objectif_stage` text NOT NULL,
  `statut` enum('En cours', 'Terminé', 'Annulé') NOT NULL DEFAULT 'En cours',
  FOREIGN KEY (`code_stagiaire`) REFERENCES `t_stagiaires`(`code`)
);

CREATE TABLE IF NOT EXISTS `t_passages_services` (
  `code` varchar(50) NOT NULL PRIMARY KEY,
  `code_stage` varchar(50) NOT NULL,
  `code_service` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `evaluation` text,
  FOREIGN KEY (`code_stage`) REFERENCES `t_stages`(`code`),
  FOREIGN KEY (`code_service`) REFERENCES `t_services`(`code`)
);