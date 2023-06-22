<?php

   namespace App\Http\Controllers;

   use Illuminate\Http\Request;
   use App\Models\Transfer;
   use Illuminate\Validation\ValidationException;
   use Illuminate\Contracts\Validation\Factory as ValidationFactory;

   class TransferController extends Controller
   {

    protected $validationFactory;

    public function __construct(ValidationFactory $validationFactory)
    {
        $this->validationFactory = $validationFactory;
    }

    public function index()
    {
     return 11;die;
    }

       public function save(Request $request)
       {
            // Валидация данных
        //     $validator = $this->validationFactory->make($request->all(), [
        //    'from_who' => 'required',
        //    'from_card_num' => 'required|numeric',
        //    'from_cvv' => 'required|numeric',
        //    'to_who' => 'required',
        //    'to_card_num' => 'required|numeric',
        //    'to_cvv' => 'required|numeric',
        //    'amount' => 'required|numeric|min:0.01',
        //    ]);

        //    if ($validator->fails()) {
        //     throw new ValidationException($validator);
        //     }
           $transfer = new Transfer();
           $transfer->from_who = $request->input('from_who');
           $transfer->from_card_num = (int)$request->input('from_card_num');
           $transfer->from_cvv = (int)$request->input('from_cvv');
           $transfer->from_date = date('Y-m-d H:i:s', strtotime($request->input('from_date')));
           $transfer->from_date = $request->input('from_date');

           $transfer->to_who = $request->input('to_who');
           $transfer->to_card_num = (int)$request->input('to_card_num');
           $transfer->to_cvv = (int)$request->input('to_cvv');
           $transfer->to_date = $request->input('to_date');
           $transfer->amount = $request->input('amount');
           $transfer->save();

           return response()->json(['id' => $transfer->id]);
       }
   }