<?php

namespace App\Http\Controllers;
use App\HairBooking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('page.modal-booking');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i'
        ],
        [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'phone.required' => 'Vui lòng nhập mật khẩu',
            'phone.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 kí tự',
            'date.required' => 'Vui lòng nhập vào ngày/tháng/năm',
            'date.date_format' => 'Vui lòng nhập đúng định dạng ngày tháng năm',
            'time.required' => 'Vui lòng nhập thời gian',
            'time.date_format' => 'Vui lòng nhập thời gian đúng định dạng'
        ]);

        $hair_booking = new HairBooking;
        $hair_booking->name = $request->name;
        $hair_booking->email = $request->email;
        $hair_booking->phone = $request->phone;
        $hair_booking->date = $request->date;
        $hair_booking->time = $request->time;
        $hair_booking->save();
        return back()->with('success', 'We have received your message and would like to thank you for supporting us.');
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
        //
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
        //
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
}
