@section('title') @lang('users.addSiteUser') @endsection
<div>
    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">
        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-slate-900 font-bold italic">@lang('users.addSiteUser')</h1>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

        </div>
    </div>

    <div class="bg-white shadow-lg rounded-sm mb-8">
        <div class="flex flex-col md:flex-row md:-ms-px">
            <!-- Panel -->
            <div class="grow">

                <!-- Panel body -->
                <div class="p-6 space-y-6">

                    <!-- Business Profile -->
                    <section>
                        <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-s-4 mt-5">
                            <div class="sm:max-w-md">
                                <label class="block text-sm font-medium mb-1 text-slate-900" for="firstname">First
                                    name</label>
                                <input id="firstname" class="form-input w-full" type="text"/>
                            </div>
                            <div class="sm:max-w-md">
                                <label class="block text-sm font-medium mb-1 text-slate-900" for="lastname">Last
                                    name</label>
                                <input id="lastname" class="form-input w-full" type="text"/>
                            </div>
                            <div class="sm:max-w-md">
                                <label class="block text-sm font-medium mb-5 text-slate-900"
                                       for="location">Status</label>
                                <div class="flex items-center mt-5" x-data="{ checked: true }">
                                    <div class="form-switch">
                                        <input type="checkbox" id="toggle" class="sr-only" x-model="checked"/>
                                        <label class="bg-red-500" for="toggle">
                                            <span class="bg-white shadow-sm" aria-hidden="true"></span>
                                            <span class="sr-only">Enable smart sync</span>
                                        </label>
                                    </div>
                                    <div class=" text-sm text-slate-900 italic ms-2"
                                         x-text="checked ? 'Active' : 'Not Active'"></div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Email -->
                    <section>
                        <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-s-4 mt-5">
                            <div class="sm:max-w-md">
                                <label class="block text-sm font-medium mb-1 text-slate-900"
                                       for="firstname">Birthdate</label>
                                <div class="relative">
                                    <input id="firstname"
                                           class="datepicker form-input ps-9 text-slate-900 hover:text-slate-600 font-medium focus:border-slate-300 w-full"
                                           type="text"
                                           data-class="flatpickr-right"/>
                                    <div class="absolute inset-0 right-auto flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 fill-current text-slate-500 ml-3" viewBox="0 0 16 16">
                                            <path
                                                d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:max-w-md">
                                <label class="block text-sm font-medium mb-1 text-slate-900"
                                       for="lastname">Gender</label>
                                <input id="lastname" class="form-input w-full" type="text"/>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-s-4 mt-5">
                            <div class="sm:max-w-md">
                                <label class="block text-sm font-medium mb-1 text-slate-900"
                                       for="firstname">Telephone</label>
                                <input id="firstname" class="form-input w-full" type="text"/>
                            </div>
                            <div class="sm:max-w-md">
                                <label class="block text-sm font-medium mb-1 text-slate-900"
                                       for="lastname">Email</label>
                                <input id="lastname" class="form-input w-full" type="text"/>
                            </div>
                            <div class="sm:max-w-md">
                                <label class="block text-sm font-medium mb-1 text-slate-900"
                                       for="firstname">City</label>
                                <input id="firstname" class="form-input w-full" type="text"/>
                            </div>
                            <div class="sm:max-w-md">
                                <label class="block text-sm font-medium mb-1 text-slate-900"
                                       for="lastname">Address</label>
                                <input id="lastname" class="form-input w-full" type="text"/>
                            </div>
                        </div>
                    </section>


                </div>

                <!-- Panel footer -->
                <footer>
                    <div class="flex flex-col px-6 py-5 border-t border-slate-200">
                        <div class="flex ">
                            <button class="btn bg-orange-500 hover:bg-orange-600 text-white">Save Changes</button>
                            <a class="btn border-slate-200 hover:border-slate-300 text-slate-600 ms-3 cursor-pointer"
                               href="{{route('siteUsers')}}">Go back to users list</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>
