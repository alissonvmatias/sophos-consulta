<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Actions\Action;
use Filament\Support\Enums\Alignment;

use Filament\Forms\Set;
use Filament\Infolists\Components\Fieldset as ComponentsFieldset;

class Consulta extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.consulta';

    public function mount(){
        $this->form->fill(); 
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('cnpj')
                ->required()
                ->mask('99.999.999/9999-99')
                ->suffixAction(
                    Action::make('copyCostToPrice')
                        ->icon('heroicon-m-clipboard')
                        ->requiresConfirmation()
                        ->action(function (Set $set, $state) {
                            $set('price', $state);
                        })
                    ),
            Fieldset::make('')
                ->schema([
                    TextInput::make('cnpj')
                        ->label('CNPJ'),
                    TextInput::make('social_reason')
                        ->label('Razão Social'),
                    TextInput::make('situation')
                        ->label('Situação'),
                    TextInput::make('system_current')
                        ->label('CNPJ')

                    
                ])
        ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Enviar'))
                ->submit('save'),
        ];
    }
}
