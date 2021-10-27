<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Contact;

class ContactIndex extends Component
{
    // public $data;

    public $statusUpdate = false;
    public $paginate = 5;
    public $search;

    protected $listeners = [
        'contactStored' => 'handleStored',
        'contactUpdated' => 'handleUpdated'
    ];

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        // $this->data = Contact::latest()->get();

        return view('livewire.contact-index',[
            'contacts' => $this->search === null ?
            Contact::latest()->paginate($this->paginate) :
            Contact::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->paginate)
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
