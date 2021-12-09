<?php


namespace App\Http\Controllers\Web\General;


use App\Http\Controllers\Web\BaseController;
use App\Models\Website\Cart;
use App\Models\Website\Order;
use App\Models\Website\OrderItem;
use App\Modules\Backend\Website\Order\Repositories\OrderRepository;
use App\Modules\Backend\Website\OrderItem\Repositories\OrderItemRepository;
use App\Modules\Backend\Website\Product\Repositories\ProductRepository;
use Illuminate\Http\Request;

class KhaltiController extends BaseController
{

    private $orderRepository;
    private $orderItemRepository;
    private $productRepository;

    public function __construct(OrderRepository $orderRepository,
                                OrderItemRepository $orderItemRepository,
                                Request $request,  ProductRepository $productRepository)
    {

        $this->productRepository= $productRepository;
        $this->orderRepository=$orderRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->request = $request;

        parent::__construct();
    }

    public function verifyPayment(Request $request)
    {

        $token = $request->token;
        $amount= $request->amount;

        $args = http_build_query(array(
            'token' => $token,
            'amount'  => $amount
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        $headers = ["Authorization: Key live_secret_key_b3b7402cb9e94d1e81518bed403469cd"];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response;

    }

    public function storePayment(Request $request)
    {
        $datas=new Order();
        $datas->name=auth()->user()->name;
        $datas->address=auth()->user()->address ;
        $datas->payment_method="KHALTI";
        $datas->phone_number=auth()->user()->phone_number;
        $datas->email=auth()->user()->email;
        $datas['user_id']=auth()->user()->id;
        $datas['grand_total']=getCartTotalPrice();
        $datas['item_count']=getTotalQuanity();
        $datas['status'] = "received";
        $datas->save();
        if ($datas) {
            $items =Cart::all()->where('user_id','=',auth()->user()->id);
            foreach ($items as $item)
            {
                $orderItem = new OrderItem([
                    'order_id'      => $datas['id'],
                    'product_id'    =>  $item->product_id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->product_price
                ]);
                $datas->items()->save($orderItem);
            }
           $datas["payment_status"]="payed";
           $datas->save();
           $items=Cart::all()->where('user_id','=',auth()->user()->id);
            foreach ($items as $item)
            {
                Cart::destroy($item->id);
            }
        }
        $order=$this->orderRepository->findById($datas->id);
        $orderlist=$this->orderItemRepository->findBy('order_id', $datas->id, '=');
        foreach ($orderlist as $orders) {
            $product = $this->productRepository->findBy('id', $orders->product_id, '=');
        }

        $response = ['order' => $order, 'orderlist' => $orderlist , 'product' => $product];
        return $response;
    }

}
