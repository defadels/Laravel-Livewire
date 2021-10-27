<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ContactIndex extends Component
{
    // public $data;

    public $statusUpdate = false;

    protected $listeners = [
        'contactStored' => 'handleStored',
        'contactUpdated' => 'handleUpdated'
    ];

    public function render()
    {
        // $this->data = Contact::latest()->get();

        return view('livewire.contact-index',[
        'contacts' => Contact::latest()->get()
    ]);
    }

    public function destroy($id)
    {
        if($id){
           $data =  Contact::find($id);

           $data->delete();

           session()->flash('message', 'Contact '.$data['name'].' was  deleted!');
        }
    }

    public function handleStored($contact)
    {
        session()->flash('message', 'Contact '. $contact['name'] .' was stored!');
    }

    public function handleUpdated($contact)
    {
        session()->flash('message', 'Contact '. $contact['name'] .' was updated!');
    }

    public function getContact($id) {
        $contact = Contact::find($id);

        $this->statusUpdate = true;
        $this->emit('getContact', $contact);
    }

    
}
