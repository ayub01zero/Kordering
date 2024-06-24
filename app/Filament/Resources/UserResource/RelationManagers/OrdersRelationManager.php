<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('order_date')
                    ->required()->readonly(),
                Forms\Components\TextInput::make('invoice_num')
                    ->required()
                    ->maxLength(255)->readonly(),
                Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'pending',
                    'processing' => 'processing',
                    'completed' => 'completed',
                ])
                    ->required()
                    ->native(false),
                Forms\Components\TextInput::make('total_price')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('qty')
                    ->required()
                    ->numeric()->readonly(),
                Forms\Components\TextInput::make('international_fee')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('custom_fee')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('order_price')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('return_days')
                    ->numeric()
                    ->default(null),
                    Forms\Components\Toggle::make('approve') // Or Checkbox::make('approve')
                ->label('Approved'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('invoice_num')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('order_date')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('invoice_num')
                ->searchable(),
            Tables\Columns\TextColumn::make('status'),
            Tables\Columns\TextColumn::make('total_price')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('qty')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('international_fee')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('custom_fee')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('order_price')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('return_days')
                ->numeric()
                ->sortable(),
                Tables\Columns\BooleanColumn::make('approve')
        ->label('Approved')
        ->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
