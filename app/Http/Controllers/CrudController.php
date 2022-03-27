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


    // get all Offers from DB
    public function getAllOffers()
    {
        $offers = Offer::select('id', 'name_' . LaravelLocalization::getCurrentLocale() . ' as name', 'price', 'details_' . LaravelLocalization::getCurrentLocale() . ' as details')->get();
        return view('offer.all', compact('offers'));
    }


    // get the page which
    public function create()
    {
        return view('offer.create');
    }


    // crate offer in DB
    public function store(OfferRequest $request)
    {
        $file_extension = $request -> photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = 'images/offers';
        $request -> photo -> move($path,$file_name);


        Offer::create([
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,

        ]);
        return redirect()->back()->with(['succces' => 'تم اضافة العرض بنجاح']);
    }


    // edit the offers
    public function editOffer($offer_id)
    {
        $offer = Offer::find($offer_id);
        if (!$offer)
            return redirect()->back();

        $offer = Offer::select('id','name_ar', 'name_en', 'details_ar', 'details_en', 'price')->find($offer_id);

        return view('offer.edit', compact('offer'));

        return $offer_id;
    }

    public function updateOffer (OfferRequest $request,$offer_id){
        $offer = Offer::find($offer_id);
        if (!$offer)
            return redirect()->back();

        $offer -> update($request -> all());
        return redirect() -> back() -> with(['succes' => 'تم التحديث بنجاح']);



}}



