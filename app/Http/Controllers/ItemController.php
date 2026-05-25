<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Image;
use App\Models\Price;
use App\Rules\WordMax;
use App\Models\UrlText;
use App\Models\RootData;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\SecondaryTitle;
use App\Rules\OnlyLettersAllowed;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{

    public function list ()
    {
        /*----------------------------------------------------------------------------*/
            $title           = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title      = UrlText::find(2);
        /*----------------------------------------------------------------------------*/
            $main_image      = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme           = RootData::find(4);
        /*----------------------------------------------------------------------------*/
            $items           = Item::all();
        /*----------------------------------------------------------------------------*/
            $secondary_title = SecondaryTitle::find(1);
        /*----------------------------------------------------------------------------*/
        return view("Items/list",[
            'title'           => $title,
            'main_title'      => $main_title,
            'theme'           => $theme,
            'main_image'      => $main_image,
            'secondary_title' => $secondary_title,
            'items'           => $items,
        ]);
    }


    public function modifie_item ($id)
    {

        /*----------------------------------------------------------------------------*/
            $title           = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title      = UrlText::find(4);
        /*----------------------------------------------------------------------------*/
            $main_image      = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme           = RootData::find(4);
        /*----------------------------------------------------------------------------*/
            $item            = Item::find($id);
        /*----------------------------------------------------------------------------*/
            $secondary_title = SecondaryTitle::find(3);
        /*----------------------------------------------------------------------------*/
            $categories      = Categorie::all();
        /*----------------------------------------------------------------------------*/
            $secondary_title = SecondaryTitle::find(3);
        /*----------------------------------------------------------------------------*/
            $id              = $id;
        /*----------------------------------------------------------------------------*/
        return view("Items/modifie_item",[
            'title'           => $title,
            'main_title'      => $main_title,
            'theme'           => $theme,
            'main_image'      => $main_image,
            'item'            => $item,
            'categories'      => $categories,
            'secondary_title' => $secondary_title,
            'id'              => $id,
        ]);
    }

    public function modifie_item_store ($id, Request $request)
    {

        function clean($content){
            $content= htmlspecialchars($content);
            $content= nl2br($content);
            $content= strip_tags($content);
            $content= stripslashes($content);
            return $content;
        }

        $request->name        = clean($request->name);
        $request->description = clean($request->description);

        $validated = $request->validate([
            'name'        => ['required',new OnlyLettersAllowed,'max:30','min:2',new WordMax($request->name,2)],
            'categorie'   => ['required',new OnlyLettersAllowed,'max:15','min:2',new WordMax($request->categorie,1)],
            'price'       => ['required','numeric'],
            'description' => ['nullable',new OnlyLettersAllowed,'max:100',new WordMax($request->description,15)],
        ]);
        
        if($validated){

            $item               = Item::where("id","=",$id)->first();
            $item->name         = $request->name ;
            $categorie          = Categorie::where("name","=",$request->categorie)->first();
            $item->categorie_id = $categorie->id ;

            $price              = Price::where("item_id","=",$item->id)->first();
            $price->content     = $request->price ;
            $price->save();
            if(!empty($request->description)){
                $item->description  = $request->description ;
            }else{
                $item->description  =  $item->description ;
            }
            $item->save();
            return Redirect::To("list");
        }else{
            return Redirect::To("gestion/modifie/$id/$page")->with("failed","une erreur c'est produite, veillez reéssayer plutard!");
        }
    }


    public function view_item ($id)
    {

        /*----------------------------------------------------------------------------*/
            $title           = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title      = UrlText::find(3);
        /*----------------------------------------------------------------------------*/
            $main_image      = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme           = RootData::find(4);
        /*----------------------------------------------------------------------------*/
            $item           = Item::find($id);
        /*----------------------------------------------------------------------------*/
            $secondary_title = SecondaryTitle::find(2);
        /*----------------------------------------------------------------------------*/
        return view("Items/view_item",[
            'title'           => $title,
            'main_title'      => $main_title,
            'theme'           => $theme,
            'main_image'      => $main_image,
            'item'            => $item,
            'secondary_title' => $secondary_title,
        ]);
    }


    public function delete_item ($id)
    {

        /*----------------------------------------------------------------------------*/
            $title           = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title      = UrlText::find(3);
        /*----------------------------------------------------------------------------*/
            $main_image      = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme           = RootData::find(4);
        /*----------------------------------------------------------------------------*/
            $item           = Item::find($id);
        /*----------------------------------------------------------------------------*/
            $secondary_title = SecondaryTitle::find(2);
        /*----------------------------------------------------------------------------*/
            $id = $id;
        /*----------------------------------------------------------------------------*/
        return view("Items/delete_item",[
            'title'           => $title,
            'main_title'      => $main_title,
            'theme'           => $theme,
            'main_image'      => $main_image,
            'item'            => $item,
            'secondary_title' => $secondary_title,
            'id'              => $id,
        ]);
    }


    public function del_item_validation ( $id )
    {

        $item            = Item::where('id','=',$id)->first();
        $categorie       = Categorie::where('id','=',$item->categorie_id)->first();
        $items_remaining = Item::where('categorie_id','=',$item->categorie_id)->get();

        if( count($items_remaining) == 1){
            $categorie->delete();
        }

        $old_img_name        = $item->image->content;
        $old_img_name_hashed = time().'.'.$item->image->content;

        Storage::move("public/img/".$old_img_name,"public/icon/deleted/".$old_img_name_hashed);
        $item->image->delete();
        $item->price->delete();
        $item->delete();
        
        return redirect('list');


    }


    public function add_item ()
    {

        /*----------------------------------------------------------------------------*/
            $title           = RootData::find(1);
        /*----------------------------------------------------------------------------*/
            $main_title      = UrlText::find(5);
        /*----------------------------------------------------------------------------*/
            $main_image      = RootData::find(3);
        /*----------------------------------------------------------------------------*/
            $theme           = RootData::find(4);
        /*----------------------------------------------------------------------------*/
            $secondary_title = SecondaryTitle::find(4);
        /*----------------------------------------------------------------------------*/
        return view("Items/add_item",[
            'title'           => $title,
            'main_title'      => $main_title,
            'theme'           => $theme,
            'main_image'      => $main_image,
            'secondary_title' => $secondary_title,
        ]);
    }

    public function add_item_validation ( Request $request )
    {

        $validated = $request->validate([
            'name'        => ['required',new OnlyLettersAllowed,'max:30',new WordMax($request->name,3)],
            'categorie'   => ['required',new OnlyLettersAllowed,'max:15',new WordMax($request->categorie,2)],
            'image'       => ['required','file','max:5000','mimes:jpg,jpeg,png'],
            'price'       => ['required','numeric'],
            'description' => ['required','max:100',new WordMax($request->description,15)],
        ]);

        if($validated){

            $image_name = $request->image->getClientOriginalName();

            if( strlen($image_name) < 41 ){
                
                $categorie   = Categorie::where("name","=",$request->categorie)->first();

                if($categorie){
                    
                    $item = Item::create([
                        'name'         => $request->name,
                        'description'  => $request->description,
                        'categorie_id' => $categorie->id,
                    ]);
                    
                    $price = Price::create([
                        'content' => $request->price,
                        'item_id' => $item->id, 
                    ]);
                    
                    $image = Image::create([
                        'content' => $image_name,
                        'item_id' => $item->id, 
                    ]);

                    $image_name_hased = time().'.'.$image_name;

                    if(Storage::disk('local')->exists("public/img/".$image_name)){
                        Storage::move("public/img/".$image_name,"public/img/deleted/".$image_name_hased);         
                    }

                    Storage::putFileAs('public/img/',$request->image,$image_name);
                    return redirect('list');

                }else{
                    
                    $new_categorie = Categorie::create([
                        'name' => $request->categorie,
                    ]);

                    $item = Item::create([
                        'name'         => $request->name,
                        'description'  => $request->description,
                        'categorie_id' => $new_categorie->id,
                    ]);
                    
                    $price = Price::create([
                        'content' => $request->price,
                        'item_id' => $item->id, 
                    ]);
                    
                    $image = Image::create([
                        'content' => $image_name,
                        'item_id' => $item->id, 
                    ]);


                    $image_name_hased = time().'.'.$image_name;

                    if(Storage::disk('local')->exists("public/img/".$image_name)){
                        Storage::move("public/img/".$image_name,"public/img/deleted/".$image_name_hased);         
                    }

                    Storage::putFileAs('public/img/',$request->image,$image_name);
                    return redirect('list');
                    
                }
            }else{
                return back()->with("fail","le nom de l'image ne doit pas depasser 40 caractères.");
            }
        }else{
            return back()->with("fail","une erreur c'est produite, veillez reéssayer plutard!");
        }
    }
}
