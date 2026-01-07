<?php

namespace App\Livewire\User;

use Livewire\Component;

class Dashboard extends Component
{
    public $activeTab = 'web';

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        // Dummy task data
        $tasks = [
            'web' => [
                ['client' => 'Aman Traders', 'project' => 'Business Website', 'details' => 'Landing page + product listing'],
                ['client' => 'StyleMart', 'project' => 'Ecommerce Web UI', 'details' => 'Modern tailwind UI with categories']
            ],
            'app' => [
                ['client' => 'TechHub', 'project' => 'Inventory App', 'details' => 'Stock tracking mobile app'],
                ['client' => 'FreshKart', 'project' => 'Delivery App', 'details' => 'Order tracking system']
            ],
            'billing' => [
                ['client' => 'SmartMart', 'project' => 'Billing Software', 'details' => 'Invoice + GST system'],
                ['client' => 'CityStore', 'project' => 'POS System', 'details' => 'Barcode + receipt printing']
            ],
        ];

        return view('livewire.user.dashboard', [
            'tasks' => $tasks[$this->activeTab] ?? [],
        ]);
    }
}
