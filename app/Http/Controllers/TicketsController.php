<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    SiteType,
    SiteCall,
    User
};
use Auth;

class TicketsController extends Controller {

    public function index() {

        $this->data['tickets'] = SiteCall::authorized()->FindByStatus(request()->route()->getName())->paginate(15);
        return $this->render('tickets.list');
    }

    public function create($id = false) {

        $this->data['departments'] = SiteType::departments()->get();
        $this->data['requests'] = SiteType::requests()->get();
        $this->data['devices'] = SiteType::devices()->get();
        $this->data['users'] = User::all();
        $this->data['ticket'] = SiteCall::find($id);
        return $this->render('tickets.create');
    }

    public function store(Request $request, $id = false) {
        $validate = [
            "status" => "required",
            "date" => "required",
            "firstname" => "required|alpha",
            "lastname" => "required|alpha",
            "email" => "required|email",
            "phone" => "required",
            "department" => "required",
            "request" => "required",
            "device" => "required",
            "description" => "required",
            "solution" => "required",
        ];

        if (Auth::user()->user_role == 'admin')
            $validate['staff'] = "required";

        $this->validate($request, $validate);
        $formData = [
            'call_first_name' => $request->get('firstname'),
            'call_last_name' => $request->get('lastname'),
            'call_phone' => $request->get('phone'),
            'call_email' => $request->get('email'),
            'call_department' => $request->get('department'),
            'call_request' => $request->get('request'),
            'call_device' => $request->get('device'),
            'call_details' => $request->get('description'),
            'call_date' => date('Y-m-d', strtotime($request->get('date'))),
            'call_status' => $request->get('status'),
            'call_solution' => $request->get('solution'),
            'call_user' => Auth::id(),
            'call_staff' => Auth::user()->user_role == 'admin' ? $request->get('staff') : Auth::id()
        ]; 

        if ($siteCall = SiteCall::find($id))
            $siteCall->fill($formData)->save();
        else
            SiteCall::create($formData);

        $this->setFlash('success', trans($id?'ticketform.update_sucess':'ticketform.create_sucess'));
        return redirect()->route('ticket.list');
    }

}
