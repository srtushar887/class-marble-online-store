<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function collection()
    {
//        return User::all();

        return DB::table('users')->select('name','user_name','email','phone','company_name','skype_id','whatapp_ap','country')->get();


    }


    public function headings(): array
    {
        return [
            'Name',
            'User Name',
            'Email',
            'Phone',
            'Company Name',
            'Skye ID',
            'Whats app ID',
            'Country',
        ];
    }

}
