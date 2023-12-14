<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\State;
use Livewire\Component;
use Filament\Tables\Table;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class SimulationDetail extends Component  implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public Collection $list;

    public function mount(Collection $list)
    {
        $this->list = $list;
    }

    #[On('list-add')]
    public function listAdd(array $list)
    {
        $this->list->push(collect($list[0]));
        State::insert($this->list->toArray());
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(State::query())
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('delete')
                ->requiresConfirmation()
                ->action(fn (State $record) => $record->delete())
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        if (State::count() == 0) {
            State::insert($this->list->toArray());
        }
        return view('livewire.simulation-detail');
    }
}
