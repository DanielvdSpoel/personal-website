<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactRequest as ContactRequestModel;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(ContactRequest $request)
    {
        $data = $request->validated();
        Mail::to(config('app.contact_form_email'))->send(new ContactMessage($data['name'], $data['message'], $data['email']));
        ContactRequestModel::create($data);

        return redirect()->back();
    }
}
