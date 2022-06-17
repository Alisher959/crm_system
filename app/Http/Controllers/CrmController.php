<?php

namespace App\Http\Controllers;

use App\Models\Crm;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function crm(Request $request)
    {
        

        $request->validate([
            'date' => 'required|max:80',
            'person' => 'required|max:100',
            'take' => 'required',
            'give' => 'required',
            'message' => 'required|max:2000',
        ]);
        $product = new Crm;
        $product->date = $request->date;
        $product->person = $request->person;
        $product->take = $request->take;
        $product->give = $request->give;
        $alisher = ($request->take)-($request->give);
        $product->remained = $alisher;
        $product->message = $request->message;
        $product->save();
        return response()->json([
            'date:' =>$product->date,
            'person:' =>$product->person,
            'take:' =>$product->take,
            'give:' =>$product->give,
            'remained:' =>$product->remained,
            'message:' =>$product->message,
        ], 200);
    }

    public function all_data(){
        $crm = Crm::all();
        $take = Crm::sum('take');
        $give = Crm::sum('give');
        $remained_all = ($take)-($give);

        return response()->json([
            'take_all:' =>$take,
            'give_all:' =>$give,
            'remained_all:' =>$remained_all,            
        ], 200);
    }
    
}
