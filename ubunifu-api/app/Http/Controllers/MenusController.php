<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menus;

class MenusController extends Controller
{
    //
    public function newMenu(){
        $menus = new Menus();
        $menus->category = '';
        $menus->menu_name = '';
        $menus->save();
        return response()->json(
            [
                'status'=>200,
                'mesponse'=>"Successfully inserted!" 
            ],200);
    }

    public function updateMenu(Request $request){ 
        $menus = Menus:: find($request->id);            
        if($menus){
            $menus ->update([
                'category'=>$request->category,
                'menu_name'=>$request->menu_name
            ]);
            return response()->json(
                [
                    'status'=>200,
                    'mesponse'=>"Successfully updated!" 
                ],200
                );
        }else{
            return response()->json(
                [
                    'status'=>500,
                    'mesponse'=>"Error on update!" 
                ],200
                );
        }    
    }

    public function deleteMenu(Request $request){
        $menus = Menus:: find($request->id); 
       if($menus){
        $menus->delete();
            return response()->json(
                [
                    'status'=>200,
                    'mesponse'=>"Successfully deleted!" 
                ],200
                );
        }else{
            return response()->json(
                [
                    'status'=>404,
                    'mesponse'=>"Record not found!" 
                ],200
                );
        } 
    }

    public function fetchMenu(){
        $menu =  Menus::all();
        if($menu ->count() > 0){
            return response()->json(
                [
                    'status'=>200,
                    'menus'=>$menu 
                ],200
                );
        }else{
            return response()->json(
                [
                    'status'=>400,
                    'menus'=>'Menus not found!'
                ],200
                );
        }     
    }

}
