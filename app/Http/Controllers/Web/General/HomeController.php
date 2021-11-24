<?php

namespace App\Http\Controllers\Web\General;

use App\Http\Controllers\Admin\WebSite\FacultyController;
use App\Http\Controllers\Admin\WebSite\ProductController;
use App\Http\Controllers\Web\BaseController;
use App\Models\Auth\Role;
use App\Models\Auth\User;
use App\Models\Website\Cart;
use App\Models\Website\Contact;
use App\Models\Website\Donation;
use App\Models\Website\GetTouch;
use App\Models\Website\Help;
use App\Models\Website\Order;
use App\Models\Website\OrderItem;
use App\Models\Website\Product;
use App\Models\Website\StoreRequestQuote;
use App\Modules\Backend\Authentication\Role\Repositories\RoleRepository;
use App\Modules\Backend\Authentication\User\Repositories\UserRepository;
use App\Modules\Backend\Countries\Country\Repositories\CountryRepository;
use App\Modules\Backend\Disciplines\Discipline\Repositories\DisciplineRepository;
use App\Modules\Backend\Levels\Level\Repositories\LevelRepository;
use App\Modules\Backend\Schools\School\Repositories\SchoolRepository;
use App\Modules\Backend\Schools\SchoolProgram\Repositories\SchoolProgramRepository;
use App\Modules\Backend\Website\Blog\Repositories\BlogRepository;
use App\Modules\Backend\Website\Cart\Repositories\CartRepository;
use App\Modules\Backend\Website\Category\Repositories\CategoryRepository;
use App\Modules\Backend\Website\Coupons\Repositories\CouponsRepository;
use App\Modules\Backend\Website\Donation\Repositories\DonationRepository;
use App\Modules\Backend\Website\Event\Repositories\EventRepository;
use App\Modules\Backend\Website\Faculty\Repositories\FacultyRepository;
use App\Modules\Backend\Website\Order\Repositories\OrderRepository;
use App\Modules\Backend\Website\Order\Requests\UpdateOrderRequest;
use App\Modules\Backend\Website\OrderItem\Repositories\OrderItemRepository;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Product\Repositories\ProductRepository;
use App\Modules\Backend\Website\Semester\Repositories\SemesterRepository;
use App\Modules\Frontend\Website\Slider\Repositories\SliderRepository;
use App\Save;
use http\Exception\UnexpectedValueException;
use http\Message\Body;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\PostDec;
use Session;
use Models;


class HomeController extends BaseController
{
    private $sliderRepository, $view_data, $postRepository,$semesterRepository,$productRepository,$cartRepository,$facultyRepository;
    private $roleRepository;
    private $userRepository;
    private $orderRepository;
    private $orderItemRepository,$blogRepository;
    private $request,$semester;
    private $couponRepository;

    public function __construct(SliderRepository $sliderRepository,
                                PostRepository $postRepository,
                                RoleRepository $roleRepository,
                                UserRepository $userRepository,
                                OrderRepository $orderRepository,
                                OrderItemRepository $orderItemRepository,
                                BlogRepository $blogRepository,CouponsRepository $couponRepository,
                                Request $request,FacultyRepository $facultyRepository,SemesterRepository $semesterRepository,  ProductRepository $productRepository,CartRepository $cartRepository)
    {
        $this->sliderRepository = $sliderRepository;
        $this->postRepository = $postRepository;
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
        $this->facultyRepository= $facultyRepository;
        $this->productRepository= $productRepository;
        $this->cartRepository=$cartRepository;
        $this->semesterRepository=$semesterRepository;
        $this->orderRepository=$orderRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->blogRepository=$blogRepository;
        $this->couponRepository=$couponRepository;
        $this->request = $request;

        parent::__construct();
    }

    public function index()
    {
        return view('web.pages.index');
    }

    public function resetPasswordWithCode($code)
    {
        $isUser = false;
        if ($code === '' && $code === null) {
            $isUser = false;
        }
        $user = $this->userRepository->findByFirst('password_change_code', $code, '=');
        if ($user) {
            $isUser = true;
        }

        return view('auth.changePassword', compact('user', 'isUser', 'code'));

    }

