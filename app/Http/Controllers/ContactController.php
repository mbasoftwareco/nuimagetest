<?php

namespace App\Http\Controllers;

use App\Mail\SendContactMail;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail; 

class ContactController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Contact::all();
        return Inertia::render('Contacts', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'comments' => 'required'
            ]
        );

        Contact::create($request->all());

        sleep(1);

        //Send notification email
        ContactController::sendContactMail();

        return redirect()->route('contact.index')
            ->with('message', 'Category Created Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'comments' => 'required'
            ]
        );

        if ($request->has('id')) {
            Contact::find($request->input('id'))->update($request->all());
            return redirect()->back()
                ->with('message', 'Contact Updated Successfully.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Contact::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }


    public function sendContactMail()
    {
        $email = 'jamurco@gmail.com';

        $maildata = [
            'title' => 'New Contact has been created',
            'url' => ''
        ];

        Mail::to($email)->send(new SendContactMail($maildata));

        //dd("Mail sent!");
    }
}
