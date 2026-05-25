<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Rules\WordMax;
use App\Models\UrlText;
use App\Models\Commande;
use App\Models\RootData;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\SecondaryTitle;
use Illuminate\Validation\Rule;
use App\Rules\OnlyLettersAllowed;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class GestionController extends Controller
{



    public function gestion ()
    {
        /*----------------------------------------------------------------------------*/
            $title                   = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title              = UrlText::find(7);
        /*----------------------------------------------------------------------------*/
            $main_image              = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme                   = RootData::find(4);
        /*----------------------------------------------------------------------------*/
            $secondary_title_current = SecondaryTitle::find(6);
        /*----------------------------------------------------------------------------*/
            $url_texts               = UrlText::all();
        /*----------------------------------------------------------------------------*/
            $categories              = Categorie::all();
        /*----------------------------------------------------------------------------*/
            $root_datas              = RootData::all();
        /*----------------------------------------------------------------------------*/
            $secondary_titles        = SecondaryTitle::all();
        /*----------------------------------------------------------------------------*/
            $clients                 = Client::has('commandes')->with("commandes")->get();

        /*----------------------------------------------------------------------------*/
            $commandes               = Commande::where('client_id','=',Session()->get('client_id'))->get();
                $couts=null;
                foreach($commandes as $commande){
                $couts += $commande->Price->content * $commande->nombre;
            }
        /*----------------------------------------------------------------------------*/
        return view("Gestion/gestion",[
            'title'                    => $title,
            'main_title'               => $main_title,
            'theme'                    => $theme,
            'main_image'               => $main_image,
            'secondary_title_current'  => $secondary_title_current,
            'url_texts'                => $url_texts,
            'categories'               => $categories,
            'root_datas'               => $root_datas,
            'secondary_titles'         => $secondary_titles,
            'clients'                  => $clients,
            'couts'                    => $couts,
        ]);
    }


    public function gestion_modifie ($id,$page)
    {
        /*----------------------------------------------------------------------------*/
            $title                   = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title              = UrlText::find(7);
        /*----------------------------------------------------------------------------*/
            $main_image              = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme                   = RootData::find(4);
        /*----------------------------------------------------------------------------*/
            $url_text                = UrlText::find($id);
        /*----------------------------------------------------------------------------*/
            $categorie               = Categorie::find($id);
        /*----------------------------------------------------------------------------*/
            $root_data               = RootData::find($id);
        /*----------------------------------------------------------------------------*/
            $page                    = $page;
        /*----------------------------------------------------------------------------*/
            $logo                    = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $secondary_title         = SecondaryTitle::find(3);
        /*----------------------------------------------------------------------------*/
            $secondary_title_current = SecondaryTitle::find($id);
        /*----------------------------------------------------------------------------*/
        return view("Gestion/modifie",[
            'title'                   => $title,
            'main_title'              => $main_title,
            'main_image'              => $main_image,
            'theme'                   => $theme,
            'url_text'                => $url_text,
            'categorie'               => $categorie,
            'root_data'               => $root_data,
            'page'                    => $page,
            'logo'                    => $logo,
            'secondary_title'         => $secondary_title,
            'secondary_title_current' => $secondary_title_current,
        ]);
    }


    public function gestion_modifieCatch ($id,$page, Request $request)
    {
        switch ($page) {

        /*----------------------------------------------------------------------------*/
            case "categorie":

                $request->categorie_name = ucfirst($request->categorie_name);
                $validated = $request->validate([
                    'categorie_name' => ['required',new OnlyLettersAllowed,'max:10','min:2',new WordMax($request->categorie_name,1)],
                ]);

                if($validated){
                    $categorie       = Categorie::where("id","=",$id)->first();
                    $categorie->name = $request->categorie_name ;
                    $categorie->save();
                    return redirect('gestion');
                }else{
                    return Redirect::To("gestion/modifie/$id/$page")->with("failed","une erreur c'est produite, veillez reéssayer plutard!");
                }

            break;
        /*----------------------------------------------------------------------------*/
            case "url_text":

                $request->url_text = ucwords($request->url_text);
                $validated = $request->validate([
                    'url_text' => ['required',new OnlyLettersAllowed,'max:30','min:2',new WordMax($request->url_text,4)],
                ]);

                if($validated){
                    $url_text          = UrlText::where("id","=",$id)->first();
                    $url_text->content = $request->url_text ;
                    $url_text->save();
                    return redirect('gestion');
                }else{
                    return Redirect::To("gestion/modifie/$id/$page")->with("failed","une erreur c'est produite, veillez reéssayer plutard!");
                }

            break;
        /*----------------------------------------------------------------------------*/
            case "root_data":

                $request->root_data = ucwords($request->root_data);
                $validated = $request->validate([
                    'root_data' => ['required',new OnlyLettersAllowed,'max:20','min:4',new WordMax($request->root_data,2)],
                ]);

                if($validated){
                    $root_data          = RootData::where("id","=",$id)->first();
                    $root_data->content = $request->root_data ;
                    $root_data->save();
                    return redirect('gestion');
                }else{
                    return Redirect::To("gestion/modifie/$id/$page")->with("failed","une erreur c'est produite, veillez reéssayer plutard!");
                }

            break;
        /*----------------------------------------------------------------------------*/
            case "theme":

                $request->theme_color = strtolower($request->theme_color);
                $validated = $request->validate([
                    'theme_color' => ['required',new OnlyLettersAllowed,new WordMax($request->theme_color,2),Rule::in(['vert','rouge','bleu','blanc'])],
                ]);

                if($validated){
                    $theme_color          = RootData::where("id","=",$id)->first();
                    $theme_color->content = $request->theme_color ;
                    $theme_color->save();
                    return redirect('gestion');
                }else{
                    return Redirect::To("gestion/modifie/$id/$page")->with("failed","une erreur c'est produite, veillez reéssayer plutard!");
                }

            break;
        /*----------------------------------------------------------------------------*/
            case "secondary_title":

                $request->secondary_title = ucwords($request->secondary_title);
                $validated = $request->validate([
                    'secondary_title' => ['required',new OnlyLettersAllowed,'min:2','max:40',new WordMax($request->secondary_title,8)],
                ]);

                if($validated){
                    $secondary_title          = SecondaryTitle::where("id","=",$id)->first();
                    $secondary_title->content = $request->secondary_title ;
                    $secondary_title->save();
                    return redirect('gestion');
                }else{
                    return Redirect::To("gestion/modifie/$id/$page")->with("failed","une erreur c'est produite, veillez reéssayer plutard!");
                }

            break;
        /*----------------------------------------------------------------------------*/
            case "logo":

                $validated = $request->validate([
                    'logo_image' => ['required','file','max:2000','mimes:jpg,jpeg,png'],
                ]);
                if($validated){

                    $image_name = $request->logo_image->getClientOriginalName();
                    if( strlen($image_name) < 41 ){
                        if(Storage::disk('local')->missing("app/public/".$image_name)){

                            $logo                = RootData::where("id","=",$id)->first();

                            $old_logo_name       = $logo->content;
                            $old_logo_name_hased = time().'.'.$logo->content;

                            $logo->content       = $image_name ;
                            $logo->save();

                            Storage::putFileAs('public/icon/',$request->logo_image,$image_name);
                            Storage::move("public/icon/".$old_logo_name,"public/icon/deleted/".$old_logo_name_hased);
                            return redirect('gestion');
                        }else{
                            $logo          = RootData::where("id","=",$id)->first();
                            $logo->content = $request->logo_image->getClientOriginalName() ;
                            $logo->save();
                        }
                    }else{
                        return back()->with("fail","le nom de l'image ne doit pas depasser 40 caractères.");
                    }
                }else{
                    return back()->with("fail","une erreur c'est produite, veillez reéssayer plutard!");
                }

            break;
        /*----------------------------------------------------------------------------*/
            default:
                abort(404,"Operation échoué!");
                break;
        /*----------------------------------------------------------------------------*/
        }
    }


    public function gestion_delete ($id,$page)
    {
        /*----------------------------------------------------------------------------*/
            $title                   = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title              = UrlText::find(6);
        /*----------------------------------------------------------------------------*/
            $main_image              = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme                   = RootData::find(4);
        /*----------------------------------------------------------------------------*/
            $page                    = $page;
        /*----------------------------------------------------------------------------*/
            $secondary_title         = SecondaryTitle::find(5);
        /*----------------------------------------------------------------------------*/
            $secondary_title_current = SecondaryTitle::find($id);
        /*----------------------------------------------------------------------------*/
            $url_text                = UrlText::find($id);
        /*----------------------------------------------------------------------------*/
        return view("Gestion/delete",[
            'title'                   => $title,
            'main_title'              => $main_title,
            'theme'                   => $theme,
            'main_image'              => $main_image,
            'page'                    => $page,
            'secondary_title'         => $secondary_title,
            'secondary_title_current' => $secondary_title_current,
            'url_text'                => $url_text,
        ]);
    }


    public function gestion_delete_validation ($id,$page)
    {
        if ( $page == "urlText") {

            $url_text          = urlText::where('id','=',$id)->first();
            $url_text->content = ' ';
            $url_text->save();
            return Redirect::To("/gestion");

        } elseif( $page == "secondaryTitle") {

            $secondary_title          = SecondaryTitle::where('id','=',$id)->first();
            $secondary_title->content = '';
            $secondary_title->save();
            return Redirect::To("/gestion");

        }else return Redirect::To("/gestion");

    }


}
