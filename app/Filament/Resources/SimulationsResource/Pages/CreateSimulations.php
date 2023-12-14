<?php

namespace App\Filament\Resources\SimulationsResource\Pages;

use App\Models\State;
use Filament\Actions;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Contracts\HasInfolists;
use App\Filament\Resources\SimulationsResource;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class CreateSimulations extends CreateRecord
{

    protected static bool $canCreateAnother = false;

    protected static string $view = 'pages.simulations-trx';

    protected static string $resource = SimulationsResource::class;

    public Collection $list;

    public function mount(): void
    {
        parent::mount();
        $this->fill([
            'list' => collect()
        ]);
    }

    public function create(bool $another = false): void
    {
        $this->list->push(collect($this->data));
        $this->form->fill();
        $this->dispatch('list-add', list: $this->list);
    }

}
