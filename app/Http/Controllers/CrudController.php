<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Modles\Offer;
use http\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function getOffers(){
   return Offer::select('id', 'name')->get( );
   }

//   public function store(){
//        Offer::create([
//            'name'=>'ahmed',
//            'price'=>'45050',
//            'details'=>'this is for test'
//        ]);

    public function create(){
        return view('offer.create');
    }

public function getAllOffers(){
       Offer::select('id','name','price','details');
}
    public function store (OfferRequest $request)
    {

//        $rules = $this->getRules();
//        $message = $this->getMessages();
//        $validator = Validator::make($request->all(),$rules,$message);
//        if($validator->fails())
//        {
//            return redirect()->back()->withErrors($validator)->withInputs($request->all());
//        }
       Offer::create([
           'name' => $request->name,
           'price' => $request->price,
           'details' => $request->details
       ]);
        return redirect()->back()->with(['succces'=>'تم اضافة العرض بنجاح']);}}




//    protected function getRules(){
//      return $rules=[
//          'name'=>'required||max:100|unique:offers,name',
//          'price'=>'required||numeric',
//          'details'=>'required|'
//      ];
//    }
//    protected function getMessages(){
//     return  $message = [
//         'name.required'=> __('message.offer name required'),
//         'name.unique'=>__('message.offer name unique'),
//         'price.numeric'=>'الاسم مطلوب في هذا الحقل'
//     ];
//    }


