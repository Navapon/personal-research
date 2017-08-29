<?php

namespace App\Http\Controllers;

use App\DownloaderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class DownloaderController extends Controller
{
    //


    public function uploadFile (Request $request)
    {
        if ($request->file('files')) {

            $name = $request->name;
            $fileName = time() . '.' . $request->file('files')->getClientOriginalExtension();
            $request->file('files')->move(public_path('document'), $fileName);

            $download = new DownloaderModel();
            $download->download_name = $name;
            $download->download_file = $fileName;
            $download->save();
            alert()->success('เพิ่มไฟล์เรียบร้อย', '');

        } else {
            alert()->warning('ท่านไม่ได้อัพโหลดไฟล์', 'กรุณาเลือกไฟล์');
        }

        return redirect()->route('download');
    }

    public function deleteDownload ($id)
    {

        $download = DownloaderModel::find($id);

        try {

            DB::beginTransaction();

            $download->delete();

            DB::commit();
            File::delete('document/'.$download->download_file);
            alert()->success('ลบไฟล์สำเร็จ', '');
            /* Transaction successful. */
        } catch (\Exception $e) {
            alert()->success('ไม่สามารถลบไฟล์ได้', '');
        }
        return redirect()->route('download');
    }
}



