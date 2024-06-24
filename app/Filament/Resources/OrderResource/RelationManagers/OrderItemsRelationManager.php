<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'OrderItems';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255)->url(),
                Forms\Components\TextInput::make('country')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('size')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('color')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('qty')
                    ->required()
                    ->numeric(),
                    Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->default(null),
                    Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('link')
            ->columns([
                Tables\Columns\TextColumn::make('order.invoice_num')
                ->numeric()
                ->sortable(),
            Tables\Columns\ImageColumn::make('image'),
            Tables\Columns\TextColumn::make('link')
                ->searchable(),
            Tables\Columns\TextColumn::make('country')
                ->searchable(),
            Tables\Columns\TextColumn::make('size')
                ->searchable(),
            Tables\Columns\TextColumn::make('color')
                ->searchable(),
            Tables\Columns\TextColumn::make('qty')
                ->numeric()
                ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->headerActions([
           
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
