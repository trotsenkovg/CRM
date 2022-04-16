<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UsersRedemptions;
use Jenssegers\Mongodb\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use function __;

class SiteUsersTable extends DataTableComponent
{
    public bool $dumpFilters = false;

    public string $primaryKey           = 'clientID';
    protected string $pageName          = 'site-users';
    protected string $tableName         = 'site-users';
    public bool $singleColumnSorting    = true;

    public function filters(): array
    {
        return [
            'active' => Filter::make('Status')
                ->select([
                    '' => __('users.any'),
                    'active' => __('users.active'),
                    'notActive' => __('users.notActive'),
                ]),
        ];
    }
    public function columns(): array
    {
        return [
            Column::make(__('users.siteUsersTableClientID'), "clientID")
                ->format(function ($value) {
                    return substr($value, -7);
                })
                ->sortable(),

            Column::make(__('users.siteUsersTableName'), "name")
                ->searchable(function (Builder $query, $searchTerm) {
                    $query->where('name', 'LIKE', "%$searchTerm%")
                        ->orWhere('firstName', 'LIKE', "%$searchTerm%")
                        ->orWhere('lastName', 'LIKE', "%$searchTerm%");
                })
                ->sortable(),

            Column::make(__('users.siteUsersTableEmail'), "email")
                ->searchable(function (Builder $query, $searchTerm) {
                    $query->orWhere('email', 'LIKE', "%$searchTerm%");
                })
                ->sortable(),

            Column::make(__('users.siteUsersTablePhone'), "phone")
                ->searchable(function (Builder $query, $searchTerm) {
                    $query->orWhere('telephone', 'LIKE', "%$searchTerm%");
                })
                ->sortable(),

            Column::make(__('users.siteUsersTableRedemptions'), 'redemptions')
                ->sortable(),

            Column::make(__('users.siteUsersStatus'), "status")
                ->format(function ($value) {
                    if ($value ) {
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
        return UsersRedemptions::query()
            ->when($this->getFilter('active'), function ($query, $active) {
                return $query->where('status', $active === 'active');
            });
    }

    public function setTableDataClass(Column $column, $row): ?string
    {
        if ($column->column() === 'phone') {
            return 'ltrx text-start';
        }

        return null;
    }
}
