<?php

namespace App\Livewire\Pages\Home\Componets;

use Livewire\Component;

class EmptyBeds extends Component
{
    // Modal state
    public $showModal = false;
    public $selectedRoom = null;

    public function openModal($roomData)
    {
        $this->selectedRoom = $roomData;
        $this->showModal = true;
        // Force modal to show with JavaScript
        $this->dispatch('show-modal');
    }
     public function getEmptyRoomsProperty()
    {
        return [
            [
                'id' => 1,
                'room' => '101',
                'total_beds' => 4,
                'empty_beds' => 3,
                'bed_numbers' => '1,2,4' // Available bed numbers
            ],
            [
                'id' => 2,
                'room' => '102',
                'total_beds' => 2,
                'empty_beds' => 1,
                'bed_numbers' => '2'
            ],
            // Add more rooms as needed
        ];
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedRoom = null;
        $this->resetForm();
         $this->dispatch('hide-modal');
    }
     private function resetForm()
    {

    }

    public function render()
    {
        // فلش پیام موفقیت
            session()->flash('message', 'مهمان با موفقیت ثبت شد!');
            session()->flash('alert_type', 'success');
        return view('livewire.pages.home.componets.empty-beds');
    }
}
