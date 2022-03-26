<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Modles\Offer;
use http\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use LaravelLocalization;


class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function getAllOffers(){
  $offers= Offer::select('name_'.LaravelLocalization::getCurrentLocale().' as name','price','details_'.LaravelLocalization::getCurrentLocale().' as details')->get();
  return view('offer.all', compact('offers'));
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
           'name_ar' => $request->name_ar,
           'name_en' => $request->name_en,
           'price' => $request->price,
           'details_ar' => $request->details_ar,
           'details_en' => $request->details_en,

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


