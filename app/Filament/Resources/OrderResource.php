<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Pagination\Paginator;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Field;
use App\Forms\Components\RangeSlider;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Http\Request;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Summarizers\Count;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\Summarizers\Range;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Contracts\Pagination\CursorPaginator;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-check';

    public static function canCreate(): bool
    {
        return false;
    }

//     protected function paginateTableQuery(Builder $query): CursorPaginator
// {
//     return $query->cursorPaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());
// }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric()
                    ->readonly(),
                Forms\Components\DatePicker::make('order_date')
                    ->required()
                    ->readonly(),
                Forms\Components\TextInput::make('invoice_num')
                    ->required()
                    ->maxLength(255)
                    ->readonly(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                    ])
                    ->required()
                    ->native(false),
                Forms\Components\TextInput::make('qty')
                    ->required()
                    ->numeric()
                    ->readonly(),
                Forms\Components\TextInput::make('return_days')
                    ->numeric(),
                Section::make()
                    ->description('Add the price to the order')
                    ->collapsible()



                    ->schema([
                        Forms\Components\TextInput::make('international_fee')
                            ->numeric()
                            ->required()
                            ->default(5) // Default value for international fee
                            ->dehydrated(false), // Keep this value constant
                        Forms\Components\TextInput::make('custom_fee')
                            ->numeric()
                            ->required()
                            ->default(2) // Default value for custom fee
                            ->dehydrated(false), // Keep this value constant
                        Forms\Components\TextInput::make('order_price')
                            ->numeric()
                            ->required()
                            ->live()
                            ->reactive() 
                            ->afterStateUpdated(function (callable $get, callable $set) {
                                $internationalFee = $get('international_fee') ?: 0;
                                $customFee = $get('custom_fee') ?: 0;
                                $orderPrice = $get('order_price') ?: 0;
                                
                                $totalPrice = $internationalFee + $customFee + $orderPrice;
                                
                                $set('total_price', $totalPrice);
                            }),
                        Forms\Components\TextInput::make('total_price')
                            ->numeric()
                            ->required()
                            ->readonly() // Make this readonly in the form
                            ->dehydrated(true), // Ensure this is sent to the database
                    ])->columns(2),
                Forms\Components\Toggle::make('approve') // Or Checkbox::make('approve')
                    ->label('Approved'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->reorderable('order_date')
        ->heading('Clients')
        ->poll('10s')
        ->description('Manage your clients here.')
            ->defaultGroup('status')
        ->paginated([10, 25, 50, 100, 'all'])
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('invoice_num')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn (Request $request, Model $record) => $request->user()->name . ' - ' . $record->status),

                Tables\Columns\TextColumn::make('qty')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->numeric()
                    ->sortable()
                    ->money('USD')
                    ->summarize([
                        Average::make(),
                        Range::make(),
                    ]),
                Tables\Columns\TextColumn::make('international_fee')
                    ->numeric()
                    ->sortable()
                    ->money('USD'),
                Tables\Columns\TextColumn::make('custom_fee')
                    ->numeric()
                    ->sortable()
                    ->money('USD'),
                Tables\Columns\TextColumn::make('order_price')
                    ->numeric()
                    ->sortable()
                    ->money('USD'),
                Tables\Columns\TextColumn::make('return_days')
                    ->numeric()
                    ->sortable(),
                    Tables\Columns\IconColumn::make('approve')
                    ->boolean()
                    ->summarize(Count::make()
                    ->query(fn (Builder $query) => $query->where('approve', true))->icons()), // No need to add a query inside summarize
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([/* Add filters if needed */])
                ->actions([
                    ActionGroup::make([
                        ViewAction::make(),
                        EditAction::make(),
                        DeleteAction::make(),
                    ]),
                    // ...
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
