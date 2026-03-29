<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class SearchModal extends Component
{
    public $contactId;
    public $showModal = false;
    public $selectedContact = null;

    public function mount($contactId)
    {
        $this->contactId = $contactId;
    }

    public function showDetail()
    {
        $this->selectedContact = Contact::with('category')->find($this->contactId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedContact = null;
    }

    public function deleteContact()
    {
        if ($this->selectedContact) {
            $this->selectedContact->delete();
            $this->closeModal();
            return redirect('/admin');
        }
    }

    public function render()
    {
        return view('livewire.search-modal');
    }
}
