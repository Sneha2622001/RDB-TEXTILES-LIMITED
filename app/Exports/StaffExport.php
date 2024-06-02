<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StaffExport implements FromCollection, WithHeadings, WithMapping
{
    protected $staff;

    public function __construct($staff)
    {
        $this->staff = $staff instanceof \Illuminate\Database\Eloquent\Collection ? $staff : collect([$staff]);
    }

    public function collection()
    {
        return $this->staff;
    }

    public function headings(): array
    {
        return [
            'Worker No',
            'Worker Name',
            'Date of Entry',
            'Father Guardian Name',
            'Sex',
            'Date of Birth',
            'Date of Joining',
            'Permanent Date',
            'Retirement Date',
            'Nationality',
            'Religion',
            'Anniv Date',
            'ESI No',
            'PF No',
            'Present Address',
            'Permanent Address',
            'Photo Path',
            'Status'
        ];
    }

    public function map($staff): array
    {
        $sex = '';
        $religion = '';
        $nationality = '';

        if ($staff->sex == 'M') {
            $sex = 'Male';
        } elseif ($staff->sex == 'F') {
            $sex = 'Female';
        } else {
            $sex = 'Other';
        }

        if ($staff->religion == 'hindu') {
            $religion = 'Hindu';
        } elseif ($staff->religion == 'muslim') {
            $religion = 'Muslim';
        } elseif($staff->religion == 'christian') {
            $religion = 'Christian';
        } else {
            $religion = 'Other';
        }

        if ($staff->nationality == 'indian') {
            $nationality = 'Indian';
        } else {
            $nationality = 'Other';
        }


        return [
            $staff->worker_no,
            $staff->worker_name,
            $staff->date_of_entry,
            $staff->father_guardian_name,
            $sex,
            $staff->date_of_birth,
            $staff->date_of_joining,
            $staff->permanent_date,
            $staff->retirement_date,
            $nationality,
            $religion,
            $staff->anniv_date,
            $staff->esi_no,
            $staff->pf_no,
            $staff->present_address,
            $staff->permanent_address,
            $staff->photo_path,
            $staff->status ? 'Working' : 'Not Working',
        ];
    }
}
