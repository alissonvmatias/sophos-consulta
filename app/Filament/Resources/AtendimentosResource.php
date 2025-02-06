<?php

namespace App\Filament\Resources;

use App\Enums\TypeAttendEnum;
use App\Enums\StatusClientEnum;
use App\Filament\Resources\AtendimentosResource\Pages;
use App\Filament\Resources\AtendimentosResource\RelationManagers;
use App\Models\Atendimentos;
use App\Models\Query;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;


class AtendimentosResource extends Resource
{
    protected static ?string $model = Atendimentos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                Forms\Components\TextInput::make('cnpj')
                    ->label('CNPJ')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('social_reason')
                    ->label('Razão Social')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options(StatusClientEnum::class)
                    ->required(),
                Forms\Components\TextInput::make('situation')
                    ->label('Situação')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('attendant')
                    ->label('Consultor')
                    ->required()
                    ->dehydrateStateUsing(fn (string $state): string => ucwords($state))
                    ->maxLength(255)
                    ])->columns(2),
                Section::make()->schema([
                Forms\Components\Select::make('type_attend')
                    ->label('Tipo de Atendimento')
                    ->options(TypeAttendEnum::class)
                    ->required(),
                Forms\Components\TextInput::make('num_ticket')
                    ->label('N* Ticket')
                    ->required()
                    ->maxLength(255),
                    ])->columns(1),
                    Section::make()->schema([
                Forms\Components\TextInput::make('observation')
                    ->label('Observação')
                    ->required()
                    ->maxLength(255)
                    ])
                    
            ]);

            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cnpj')
                    ->label('CNPJ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('social_reason')
                    ->label('Razão Social')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('situation')
                    ->label('Situação')
                    ->searchable(),
                Tables\Columns\TextColumn::make('attendant')
                    ->label('Atendente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_attend')
                    ->label('Tipo de Atendimento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('num_ticket')
                    ->label('N* Ticket')
                    ->searchable(),
                Tables\Columns\TextColumn::make('observation')
                    ->label('Observação')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAtendimentos::route('/'),
            'create' => Pages\CreateAtendimentos::route('/create'),
            'edit' => Pages\EditAtendimentos::route('/{record}/edit'),
        ];
    }
}
