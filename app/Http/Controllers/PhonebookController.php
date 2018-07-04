<?php

namespace App\Http\Controllers;

use App\Phonebook;
use Illuminate\Http\Request;
use App\Http\Requests\PhonebookRequest;

class PhonebookController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('phonebook');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhonebookRequest $request) {
        $pb = new Phonebook;
        $pb->name = $request->name;
        $pb->email = $request->email;
        $pb->phone = $request->phone;
        $pb->save();
        return $pb;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook) {
        //
    }

    public function getData() {
        return Phonebook::orderBy('name', 'DESC')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(PhonebookRequest $request) {
        //
        $pb = Phonebook::find($request->id);
        $pb->name = $request->name;
        $pb->email = $request->email;
        $pb->phone = $request->phone;
        $pb->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook) {
        Phonebook::where('id', $phonebook->id)->delete();
    }

}
