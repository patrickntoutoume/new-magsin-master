<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function produit(){
        return view('page.save_prod');
    }

    public function liste(){
       return view('page.liste_prod');
    }
    
    public function save_produit(Request $request){

        $request->validate([
            'name' =>'required|min:3',
            'prix'=>'required' 
        ]);

        $cat= new Category();

        $cat->name= $request->name;
        $cat->prix= $request->prix;
        
        $cat->save();
    
        return redirect()-> route('home');
        

    }

    public function supprimer($id){
    
        Category::destroy($id);
        return redirect()->route('liste');
    }

    public function liste_prod(){
        $categories = Category::all();
        return view('page.liste_prod', compact('categories'));
    }

    public function update($id){
        $category=Category::find($id);
        return view('page.update', compact('category'));
    }

    public function update_prod(Request $request, $id){

        $request->validate([
            
            'name' =>'required|min:3',
            'prix'=>'required' 
        ]);

        $cat= Category::findOrFail($id);

        $cat->name= $request->name;
        $cat->prix= $request->prix;
        
        $cat->save();
        
        return redirect()-> route('liste');
        

    }
}
