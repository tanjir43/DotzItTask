<?php

namespace App\Http\Controllers;

use App\Repositories\SaveRepository;
use App\Repositories\ValidationRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $vr;
    private $save;
    public function __construct(ValidationRepository $validationRepository, SaveRepository $saveRepository)
    {
        $this->vr   = $validationRepository;
        $this->save = $saveRepository;
    }

    public function index()
    {
        return view('admin.product.index');
    } 

    public function save(Request $request, $id = null)
    {
        $this->vr->isValidProduct($request,$id);
        if($request->hasFile('file')) {
            $this->vr->isValidFile($request);
        }
        $status = $this->save->Product($request,$id);

        if($status == 'success') {
            if(!empty($id)) {
                return redirect(route('organization'));
            }
            return back();
        } else {
            return back();
        }
    }
}
