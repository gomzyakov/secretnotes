<?php

namespace App\Filament\Resources\NoteResource\Pages;

use App\Filament\Resources\NoteResource;
use Exception;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNotes extends ListRecords
{
    protected static string $resource = NoteResource::class;

    /**
     * @throws Exception
     *
     * @return array<mixed>
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
