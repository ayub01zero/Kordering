<?php

namespace App\Filament\Resources\BrandsResource\Pages;

use App\Filament\Resources\BrandsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Kenepa\ResourceLock\Resources\Pages\Concerns\UsesResourceLock;

class EditBrands extends EditRecord
{
    protected static string $resource = BrandsResource::class;
    use UsesResourceLock;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
