<?php
namespace App\Filament\Resources;

use App\Filament\Resources\BrandsResource\Pages;
use App\Models\Brands;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
class BrandsResource extends Resource
{
    protected static ?string $model = Brands::class;
    protected static ?string $navigationIcon = 'heroicon-m-globe-alt';
    public static function getnavigationGroup(): string
    {
        return __('CRM'); 
    }

    public static function getmodelLabel(): string
    {
        return __('Brand');
    }

    public static function getNavigationLabel(): string
    {
        return __('Brands');
    }
    public static function getPluralModelLabel(): string
    {
        return __('Brand');
    }

    public static function getLocal(): string
    {
        return app()->getLocale();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name_en')->label('Brand Name (English)')->required(),
                TextInput::make('name_ku')->label('Brand Name (Kurdish)')->required(),
                TextInput::make('name_ar')->label('Brand Name (Arabic)')->required(),
                TextInput::make('url')->label('Brand URL')->required(),
                FileUpload::make('image')->label('Image')->image()->required(),
                Textarea::make('description_en')->label('Description (English)')->required(),
                Textarea::make('description_ku')->label('Description (Kurdish)')->required(),
                Textarea::make('description_ar')->label('Description (Arabic)')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label(__('Brand Name'))
                ->formatStateUsing(fn ($record) => $record->{'name_' . self::getLocal()})
                ->searchable(query: fn (Builder $query, string $search) => $query->where('name_' . self::getLocal(), 'like', "%{$search}%")),

                Tables\Columns\TextColumn::make('description')
                ->label(__('Description'))
                ->formatStateUsing(fn ($record) => $record->{'description_' . self::getLocal()})
                ->searchable(query: fn (Builder $query, string $search) => $query->where('description_' . self::getLocal(), 'like', "%{$search}%")),

                Tables\Columns\TextColumn::make('url')
                ->label(__('Url')),

                Tables\Columns\ImageColumn::make('image')
                ->label(__('Images'))
                ->width(200)
                ->square()
                ->size(50),
        ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrands::route('/create'),
            'edit' => Pages\EditBrands::route('/{record}/edit'),
        ];
    }
}
