<?php


namespace App\Http\Controllers\Admin\WebSite;


use App\Http\Controllers\Admin\BaseController;
use App\Modules\Backend\Website\Category\Repositories\CategoryRepository;
use App\Modules\Backend\Website\Faculty\Repositories\FacultyRepository;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Product\Repositories\ProductRepository;
use App\Modules\Backend\Website\Product\Requests\CreateProductRequest;
use App\Modules\Backend\Website\Product\Requests\UpdateProductRequest;
use App\Modules\Backend\Website\Semester\Repositories\SemesterRepository;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends BaseController
{
    private $productRepository, $log ,$facultyRepository, $semesterRepository, $categoryRepository, $postRepository;
    private $commonRoute='dashboard.products';
    private $commonView='web-site.products.';
    private $commonMessage='Product';
    private $viewData;
    public function __construct(Log $log, ProductRepository $productRepository ,
                                FacultyRepository $facultyRepository,
                                SemesterRepository $semesterRepository,
                                PostRepository $postRepository,
                                CategoryRepository $categoryRepository)
    {

        $this->productRepository = $productRepository;
        $this->facultyRepository = $facultyRepository;
        $this->semesterRepository = $semesterRepository;
        $this->categoryRepository=$categoryRepository;
        $this->postRepository=$postRepository;
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
        $role = Auth::user()->mainRole()?Auth::user()->mainRole()->name:'default';

        switch ($role)
        {
            case 'administrator':
                $product = $this->productRepository->getAll();
                break;
            case 'seller':
                $product = $this->productRepository->findByDataTable('user_id',Auth::user()['id'],'=');
                break;

        }
        if(\request()->ajax()) {
            return DataTables::of($product)
                ->addColumn('action', function ($products) {
                    $data = $products;
                    $name = 'dashboard.products';
                    $view = false;
                    return $this->view('partials.common.action', compact('data', 'name', 'view'))->render();
                })
                ->editColumn('product_image', function ($product) {
                    $url=asset($product->getImage());
                    return '<img src='.$url.' border="0" width="40"  />';
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->rawColumns(['product_image', 'action'])
                ->make(true);

        }
        $this->viewData['role']=$role;
        $this->viewData['categories'] = $this->facultyRepository->getAll();
        return $this->view('web-site.products.index',$this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->viewData['role'] = Auth::user()->mainRole()?Auth::user()->mainRole()->name:'default';
        $this->viewData['faculty']=$this->facultyRepository->getAll();
        $this->viewData['semester']=$this->semesterRepository->getAll();
        $this->viewData['category']=$this->categoryRepository->getAll();
        $this->viewData['terms']=$this->postRepository->findById(152);
        return $this->view('web-site.products.create',$this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $createProductRequest)
    {
        $data = $createProductRequest->all();
        $data['user_id']=Auth::user()['id'];
        $data['category']="second-hand";
        $images = $createProductRequest->file('files');
        if ($createProductRequest->hasFile('files')) :
            foreach ($images as $item):
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $item->getClientOriginalName();
                $item->move(base_path() . '/storage/app/public/product_image', $imageName);
                $arr[] = $imageName;
            endforeach;
            $image = implode(",", $arr);
        else:
            $image = '';
        endif;

         $data['image']=$image;
        try {
            $post = $this->productRepository->create($data);
            if($post == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $mailData = array('name'=>$data['name']);
            Mail::send('emails.bookupload', $mailData, function($message) use ($mailData) {
                $message->to('houseofbooksnepal@gmail.com')
                    ->subject('Welcome to our Website');
                $message->from('houseofbooksnepal@gmail.com');
            });
            session()->flash('success', 'Book created successfully');
            return redirect()->route('dashboard.products.index');
        }
        catch (\Exception $e) {
            $this->log->error('Book create : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
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
        $role = Auth::user()->mainRole()?Auth::user()->mainRole()->name:'default';
        $this->viewData['faculty']=$this->facultyRepository->getAll();
        $this->viewData['semester']=$this->semesterRepository->getAll();
        $this->viewData['category']=$this->categoryRepository->getAll();
        $this->viewData['terms']=$this->postRepository->findById(152);
        $role = Auth::user()->mainRole()?Auth::user()->mainRole()->name:'default';
        $product=$this->productRepository->findById($id);
        return $this->view('web-site.products.edit', compact('role','product'),$this->viewData);
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
        $slug=$this->productRepository->findById($id)['slug'];
        $data = $updateProductRequest->all();
        $data['category']="second-hand";
        $oldimages=$this->productRepository->findById($id)['image'];

        $images = $updateProductRequest->file('files');

        if ($updateProductRequest->hasFile('files')) :
            foreach ($images as $item):
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $item->getClientOriginalName();

                $item->move(base_path() . '/storage/app/public/product_image', $imageName);
                $arr[] = $imageName;
            endforeach;
//             $explode=explode(",", $oldimages);
//            for($i=0;$i<count($explode);$i++)
//                $arr[]=$explode[$i];
            $image = implode(",", $arr);
        else:
            $image = $oldimages;
        endif;

        $data['image']=$image;
        try {
            $post = $this->productRepository->update($data, $id);
            if($post == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Book updated successfully');
            return redirect()->route('dashboard.products.index');
        }
        catch (\Exception $e) {
            $this->log->error('Content update : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', $this->productRepository->getModel());
        try {
            if(isset($request->hard_delete))
                $this->productRepository->hardDelete($id);
            else
                $this->productRepository->delete($id);
            session()->flash('success', 'Book deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            $this->log->error('Book delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }


}
