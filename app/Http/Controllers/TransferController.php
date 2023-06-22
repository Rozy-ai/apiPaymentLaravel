<?php

   namespace App\Http\Controllers;

   use Illuminate\Http\Request;
   use App\Models\Transfer;

   class TransferController extends Controller
   {

    public function index()
    {
     return 11;die;
    }

       public function save(Request $request)
       {
        return 1;die;
        dd($request);
           $transfer = new Transfer();
           $transfer->from_card = $request->input('from_card');
           $transfer->to_card = $request->input('to_card');
           $transfer->amount = $request->input('amount');
           $transfer->save();

           return response()->json(['id' => $transfer->id]);
       }
   }