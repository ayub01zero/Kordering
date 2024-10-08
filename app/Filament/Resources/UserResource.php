<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use PhpParser\Node\Stmt\Label;
use AbanoubNassem\FilamentGRecaptchaField\Forms\Components\GRecaptcha;


class UserResource extends Resource
{
    protected static ?string $model = User::class;


    public static function getnavigationGroup(): string
    {
        return __('CRM'); 
    }
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?int $navigationSort = 3;


    public static function getmodelLabel(): string
    {
        return __('User');
    }

    public static function getNavigationLabel(): string
    {
        return __('users');
    }
    public static function getPluralModelLabel(): string
    {
        return __('User');
    }
//     public static function canCreate(): bool
// {
//     return false;
// }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label(__('user_name'))
                    ->maxLength(255)
                   ->label(__(key: 'user')), 
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->label(__('email_address'))
                    ->required()
                    ->maxLength(255)
                    ,
                Forms\Components\DatePicker::make('Date_of_Birth'),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->label(__('phone_number'))
                    ->default(null)
                    ->step(10)
                    ->numeric()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255)
                    ->default(null)
                    ->translateLabel(),
                    Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
                    GRecaptcha::make('captcha')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email address copied')
                    ->copyMessageDuration(1500)
                    ->icon('heroicon-m-envelope')
                    ->iconColor('primary'),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Date_of_Birth')
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name')->label(__('user_name')),
                TextEntry::make('email')->label(__('email')),

            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\OrdersRelationManager::class,

        ];
    }

  
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