    public function resetPasswordStore()
    {
        try {
            $user = $this->userRepository->findByFirst('password_change_code', $this->request->code, '=');
            $data['password'] = bcrypt($this->request->password);
            $userData = $this->userRepository->update($data, $user->id);
//            $this->sendResetLinkEmail($request);
            session()->flash('success', 'New password has been save successfully.Please login with your credentials');
            return redirect()->route('login');

        } catch (\Exception $e) {
//            $this->log->error('User update : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }


    }


    public function slug($slug = null, Request $request)
    {
        $slug = $slug ? $slug : 'index';
        $this->view_data['pageContent'] = $this->postRepository->findBySlug($slug, false);
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['authUser']=Auth::User();
        $file_path = resource_path() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'web/pages' . DIRECTORY_SEPARATOR . $slug . '.blade.php';
        if (file_exists($file_path)) {
            switch ($slug) {
                case 'index':
                    $this->view_data['banners'] = $this->postRepository->findBy('type', 'homepage_banner', '=',false,3);
                    $this->view_data['banner'] = $this->postRepository->findById(139);
                    $this->view_data['add'] = $this->postRepository->findById(125);
                    $this->view_data['add1'] = $this->postRepository->findById(126);
                    $this->view_data['testimonial'] = $this->postRepository->findBy('type', 'testimonial', '=');
                    $this->view_data['motivational'] = $this->productRepository->Nobel('motivational');
                    $this->view_data['knowledge'] =$this->productRepository->Nobel('skills-knowledge');
                     $this->view_data['frictionals'] =$this->productRepository->Nobel('fictional');
                    $this->view_data['biographies'] =  $this->productRepository->Nobel('biography');
                    $this->view_data['loksewa'] = $this->productRepository->BrandNewBook('medical-examination');
                    $this->view_data['loksewas'] = $this->productRepository->BrandNewBook('loksewa-examination');
                    $this->view_data['nepali_novel'] = $this->productRepository->BrandNewBook('nepali_novel');
                    $this->view_data['coursebook'] =$this->productRepository->BrandNewBook('coursebook');
                    $this->view_data['two_coursebook']=$this->productRepository->coursebook("+2");
                    $this->view_data['questionbankandsolution'] = $this->productRepository->BrandNewBook('question-bank-and-solution');
                    $this->view_data['Rakshya'] =$this->productRepository->BrandNewBook('Rakshya');
                    $this->view_data['question'] = $this->postRepository->findById(135);
                    $this->view_data['course'] = $this->postRepository->findById(136);
                    $this->view_data['entrance'] = $this->postRepository->findById(137);
                    $this->view_data['second'] = $this->postRepository->findById(138);
                    $this->view_data['popup'] = $this->postRepository->findById(153);
                    $this->view_data['secondhand_banner'] = $this->postRepository->findById(156);
                     break;
                case 'catalog':
                    $this->view_data['products'] = Product::paginate(18);
                    $this->view_data['faculty'] =$this->facultyRepository->getAll();
                    $this->view_data['semester'] =$this->semesterRepository->getAll();
                    break;
                case 'productlist':
                    $this->view_data['products'] =Product::paginate(6);
                    break;
                case 'about':
                    $this->view_data['question'] = $this->postRepository->findById(135);
                    $this->view_data['course'] = $this->postRepository->findById(136);
                    $this->view_data['entrance'] = $this->postRepository->findById(137);
                    $this->view_data['second'] = $this->postRepository->findById(138);
                    $this->view_data['aboutBanner'] = $this->postRepository->findById(127);
                    $this->view_data['dipesh'] = $this->postRepository->findById(130);
                    $this->view_data['abhishek'] = $this->postRepository->findById(131);
                    $this->view_data['hemanti'] = $this->postRepository->findById(132);
                    $this->view_data['tilak'] = $this->postRepository->findById(133);
                    $this->view_data['binaya'] = $this->postRepository->findById(134);
                    break;
                case 'contact':
                    $this->view_data['contactBanner'] = $this->postRepository->findById(128);
                    break;
                case 'request':
                    $this->view_data['contactBanner'] = $this->postRepository->findById(128);
                    break;
                case 'search':
                    $this->view_data['notFound'] = $this->postRepository->findById(150);
                    break;
                case 'privacy':
                    $this->view_data['privacy'] = $this->postRepository->findById(129);
                    break;
                case 'orderConfirmation':
                    $order=$this->orderRepository->findByFirst('user_id',auth()->user()->id,'=');
                    $orderlist=$this->orderItemRepository->findBy('order_id', $order->id, '=');
                    foreach ($orderlist as $orders) {
                        $product = $this->productRepository->findBy('id', $orders->product_id, '=');
                    }
                    break;
                case 'blog':
                    $this->view_data['first_blog']=$this->blogRepository->findById(1);
                    $this->view_data['product']=$this->productRepository->findById($this->view_data['first_blog']['product_id']);
                    $this->view_data['second_blog']=$this->blogRepository->findById(2);
                    $this->view_data['second_product']=$this->productRepository->findById($this->view_data['second_blog']['product_id']);
                    $this->view_data['third_blog']=$this->blogRepository->findById(3);
                    $this->view_data['third_product']=$this->productRepository->findById($this->view_data['third_blog']['product_id']);

                    break;
                case 'termsandcondition':
                    $this->view_data['terms']=$this->postRepository->findById(152);
                    break;

                case 'sell-book-index':
                    $this->view_data['terms']=$this->postRepository->findById(152);
                    $this->view_data['sell_book_banner']=$this->postRepository->findById(146);
                    $this->view_data['work_banner']=$this->postRepository->findById(147);
                    $this->view_data['learn_more_banner']=$this->postRepository->findById(148);
                    $this->view_data['learn_more_btn']=$this->postRepository->findById(149);
                    break;
                case 'secondhandbookcatalog':
                    $this->view_data['books'] =$this->productRepository->secondHand('coursebook');
                    $this->view_data['motivational'] =$this->productRepository->secondHand('novel');
                    $this->view_data['question'] =$this->productRepository->secondHand('question-bank-and-solution');
                    $this->view_data['loksewa'] =$this->productRepository->secondHand('loksewa-examination');
                    $this->view_data['banner'] =$this->postRepository->findById(144);
                    $this->view_data['products'] =$this->productRepository->findBy('category','second-hand','=') ;
                    break;
                case 'productDetails':
                $this->view_data['company_info'] = $this->postRepository->findById(2);
                $this->view_data['testimonials'] = $this->postRepository->findBy('type', 'testimonial', '=');
                $this->view_data['services'] = $this->postRepository->findBy('type', 'services', '=', false, 6);
                $this->view_data['Subscribe'] = $this->postRepository->findById(9);
                break;
                case 'profile':
                    $this->view_data['authUser']=Auth::User();
                    $this->view_data['order']=$this->orderRepository->findBy('user_id',auth()->user()->id,'=');
                break;
                case 'give-away':
                    $this->view_data['products'] =$this->productRepository->findBy('give_away','yes','=') ;
                    break;
            }
                    return view('web.pages.' . $slug, $this->view_data);
        }
        // 3. No page exist (404)
        return view('web.pages.404', $this->view_data);

    }

    public function home($slug=null, Request $request){
        $slug = $slug ? $slug : 'index';
        $this->view_data['banner'] = $this->postRepository->findById(143);
        return view('web.pages.home' , $this->view_data);
    }
    public function UniversityCatalog($category=null, $university=null, Request $request){
        $category = $category ? $category : 'coursebook';
        $university = $university ? $university : 'TU';
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['faculty'] =$this->facultyRepository->getAll();
        $this->view_data['semester'] =$this->semesterRepository->getAll();
        $this->view_data['products']=$this->productRepository->getAll()->where('sub_category','=',$category)
            ->where('status','=','active')
            ->where('university','=',$university);
        return view('web.pages.catalog.universityCatalog' , $this->view_data);
    }

    public function levelCatalog($slug=null,Request $request){
        $slug = $slug ? $slug : '+2';
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['faculty'] =$this->facultyRepository->getAll();
        $this->view_data['semester'] =$this->semesterRepository->getAll();
        $this->view_data['products']=$this->productRepository->getAll()->where('sub_category','coursebook')
            ->where('status','active')
            ->where('category','brand-new')
            ->where('level',$slug);
        return view('web.pages.catalog.level' , $this->view_data);
    }


    public function NobelCatalog($slug=null, Request $request){
        $slug = $slug ? $slug : 'fictional';
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['faculty'] =$this->facultyRepository->getAll();
        $this->view_data['semester'] =$this->semesterRepository->getAll();
        $this->view_data['products']=$this->productRepository->findBy('nobel_category',$slug,'=',true,12);
        return view('web.pages.catalog.NobelCatalog' , $this->view_data);
    }
    public function publicationCatalog($slug=null, Request $request){

        $slug = $slug ? $slug : 'asmita';
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['faculty'] =$this->facultyRepository->getAll();
        $this->view_data['semester'] =$this->semesterRepository->getAll();
        $this->view_data['products']=$this->productRepository->findBy('publication',$slug,'=',true,12);

        return view('web.pages.catalog.publication' , $this->view_data);
    }
    public function semesterCatalog($slug=null, Request $request){
        $slug = $slug ? $slug : 'First Semester';
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['faculty'] =$this->facultyRepository->getAll();
        $this->view_data['semester'] =$this->semesterRepository->getAll();
        $this->view_data['products']=$this->productRepository->findBy('semester',$slug,'=',true,12);
        return view('web.pages.catalog.semester' , $this->view_data);
    }
    public function facultyCatalog($category=null, $university=null,$slug=null, Request $request){
        $slug = $slug ? $slug : 'BBA';
        $category = $category ? $category : 'coursebook';
        $university = $university ? $university : 'TU';
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['faculty'] =$this->facultyRepository->getAll();
        $this->view_data['semester'] =$this->semesterRepository->getAll();
        $this->view_data['products']=$this->productRepository->getAll()->where('sub_category','=',$category)
                                                                        ->where('status','=','active')
                                                                        ->where('university','=',$university)
                                                                        ->where('faculty','=',$slug);
        return view('web.pages.catalog.faculty' , $this->view_data);
    }

    public function categoryCatalog($slug=null, Request $request){
        $slug = $slug ? $slug : 'question-bank-and-solution';
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['category'] =$this->facultyRepository->getAll();
        $this->view_data['faculty'] =$this->facultyRepository->getAll();
        $this->view_data['semester'] =$this->semesterRepository->getAll();
        if($slug=="novel"){
            $this->view_data['product']="novel";
        }else {
            $this->view_data['product'] = "others";
        }
        $this->view_data['products']=$this->productRepository->findBy('sub_category',$slug,'=',true,12);
        return view('web.pages.catalog.category' , $this->view_data);
    }

    public function secondhandcatalog($slug=null, Request $request){
        $slug = $slug ? $slug : 'novel';
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['products']=$this->productRepository->getAll()->where('category','=','second-hand')
                                                                        ->where('sub_category','=',$slug)
                                                                        ->where('status',"=",'active')
                                                                        ->where('sold_out', "!=" ,'yes');
        return view('web.pages.secondhand.catalog.novel' , $this->view_data);
    }
     public function productDetails($id=null, Request $request){
         $this->view_data['authUser']=Auth::User();
         $this->view_data['terms']=$this->postRepository->findById(152);
         $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['pageContent'] = $this->postRepository->findBySlug('/productDetails/'.$id, false);
         $this->view_data['product'] = $this->productRepository->findById($id);
         $this->view_data['related_products']=$this->productRepository->RelatedBooks($this->view_data['product']->category,$this->view_data['product']->sub_category,$this->view_data['product']->id);
        return view('web.pages.productDetails' , $this->view_data);

    }

    public function singleBlog($id = null, Request $request){
        $id = $id ? $id : 1;
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['blog'] = $this->blogRepository->findById($id);
        $this->view_data['product']=$this->productRepository->findById($this->view_data['blog']['product_id']);
        return view('web.pages.single-blog' , $this->view_data);

    }

    public function filter(Request $request){
        $university = $request->university;
        $publication= $request->publication;
         $course= $request->course;
         if ($course == "BBS"){
             $semester= $request->semesters;
         }else{
             $semester= $request->semester;
         }

        $this->view_data['products']=$this->productRepository->getAll()->where('university','=',$university)
                                                                        ->where('publication','=',$publication)
                                                                        ->where('status',"=",'active')
                                                                        ->where('faculty','=',$course)
                                                                        ->where('semester','=',$semester);
        return view('web.pages.catalog.filter' , $this->view_data);
    }

    public function filters(Request $request){
        $publication= $request->publication;
        $course= $request->course;
        $year=$request->year;

        $this->view_data['products']=$this->productRepository->getAll()
            ->where('publication','=',$publication)
            ->where('status',"=",'active')
            ->where('faculty','=',$course)
            ->where('semester','=',$year);
        return redirect()->back()->with($this->view_data);
    }

    public function donation($id,Request $request){
        $this->view_data['id']=$id;
        return view('web.pages.donation',$this->view_data);
    }
    public function Help(Request $request){
        try {
            $help = new Help();
            $help->name = $request->name;
            $help->phone = $request->phone;
            $help->email = $request->email;
            $help->problem = $request->problem;
            $help->message = $request->message;
            $help->save();
            session()->flash('success',"We will Contact you soon");
            return  redirect('/');


        }catch (\UnexpectedValueException $e){

        }
    }

    public function Order(Request $request){
        try{
            $this->view_data['cod'] = $this->postRepository->findById(151);
            $this->view_data['terms']=$this->postRepository->findById(152);
            $data=new Order();
            $data->name=$request->name;
            $data->address=$request->address;
            $data->payment_method=$request->payment_method;
            $data->phone_number=$request->phone_number;
            $data->email=auth()->user()->email;
            $data['user_id']=auth()->user()->id;
            $data['grand_total']=getCartTotalPrice();
            $data['item_count']=getTotalQuanity();
            $data['status'] = "received";
            $data->save();
            if ($data) {
                $items =Cart::all()->where('user_id','=',auth()->user()->id);
                foreach ($items as $item)
                {
                    $orderItem = new OrderItem([
                        'order_id'      => $data['id'],
                        'product_id'    =>  $item->product_id,
                        'quantity'      =>  $item->quantity,
                        'price'         =>  $item->product_price
                    ]);
                    $data->items()->save($orderItem);
                }
                $items=Cart::all()->where('user_id','=',auth()->user()->id);
                foreach ($items as $item)
                {
                    Cart::destroy($item->id);
                }
                $order=$this->orderRepository->findById($data->id);
                $orderlist=$this->orderItemRepository->findBy('order_id', $data->id, '=');
                foreach ($orderlist as $orders) {
                    $product = $this->productRepository->findBy('id', $orders->product_id, '=');
                }
                $mailData = array('name'=>  $data->name ,'order' =>$order, 'orderlist' =>$orderlist,'product' => $product);
                Mail::send('emails.orderplacement', $mailData, function($message) use ($mailData) {
                    $message->to('houseofbooksnepal@gmail.com')
                        ->subject('Welcome to  House of Books');
                    $message->from('sales@houseofbooks.com.np');
                });
                return view('web.pages.orderConfirmation',compact('order','orderlist','product'));
            }
        }catch (\Exception $ex){
            dd($ex);
        }
    }


    public function cart(){
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cart'] = $this->cartRepository->getAll()->where('user_id','=',Auth::user()->id);
       $isCoupon="";
         return view('web.pages.cart' , $this->view_data,compact('isCoupon'));
    }

    public function addtocart(Request $request, $id)
    {
            $mac_address = exec('getmac');
            $mac = strtok($mac_address, ' ');
            $available_quantity = Product::find($request->id)->quantity;
            $cart_info = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
            if ($cart_info) {
                $old_cart_quantity = $cart_info->quantity;
            } else {
                $old_cart_quantity = 0;
            }

            if ($old_cart_quantity != null) {
                $data['quantity'] = $cart_info->quantity + 1;
                $cart = $this->cartRepository->update($data, $cart_info->id);
                if ($cart == false) {
                    return response()->json(['Error while Adding to  Cart']);
                }
                return response()->json(['Book Has Been Successfully added to Cart']);
            } else if ($available_quantity >= ($request->quantity + $old_cart_quantity)) {
                $data = new Cart();
                $mac_address = exec('getmac');
                $mac = strtok($mac_address, ' ');
                $user = Auth::user()->id;
                $product = $this->productRepository->findById($id);
                $data->product_name = $product->name;
                $data->product_price = $product->price;
                $data->product_id = $product->id;
                $data->quantity = "1";
                $data->user_id = $user;
                $data->mac = $mac;
                $data->image = $product->image;
                $datas = Array($product);
                $datas['sold_out'] = "yes";
                $datas['quantity'] = $product->quantity - 1;
                $product = $this->productRepository->update($datas, $id);
                $data->save();
            } else {
                $short_amount = $request->quantity - $available_quantity;
         //       session()->flash('danger', 'not available quantity, shortage amount is ' . $short_amount);
                return  response()->json(['not available quantity, shortage amount is']);
            }
            return response()->json(['Book Has Been Successfully added to Cart']);
    }
    public function checkout(Request $request){
        $this->view_data['cod'] = $this->postRepository->findById(151);
        $this->view_data['terms']=$this->postRepository->findById(152);
        $this->view_data['cart'] = $this->cartRepository->getAll()->where('user_id','=',Auth::user()->id);
        $coupons=$request->coupons;
        $isCoupon=$this->couponRepository->Coupon($coupons);
        $cartDetails=$this->orderRepository->findByFirst('user_id','=',Auth::user()->id);
        $data=$cartDetails;
        $data['coupons_total']=$cartDetails->grand_total;
        $couponsDiscount=0;
        if($isCoupon){
            $couponsDiscount=$isCoupon;
            $total= $cartDetails->grand_total - (($cartDetails->grand_total*$isCoupon)/100);
            $data['coupons_total']=$total;
            $data["coupons_type"]=$coupons;
            $data['coupons_discount']=$isCoupon;
            $cartDetails->update((array)$data);
            return view('web.pages.cart',compact('couponsDiscount',"isCoupon","total"),$this->view_data);

        }else{
            return redirect()->back()->with('error',"Coupon '$coupons' does not exits");
        }
    }
    public function checkouts($coupon=null){
        if ($coupon=="null"){
            $isCoupon =0;
            return view('web.pages.checkout',compact("isCoupon"));
        }else{
            $isCoupon=$coupon;
            return view('web.pages.checkout',compact("isCoupon"));
        }

    }
    public function Contact(Request $req){
        try {
            $this->view_data['terms']=$this->postRepository->findById(152);
            $this->view_data['cod'] = $this->postRepository->findById(151);
            $contact = new Contact();
            $contact->name = $req->name;
            $contact->email = $req->email;
            $contact->phoneNumber = $req->phoneNumber;
            $contact->address = $req->address;
            $contact->message = $req->message;
            $contact->save();
            $this->view_data['contactBanner'] = $this->postRepository->findById(128);
            if ($contact==false){
                return redirect()->back()->with('error',"Error while adding product to the cart");
            }
            return redirect()->back()->with('success',"Your request have been received we will contact you soon");

        } catch (UnexpectedValueException $e) {
            dd($e);
        }
    }

    public function Request(Request $req){
        try {
            $this->view_data['terms']=$this->postRepository->findById(152);
            $this->view_data['cod'] = $this->postRepository->findById(151);
            $request = new \App\Models\Website\Request();
            $request->name = $req->name;
            $request->email = $req->email;
            $request->phoneNumber = $req->phoneNumber;
            $request->bookName = $req->bookName;
            $request->faculty = $req->faculty;
            $request->publication = $req->publication;
            $request->message = $req->message;
            $request->save();
            $this->view_data['contactBanner'] = $this->postRepository->findById(128);
            if ($request==false){
                return redirect()->back()->with('error',"Error while adding your request");
            }
            return redirect()->back()->with('success',"Your request have been received we will contact you soon");

        } catch (UnexpectedValueException $e) {
            dd($e);
        }
    }
    public function search(Request $request)
    {
        if($request->ajax()) {
            $this->view_data['products'] = Product::where('name', 'LIKE', '%' . $request->book . "%")
                                                ->orwhere('author','LIKE', '%' . $request->book . "%")

                ->orwhere('faculty','LIKE', '%' . $request->book . "%")
                ->orwhere('sub_category','LIKE', '%' . $request->book . "%")
                ->orwhere('publication','LIKE', '%' . $request->book . "%")
                ->orwhere('university','LIKE', '%' . $request->book . "%")->get();
            $this->view_data['terms']=$this->postRepository->findById(152);
            return redirect()->route('web.pages.search', $this->view_data)->render();
        }else{
            $this->view_data['cod'] = $this->postRepository->findById(151);
            $this->view_data['products'] = Product::where('name', 'LIKE', '%' . $request->book . "%")
                                            ->orwhere('faculty','LIKE', '%' . $request->book . "%")
                                            ->orwhere('sub_category','LIKE', '%' . $request->book . "%")
                                            ->orwhere('publication','LIKE', '%' . $request->book . "%")
                                            ->orwhere('university','LIKE', '%' . $request->book . "%")
                                             ->orwhere('author','LIKE', '%' . $request->book . "%")
                                           ->get();
            $this->view_data['terms']=$this->postRepository->findById(152);
            $this->view_data['faculty'] = $this->facultyRepository->getAll();
            $this->view_data['semester'] = $this->semesterRepository->getAll();
            $this->view_data['notfound'] = $this->postRepository->findById(150);

            return view('web.pages.search', $this->view_data);
        }
    }

    public function Destroy($id){
        try {
            if(isset($request->hard_delete))
                $this->cartRepository->hardDelete($id);
            else
                $this->cartRepository->delete($id);
            session()->flash('success', 'Content deleted successfully');
            return redirect()->back()->with('success','Product has  been removed from cart list successfully');
        }
        catch (\Exception $e) {
            $this->log->error('Content delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }

    public function ajaxsearch(Request $request){
        // check if ajax request is coming or not

        if($request->ajax()) {
            // select country name from database
            $data =  Product::where('name', 'LIKE', '%' . $request->product . "%")
                ->orwhere('author','LIKE', '%' . $request->product . "%")
                ->orwhere('faculty','LIKE', '%' . $request->product . "%")
                ->orwhere('sub_category','LIKE', '%' . $request->product . "%")
                ->orwhere('publication','LIKE', '%' . $request->product . "%")
                ->orwhere('university','LIKE', '%' . $request->product . "%")
                ->paginate(8);
            // declare an empty array for output
            $output = '';
            $output_id ='';
            // if searched countries count is larager than zero
            if (count($data)>0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 111; width: 77%;">';
                // loop through the result array
                foreach ($data as $row){
                    // concatenate output to the array
                    $output .= '<li class="list-group-item search-item" value="'.$row->id.'"><img src="'.$row->getImage().' " height=50 width="50">' .$row->name.'</li>';
                     $output_id .= $row->id;
                }
                // end of output
                $output .= '</ul>';
            }
            else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item">'.'No results '.'<a href="/request" style="color: blue !important;">'.'Click here to Request Now'.'</a></li>';
            }

            // return output result array
            return $output;
        }
    }

    protected function user()
    {
        $user = Auth::user();
        $role = Role::where('name', 'seller')->first();
        $data['role'] = $role->id;
        $this->userRepository->update((array)$data,Auth::user()->id);
       // $user->attachRole($role,Auth::user()->id);
        return redirect()->route('dashboard.index');

    }


    public function verifyPayment(Request $request)
    {
        if($request->ajax()) {
            return "hello";
        }
    }

}
