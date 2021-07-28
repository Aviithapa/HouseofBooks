<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\WebSite\PostController;
use App\Modules\Backend\Authentication\User\Repositories\UserRepository;
use App\Modules\Backend\Website\Donation\Repositories\DonationRepository;
use App\Modules\Backend\Website\Event\Repositories\EventRepository;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Product\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends BaseController
{
    private $userRepository;
    private $donorRepository;
    private $productRepository, $postRepository;


    public function __construct(UserRepository $userRepository, DonationRepository $donorRepository,
ProductRepository $productRepository,PostRepository $postRepository)
    {
        $this->userRepository = $userRepository;
        $this->donorRepository=$donorRepository;
        $this->productRepository=$productRepository;
        $this->postRepository=$postRepository;
        parent::__construct();
    }

    public function index()
    {
        $role = Auth::user()->mainRole()?Auth::user()->mainRole()->name:'default';
        switch ($role) {
            case 'administrator':
                $book_created=$this->productRepository->getAllInActive();
                return $this->view('dashboard.administrator',compact("book_created"));
                break;
            case 'seller':
                $product = $this->productRepository->findBy('user_id',Auth::user()['id'],'=');
                $terms= $this->postRepository->findById(152);
                return $this->view('dashboard.customer',compact('product',"terms"));
                break;
            case 'customer':
                return $this->view('/');
                break;
            case 'finance':
                return $this->view('/');
            break;
            case 'b2b_agent':
                return $this->view('dashboard.b2b-agent');
                break;
            case 'api_agent':
                return $this->view('dashboard.api-agent');
                break;
            case 'travel_guide':
                return $this->view('dashboard.travel-guide');
                break;
            default:
                return $this->view('dashboard.default');

        }
    }

}
