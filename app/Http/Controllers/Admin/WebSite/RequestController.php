<?php


namespace App\Http\Controllers\Admin\WebSite;


use App\Http\Controllers\Admin\BaseController;
use App\Modules\Backend\Website\Category\Repositories\CategoryRepository;
use App\Modules\Backend\Website\Faculty\Repositories\FacultyRepository;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Product\Repositories\ProductRepository;
use App\Modules\Backend\Website\Product\Requests\CreateProductRequest;
use App\Modules\Backend\Website\Product\Requests\UpdateProductRequest;
use App\Modules\Backend\Website\Request\Repositories\RequestRepository;
use App\Modules\Backend\Website\Semester\Repositories\SemesterRepository;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class RequestController extends BaseController
{
    private $requestRepository, $log ;
    private $commonRoute='dashboard.request';
    private $commonView='web-site.request.';
    private $commonMessage='Request';
    private $viewData;
    public function __construct(Log $log, RequestRepository  $requestRepository)
    {

        $this->requestRepository = $requestRepository;
        $this->log = $log;
        $this->viewData['commonRoute']=$this->commonRoute;
        $this->viewData['commonView']=$this->commonView;
        $this->viewData['commonMessage']=$this->commonMessage;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = $this->requestRepository->getAll();
        return $this->view('web-site.request.index',compact('request'));
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

            $request = $this->requestRepository->findById($id);
            return $this->view('web-site.request.show', compact('request'));

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
