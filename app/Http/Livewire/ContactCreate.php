<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactCreate extends Component
{
    // public $contacts;

    // public function mount($contacts)
    // {
    //     // dd($contacts);
    //     $this->contacts = $contacts;
    // }

    public $name;
    public $phone;

    public function render()
    {

        return view('livewire.contact-create');
    }

    public function store()
    {
        $contact = Contact::create(
            [
                'name' => $this->name,
                'phone' => $this->phone
            ]
        );

        $this->resetInput();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}
