<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){

        return view('contact');
    }

    public function store(Request $request)
    {
        $contacts = new ContactForm();
        $contacts->fname = $request->firstname;
        $contacts->lname = $request->lastname;
        $contacts->country = $request->country;
        $contacts->comment = $request->comment;
        $contacts->save();
        return redirect()->route('home');
    }

    public function extractlistData()
    {
       return $readData = ContactForm::all();
    }
     public function listData()
    {
        return view('welcome', ['results' =>  $this->extractlistData()]);
    }

    public function edit($id)
    {
        $editData = ContactForm::find($id);
//        $results = $editData->find($id);
        return view('edit', ['results' => $editData]);
    }

    public function update(Request $request,$id)
    {
        $updateData = ContactForm::find($id);
        $updateData->fname = $request->firstname;
        $updateData->lname = $request->lastname;
        $updateData->country = $request->country;
        $updateData->comment = $request->comment;
        $updateData->save();

        return redirect()->route('home');

    }

    public function destroy(Request $request)
    {
        $deleteData = ContactForm::find($request->id);
        $deleteData->delete();
        return redirect()->route('home');


    }



}
