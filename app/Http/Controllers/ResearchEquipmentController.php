<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\MajorModel;
use App\ResearchEquipmentModel;
use App\ResearchEquipmentStatusModel;
use App\YearModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ResearchEquipmentController extends Controller
{
    public function __construct ()
    {
        if (!$this->middleware('auth', [ 'except' => [ 'index', 'show' ] ])) {

            alert()->warning('', 'กรุณาเข้าสู่ระบบเพื่อทำรายการ');
            return redirect()->route('home');
        }


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        //
        $equipments = ResearchEquipmentModel::all();

        return view('equipment.equipment-list')->with('equipments', $equipments);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        if (\Auth::user()->u_role_id != 1) {
            alert()->warning('', 'ผู้ดูแลระบบเท่านั้นสามารถจัดการเครื่องมือได้');
            return redirect()->route('home');
        }
        //
        $majors = MajorModel::all();
        $years = YearModel::all();
        $eqstatus = ResearchEquipmentStatusModel::all();

        $data = array(
            'majors' => $majors,
            'years' => $years,
            'eqstatus' => $eqstatus
        );

        return view('equipment.equipment-create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (EquipmentRequest $request)
    {
        //
        $equipment = new ResearchEquipmentModel();

        if ($request->file('re_file')) {

            $path = '/files/equipment/';
            // check directory exist
            if (!File::exists($path)) {
                // path does not exist
                File::makeDirectory($path, 0775, true, true);
            }

            $filename = time() . '.' . $request->re_file->getClientOriginalExtension();
            $request->re_file->move(public_path($path), $filename);
            $equipment->re_image = $filename;

        }

        $equipment->re_name = $request->re_name;
        $equipment->re_building = $request->re_building;
        $equipment->re_room = $request->re_room;
        $equipment->re_floor = $request->re_floor;
        $equipment->re_serial_number = $request->re_serial_number;
        $equipment->re_major = $request->re_major;
        $equipment->re_phone = $request->re_phone;
        $equipment->re_description = $request->re_description;
        $equipment->re_year = $request->re_year;
        $equipment->re_number = $request->re_number;
        $equipment->re_namenumber = $request->re_namenumber;
        $equipment->re_status = $request->re_status;
        $equipment->re_amount = $request->re_amount;

        try {
            DB::beginTransaction();

            // Save equipment to db
            $equipment->save();

            DB::commit();
            /* Transaction successful. */
        } catch (\Exception $e) {

            DB::rollback();

            alert()->error('', 'เกิดข้อผิดพลาดในการบันทึก');
            return redirect()->route('equipment.index');
            /* Transaction failed. */
        }

        alert()->success('', 'ทำการเพิ่มข้อมูลเครื่องมือวิจัย สำเร็จ');
        return redirect()->route('equipment.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        //
        $equipment = ResearchEquipmentModel::find($id);

        $data = array(
            'equipment' => $equipment
        );

        return view('equipment.equipment-show')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        //
        if (\Auth::user()->u_role_id != 1) {
            alert()->warning('', 'ผู้ดูแลระบบเท่านั้นสามารถจัดการเครื่องมือได้');
            return redirect()->route('home');
        }

        $equipment = ResearchEquipmentModel::find($id);
        $majors = MajorModel::all();
        $years = YearModel::all();
        $eqstatus = ResearchEquipmentStatusModel::all();

        $data = array(
            'majors' => $majors,
            'years' => $years,
            'eqstatus' => $eqstatus,
            'equipment' => $equipment
        );

        return view('equipment.equipment-edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update (EquipmentRequest $request, $id)
    {
        //
        $equipment = ResearchEquipmentModel::find($id);

        if ($request->file('re_file')) {

            $path = '/files/equipment/';
            // check directory exist
            if (!File::exists($path)) {
                // path does not exist
                File::makeDirectory($path, 0775, true, true);
            }

            $filename = time() . '.' . $request->re_file->getClientOriginalExtension();
            $request->re_file->move(public_path($path), $filename);
            $equipment->re_image = $filename;

        }

        $equipment->re_name = $request->re_name;
        $equipment->re_building = $request->re_building;
        $equipment->re_room = $request->re_room;
        $equipment->re_floor = $request->re_floor;
        $equipment->re_serial_number = $request->re_serial_number;
        $equipment->re_major = $request->re_major;
        $equipment->re_phone = $request->re_phone;
        $equipment->re_description = $request->re_description;
        $equipment->re_year = $request->re_year;
        $equipment->re_number = $request->re_number;
        $equipment->re_namenumber = $request->re_namenumber;
        $equipment->re_status = $request->re_status;
        $equipment->re_amount = $request->re_amount;

        try {
            DB::beginTransaction();

            // Save equipment to db
            $equipment->save();

            DB::commit();
            /* Transaction successful. */
        } catch (\Exception $e) {

            DB::rollback();

            alert()->error('', 'เกิดข้อผิดพลาดในการบันทึก');
            return redirect()->route('equipment.index');
            /* Transaction failed. */
        }

        alert()->success('', 'แก้ไขข้อมูลเรียบร้อย');
        return redirect()->route('equipment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {

        try {

            if (\Auth::user()->u_role_id == 1) {

                DB::beginTransaction();

                $equipment = ResearchEquipmentModel::withTrashed()->find($id);
                $equipment->delete();

                DB::commit();

            } else {
                alert()->error('ไม่สามารถลบได้', 'ผู้ดูแลเท่านั้นที่ลบได้');
                return redirect()->route('equipment.index');
            }

            /* Transaction successful. */
        } catch (\Exception $e) {

            DB::rollback();

            alert()->error('', 'เกิดข้อผิดพลาดในการลบข้อมูล');
            return redirect()->route('equipment.index');
            /* Transaction failed. */
        }

        alert()->success('', 'ลบรายการเรียบร้อย');
        return redirect()->route('equipment.index');
    }

}
