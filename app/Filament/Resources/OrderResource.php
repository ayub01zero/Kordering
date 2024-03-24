<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;



class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function canCreate(): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric()->readonly(),
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



    public static function table(Table $table): Table
    {
        return $table
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
                    ->sortable()->money('USD'),
                Tables\Columns\TextColumn::make('qty')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('international_fee')
                    ->numeric()
                    ->sortable()
                    ->money('USD'),
                Tables\Columns\TextColumn::make('custom_fee')
                    ->numeric()
                    ->sortable()->money('USD'),
                    Tables\Columns\TextColumn::make('order_price')->sum('OrderItems', 'price')
                    ->numeric()
                    ->sortable()
                    ->money('USD'),
                Tables\Columns\TextColumn::make('return_days')
                    ->numeric()
                    ->sortable(),
                    Tables\Columns\BooleanColumn::make('approve')
            ->label('Approved')
            ->boolean(),
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
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\OrderItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
