<?php

namespace App\Http\Controllers;
use App\HairBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\product;
use App\Bill;
use App\BillDetails;
use App\Contacts;
use App\Customer;
use App\Slide;
use App\User;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //
    public function getIndexProduct(){
        $new_products = Product::orderBy('id','DESC')->get();
        return view('admin.product.list')->with(['products'=>$new_products]);
    }

    public function postProductDelete($id){
        $products = product::find($id);
        $products->delete();
        return redirect()->back()->with('xoasanphamthanhcong','Xóa sản phẩm thành công');

    }

    public function getProductAdd(){
        return view('admin.product.add');
    }

    public function postProductAdd(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer',
            'status' => 'required'
        ],
        [
            'title.required' => 'Bạn phải nhập tên sản phẩm',
            'image.required' => 'Bạn phải nhập hình cho sản phẩm',
            'price.required' => 'Bạn phải nhập giá cho sản phẩm',
            'price.integer' => 'Giá phải là số nguyên',
            'status.required' => 'Phải chọn status'
        ]);

        $product = new Product() ;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->status = $request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect()->back()->with('error','Chỉ được là file hình');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("assets/img/".$image)){
                $image = Str::random(4)."_".$name;
            }
            $file->move('assets/img',$image);
            $product->image = $image;
        }else{
            $product->image = '';
        }
        $product->save();
        return redirect()->back()->with('themthanhcong','Thêm sản phẩm thành công');
    }

    public function getProductEdit($id){
        $product = product::find($id);
        return view('admin.product.edit',['product'=>$product]);
    }

    public function postProductEdit(Request $request,$id){
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required',
            'price' => 'required|integer',
            'status' => 'required'
        ],
        [
            'title.required' => 'Bạn phải nhập tên sản phẩm',
            'image.required' => 'Bạn phải nhập hình cho sản phẩm',
            'price.required' => 'Bạn phải nhập giá cho sản phẩm',
            'price.integer' => 'Giá phải là      nguyên',
            'status.required' => 'Phải chọn status'
        ]);
        $product = product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->status = $request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect()->back()->with('error','Chỉ được là file hình');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("assets/img/".$image)){
                $image = Str::random(4)."_".$name;
            }
            $file->move('assets/img',$image);
            unlink("assets/img/".$product->image);
            $product->image = $image;
        }
        $product->save();
        return redirect()->back()->with('suathanhcong','Sửa sản phẩm thành công');
    }

    public function getIndexBooking(){
        $booking = HairBooking::orderBy('id', 'DESC')->get();;
        return view('admin.booking.list')->with(['bookings'=>$booking]);
    }

    public function getBookingAdd(){
        return view('admin.booking.add');
    }

    public function postBookingAdd(Request $request){
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
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 kí tự',
            'date.required' => 'Vui lòng nhập vào ngày/tháng/năm',
            'date.date_format' => 'Vui lòng nhập đúng định dạng ngày tháng năm',
            'time.required' => 'Vui lòng nhập thời gian',
            'time.date_format' => 'Vui lòng nhập thời gian đúng định dạng'
        ]);
        $booking = new HairBooking() ;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->save();
        return redirect()->back()->with('themlichthanhcong','Thêm lịch thành công');
    }

    public function getBookingEdit($id){
        $booking = HairBooking::find($id);
        return view('admin.booking.edit',['booking'=>$booking]);
    }

    public function postBookingEdit(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date' => 'date_format:Y-m-d|after:today',
            'time' => 'required|date_format:H:i'
        ],
        [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 kí tự',
            'date.required' => 'Vui lòng nhập vào ngày/tháng/năm',
            'date.date_format' => 'Vui lòng nhập đúng định dạng ngày tháng năm',
            'date.after' => 'Quá ngày rồi',
            'time.required' => 'Vui lòng nhập thời gian',
            'time.date_format' => 'Vui lòng nhập thời gian đúng định dạng'
        ]);
        $booking = HairBooking::find($id);
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->save();
        return redirect()->back()->with('sualichthanhcong','Sửa lịch thành công');
    }

    public function postBookingDelete($id){
        $bookings = HairBooking::find($id);
        $bookings->delete();
        return redirect()->back()->with('xoalichthanhcong','Xóa lịch thành công');

    }

    public function getBill(){
        $bill = Bill::orderBy('id','DESC')->get();
        return view('admin.cart.list')->with(['bills'=>$bill]);
    }

    public function postBillDelete($id){
        $bill = Bill::find($id);
        $bill->delete();
        return redirect()->back()->with('xoadonhangthanhcong','Xóa đơn hàng thành công');
    }

    public function getBillDetail(){
        $bill_detail = BillDetails::orderBy('id','DESC')->get();
        return view('admin.cart-detail.list')->with(['bill_details'=>$bill_detail]);
    }

    public function postBillDetailDelete($id){
        $bill_detail = BillDetails::find($id);
        $bill_detail->delete();
        return redirect()->back()->with('xoachitietthanhcong','Xóa đơn hàng thành công');
    }

    public function getCustomer(){
        $customer = Customer::orderBy('id','DESC')->get();
        return view('admin.customer.list')->with(['customers'=>$customer]);
    }

    public function getCustomerEdit($id){
        $customer = Customer::find($id);
        return view('admin.customer.edit',['customer'=>$customer]);
    }

    public function postCustomerEdit(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'gender' => 'required',
            'address' => 'required'
        ],
        [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'phone_number.required' => 'Vui lòng nhập mật khẩu',
            'phone_number.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'phone_number.min' => 'Số điện thoại phải có ít nhất 10 kí tự',
            'gender.required' => 'Vui lòng chọn giới tính',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ]);
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->note = $request->note;
        $customer->save();
        return redirect()->back()->with('suakhachthanhcong','Sửa khách hàng thành công');
    }

    public function postCustomerDelete($id){
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->back()->with('xoakhachthanhcong','Xóa khách hàng thành công');
    }

    public function getContact(){
        $contact = Contacts::orderBy('id','DESC')->get();
        return view('admin.contact.list')->with(['contacts'=>$contact]);
    }

    public function postContactEdit(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ],
        [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'phone_number.required' => 'Vui lòng nhập mật khẩu',
            'phone_number.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'phone_number.min' => 'Số điện thoại phải có ít nhất 10 kí tự'
        ]);
        $contact = Contacts::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->note = $request->note;
        $contact->save();
        return redirect()->back()->with('sualienhethanhcong','Sửa liên hệ thành công');
    }

    public function getContactEdit($id){
        $contact = Contacts::find($id);
        return view('admin.contact.edit',['contact'=>$contact]);
    }

    public function postContactDelete($id){
        $contact = Contacts::find($id);
        $contact->delete();
        return redirect()->back()->with('xoalienhethanhcong','Xóa liên hệ thành công');
    }

    public function getSlide(){
        $slide = Slide::orderBy('id','DESC')->get();
        return view('admin.slide.list')->with(['slides'=>$slide]);
    }

    public function getSlideAdd(){
        return view('admin.slide.add');
    }

    public function postSlideAdd(Request $request){
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required'
        ],
        [
            'image.required' => 'Bạn phải nhập hình cho sản phẩm',
            'status.required' => 'Phải chọn status'
        ]);

        $product = new Slide() ;
        $product->name = $request->name;
        $product->link = $request->link;
        $product->status = $request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect()->back()->with('error','Chỉ được là file hình');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("assets/img/".$image)){
                $image = Str::random(4)."_".$name;
            }
            $file->move('assets/img',$image);
            $product->image = $image;
        }else{
            $product->image = '';
        }
        $product->save();
        return redirect()->back()->with('themslidethanhcong','Thêm Slide thành công');
    }

    public function getSlideEdit($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit',['slide'=>$slide]);
    }

    public function postSlideEdit(Request $request,$id){
        $this->validate($request,[
            'image' => 'required',
            'status' => 'required'
        ],
        [
            'image.required' => 'Bạn phải nhập hình cho sản phẩm',
            'status.required' => 'Phải chọn status'
        ]);
        $slide = Slide::find($id);
        $slide->link = $request->link;
        $slide->date = $request->date;
        $slide->status = $request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect()->back()->with('error','Chỉ được là file hình');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("assets/img/".$image)){
                $image = Str::random(4)."_".$name;
            }
            $file->move('assets/img',$image);
            unlink("assets/img/".$slide->image);
            $slide->image = $image;
        }
        $slide->save();
        return redirect()->back()->with('suaslidethanhcong','Sửa sản phẩm thành công');
    }

    public function postSlideDelete($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->back()->with('xoaslidethanhcong','Xóa Slide thành công');
    }

    public function getUser(){
        $user = User::all();
        return view('admin.user.list')->with(['users'=>$user]);
    }

    public function getUserAdd(){
        return view('admin.user.add');
    }

    public function postUserAdd(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'password' => 'required|min:3|max:32'
        ],
        [
            'name.required' => 'Bạn phải nhập tên người dùng',
            'email.required' => 'Phải điền email',
            'email.email' => 'Phải điền email đúng định dạng',
            'phone.required' => 'Nhập số điện thoại',
            'phone.regex' => 'Phải nhập số từ 0 - 9',
            'phone.min' => 'Số điện thoại có ít nhất 10 chữ số',
            'phone.max' => 'Số điện thoại có nhiều nhất 10 chữ số',
            'password.required' => 'Phải điền mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
            'password.max' => 'Mật khẩu có nhiều nhất 32 kí tự',
            'email.unique' => 'Email đã tồn tại'
        ]);

        $user = new User() ;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('themuserthanhcong','Thêm User thành công');
    }

    public function getUserEdit($id){
        $user = User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    public function postUserEdit(Request $request,$id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'password' => 'required|min:3|max:32'
        ],
        [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'phone.required' => 'Vui lòng nhập mật khẩu',
            'phone.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 kí tự',
            'password.required' => 'Phải điền mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
            'password.max' => 'Mật khẩu có nhiều nhất 32 kí tự',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->save();
        return redirect()->back()->with('suauserthanhcong','Sửa User thành công');
    }

    public function postUserDelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('xoauserthanhcong','Xóa User thành công');
    }

    public function getLoginAdmin(){
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request){
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:3|max:32'
            ],
            [
                'email.required' => 'Vui lòng nhập Email',
                'email.email' => 'Vui lòng nhập đúng định dạng email',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
                'password.max' => 'Mật khẩu chỉ được tối đa 32 kí tự'
            ]
        );
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('admin/product/admin-list-product');
        }else{
            return redirect()->back()->with('errordangnhap','Sai tài khoản hoặc mật khẩu');
        }


    }

    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('admin/login');
    }
}
