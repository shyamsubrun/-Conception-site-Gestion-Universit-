<?php

namespace App\Http\Controllers;

use App\Models\cours;
use App\Models\cours_etudiants;
use App\Models\cours_users;
use App\Models\etudiants;
use App\Models\presences;
use App\Models\seances;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showList()
    {
        $user = User::all();
        return view('admin.listeuser', ['users' => $user]);

    }

    public function modifierprofil()
    {
        return view('modification.modifiermdp');
    }

    public function process_modifierprofil(Request $requete)
    {
        $requete->validate([
            'mdp' => 'required|string|confirmed'
        ]);

        DB::update('update users set mdp = ? where login = ?', [Hash::make($requete->input('mdp')), Auth::user()->login]);
        $requete->session()->flash('etat', 'mot de passe changé avec succes ');
        return redirect()->back();
    }

    public function modifierprofil_nomprenom($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('modification.nometprenom', ['users' => $user]);
    }

    public function process_modifierprofil_nomprenom(Request $requete, $id)
    {
        $validated = $requete->validate([
            'nom' => 'required|string|max:256',
            'prenom' => 'required|string|max:256']);

        $user = User::findOrFail($id);
        $user->nom = $validated['nom'];
        $user->prenom = $validated['prenom'];
        $user->save();

        $requete->session()->flash('etat', ' nom et prénom modifié');
        return redirect()->back();
    }

    public function modifiertype($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.modifiertype', ['users' => $user]);
    }

    public function process_modifiertype(Request $requete, $id)
    {
        $validated = $requete->validate([
            'nom' => 'required|string|max:256',
            'prenom' => 'required|string|max:256',
            'type' => 'required']);

        $user = User::findOrFail($id);
        $user->nom = $validated['nom'];
        $user->prenom = $validated['prenom'];
        $user->type = $validated['type'];
        $user->save();

        $requete->session()->flash('etat', ' type modifié');
        return redirect()->back();
    }

    public function supprimerutilisateur(Request $requete, $id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        $requete->session()->flash('etat', 'la suppresion a été effectuée avec succès');
        return redirect()->back();
    }


    /* partie création cours*/


    public function showList_()
    {
        $cour = Cours::all();

        if(Auth::user()->type == 'admin'){

            return view('cours.liste', ['cours' => $cour]);

        }elseif (Auth::user()->type == 'gestionnaire') {

            return view('cours.listeg', ['cours' => $cour]);

        }else {

            return view('cours.listeen', ['cours' => $cour]);
        }


    }

    public function Creationcours()
    {
        return view('cours.creecours');
    }


    public function process_creecours(Request $requete)
    {
        $validated = $requete->validate([
            'intitule' => 'required|string|max:256',

        ]);

        /*$cour=DB::insert('insert into cours (intitule) values ( ?)',
            [$requete->input('intitule')]);*
        */

        $cour = new Cours();
        $cour->intitule = $validated['intitule'];
        $cour->created_at = Carbon::now();
        $cour->save();
        $requete->session()->flash('etat', 'le cours a été crée');
        return redirect()->back();    }


    public function supprimercours(Request $requete, $id)
    {
        DB::delete('delete from cours_etudiants where cours_id = ?', [$id]);

        DB::delete('delete from cours_users where cours_id = ?', [$id]);


        $s=DB::table('seances')->where('cours_id',$id)->value('seance_id');
        DB::delete('delete from presences where seance_id = ?', [$s]);

        DB::delete('delete from seances where cours_id = ?', [$id]);


        DB::delete('delete from cours where id = ?', [$id]);

        $requete->session()->flash('etat', 'la suppresion a été effectuée avec succès');
        return redirect()->back();
    }

    /* DB::table('cours')
                -> where('id', $requete->id)
                -> update(['intitule' => $validated['intitule'], 'created_at' => Carbon::now()]);*/


    public function modifiercours($id)
    {
        $cour = DB::table('cours')->where('id', $id)->first();

        if(Auth::user()->type == 'admin'){

            return view('cours.modifiercours', ['cours' => $cour]);

        }elseif (Auth::user()->type == 'gestionnaire') {

            return view('cours.modifiercoursg', ['cours' => $cour]);

        }else {

            return view('cours.modifiercourse', ['cours' => $cour]);
        }



    }

    public function process_modifiercours(Request $requete, $id)
    {
        $validated = $requete->validate([
            'intitule' => 'required|string',
        ]);

        $cour = Cours::findOrFail($id);
        $cour->intitule = $validated['intitule'];
        $cour->updated_at = Carbon::now();
        $cour->save();

        $requete->session()->flash('etat', ' cours à été  modifié');
        return redirect()->back();    }


    public function showList__()
    {
        $etudiant = etudiants::paginate(3);

        if(Auth::user()->type == 'admin'){

            return view('etudiant.listeetudiant', ['etudiants' => $etudiant]);

        }elseif (Auth::user()->type == 'gestionnaire') {

            return view('etudiant.listeetudiantg', ['etudiants' => $etudiant]);

        }else {

            return view('etudiant.listeetudianten', ['etudiants' => $etudiant]);
        }

    }



    public function creeetudiant()
    {
        return view('etudiant.creeetudiant');
    }

    public function process_creeetudiant(Request $requete)
    {
        $validated = $requete->validate([
            'nom' => 'required|string|max:256',
            'prenom' => 'required|string|max:256',
            'noet' => 'required|string|max:256']);

        $etudiant = new etudiants();
        $etudiant->nom = $validated['nom'];
        $etudiant->prenom = $validated['prenom'];
        $etudiant->noet = $validated['noet'];
        $etudiant->save();

        $requete->session()->flash('etat', 'le etudiant a été crée');
        return redirect()->back();
    }

    public function supprimeretudiant(Request $requete, $id)
    {
        DB::delete('delete from presences where etudiant_id = ?', [$id]);
        DB::delete('delete from cours_etudiants where etudiant_id = ?', [$id]);
        DB::delete('delete from etudiants where id = ?', [$id]);

        $requete->session()->flash('etat', 'la suppresion de l etudiant a été effectuée avec succès');
        return redirect()->back();
    }

    public function modifieretudiant($id)
    {
        $etudiant = DB::table('etudiants')->where('id', $id)->first();
        return view('etudiant.modifieretudiant', ['etudiants' => $etudiant]);
    }

    public function process_modifieretudiant(Request $requete, $id)
    {
        $validated = $requete->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'noet' => 'required|string'
        ]);

        $etudiant = etudiants::findOrFail($id);
        $etudiant->nom = $validated['nom'];
        $etudiant->prenom = $validated['prenom'];
        $etudiant->noet = $validated['noet'];
        $etudiant->updated_at = Carbon::now();
        $etudiant->save();

        $requete->session()->flash('etat', ' cours à été  modifié');
        return redirect()->back();    }

    /*-------------------------------------------------------*/

    public function showList___()
    {
        $seance = seances::paginate(2);
        if(Auth::user()->type == 'admin'){
            return view('seance.listeseance', ['seances' => $seance]);
        }elseif (Auth::user()->type == 'gestionnaire') {
            return view('seance.listeseanceg', ['seances' => $seance]);
        }else {
            return view('seance.listeseanceEn', ['seances' => $seance]);
        }
    }

    public function creeseance()
    {
        $cour = Cours::all();
        return view('seance.creeseance', ['cours' => $cour]);
    }

    public function process_creeseance(Request $requete)
    {
        $validated = $requete->validate([
            'date_debut' => 'required',
            'date_fin' => 'required',
            'cours' => 'required|integer'
        ]);
        $seance = new seances();
        $seance->cours_id = $requete->cours;
        $seance->date_debut = $requete->date_debut;
        $seance->date_fin = $requete->date_fin;
        $seance->save();
        $requete->session()->flash('etat', 'la seance a été crée');
        return redirect()->back();

    }

    public function supprimerseance(Request $requete, $id)
    {
        DB::delete('delete from presences where seance_id = ?', [$id]);
        DB::delete('delete from seances where id = ?', [$id]);
        $requete->session()->flash('etat', 'la suppresion de la seance a été effectuée avec succès');
        return redirect()->back();
    }

    public function modifierseance($id)
    {
        $seance = DB::table('seances')->where('id', $id)->first();
        if (Auth::user()->type == 'admin') {
            return view('seance.modifierseance', ['seances' => $seance]);
        } elseif (Auth::user()->type == 'gestionnaire') {
            return view('seance.modifierseanceg', ['seances' => $seance]);
        } else {
            return view('seance.modifierseance.e', ['seances' => $seance]);
        }


    }

    public function process_modifierseance(Request $requete, $id)
    {
        $validated = $requete->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);

        $seance = seances::findOrFail($id);
        $seance->date_debut = $validated['date_debut'];
        $seance->date_fin = $validated['date_fin'];
        $seance->save();

        $requete->session()->flash('etat', ' seance à été  modifié');
        return redirect()->back();    }



    public function filtrer()
    {
        return view('trier.trier');
    }

    public function process_filtrer(Request $requete)
    {


        $user = User::where('type', $requete->type)->get();
        return view('trier.affichertri', ['users' => $user]);

    }


    public function recherche()
    {
        $s = request()->input('s');
        $etudiant = Etudiants::where('nom', 'like', "%$s%")
            ->where('prenom', 'like', "%$s%")
            ->orwhere('noet', 'like', "%$s%")->paginate(3);

        if(Auth::user()->type == 'admin'){

            return view('etudiant.listeetudiant', ['etudiants' => $etudiant]);

        }elseif (Auth::user()->type == 'gestionnaire') {

            return view('etudiant.listeetudiantg', ['etudiants' => $etudiant]);

        }else {

            return view('etudiant.listeetudianen', ['etudiants' => $etudiant]);
        }
    }


    /*association*/
    public function assocoursetudiant()
    {
        $cour = Cours::all();
        $etudiant = Etudiants::all();
        return view('association.assocoursetudiant', ['cours' => $cour, 'etudiants' => $etudiant]);
    }

    public function assocoursenseignant()
    {
        $cour = Cours::all();
        $enseignant = User::where('type', '=', 'enseignant')->get();
        return view('association.assocoursenseignant', ['cours' => $cour, 'enseignants' => $enseignant]);
    }

    public function process_assoenseignantcours(Request $requete)
    {
       $user= User::where('type', '=', 'enseignant')->where('id', $requete->enseignant)->first();
        $cour = Cours::where('id', $requete->cours)->first();

        $user->cours()->attach($cour);
        $user->save();

        $requete->session()->flash('etat','association enseignant-cours à été  crée');
        return redirect()->back();

    }

    public function process_assocoursetudiant(Request $requete)
    {

        $etudiant = Etudiants::where('id', $requete->etudiant)->first();
        $cour = Cours::where('id', $requete->cours)->first();

        $etudiant->cours()->attach($cour);
        $etudiant->save();

        $requete->session()->flash('etat', ' association cours-etudiant à été  crée');
        return redirect()->back();

    }

    public function showList_____($id){

        $cours = Cours::findOrFail($id);
        $et = $cours->etudiants;

        if(Auth::user()->type == 'admin'){
            return view('association.listeassociation', ['etudiants' =>$et]);
        }elseif (Auth::user()->type == 'gestionnaire') {
            return view('association.listeassociationg', ['etudiants' =>$et]);
        }else {
            return view('association.listeassociatione', ['etudiants' =>$et]);
        }



    }

    public function showList______($id){

        $cours = Cours::findOrFail($id);
        $user = $cours->User;

        if(Auth::user()->type == 'admin'){
            return view('association.listeassosenseignantcours', ['users' =>$user]);
        }elseif (Auth::user()->type == 'gestionnaire') {
            return view('association.listeassosenseignantcoursg', ['users' =>$user]);
        }else {
            return view('association.listeassosenseignantcourse', ['users' =>$user]);
        }




    }



    public function dissocierassocoursetudiant()
    {
        $cour = Cours::all();
        $etudiant = Etudiants::all();
        return view('association.dissociercoursetudiant', ['cours' => $cour, 'etudiants' => $etudiant]);
    }


    public function process_dissocierassocoursetudiant(Request $requete)
    {

        $etudiant = Etudiants::where('id', $requete->etudiant)->first();
        $cour = Cours::where('id', $requete->cours)->first();

        $etudiant->cours()->detach($cour);
        $etudiant->save();

        $requete->session()->flash('etat', 'la  disociation à été  faite');
        return redirect()->back();

    }


    public function dissocoursenseignant()
    {
        $cour = Cours::all();
        $enseignant = User::where('type', '=', 'enseignant')->get();
        return view('association.dissocierenseignantcours', ['cours' => $cour, 'enseignants' => $enseignant]);
    }



    public function process_dissocierassocoursenseignant(Request $requete)
    {
        $user= User::where('type', '=', 'enseignant')->where('id', $requete->enseignant)->first();
        $cour = Cours::where('id', $requete->cours)->first();

        $user->cours()->detach($cour);
        $user->save();

        $requete->session()->flash('etat','disociation enseignant-cours à été  crée');
        return redirect()->back();

    }

    public function assoseanceetudiant()

    {
        $seance = Seances::all();
        $etudiant = Etudiants::all();
        return view('pointage.presentounon', ['seances' => $seance, 'etudiants' => $etudiant]);
    }

    public function process_assoseanceetudiant(Request $requete)
    {
        $etudiant = Etudiants::where('id', $requete->etudiant)->first();
        $seance = Seances::where('id', $requete->seance)->first();

        $etudiant->seances()->attach($seance);
        $etudiant->save();
        $requete->session()->flash('etat', ' association seances-etudiant à été  crée');
        return redirect()->back();

    }


    public function recherche_intitule()
    {
        $s = request()->input('s');

        $cour = Cours::where('intitule', 'like', "%$s%")->get();

        return view('cours.liste', ['cours' => $cour]);

    }

    public function rechercheenseignantcours()
    {
        $user=User::where('type', '=', 'enseignant')->get();
        if(Auth::user()->type == 'admin'){
        return view('Enseignant.rechercheenseignantcours', ['users'=>$user]);

        } elseif (Auth::user()->type == 'gestionnaire') {

            return view('Enseignant.rechercheenseignantcoursg', ['users'=>$user]);

        }else {

            return view('Enseignant.rechercheenseignantcours', ['users'=>$user]);
        }
    }



    public function showList_______($id)
    {
        $user = User::find($id);
        $u = $user->cours;
//        $user = User::findorfail($id);
//        $user->cours()->user();



        if(Auth::user()->type == 'admin'){

            return view('cours.liste', ['cours'=>$u]);


        } elseif (Auth::user()->type == 'gestionnaire') {

            return view('cours.listeg', ['cours'=>$u]);

        }else {

            return view('cours.listeen', ['cours'=>$u]);
        }
    }

    /*cree utilisateur */


    //creer admin
    public function createdAdminForm(){
        return view('uutilisateur.CreeUti');
    }

    //creer admin
    public function createdAdmin(Request $request){
        $request->validate([
            'login' => 'required|string|max:255|unique:users',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'mdp' => 'required|string|confirmed'
        ]);
        $user = new User();
        $user->login = $request->login;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->mdp = Hash::make($request->mdp);
        $user->type = 'admin';
        $user->save();

        $request-> session()->flash('etat','Admin enregistré');

        return redirect()->back();
    }






    /*presence presencedetaillerparetudiant  */
    public function AffichePresenceParEtudiant()
    {  $etudiant = etudiants:: all();
        return view('presence.presencedetaillerparetudiant',['etudiants'=>$etudiant]);
    }


    public function process_affichepresenceparetudiant($id) /*on par de etudiants pour aller vers sa liste de cours*/
    {
        $p = presences::where('etudiant_id',$id)->get();

        return view('presence.affichepresencedetailler', ['presences'=>$p]);
    }


