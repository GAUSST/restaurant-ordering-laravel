<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Client;
use App\Models\UrlText;
use App\Models\Commande;
use App\Models\RootData;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CommandeController extends Controller
{



    public function view_commandes ()
    {
        /*
           on verifiera si l'id hashé du client correspond au id que l'on a et si
           il correspond on va effectuer les operations sur la commande et donner
           l'id de l'item a la page retier_la_commande
        */

        /*----------------------------------------------------------------------------*/
            $title      = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title = UrlText::find(8);
        /*----------------------------------------------------------------------------*/
            $main_image = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme      = RootData::find(4);
        /*----------------------------------------------------------------------------*/
            $categories = Categorie::all();
        /*----------------------------------------------------------------------------*/
            $items      = Item::all();
        /*----------------------------------------------------------------------------*/
            $commandes  = Commande::where("client_id","=",Session()->get("client_id"))->where("nombre",">",0)->get();
        /*----------------------------------------------------------------------------*/

        return view("Commandes/view_commandes",[
            'title'      => $title,
            'main_title' => $main_title,
            'main_image' => $main_image,
            'theme'      => $theme,
            'items'      => $items,
            'commandes'  => $commandes,
        ]);
    }


    public function remove_commandes ($id,$page)
    {
        if( $page == 1 ){

            $commandes = Commande::where('client_id','=',$id)->get();
            foreach( $commandes as $commande){
                $commande->delete();
                // $commande->save();
            }
            return Redirect::To("/gestion");

        }else{

            $item = Item::where('id','=',$id)->first();
            $commande = Commande::where('client_id','=',Session()->get("client_id"))->where("item_id","=",$id)->first();
            $commande->delete();
            // $commande->save();
            return Redirect::To("/logged_in/view_commandes");
        }
    }

    public function add_commandes($id)
    {
        $client   = Client::where('id','=',Session()->get("client_id"))->first();
        $item     = Item::where('id','=',$id)->first();
        $commande = Commande::where('client_id','=',Session()->get("client_id"))->where("item_id","=",$id)->first();

        if(!$commande){
            Commande::create([
                'nombre'       =>  1,
                'price_id'     => $item->price->id,
                'item_id'      => $item->id,
                'categorie_id' => $item->categorie->id,
                'client_id'    => $client->id,
            ]);
        }else{
            $commande->nombre = ($commande->nombre + 1);
            $commande->save();
        }

        return Redirect::To("/logged_in");
    }

}
