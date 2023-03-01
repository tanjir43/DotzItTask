<?php
namespace App\Repositories;

use App\Models\Media;
use App\Models\organization\Organization;
use App\Models\Product;
use App\Models\UserProducts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaveRepository {

    public function UploadFile(Request $request,$fileName = null)
    {
        $created_by = Auth::user()->id;
        
        $upload = $request->file($fileName ?? 'file');
        $path = $upload->getRealPath();
        $file = file_get_contents($path);
        $base64 = base64_encode($file);
        $file = [
            'name'          =>  $upload->getClientOriginalName(),
            'mime'          =>  $upload->getClientMimeType(),
            'size'          =>  number_format(($upload->getSize() / 1024), 1),
            'attachment'    =>  'data:'.$upload->getClientMimeType().';base64,'.$base64,
            'created_by'    =>  $created_by
        ];
        $info = Media::create($file);
        return $info->id;
    }

    public function Product(Request $request,$id)
    {
        $created_by = Auth::user()->id;

        if($request->hasFile('file')) {
            $media_id = $this->uploadFile($request);
        }

        if (!empty($id)) {
            $info = Product::find($id);

            if (!empty($info)){
                if($request->hasFile('file')) {
                    $info->media_id     = $media_id;
                }
                $info->name             =   $request->name;
                $info->price            =   $request->price;
                $info->updated_by       =   $created_by;

                DB::beginTransaction();
                try {
                    $info->save();
                    DB::commit();
                    return 'success';
                } catch (Exception $e) {
                    DB::rollback();
                    return $e;
                }
            }
            else{
                return  "No record found";
            }
        }

        $data = [
            'name'                  => $request->name,
            'price'                 => $request->price,
            'created_by'            => $created_by,
            'image'                 => '/images/one.jpeg',
        ];
        if ($request->hasFile('file')) {
            $data['media_id']   = $media_id;
        }

        DB::beginTransaction();
        try {
            Product::create($data);
            DB::commit();
            return 'success';
        } catch (Exception $e) {
            dd($e);
            DB::rollback();
            return $e;
        }
    }

    public function MyProduct(Request $request,$id)
    {
        $created_by = Auth::user()->id;
        
        DB::beginTransaction();
        try {
            DB::table('product_users')->insert(
                array('product_id' => json_encode($request->product_id),
                      'user_id'            => $created_by,
                      )
            );
            DB::commit();
            return 'success';
        } catch (Exception $e) {
            dd($e);
            DB::rollback();
            return $e;
        }
    }

}