/*----------p cours---------*/


    public function affichepresenceparcours()
    {
        $cour=cours::all();
        return view('presence.presencecours',['cours'=>$cour]) ;
    }

    public function process_affichepresenceparcours(request $request)
    {
        $e=presences::where('cours_id',$request->id)->get();
        return view('presence.afficherpresencecours',['presences'=>$e]);
    }



    /*-----------p seance----------*/

    public function AffichePresenceParSeance()
    {

        $seance=seances::all();
        return view('presence.presenceseance',['seances'=>$seance]) ;
    }

    public function process_affichepresenceseance(request $request ) /*on par de la seance pour aller vers sa liste des etutidants*/
    {

        $e=presences::where('seance_id',$request->id)->get();
        return view('presence.afiicherpresenceseance',['presences'=>$e]);

    }



    public function inscritdanscours($cour){
        return view('cours.inscritdanscours',['cours'=>$cour]);


    }
    public function process_inscritdanscours(){


    }

    public function assoseanceetudiants()

    {
        $seance = Seances::all();
        $etudiant = Etudiants::all();
        return view('pointage.presentounonss', ['seances' => $seance, 'etudiants' => $etudiant]);
    }

    public function process_assoseanceetudiants(Request $requete)
    {
        $etudiant = Etudiants::where('id', $requete->etudiant)->first();
        $seance = Seances::where('id', $requete->seance)->first();
        $etudiant->seances()->attach($seance);
        $etudiant->save();
        $requete->session()->flash('etat', ' les association seances-etudiants ont été  crée');
        return redirect()->back();

    }


    public function presenceseancechoisit(){
        $seance = Seances::all();
        $etudiant = Etudiants::all();
        return view('presence.seancechoisit', ['seances' => $seance, 'etudiants' => $etudiant]);


    }

    public function process_presenceseancechoisit(){}




    /*associer plusieurs etudiants a un cours*/

    public function assoseancedesetudiant()

    {
        $seance = Seances::all();
        $etudiant = Etudiants::all();
        return view('association.assodesetudiantsuncours', ['seances' => $seance, 'etudiants' => $etudiant]);
    }



    public function process_assoseancedesetudiant(Request $requete)
    {

        //$etudiants = Etudiants::where('id', $requete->alle)->get();
        $etudiants = Etudiants::findOrFail($requete->alle);
        $seance = Seances::where('id', $requete->id_seance)->first();

        foreach($etudiants as $etudiant){
            $etudiant->seances()->attach($seance);
            $etudiant->save();
        }


        $requete->session()->flash('etat', ' association seances-etudiant à été  crée');
        return redirect()->back();

    }



    /*associer plusieurs etudiants a un cours*/

    public function assocoursadesetudiant()
    {
        $cour = Cours::all();
        $etudiant = Etudiants::all();
        return view('association.assodesetudiantscours', ['cours' => $cour, 'etudiants' => $etudiant]);
    }

    public function process_asso_cours_etudiant_plusieur(Request $requete)
    {

        $etudiants = Etudiants::findOrFail($requete->alle);
        $cour = Cours::where('id', $requete->id_cours)->first();

        foreach($etudiants as $etudiant){

            $etudiant->cours()->attach($cour);
            $etudiant->save();
        }
        $requete->session()->flash('etat', ' association cours plusieur etudiant faite');
        return redirect()->back();
    }



    public function supprimer_asso_cours_etudiant_plusieur()
    {
        $cour = Cours::all();
        $etudiant = Etudiants::all();
        return view('association.supprimer_asso_plusieurs_coursetudiant', ['cours' => $cour, 'etudiants' => $etudiant]);
    }


    public function process_supprimer_asso_cours_etudiant_plusieur(Request $requete)
    {

        $etudiants = Etudiants::findOrFail($requete->alle);
        $cour = Cours::where('id', $requete->id_cours)->get();

        foreach ($etudiants as $etudiant){
            $etudiant->cours()->detach($cour);
        $etudiant->save();}

        $requete->session()->flash('etat', 'la  disociation à été  faite');
        return redirect()->back();

    }


    public function creation_admin(){
        return view('uutilisateur.CreeUti');
    }
    public function creation_gestionnaire(){
        return view('uutilisateur.creeg');
    }
    public function creation_enseignant(){
        return view('uutilisateur.creeens');
    }

    public function process_creation_admin(Request $request){
        $request->validate([
            'login' => 'required|string|max:255|unique:users',
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'mdp' => 'required|string|confirmed'
        ]);

        $user = new User();
        $user->login = $request->login;
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->mdp = Hash::make($request->mdp);
        $user->type = 'admin';
        $user->save();

        $request-> session()->flash('etat','Admin enregistré');

        return redirect()->back();}

        public function process_creation_gestionnaire(Request $request){
            $request->validate([
                'login' => 'required|string|max:255|unique:users',
                'prenom' => 'required|string|max:255',
                'nom' => 'required|string|max:255',
                'mdp' => 'required|string|confirmed'
            ]);

            $user = new User();
            $user->login = $request->login;
            $user->prenom = $request->prenom;
            $user->nom = $request->nom;
            $user->mdp = Hash::make($request->mdp);
            $user->type = 'gestionnaire';
            $user->save();

            $request-> session()->flash('etat','gestionnaire enregistré');

            return redirect()->back();}


    public function process_creation_enseignant(Request $request){
        $request->validate([
            'login' => 'required|string|max:255|unique:users',
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'mdp' => 'required|string|confirmed'
        ]);

        $user = new User();
        $user->login = $request->login;
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->mdp = Hash::make($request->mdp);
        $user->type = 'enseignant';
        $user->save();

        $request-> session()->flash('etat','enseignant enregistré');

        return redirect()->back();}




    public function cop(){
        $cour = Cours::all();
        return view('copie.transfere', ['cours' => $cour]);

    }

    public function process_cop(){


    }









}











