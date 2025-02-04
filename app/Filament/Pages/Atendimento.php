<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Actions\Action;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;


use function Laravel\Prompts\select;

class Atendimento extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.atendimento';

    public function mount(){
        $this->form->fill(); 
    }

    public function form(Form $form):Form{
        return $form->schema([
            Section::make()->schema([
                TextInput::make('cnpj')->required()
                ->mask('99.999.999/9999-99')
                ->rule('cnpj'),
                TextInput::make('social_reason')
                ->label('Razão Social')
                ->required(),
                TextInput::make('status')
                ->label('Status')
                ->required(),
                TextInput::make('situation')
                ->label('Situação')
                ->required(),
                TextInput::make('attendant')
                ->label('Consultor')
                ->required()
                ->dehydrateStateUsing(fn (string $state): string => ucwords($state))
            ])->columns(2),
            Section::make()->schema([
                select::make('type_attend')
                ->searchable()
                ->options([
                    'budget' => 'Orçamento',
                    'nfe' => 'Nota Fiscal',
                    'doubts' => 'Dúvidas',
                    'training'=> 'Treinamento',
                    'installation'=> 'Instalação',
                    'digital_certificate'=> 'Certificado Digital',
                    'taxation'=> 'Tributação',
                    'box_closing'=> 'Fechamento de Caixa',
                    'nfc_or_pdv'=> 'Nfce ou PDV',
                    'stock'=> 'Estoque',
                    'produtct'=> 'Produto',
                    'financial'=> 'Financeiro',
                    'fiscal'=> 'Fiscal',
                    'registers'=> 'Cadastros',
                    'analyze_tax_files'=> 'Analisar Arquivos Fiscals',
                    'administrative'=> 'Administrativo',
                    'backup'=> 'Backup',
                    'balance'=> 'Balança',
                    'commercial'=> 'Comercial',
                    'tef'=> 'TEF',
                    'printer'=> 'Impressora',
                    'e_commerce'=> 'E-commerce'
                ]),
                TextInput::make('num_ticket') 
                ->label('Número do Tickets')
            ])->columns(1),
            Section::make()->schema([
                TextInput::make('observation')
                ->label('Observação')
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
