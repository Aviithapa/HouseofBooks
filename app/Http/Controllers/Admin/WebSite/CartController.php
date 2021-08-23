<?php


namespace App\Http\Controllers\Admin\WebSite;


use App\Http\Controllers\Admin\BaseController;
use App\Modules\Backend\Authentication\User\Repositories\UserRepository;
use App\Modules\Backend\Website\Cart\Repositories\CartRepository;
use App\Modules\Backend\Website\Product\Requests\CreateProductRequest;
use App\Modules\Backend\Website\Product\Requests\UpdateProductRequest;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Auth;

class CartController extends BaseController
{
    private $cartRepository, $log, $userRepository;

    /**
     * CategoryController constructor.
     * @param Log $log
     * @param CartRepository $cartRepository
     * @param UserRepository $userRepository
     */
    public function __construct(Log $log,CartRepository $cartRepository, UserRepository $userRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->userRepository=$userRepository;
        $this->log = $log;
        parent::__construct();
    }


    public function index()
    {
        $request = $this->cartRepository->getAll();
        return $this->view('web-site.cart.index',compact('request'));
    }

    public function destroy($id)
    {
        try {
            if(isset($request->hard_delete))
                $this->cartRepository->hardDelete($id);
            else
                $this->cartRepository->delete($id);
            session()->flash('success', 'Content deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            $this->log->error('Content delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $createProductRequest)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

            $cart = $this->cartRepository->findById($id);
            $user = $this->userRepository->findById($cart->user_id);
            return $this->view('web-site.cart.show', compact('cart', 'user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $updateProductRequest, $id)
    {
    }

}
