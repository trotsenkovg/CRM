@section('title') Site Users @endsection
<!-- Page header -->
<div class="sm:flex sm:justify-between sm:items-center mb-8">
    <!-- Left: Title -->
    <div class="mb-4 sm:mb-0">
        <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Site Users</h1>
    </div>
</div>

<div class="bg-white shadow-lg rounded-sm border border-slate-200 p-5">
    <livewire:user-table/>
</div>
