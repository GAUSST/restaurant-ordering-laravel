<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Client;
use App\Rules\WordMax;
use App\Models\UrlText;
use App\Models\Commande;
use App\Models\RootData;
use App\Models\Categorie;
use App\Rules\validEmail;
use App\Mail\ConnectedMail;
use App\Mail\RegistredMail;
use Illuminate\Http\Request;
use App\Rules\OnlyLettersAllowed;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class RootController extends Controller
{
    public function logged_in ()
    {

            /*----------------------------------------------------------------------------*/
                $title      = RootData::find(1);
            /*----------------------------------------------------------------------------*/
                $main_title = UrlText::find(1);
            /*----------------------------------------------------------------------------*/
                $main_image = RootData::find(3);
            /*----------------------------------------------------------------------------*/
                $theme      = RootData::find(4);
            /*----------------------------------------------------------------------------*/
                $categories = Categorie::all();
            /*----------------------------------------------------------------------------*/
                $items      = Item::all();
            /*----------------------------------------------------------------------------*/
                $commandes   = Commande::where("client_id","=",Session()->get("client_id"))->get();
            /*----------------------------------------------------------------------------*/


        return view("Roots/logged_in",[
            'title'      => $title,
            'main_title' => $main_title,
            'theme'      => $theme,
            'main_image' => $main_image,
            'categories' => $categories,
            'items'      => $items,
            'commandes'  => $commandes,
        ]);
    }


    public function accueil()
    {

        return view("Roots/accueil");
    }


    public function register ()
    {

        /*----------------------------------------------------------------------------*/
            $title      = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title = UrlText::find(1);
        /*----------------------------------------------------------------------------*/
            $main_image = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme      = RootData::find(4);
        /*----------------------------------------------------------------------------*/

        return view("Roots/register",[
            'title'         => $title,
            'main_title'    => $main_title,
            'theme'         => $theme,
            'main_image'    => $main_image
        ]);
    }
    public function register_store( Request $request ){


        function clean($content){
            $content= ucwords($content);
            $content= htmlspecialchars($content);
            $content= nl2br($content);
            $content= strip_tags($content);
            $content= stripslashes($content);
            return $content;
        }

        $request->prenom = clean($request->prenom);
        $request->nom    =clean($request->nom);

        $request->validate([
            'prenom'   => ['required',new OnlyLettersAllowed,'max:15','min:2',new WordMax($request->prenom,2)],
            'nom'      => ['required',new OnlyLettersAllowed,'max:15','min:2',new WordMax($request->nom,1)],
            'mail'     => ['required','max:300','min:5','email',new validEmail,'unique:clients'],
            'password' => ['required','max:12','min:6']
        ]);

        $client = Client::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'mail' => $request->mail,
            'password' => Hash::make( $request->password)
        ]);
        if(!$client){
            return back()->with('fail','Il y a eu une erreur, veillez reéssayer plutard');
        }
        Mail::to($client->mail)->send( new RegistredMail( $client, "/logged_in" ) );

        $request->session()->put('client_id', $client->id);

        return Redirect::To("/logged_in");
    }


    public function connect ()
    {

        /*----------------------------------------------------------------------------*/
            $title      = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title = UrlText::find(1);
        /*----------------------------------------------------------------------------*/
            $main_image = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme      = RootData::find(4);
        /*----------------------------------------------------------------------------*/
        return view("Roots/connect",[
            'title'         => $title,
            'main_title'    => $main_title,
            'theme'         => $theme,
            'main_image'    => $main_image ,
        ]);
    }
    public function connect_store( Request $request )
    {

        $email    = $request->mail ;
        $password = $request->password ;

        $request->validate([
            'mail'     => ['required','max:300','min:5','email',new validEmail],
            'password' => ['required','max:12','min:6']
        ]);

        $client  = Client::where( 'mail','=',$email )->first();

        if($client){
            if(Hash::check($password,$client->password)){
                $request->session()->put( 'client_id', $client->id );
                // Mail::to( $client->mail )->send(new ConnectedMail( $client, "/connect/reset_password" ));

                if(Session()->has('old_route')){
                    return Redirect::To( "/".Session()->get('old_route') );
                }else{
                    return Redirect::To( "/logged_in" );
                }
            }else{
                return back()->with("fail","Mot de passe incorrect!");
            }
        }else{
            return back()->with('fail','Ce compte n\'éxiste pas Dans base de données!');
        }
    }


    public function reset_password()
    {

        /*----------------------------------------------------------------------------*/
            $title      = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title = UrlText::find(1);
        /*----------------------------------------------------------------------------*/
            $main_image = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme      = RootData::find(4);
        return view("Roots.password_reset",[
            'title'         => $title,
            'main_title'    => $main_title,
            'theme'         => $theme,
            'main_image'    => $main_image ,
        ]);
    }
    public function reset_password_store(Request $request)
    {

    }

    public function contact()
    {
        return view("Roots/contact");
    }
    public function contact_store( Request $request )
    {

    }


    // public function authenticate ($path)
    // {

    //     return view("Roots/authenticate",[
    //         // 'title'      => $title,
    //         // 'main_title' => $main_title,
    //         // 'theme'      => $theme,
    //         // 'main_image' => $main_image,
    //         // 'path'       => $path
    //     ]);
    // }


    // public function authenticate_store (Request $request)
    // {

    // }


}
