{{-- راه حل 1: استفاده از JavaScript بهتر --}}
<div>
    {{-- Success/Error Messages --}}
    @if (session()->has('message'))
    <div class="custom-alert alert-{{ session('alert_type', 'success') }}" role="alert" aria-live="polite">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
    </div>
    @endif


    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="span-empty">تخت‌های خالی</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="tr-empty">
                            <th>#</th>
                            <th>اتاق</th>
                            <th>تعداد تخت</th>
                            <th>تخت‌های خالی</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->emptyRooms as $index => $room)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $room['room'] }}</td>
                            <td>{{ $room['total_beds'] }}</td>
                            <td>{{ $room['empty_beds'] }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" wire:click="openModal({{ json_encode($room) }})">
                                    <i class="fas fa-plus"></i> افزودن
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                هیچ تخت خالی موجود نیست
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Bootstrap Modal --}}
    <div class="modal fade" id="guestModal" tabindex="-1" aria-labelledby="guestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="guestModalLabel">
                        @if($selectedRoom)
                        افزودن مهمان به اتاق {{ $selectedRoom['room'] }}
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    {{-- <form wire:submit.prevent="saveGuest">
                        <div class="mb-3">
                            <label for="guestName" class="form-label">نام مهمان <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="guestName"
                                class="form-control @error('guestName') is-invalid @enderror"
                                wire:model.blur="guestName" placeholder="نام مهمان را وارد کنید">
                            @error('guestName')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="guestPhone" class="form-label">شماره تلفن <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="guestPhone"
                                class="form-control @error('guestPhone') is-invalid @enderror"
                                wire:model.blur="guestPhone" placeholder="09xxxxxxxxx">
                            @error('guestPhone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="selectedBedNumber" class="form-label">شماره تخت <span
                                    class="text-danger">*</span></label>
                            <select id="selectedBedNumber"
                                class="form-select @error('selectedBedNumber') is-invalid @enderror"
                                wire:model="selectedBedNumber">
                                <option value="">انتخاب کنید...</option>
                                @if($selectedRoom && isset($selectedRoom['bed_numbers']))
                                @foreach(explode(',', $selectedRoom['bed_numbers']) as $bedNum)
                                <option value="{{ trim($bedNum) }}">تخت {{ trim($bedNum) }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('selectedBedNumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        انصراف
                    </button>
                    <button type="button" class="btn btn-primary" wire:click="saveGuest">
                        <span wire:loading.remove wire:target="saveGuest">ذخیره</span>
                        <span wire:loading wire:target="saveGuest">
                            <i class="fas fa-spinner fa-spin"></i> در حال ذخیره...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript با کنترل بهتر focus --}}
    <script>
        document.addEventListener('livewire:init', function() {
            let modalInstance = null;
            const modalElement = document.getElementById('guestModal');
            let triggerButton = null; // برای ذخیره دکمه‌ای که مودال را باز کرده

            Livewire.on('show-modal', function() {
                // ذخیره دکمه‌ای که مودال را باز کرده
                triggerButton = document.activeElement;
                // اطمینان از اینکه modal قبلی بسته شده
                if (modalInstance) {
                    modalInstance.hide();
                }

                setTimeout(() => {
                    modalInstance = new bootstrap.Modal(modalElement, {
                        backdrop: 'static',
                        keyboard: true
                    });
                    modalInstance.show();

                    // Focus را به اولین input منتقل کن
                    modalElement.addEventListener('shown.bs.modal', function() {
                        const firstInput = modalElement.querySelector('#guestName');
                        if (firstInput) {
                            firstInput.focus();
                        }
                    }, { once: true }); // فقط یک‌بار اجرا شود);
                }, 100);
            });

            Livewire.on('hide-modal', function() {
                if (modalInstance) {
                    modalInstance.hide();
                    modalInstance = null;
                }
            });

            // رویداد بسته شدن modal
            modalElement.addEventListener('hidden.bs.modal', function() {
                modalInstance = null;
                Livewire.dispatch('closeModal');
                // انتقال فوکوس به دکمه‌ای که مودال را باز کرده
                if (triggerButton) {
                    triggerButton.focus();
                }
            });
        });
    </script>
</div>
