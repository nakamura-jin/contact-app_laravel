<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Auth\Recaller;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('contact.index');
    }
    public function confirm(Request $request)
    {
        $this->validate($request, Contact::$rules);
        $inputs= new Contact($request->all());
        return view('contact.confirm', ['inputs' => $inputs]);
    }
    public function send(Request $request)
    {
        $action = $request->all();
        unset($action['_token_']);

        if($request->action === '戻る') {
            unset($action['action']);
            return redirect('/contact')
            ->withInput($action);
        } else {
            $contact = new Contact;
            $inputs = $request->all();
            unset($inputs['_token_'], $inputs['action']);
            $contact->fill($inputs)->save();
            return redirect('/complete');
        }
    }
    public function complete(Request $request)
    {
        return view('contact.complete');
    }
}