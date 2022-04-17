<?php

namespace App\Http\Livewire;

use App\Exports\SiteUsersExport;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;


class SiteUsers extends Component
{
    public function export()
    {
        return Excel::download(
            new SiteUsersExport(),
            'Site Users '.Carbon::now()->format('Y.m.d').'.xlsx'
        );
    }

    public function render()
    {
        return view('livewire.users.site-users');
    }
}
