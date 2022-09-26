<?php


use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::view('/home','home')->middleware('auth');

/*------parti route d'affichage--------*/
Route::view('/admin','admin.home')->middleware('auth')->middleware('is_admin')->name('admin.home');
Route::view('/gestionnaire','Gestionnaire.index2')->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.home');
Route::view('/enseignant','Enseignant.index1')->middleware('auth')->middleware('is_enseignant')->name('enseignant.home');

/*---------------------*/
Route::get('/admin/list',[UserController::class,'showList'])->middleware('auth')->middleware('is_admin')->name('admin.list');


/*-------parti admin-------*/

Route::get('/admin/modifier',[UserController::class,'modifierprofil'])->middleware('auth')->middleware('is_admin')->name('admin.modifier.mdp');
Route::post('/admin/modifier',[UserController::class,'process_modifierprofil'])->middleware('auth')->middleware('is_admin')->name('admin.modifier.mdp');

Route::get('/admin/modifiernomprenom/{id}',[UserController::class,'modifierprofil_nomprenom'])->middleware('auth')->middleware('is_admin')->name('admin.modifier.nomprenom');
Route::post('/admin/modifiernomprenom/{id}',[UserController::class,'process_modifierprofil_nomprenom'])->middleware('auth')->middleware('is_admin')->name('admin.modifier.nomprenom');

   /*--modificationtype--*/
Route::get('/admin/modifiertype/{id}',[UserController::class,'modifiertype'])->middleware('auth')->middleware('is_admin')->name('admin.modifier.type');
Route::post('/admin/modifiertype/{id}',[UserController::class,'process_modifiertype'])->middleware('auth')->middleware('is_admin')->name('admin.modifier.type');


Route::get('/admin/supprimeruser/{id}',[UserController::class,'supprimerutilisateur'])->middleware('auth')->middleware('is_admin')->name('admin.supprimer.user');
/*cree cours*/


Route::get('/admin/cours/creecours',[UserController::class,'Creationcours'])->middleware('auth')->middleware('is_admin')->name('admin.cree.cours');
Route::post('/admin/cours/creecours',[UserController::class,'process_creecours'])->middleware('auth')->middleware('is_admin')->name('admin.cree.cours');
/*listecours*/


Route::get('/admin/cours/affichecour',[UserController::class,'showList_'])->middleware('auth')->middleware('is_admin')->name('admin.liste.cours');
/* supprimercours*/

Route::get('/admin/supprimercours/{id}',[UserController::class,'supprimercours'])->middleware('auth')->middleware('is_admin')->name('admin.supprimer.cours');
Route::get('/gestionnaire/supprimercours/{id}',[UserController::class,'supprimercours'])->middleware('auth')->middleware('is_gestionnaire')->name('admin.supprimer.cours');

/*cree modifiercours*/
Route::get('/admin/cours/modifiercours/{id}',[UserController::class,'modifiercours'])->middleware('auth')->middleware('is_admin')->name('admin.modifier.cours');
Route::post('/admin/cours/modifiercours/{id}',[UserController::class,'process_modifiercours'])->middleware('auth')->middleware('is_admin')->name('admin.modifie.cours');

Route::get('/gestionnaire/cours/modifiercours/{id}',[UserController::class,'modifiercours'])->middleware('auth')->middleware('is_gestionnaire')->name('admin.modifier.cours');
Route::post('/gestionnaire/cours/modifiercours/{id}',[UserController::class,'process_modifiercours'])->middleware('auth')->middleware('is_gestionnaire')->name('admin.modifie.cours');

/* afficheetudiant*/
Route::get('/admin/etudiant/afficheetudiant',[UserController::class,'showList_'])->middleware('auth')->middleware('is_admin')->name('admin.liste.etudiant');

