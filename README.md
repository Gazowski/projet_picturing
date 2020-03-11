# projet_picturing

## site utile
### traduction
* https://www.linguee.fr/
* https://www.wordreference.com/
### générateur de couleurs
https://coolors.co/

## correction à faire
* mise a jour de la db (maj table 'banishement'):
si vous ne voulez pas effacer et recopier toute la  table, copier les lignes suivantes (sous l'onglet SQL) :
```SQL
DROP TABLE IF EXISTS `banishement`;
CREATE TABLE IF NOT EXISTS `banishement` (
  `id_banishement` int(11) NOT NULL AUTO_INCREMENT,
  `banished_member` int(11) UNSIGNED NOT NULL,
  `admin_member` int(11) UNSIGNED NOT NULL,
  `date_ban` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_unban` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_banishement`),
  KEY `banished_member` (`banished_member`),
  KEY `admin_member` (`admin_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

* page home admin : lorsque tous les users sont activés seul l'entete du tableau reste affiché (au lieu d'une phrase)
* dans l'admin onglet Membres revoir l'affichage des listes fournisseurs et clients.


## amélioration à faire
* pas de possibilité de creer un nouveau type de catégorie !!!
* installer babel (pour compatibilité ES5)
* activer la recherche
* différencier les services des produits (label/tag? code couleur? icone?...) 
* ajouter un plugin seo
* ajouter un plugin pour connection par facebook
* faire le header en sticky (ou avoir le menu toujours accessible)
* ajouter un breadcrumb (plugin)

## Plan du site
### utilisateur non connecté / client
#### page accueil 
page accueil = tuiles des annonces (supprimer le bouton 'ajouter annonce')
#### menu 
* annonces : 
	- produits
	- services
* s'enregistrer / mon compte (si client) (avec icone lettre si nouveau message)
	- mon profil (si client)
	- mes annonces (si client)
	- mes messages (si client)
* à propos

#### page mon profil
page de profil du client avec bouton modifier et supprimer

### Fournisseur
#### page accueil 
page accueil = tuiles des annonces du fournisseur avec une tuile 'ajout annonces' 
#### menu 
idem client
#### note
possibilité de modifier et supprimer une annonce
possibilité de voir le client qui soumissionne à une annonce

### Fournisseur Or
idem fournisseur avec possibilité de voir tous les clients

### Superviseur
#### page accueil 
page accueil = liste des membres a valider + liste des annonces a valider
#### menu 
* annonces : 
	- produits
	- services
* membres
	- clients
	- fournisseurs
* mon profil
	- mon profil
	- mes annonces
	- mes messages
#### note
possibilité de activer/bannir/débannir les membres

### Admin
idem Superviseur
rajouter superviseur dans le menu 'membres'
possibilité de passer un membre administrateur


## Note
* Password pour les utilisateurs = 1234 (sauf admin@admin.com = password)
* 		$user_value = [
			'Client' => 10,
			'Fournisseur' => 20,
			'Fournisseur Or' => 30,
			'Superviseur' => 40,
			'admin' => 50,
		];
