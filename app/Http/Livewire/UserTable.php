<?php

namespace App\Http\Livewire;

use Jenssegers\Mongodb\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{

    public bool $dumpFilters = false;

    public string $primaryKey           = '_id';
    protected string $pageName          = 'site-users';
    protected string $tableName         = 'site-users';
    public bool $singleColumnSorting    = true;
    public string $defaultSortColumn    = 'redemption_count';
    public string $defaultSortDirection = 'desc';

    public function columns(): array
    {
        return [
            Column::make("Client ID", "_id")
                ->format(function ($value) {
                    return substr($value, -7);
                })
                ->sortable(),

            Column::make("Customer Name", "name")
                ->searchable(function (Builder $query, $searchTerm) {
                    $query->where('name', 'LIKE', "%$searchTerm%")
                        ->orWhere('firstName', 'LIKE', "%$searchTerm%")
                        ->orWhere('lastName', 'LIKE', "%$searchTerm%");
                })
                ->sortable(),

            Column::make("Email", "email")
                ->searchable(function (Builder $query, $searchTerm) {
                    $query->orWhere('email', 'LIKE', "%$searchTerm%");
                })
                ->sortable(),

            Column::make("Phone", "telephone")
                ->searchable(function (Builder $query, $searchTerm) {
                    $query->orWhere('telephone', 'LIKE', "%$searchTerm%");
                })
                ->sortable(),

            Column::make("Realizations", 'redemption_count')
                ->sortable(),

            Column::make("Status", "status")
                ->format(function ($value) {
                    if ($value || $value == 'on' || $value == 1) {
                        return __('users.active');
                    } else {
                        return __('users.notActive');
                    }
                })
                ->sortable(),
        ];
    }

    public function query(): \Illuminate\Database\Eloquent\Builder
    {
        return User::query();
    }
}
