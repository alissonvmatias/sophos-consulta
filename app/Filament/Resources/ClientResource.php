<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\ImportAction;
use App\Filament\Imports\ClientImporter;
use Filament\Actions\Imports\ImportColumn;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function Client(Table $table): Table
    {
        return $table
            ->headerActions([
                ImportColumn::make('name')
            ->requiredMapping()
            ->rules(['required', 'max:255']),
        ImportColumn::make('sku')
            ->label('SKU')
            ->requiredMapping()
            ->rules(['required', 'max:32']),
        ImportColumn::make('price')
            ->numeric()
            ->rules(['numeric', 'min:0']),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CNPJ')
                    ->label('CNPJ')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('social_reason')
                    ->label('Razão Social')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('situation')
                    ->label('Situação')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('system_current')
                    ->label('Sistema Atual')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CNPJ')
                    ->label('CNPJ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('social_reason')
                    ->label('Razão Social')
                    ->searchable(),
                Tables\Columns\TextColumn::make('situation')
                    ->label('Situação')
                    ->searchable(),
                Tables\Columns\TextColumn::make('system_current')
                    ->label('Sistema Atual')
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
