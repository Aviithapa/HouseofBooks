<?php

namespace App\Http\Controllers\Admin\WebSite;

use App\Http\Controllers\Admin\BaseController;
use App\Mail\SignupEmail;
use App\Models\Website\Post;
use App\Modules\Backend\Authentication\User\Repositories\UserRepository;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Post\Requests\CreatePostRequest;
use App\Modules\Backend\Website\Post\Requests\UpdatePostRequest;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class MailController extends BaseController
{
    private $userRepository, $log;
    public function __construct(Log $log , UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->log = $log;
        parent::__construct();
    }

    public function index()
    {
        $this->authorize('read', $this->postRepository->getModel());
        if(\request()->ajax()) {
            $banners = $this->postRepository->findByDataTable('type','homepage_banner','=');
            return DataTables::of($banners)
                ->editColumn('action', function ($banner) {
                    $data = $banner;
                    $name = 'dashboard.banners';
                    $view = false;
                    return $this->view('partials.common.action', compact('data', 'name', 'view'));
                })
                ->editColumn('banner_image', function ($banner) {
                    $url=asset($banner->getImage());
                    return '<img src='.$url.' border="0" width="40"  />';
//                        return '<img src="'.asset($banner->getImage()).'" border="0" width="40" class="img-rounded" align="center" />';
                })
                ->editColumn('id', 'ID: {{$id}}')
//                    ->rawColumns(['banner_image'])
                ->rawColumns(['banner_image', 'action'])
                ->make(true);

        }
        return $this->view('web-site.mail.index');
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $createPostRequest)
    {
        $this->authorize('read',$this->userRepository->getModel());
        $data = $createPostRequest->all();
        $users=$this->userRepository->getAll();
        $mailData = array('name'=>htmlspecialchars($data['description']));
        Mail::send('emails.bookupload', $mailData, function($message) use ($mailData) {
            $message->to('abhishekthapa115@gmail.com')
                ->subject('Welcome to our Website');
            $message->from('houseofbooksnepal@gmail.com');
        });
//        foreach ($users as $user){
//            dd($user['email']);
//        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
    public function update(UpdatePostRequest $updatePostRequest, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
