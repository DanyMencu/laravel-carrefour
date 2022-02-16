<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Contact;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validazione
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $data = $request->request->all();

        //save in db
        $contact = new Contact();
        $contact->fill($data);
        $contact->save();



        //mail
        Mail::to('admin@carrefour.com')->send(new ContactMessage());




        $data = $request->all();
        return response()->json($data);
    }
}
