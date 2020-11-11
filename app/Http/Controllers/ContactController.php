<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactStatus;
use App\Order;
use App\OrderStatus;
use Illuminate\Http\Request;

class ContactController extends GeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $newOrders = Order::WhereIn('order_status_id',[1,2])->count();
        $orderStatus  = OrderStatus::all();
        view()->share([
            'newOrders' => $newOrders,
            'orderStatus' =>  $orderStatus
        ]);
    }

    public function index()
    {
        $status = ContactStatus::all();
        $data = Contact::latest()->paginate(10);
        return view('admin.contact.index',[
            'data' => $data,
            'status' => $status,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email'
        ]);

        //luu vào csdl
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');
        $contact->save();

        // chuyển về trang chủ
        return redirect()->route('shop.contact')
            ->with('msg', 'Cảm ơn bạn đã phản hồi. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        $contact_status = ContactStatus::all();

        return view('admin.contact.edit', [
            'contact' => $contact,
            'contact_status' => $contact_status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $contact = Contact::findorFail($id);
        $id_status = $request->contact_status_id;
        $contact->contact_status_id = $id_status;
        $contact->save();
        return redirect()->route('admin.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function searchContact(Request $request)
    {
        $keyword = $request->input('keyword');
        $status = ContactStatus::all();
        $contact_id = $request->input('contact_id');
        if(empty($contact_id))
        {
            $data = Contact::where('name', 'like', '%' . $keyword . '%')
                ->orWhere('phone', 'like', '%' . $keyword . '%')
                ->paginate(10);
            $data->appends(['keyword'=>$keyword]);
        }else
        {
            $data = Contact::where([
                ['name', 'like', '%' . $keyword . '%'],
                ['contact_status_id', '=', $contact_id],
            ])
                ->orWhere([
                    ['phone', 'like', '%' . $keyword . '%'],
                    ['contact_status_id', '=', $contact_id],
                ])
                ->paginate(10);
            $data->appends(['keyword'=>$keyword, 'contact_status_id'=>$contact_id]);
        }

        return view('admin.contact.searchContact', [
            'data' => $data,
            'keyword' => $keyword ? $keyword : '',
            'status' => $status,
            'contact_id' => $contact_id
        ]);
    }
}
