<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\SaveRepository;
use App\Repositories\ValidationRepository;
use Illuminate\Http\Request;

class MyProductController extends Controller
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
        $products = Product::all();
        return view('admin.myproduct.index',compact('products'));
    } 

    public function save(Request $request, $id = null)
    {

        $status = $this->save->MyProduct($request,$id);

        if($status == 'success') {
            if(!empty($id)) {
                return redirect(route('organization'));
            }
            return back();
        } else {
            return back();
        }
    }

    // public function autocomplete(Request $request)

    // {
    //     $data = [];
    //     if($request->filled('q')){
    //         $data = Product::select("name", "id")
    //                     ->where('name', 'LIKE', '%'. $request->get('q'). '%')
    //                     ->get();
    //     }
    //     return response()->json($data);
    // }
}
