<?php
namespace App\Repositories;

use App\Models\Media;
use App\Models\organization\Organization;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaveRepository {

    public function uploadFile(Request $request, $fileName = null) {
        $created_by = Auth::user()->id;
        $upload     = $request->file($fileName ?? 'file');
        $path       = $upload->getRealPath();
        $file       = file_get_contents($path);
        $base64     = base64_encode($file);
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

}