/*création étudiant*/
Route::get('/admin/etudiant/creeetudiant/{id}',[UserController::class,'creeetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.cree.etudiant');
Route::post('/admin/etudiant/creeetudiant/{id}',[UserController::class,'process_creeetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.cree.etudiant');
/* modifieretudiant*/

Route::get('/admin/etudiant/modifieretudiant/{id}',[UserController::class,'modifieretudiant'])->middleware('auth')->middleware('is_admin')->name('admin.modifier.etudiant');
Route::post('/admin/etudiant/modifieretudiant/{id}',[UserController::class,'process_modifieretudiant'])->middleware('auth')->middleware('is_admin')->name('admin.modifie.etudiant');
/* supprimeretudiant*/

Route::get('/admin/etudiant/supprimeretudiant/{id}',[UserController::class,'supprimeretudiant'])->middleware('auth')->middleware('is_admin')->name('admin.supprimer.etudiant');
Route::post('/admin/etudiant/supprimeretudiant/{id}',[UserController::class,'process_supprimeretudiant'])->middleware('auth')->middleware('is_admin')->name('admin.supprimer.etudiant');
/* afficheetudiant*/

Route::get('/admin/etudiant/afficheetudiant',[UserController::class,'showList__'])->middleware('auth')->middleware('is_admin')->name('admin.liste.etudiant');

/*afficheseance */

Route::get('/admin/seance/afficheseance',[UserController::class,'showList___'])->middleware('auth')->middleware('is_admin')->name('admin.liste.seance');

/*création creeseance*/

Route::get('/admin/seance/creeseance',[UserController::class,'creeseance'])->middleware('auth')->middleware('is_admin')->name('admin.cree.seance');
Route::post('/admin/seance/creeseance',[UserController::class,'process_creeseance'])->middleware('auth')->middleware('is_admin')->name('admin.cree.seance');
/*modifierseance */
Route::get('/admin/seance/modifierseance/{id}',[UserController::class,'modifierseance'])->middleware('auth')->middleware('is_admin')->name('admin.modifier.seance');
Route::post('/admin/seance/modifierseance/{id}',[UserController::class,'process_modifierseance'])->middleware('auth')->middleware('is_admin')->name('admin.modifie.seance');

Route::get('/gestionnaire/seance/modifierseance/{id}',[UserController::class,'modifierseance'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.modifier.seance');
Route::post('/gestionnaire/seance/modifierseance/{id}',[UserController::class,'process_modifierseance'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.modifie.seance');


/*supprimerseance */

Route::get('/admin/seance/supprimerseance/{id}',[UserController::class,'supprimerseance'])->middleware('auth')->middleware('is_admin')->name('admin.supprimer.seance');
Route::post('/admin/seance/supprimerseance/{id}',[UserController::class,'process_supprimerseance'])->middleware('auth')->middleware('is_admin')->name('admin.supprimer.seance');

/*association coursetudiant*/

Route::get('/admin/association/assocoursetudiant',[UserController::class,'assocoursetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.association.coursetudiant');
Route::post('/admin/association/assocoursetudiant',[UserController::class,'process_assocoursetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.association.coursetudiant');
/*dissocier coursetudiant*/

Route::get('/admin/association/dissociercoursetudiant',[UserController::class,'dissocierassocoursetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.dissociation.coursetudiant');
Route::post('/admin/association/dissociercoursetudiant',[UserController::class,'process_dissocierassocoursetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.dissociation.coursetudiant');

/*dissocier coursenseignant*/

Route::get('/admin/association/dissociercoursenseignant',[UserController::class,'dissocoursenseignant'])->middleware('auth')->middleware('is_admin')->name('admin.dissociation.coursenseignant');
Route::post('/admin/association/dissociercoursenseignant',[UserController::class,'process_dissocierassocoursenseignant'])->middleware('auth')->middleware('is_admin')->name('admin.dissociation.coursenseignant');
/*association coursadesetudiant*/

Route::get('/admin/association/assocoursadesetudiant',[UserController::class,'assocoursadesetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.association.coursadesetudiants');
Route::post('/admin/association/assocoursadesetudiant',[UserController::class,'process_assocoursadesetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.association.coursadesetudiants');
/*afficheassociation */


Route::get('/admin/association/afficheassociation/{id}',[UserController::class,'showList_____'])->middleware('auth')->middleware('is_admin')->name('admin.liste.coursetudiant');
/*dissociation etudiantcours*/

Route::get('/admin/association/dissocieretudiantcours',[UserController::class,'process_dissocierassocoursetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.association.dissocieretudiant');
/*association coursenseignant*/

Route::get('/admin/association/assocoursenseignant',[UserController::class,'assocoursenseignant'])->middleware('auth')->middleware('is_admin')->name('admin.association.coursenseignant');
Route::post('/admin/association/assocoursenseignant',[UserController::class,'process_assoenseignantcours'])->middleware('auth')->middleware('is_admin')->name('admin.association.coursenseignant');


Route::get('/admin/association/afficheassociationenseignantcours/{id}',[UserController::class,'showList______'])->middleware('auth')->middleware('is_admin')->name('admin.liste.coursenseignant');

Route::get('/gestionnaire/association/afficheassociationenseignantcours/{id}',[UserController::class,'showList______'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.liste.coursenseignant');


/*asso seance etudiant*/

Route::get('/admin/pointage/presenceounon',[UserController::class,'assoseanceetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.pointage.presentounon');
Route::post('/admin/pointage/presenceounon',[UserController::class,'process_assoseanceetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.pointage.presentounon');


/*flitrer recherche*/

Route::get('/admin/trier/trierpartype',[UserController::class,'filtrer'])->middleware('auth')->middleware('is_admin')->name('admin.trier.trier');
Route::post('/admin/trier/trierpartype',[UserController::class,'process_filtrer'])->middleware('auth')->middleware('is_admin')->name('admin.trier.trier');

Route::get('/admin/trier/recherche',[UserController::class,'recherche'])->middleware('auth')->middleware('is_admin')->name('admin.trier.recherche');
Route::view('/admin/trier/rechercheform','trier.recherche')->middleware('auth')->middleware('is_admin')->name('admin.show.recherche');


Route::get('/admin/trier/recherchei',[UserController::class,'recherche_intitule'])->middleware('auth')->middleware('is_admin')->name('admin.trier.recherchei');
Route::view('/admin/trier/rechercheformi','trier.recherchei')->middleware('auth')->middleware('is_admin')->name('admin.show.recherchei');




Route::get('/admin/Enseignant/rechercheenseignantcours',[UserController::class,'rechercheenseignantcours'])->middleware('auth')->middleware('is_admin')->name('admin.Enseignant.rechercheenseignantcours');
Route::get('/admin/Enseignant/showList_______/{id}',[UserController::class,'showList_______'])->middleware('auth')->middleware('is_admin')->name('admin.show.rechercheenseignantcours');




/*création étudiant*/







Route::get('/gestionnaire/Enseignant/rechercheenseignantcours',[UserController::class,'rechercheenseignantcours'])->middleware('auth')->middleware('is_admin')->name('gestionnaire.Enseignant.rechercheenseignantcours');
Route::get('/gestionnaire/Enseignant/showList_______/{id}',[UserController::class,'showList_______'])->middleware('auth')->middleware('is_admin')->name('gestionnaire.show.rechercheenseignantcours');









//
//Route::get('/admin/Enseignant/rechercheenseignantcours/{id}',[UserController::class,'showList_______'])->middleware('auth')->middleware('is_admin')->name('admin.liste.rechercheenseignantcours');
//




/*-------parti gestionnaire-------------*/
Route::get('/gestionnaire/modifier',[UserController::class,'modifierprofil'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.modifier.mdp');
Route::post('/gestionnaire/modifier',[UserController::class,'process_modifierprofil'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.modifier.mdp');

Route::get('/gestionnaire/modifiernomprenom/{id}',[UserController::class,'modifierprofil_nomprenom'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.modifier.nomprenom');
Route::post('/gestionnaire/modifiernomprenom/{id}',[UserController::class,'process_modifierprofil_nomprenom'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.modifier.nomprenom');


/*--------------------------cree modifie supprimer etudiant */


Route::get('/gestionnaire/etudiant/afficheetudiant',[UserController::class,'showList_'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.liste.etudiant');

Route::get('/gestionnaire/etudiant/creeetudiant/{id}',[UserController::class,'creeetudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.cree.etudiant');
Route::post('/gestionnaire/etudiant/creeetudiant/{id}',[UserController::class,'process_creeetudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.cree.etudiant');

Route::get('/gestionnaire/etudiant/modifieretudiant/{id}',[UserController::class,'modifieretudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.modifier.etudiant');
Route::post('/gestionnaire/etudiant/modifieretudiant/{id}',[UserController::class,'process_modifieretudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.modifie.etudiant');

Route::get('/gestionnaire/etudiant/supprimeretudiant/{id}',[UserController::class,'supprimeretudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.supprimer.etudiant');
Route::post('/gestionnaire/etudiant/supprimeretudiant/{id}',[UserController::class,'process_supprimeretudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.supprimer.etudiant');

Route::get('/gestionnaire/etudiant/afficheetudiant',[UserController::class,'showList__'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.liste.etudiant');


/*----------------------------------------------------cree modifie supprimer seance */


Route::get('/gestionnaire/seance/creeseance',[UserController::class,'creeseance'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.cree.seance');
Route::post('/gestionnaire/seance/creeseance',[UserController::class,'process_creeseance'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.cree.seance');

Route::get('/gestionnaire/seance/modifierseance/{id}',[UserController::class,'modifierseance'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.modifier.seance');
Route::post('/gestionnaire/seance/modifierseance/{id}',[UserController::class,'process_modifierseance'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.modifie.seance');

Route::get('/gestionnaire/seance/supprimerseance/{id}',[UserController::class,'supprimerseance'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.supprimer.seance');
Route::post('/gestionnaire/seance/supprimerseance/{id}',[UserController::class,'process_supprimerseance'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.supprimer.seance');


Route::get('/gestionnaire/seance/afficheseance',[UserController::class,'showList___'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.liste.seance');

/*----------------------------------------------------------------------------asso disso affiche cours etudiant */

Route::get('/gestionnaire/association/assocoursetudiant',[UserController::class,'assocoursetudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.association.coursetudiant');
Route::post('/gestionnaire/association/assocoursetudiant',[UserController::class,'process_assocoursetudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.association.coursetudiant');

Route::get('/gestionnaire/association/dissociercoursetudiant',[UserController::class,'dissocierassocoursetudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.dissociation.coursetudiant');
Route::post('/gestionnaire/association/dissociercoursetudiant',[UserController::class,'process_dissocierassocoursetudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.dissociation.coursetudiant');

Route::get('/gestionnaire/association/afficheassociation/{id}',[UserController::class,'showList_____'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.liste.coursetudiant');

/*----------------------------------------------------asso disso affiche cours enseignant */

Route::get('/gestionnaire/association/assocoursenseignant',[UserController::class,'assocoursenseignant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.association.coursenseignant');
Route::post('/gestionnaire/association/assocoursenseignant',[UserController::class,'process_assoenseignantcours'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.association.coursenseignant');

Route::get('/gestionnaire/association/dissociercoursenseignant',[UserController::class,'dissocoursenseignant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.dissociation.coursenseignant');
Route::post('/gestionnaire/association/dissociercoursenseignant',[UserController::class,'process_dissocierassocoursenseignant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.dissociation.coursenseignant');

/*---------------------------rechercher */


//Route::get('/gestionnaire/trier/recherche',[UserController::class,'recherche'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.trier.recherche');
//Route::view('/gestionnaire/trier/rechercheform','trier.recherche')->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.show.recherche');

Route::get('/gestionnaire/trier/rechercheetudiant',[UserController::class,'recherche'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.trier.recherche');
Route::view('/gestionnaire/trier/rechercheformetudiant','trier.recherchei')->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.show.recherche');

/*----------------------------------------------------afficher liste seance et cours */

Route::get('/gestionnaire/seance/afficheseance',[UserController::class,'showList___'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.liste.seance');
Route::get('/gestionnaire/cours/affichecour',[UserController::class,'showList_'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.liste.cours');

/*-----------------afficher*/

Route::get('/enseignant/association/afficheassociation/{id}',[UserController::class,'showList_____'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.liste.coursetudiant');

Route::get('/enseignant/association/afficheassociationenseignantcours/{id}',[UserController::class,'showList______'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.liste.coursenseignant');


Route::get('/gestionnaire/ens/recher',[UserController::class,'rechercheenseignantcours'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.Enseignant.rechercheenseignantcours');
Route::get('/gestionnaire/ense/rechere/{id}',[UserController::class,'showList_______'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.show.rechercheenseignantcours');






/*---------presences----------*/

Route::get('/gestionnaire/ListePresenceEtudiant/{id}',[UserController::class,'AffichePresenceParEtudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.presence.detaillee');
Route::post('/gestionnaire/ListePresenceEtudiant/{id}',[UserController::class,'process_affichepresenceparetudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.presence.detaillee');

Route::get('/gestionnaire/ListePresenceCours',[UserController::class,'affichepresenceparcours'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.presence.cours');
Route::post('/gestionnaire/ListePresenceCours',[UserController::class,'process_affichepresenceparcours'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.presence.cours');

Route::get('/gestionnaire/ListePresenceSeance',[UserController::class,'AffichePresenceParSeance'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.presence.séance');
Route::post('/gestionnaire/ListePresenceSeance',[UserController::class,'process_affichepresenceseance'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.presence.séance');



Route::any('/gestionnaire/presence/Bafficher/{id}',[UserController::class,'process_affichepresenceparetudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.presence.detailler');







/*------parti enseignant-----------*/
Route::get('/enseignant/modifier',[UserController::class,'modifierprofil'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.modifier.mdp');
Route::post('/enseignant/modifier',[UserController::class,'process_modifierprofil'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.modifier.mdp');

Route::get('/enseignant/modifiernomprenom/{id}',[UserController::class,'modifierprofil_nomprenom'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.modifier.nomprenom');
Route::post('/enseignant/modifiernomprenom/{id}',[UserController::class,'process_modifierprofil_nomprenom'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.modifier.nomprenom');
/*--------------------------pointage*---------------------*/

Route::get('/enseignant/pointage/presenceounon',[UserController::class,'assoseanceetudiant'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.pointage.presentounon');
Route::post('/enseignant/pointage/presenceounon',[UserController::class,'process_assoseanceetudiant'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.pointage.presentounon');


Route::get('/enseignant/ensi/recher',[UserController::class,'rechercheenseignantcours'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.Enseignant.rechercheenseignantcours');
Route::any('/enseignant/enseignant/recherchepourenseignant/{id}',[UserController::class,'showList_______'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.show.rechercheenseignantcours');






/*création utilisateur*/

Route::get('/admin/creerAdmin', [UserController::class,'createdAdminForm'])->middleware('auth')->middleware('is_admin')->name('creerAdmin');
Route::get('/admin/creerAdmina', [UserController::class,'createdAdmin'])->middleware('auth')->middleware('is_admin')->name('creerAdmin');




/*inscrit cours*/

Route::get('/enseignant/liste/inscritdanscours/{id}',[UserController::class,'inscritdanscours'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.liste.inscritcours');
//Route::view('/enseignant/liste/inscritdanscour/{id}',[UserController::class,'process_inscritdanscours'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.liste.inscritcours');



/*pointage de plusieur etudiant a la meme seance*/
Route::any('/enseignant/pointages/presenceounons',[UserController::class,'assoseanceetudiants'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.pointages.presentounons');
Route::any('/enseignant/pointagess/presenceounonss',[UserController::class,'process_assoseanceetudiants'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.pointages.presentounons');

/*liste present par seance choisit*/

Route::any('/enseignant/presence/seancechoisit',[UserController::class,'presenceseancechoisit'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.presence.seancechoisit');
Route::any('/enseignant/presence/aseancechoisit',[UserController::class,'process_presenceseancechoisit'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.presence.seancechoisit');






Route::get('/admin/pointage/pointageplusieursetudiants  ',[UserController::class,'assoseancedesetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.pointages.coursetudiantss');
Route::post('/admin/pointage/pointageplusieursetudiants',[UserController::class,'process_assoseancedesetudiant'])->middleware('auth')->middleware('is_admin')->name('admin.pointages.coursetudiantss');



Route::get('/enseignant/pointage/pointageplusieursetudiants  ',[UserController::class,'assoseancedesetudiant'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.pointages.coursetudiantss');
Route::post('/enseignant/pointage/pointageplusieursetudiants',[UserController::class,'process_assoseancedesetudiant'])->middleware('auth')->middleware('is_enseignant')->name('enseignant.pointages.coursetudiantss');



Route::get('/gestionnaire/pointage/pointageplusieursetudiantscours  ',[UserController::class,'assocoursadesetudiant'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.pointages.coursetudiantss');
Route::post('/gestionnaire/pointage/pointageplusieursetudiantscours',[UserController::class,'process_asso_cours_etudiant_plusieur'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.pointages.coursetudiantss');



Route::get('/gestionnaire/supprimer/asso_cours_etudiant_plusieurs  ',[UserController::class,'supprimer_asso_cours_etudiant_plusieur'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.supprimer.coursetudiantsplusieur');
Route::post('/gestionnaire/supprimer/asso_cours_etudiant_plusieurs',[UserController::class,'process_supprimer_asso_cours_etudiant_plusieur'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.supprimer.coursetudiantsplusieur');


/*//////////////*/
Route::get('/admin/cree/utilisateur_admin  ',[UserController::class,'creation_admin'])->middleware('auth')->middleware('is_admin')->name('admin.cree.utlisateuradmin');
Route::post('/admin/cree/utilisateur_admin',[UserController::class,'process_creation_admin'])->middleware('auth')->middleware('is_admin')->name('admin.cree.utlisateuradmin');

Route::get('/admin/cree/utilisateur_gestionnaire  ',[UserController::class,'creation_gestionnaire'])->middleware('auth')->middleware('is_admin')->name('admin.cree.utlisateurgestionnaire');
Route::post('/admin/cree/utilisateur_gestionnaire',[UserController::class,'process_creation_gestionnaire'])->middleware('auth')->middleware('is_admin')->name('admin.cree.utlisateurgestionnaire');

Route::get('/admin/cree/utilisateur_enseignant  ',[UserController::class,'creation_enseignant'])->middleware('auth')->middleware('is_admin')->name('admin.cree.utlisateurenseignant');
Route::post('/admin/cree/utilisateur_enseignant',[UserController::class,'process_creation_enseignant'])->middleware('auth')->middleware('is_admin')->name('admin.cree.utlisateurenseignant');




Route::get('/gestionnaire/transfere/copie  ',[UserController::class,'cop'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.transfere.cop');
Route::post('/gestionnaire/transfere/copie',[UserController::class,'process_cop'])->middleware('auth')->middleware('is_gestionnaire')->name('gestionnaire.transfere.cop');



/*------parti afficher liste--------*/
Route::get('/login', [AuthenticatedSessionController::class,'showForm'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'login']);
Route::get('/logout', [AuthenticatedSessionController::class,'logout'])
    ->name('logout')->middleware('auth');

Route::get('/register', [RegisterUserController::class,'showForm'])
    ->name('register');
Route::post('/register', [RegisterUserController::class,'store']);

