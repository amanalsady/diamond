<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Models\Brand;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Livewire\TemporaryUploadedFile;
use Nette\Utils\Random;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-s-flag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string) str($file->getClientOriginalName())->prepend(Random::generate(8));
                    })
                    ->required(),
                Forms\Components\Textarea::make('facebook')
                    ->required(),
                Forms\Components\Textarea::make('twitter')
                    ->required(),
                Forms\Components\Textarea::make('instagram')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('facebook')
                    ->limit(25)
                    ->url(fn (Brand $record): string => $record->facebook)
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('twitter')
                    ->limit(25)
                    ->url(fn (Brand $record): string => $record->twitter)
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('instagram')
                    ->limit(25)
                    ->url(fn (Brand $record): string => $record->instagram)
                    ->openUrlInNewTab(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
