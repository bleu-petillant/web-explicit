<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Reference;
use Illuminate\Http\Request;

class SearchEngineController extends Controller
{
    public function searchByCat(Request $request){
        if ($request->ajax()) {
        $id = $request->id;
        if($id != null){
            $refBycat = Reference::where('category_id',$id)->where('private',0)->get();
                if($refBycat->count() > 0){
                      return response()->json(['status'=>'success',$refBycat]);
                }else{
                    return response()->json(['status'=>'error']);
                }
        }else{
             $refBycat = Reference::where('private',0)->get();
                if($refBycat->count() > 0){
                      return response()->json(['status'=>'success',$refBycat]);
                }else{
                    return response()->json(['status'=>'error']);
                }
        }
    }

    }

    public function searchByQuery(Request $request){
        if ($request->ajax()) {
        $querys = $request->get('query');
        $id = $request->id;

        if($id != null){

            $refWithCat = Reference::where('private',0)->withAnyTag($querys)
                 ->orWhere('title','LIKE','%'.$querys."%")
                 ->orWhere('desc','LIKE','%'.$querys."%")
                 ->whereHas('category', function ($query) use ($id) {
                    $query->where('category_id', $id);
                })->get();

                if($refWithCat->count() > 0){
                     return response()->json(['status'=>'success',$refWithCat]);
                }else{
                    return response()->json(['status'=>'error']);
                }
          
        }else{
            $refNocat =  Reference::where('private',0)->withAnyTag($querys)
                ->where('title','LIKE','%'.$querys."%")
                ->orWhere('desc','LIKE','%'.$querys."%")
                ->get();
                if($refNocat->count() > 0){
                    return response()->json(['status'=>'success',$refNocat]);
                }else{
                    return response()->json(['status'=>'error']);
                }
          
        }


            
               
         
        

       
    }
}
}
