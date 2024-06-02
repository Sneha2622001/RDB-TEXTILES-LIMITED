<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Religion;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StaffExport;

class StaffController extends Controller
{
    public function index() {
        $religions = Religion::all();
        $url = url('/staff');
        $data = compact('url','religions');
        return view('staff',)->with($data);
    }

    public function store(Request $request) {
        $staff = new Staff;
        $staff->worker_no = $request['worker_no'];
        $staff->worker_name = $request['worker_name'];
        $staff->date_of_entry = $request['date_of_entry'];
        $staff->father_guardian_name = $request['father_guardian_name'];
        $staff->sex = $request['sex'];
        $staff->date_of_birth = $request['date_of_birth'];
        $staff->date_of_joining = $request['date_of_joining'];
        $staff->permanent_date = $request['permanent_date'];
        $staff->retirement_date = $request['retirement_date'];
        $staff->nationality = $request['nationality'];
        $staff->religion = $request['religion'];
        $staff->anniv_date = $request['anniv_date'];
        $staff->esi_no = $request['esi_no'];
        $staff->pf_no = $request['pf_no'];
        $staff->present_address = $request['present_address'];
        $staff->permanent_address = $request['permanent_address'];
        if ($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $filePath = $file->store('photos', 'public'); // Save to the 'storage/app/public/photos' directory
            $staff->photo_path = $filePath;
        }
        $staff->status = $request['status'] == 'working' ? 1 : 0;
        $staff->save();
        return redirect('/');
    }

    public function view(Request $request) {
        $search = $request['search'] ?? '';
        $startDate = $request['start_date'] ?? '';
        $endDate = $request['end_date'] ?? '';
        $query = Staff::query();

        if ($search != '') {
            $staffs = Staff::where('worker_no', 'LIKE', "%$search%")->get();
        } elseif ($startDate && $endDate) {
            $query->whereBetween('date_of_entry', [$startDate, $endDate]);
            $staffs = $query->get();
        } else {
            $staffs = Staff::all();
        }

        $data = compact('staffs', 'search', 'startDate', 'endDate');
        return view('staff-listings')->with($data);  
    }

    public function delete($id) {
        $staff = Staff::find($id);
        if(!is_null($staff)) {
            $staff->delete();
        }
        return redirect('/');
    }

    public function edit($id) {
        $religions = Religion::all();
        $staff = Staff::find($id);
        if(is_null($staff)) {
            return redirect('staff-listings');
        } else {
            $url = url('/staff/update/') . '/' . $id;
            $data = compact('staff','url','religions');
            return view('staff')->with($data);
        }
    }

    public function update(Request $request,$id) {
        $staff = Staff::find($id);
        if(!is_null($staff)) {
            $staff->worker_no = $request['worker_no'];
            $staff->worker_name = $request['worker_name'];
            $staff->date_of_entry = $request['date_of_entry'];
            $staff->father_guardian_name = $request['father_guardian_name'];
            $staff->sex = $request['sex'];
            $staff->date_of_birth = $request['date_of_birth'];
            $staff->date_of_joining = $request['date_of_joining'];
            $staff->permanent_date = $request['permanent_date'];
            $staff->retirement_date = $request['retirement_date'];
            $staff->nationality = $request['nationality'];
            $staff->religion = $request['religion'];
            $staff->anniv_date = $request['anniv_date'];
            $staff->esi_no = $request['esi_no'];
            $staff->pf_no = $request['pf_no'];
            $staff->present_address = $request['present_address'];
            $staff->permanent_address = $request['permanent_address'];
            if ($request->hasFile('photo_path')) {
                $file = $request->file('photo_path');
                $filePath = $file->store('photos', 'public'); // Save to the 'storage/app/public/photos' directory
                $staff->photo_path = $filePath;
            }      
            $staff->status = $request['status'] == 'working' ? 1 : 0;
            $staff->save();
            return redirect('/');
       }
    }

    public function downloadPdf($id) {
        $staff = Staff::find($id);
        if (is_null($staff)) {
            return redirect()->route('staffs.view');
        }
        $pdf = PDF::loadView('staff.pdf', compact('staff'));
        return $pdf->download('staff_'.$staff->worker_no.'.pdf');
    }

    public function downloadExcel($id) {
        $staff = Staff::find($id);
        if (is_null($staff)) {
            return redirect()->route('staffs.view');
        }
        return Excel::download(new StaffExport($staff), 'staff_'.$staff->worker_no.'.xlsx');
    }

    public function exportAll()
    {
        $staff = Staff::all();
        if (is_null($staff)) {
            return redirect()->route('staffs.view');
        }
        return Excel::download(new StaffExport($staff), 'all_staff.xlsx');
    }

    public function downloadFilteredPdf(Request $request) {
        $startDate = $request['start_date'] ?? '';
        $endDate = $request['end_date'] ?? '';

        $query = Staff::query();

        if ($startDate && $endDate) {
            $query->whereBetween('date_of_entry', [$startDate, $endDate]);
        }

        $staffs = $query->get();
        $pdf = PDF::loadView('staffs.pdf', compact('staffs'));
        return $pdf->download('filtered_staff_list.pdf');
    }
}
