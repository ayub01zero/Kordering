<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components;
use Filament\Forms\Components\TextInput;
use Filament\Actions\CreateAction;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;


class SortUsers extends Page implements HasForms
{
    use InteractsWithForms;
 
    public ?array $data = []; 
 
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
 
    protected static string $view = 'filament.pages.sort-users';
 
    public function mount(): void 
    {
        $this->form->fill(); 
    }
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
            ])
            ->statePath('data');
    } 

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->submit('save'),
        ];
    }


    public function save(): void
    {
        try {
            $data = $this->form->getState();
            Notification::make() 
        ->success()
        ->title('Success')
        ->send();
            // Save the data...
        } catch (Halt $exception) {
            return;
        }
        
    }

    
}
