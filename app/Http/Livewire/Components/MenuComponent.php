<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Request;
use Livewire\Component;

class MenuComponent extends Component
{
    public array $links;
    public string $page;

    public function mount()
    {
        $this->page     = Request::path();
        $this->links    = $this->formatMenuArrayForHTML();
    }

    protected function formatMenuArrayForHTML(): array
    {
        $data = [];
        foreach ($this->getMenuLinks() as $key => $value) {
            $data[$key]['name'] = $value['name'];
            $data[$key]['route'] = $value['route'];
            $data[$key]['id'] = $value['id'];
            $data[$key]['open'] = $this->page == $value['route'];

            foreach ($value['subFields'] as $subKey => $subValue) {
                $open = $this->page == $subValue['route'];
                $subValue['open'] = $open;
                if ($open) {
                    $data[$key]['open'] = true;
                }
                $data[$key]['subFields'][$subKey] = $subValue;
                foreach ($subValue['subFields'] as $fieldKey => $field) {
                    $open = $this->page == $field['route'];
                    $field['open'] = $open;
                    if ($open) {
                        $data[$key]['open'] = true;
                        $data[$key]['subFields'][$subKey]['open'] = true;
                    }
                    $data[$key]['subFields'][$subKey]['subFields'][$fieldKey] = $field;
                }
            }

        }

        return $data;
    }

    protected function getMenuLinks(): array
    {
        return [
            //Dashboard
            [
                'name' => __('general.dashboard'),
                'route' => 'dashboard',
                'subFields' => [],
                'id' => 'dashboard',
            ],
            //Users
            [
                'name' => __('users.users'),
                'route' => '',
                'id' => 'users',
                'subFields' => [
                    //Site Users
                    [
                        'name' => __('users.siteUsers'),
                        'route' => '',
                        'id' => 'siteUsers',
                        'subFields' => [
                            //Site Users List
                            [
                                'name' => __('users.siteUsersList'),
                                'route' => 'siteUsers',
                                'id' => 'siteUsersList',
                                'subFields' => [],
                            ],
                            //Create Site User
                            [
                                'name' => __('users.addSiteUser'),
                                'route' => 'addSiteUser',
                                'id' => 'addSiteUser',
                                'subFields' => [],
                            ],
                        ],
                    ],
                    //Provider Users
                    [
                        'name' => __('users.providerUsers'),
                        'route' => '',
                        'id' => 'providerUsers',
                        'subFields' => [
                            //Provider Users List
                            [
                                'name' => __('users.providerUsersList'),
                                'route' => 'providerUsers',
                                'id' => 'providerUsersList',
                                'subFields' => [],
                            ],
                            //Create Provider User
                            [
                                'name' => __('users.addProviderUser'),
                                'route' => 'addProviderUser',
                                'id' => 'addProviderUser',
                                'subFields' => [],
                            ],
                        ],
                    ],
                    //Chipper Users
                    [
                        'name' => __('users.chipperUsers'),
                        'route' => '',
                        'id' => 'chipperUsers',
                        'subFields' => [
                            //Chipper Users List
                            [
                                'name' => __('users.chipperUsersList'),
                                'route' => 'chipperUsers',
                                'id' => 'chipperUsersList',
                                'subFields' => [],
                            ],
                            //Create Chipper User
                            [
                                'name' => __('users.addChipperUser'),
                                'route' => 'addChipperUser',
                                'id' => 'addChipperUser',
                                'subFields' => [],
                            ],
                        ],
                    ],
                ],
            ],
            //Settings
            [
                'name' => __('auth.settings'),
                'route' => '',
                'id' => 'settings',
                'subFields' => [
                    [
                        'name' => __('auth.settings'),
                        'route' => 'accountSettings',
                        'id' => 'accountSettings',
                        'subFields' => [],
                    ]
                ],
            ],
        ];
    }

    public function render()
    {
        return view('livewire.components.menu');
    }
}
