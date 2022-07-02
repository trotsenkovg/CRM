<?php

namespace App\Exports;

use App\Models\UsersRedemptions;
use App\Services\UsersRedemptionsService;
use Jenssegers\Mongodb\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiteUsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
     */
    public function collection(): \Illuminate\Support\Collection
    {
        return UsersRedemptionsService::getExportCollection();
    }

    public function headings(): array
    {
        return [
            __('users.siteUsersTableClientID'),
            __('users.siteUsersTableName'),
            __('users.siteUsersTableEmail'),
            __('users.siteUsersTablePhone'),
            __('users.siteUsersTableRedemptions'),
            __('users.siteUsersStatus'),
        ];
    }
}
