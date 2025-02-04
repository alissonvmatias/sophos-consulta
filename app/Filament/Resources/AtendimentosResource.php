<?php

namespace App\Filament\Resources;

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
    protected static ?string $model = Query::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                Forms\Components\TextInput::make('cnpj')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('social_reason')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('situation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('attendant')
                    ->required()
                    ->dehydrateStateUsing(fn (string $state): string => ucwords($state))
                    ->maxLength(255)
                    ])->columns(2),
                Section::make()->schema([
                Forms\Components\TextInput::make('type_attend')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('num_ticket')
                    ->required()
                    ->maxLength(255),
                    ])->columns(1),
                    Section::make()->schema([
                Forms\Components\TextInput::make('observation')
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
                    ->searchable(),
                Tables\Columns\TextColumn::make('social_reason')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('situation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('attendant')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_attend')
                    ->searchable(),
                Tables\Columns\TextColumn::make('num_ticket')
                    ->searchable(),
                Tables\Columns\TextColumn::make('observation')
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
