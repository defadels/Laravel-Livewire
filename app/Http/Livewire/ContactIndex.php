<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ContactIndex extends Component
{
    // public $data;

    protected $listeners = [
        'contactStored' => 'handleStored'
    ];

    public function render()
    {
        // $this->data = Contact::latest()->get();

        return view('livewire.contact-index',[
        'contacts' => Contact::latest()->get()
    ]);
    }

    public function handleStored($contact){

    }
}
