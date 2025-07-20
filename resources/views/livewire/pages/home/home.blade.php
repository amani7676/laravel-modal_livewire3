{{-- resources/views/livewire/dashboard.blade.php --}}

<div class="wrapper">
    <div class="content">
        <div class="container-fluid px-4 mt-4">

            {{-- ردیف سررسید ها و رزرو ها و شبانه ها --}}
            <div class="row">
                {{-- expir date - Static با partial --}}
                <div class="col-lg-7">
                    @include('livewire.pages.home.partials.expirs')
                </div>

                {{-- Reservations & Nightly - Static با partial --}}
                <div class="col-lg-5">
                    @include('livewire.pages.home.partials.reservations')
                    @include('livewire.pages.home.partials.nightly')
                </div>
            </div>

            {{-- ردیف های تخت خالی و خروجی ها --}}
            <div class="row mt-4">
                {{-- Exits - Static با partial --}}
                <div class="col-lg-7">
                    @include('livewire.pages.home.partials.exists')
                </div>

                {{-- Empty Beds - Interactive با Livewire --}}
                <div class="col-lg-5">
                    <livewire:pages.home.componets.empty-beds />
                </div>
            </div>

            {{-- فرم - مدارک - توضیحات --}}
            <div class="row mt-4">
                {{-- Documents - Interactive با Livewire --}}
                <div class="col-md-4">
                    <livewire:pages.home.componets.documetns />
                </div>

                {{-- Forms - Interactive با Livewire --}}
                <div class="col-md-4">
                    <livewire:pages.home.componets.forms />
                </div>

                {{-- Debts - Static با partial --}}
                <div class="col-md-4">
                    @include('livewire.pages.home.partials.payments')
                </div>
            </div>

        </div>
    </div>
</div>


