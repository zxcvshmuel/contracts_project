<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use Awcodes\FilamentTableRepeater\Components\TableRepeater;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContractsRelationManager extends RelationManager
{
    protected static string $relationship = 'Contracts';


    protected static ?string $recordTitleAttribute = 'חוזים';

    protected static ?string $label = 'חוזה';

    protected static ?string $pluralModelLabel = 'חוזים';

    protected static ?string $breadcrumb = 'חוזה';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->label('צור מסמך')->schema([
                    Forms\Components\Select::make('events_id')->options(
                        auth()->user()->events->pluck('title', 'id')
                    )->preload()->required()->label('שם אירוע'),
                    Forms\Components\TextInput::make('title')->required()->label('כותרת'),
                    Forms\Components\TextInput::make('description')->required()->label('תיאור'),
                    Forms\Components\Select::make('type')->label('סוג מסמך')->options([
                        '1' => 'הצעת מחיר',
                        '2' => 'חוזה',
                    ])->required(),
                    TableRepeater::make('items')->columns(4)->columnSpan('full')->columnWidths([
                        'count' => '100px',
                        'price' => '250px',
                    ])->label('פריטים')->schema([
                        Forms\Components\TextInput::make('name')->required()->label('שם פריט')->required(),
                        Forms\Components\TextInput::make('count')->minValue(0)->numeric()->label('כמות')->default(0),
                        Forms\Components\TextInput::make('price')->minValue(0)->label('מחיר')->default(0),
                    ])->createItemButtonLabel('הוסף פריט'),
                    Forms\Components\RichEditor::make('contracts_content')
                        ->label('הערות נוספות')
                        ->disableAllToolbarButtons()
                        ->toolbarButtons([
                            'bold',
                            'bulletList',
                            'h2',
                            'h3',
                            'orderedList',
                            'redo',
                            'undo',
                        ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('כותרת'),
                Tables\Columns\TextColumn::make('description')->label('תיאור'),
                Tables\Columns\IconColumn::make('sent')->boolean()->label('נשלח'),
                Tables\Columns\IconColumn::make('opened')->boolean()->label('נצפה'),
                Tables\Columns\IconColumn::make('signed')->boolean()->label('נחתם'),
                Tables\Columns\IconColumn::make('signed_url')->boolean()->label('קישור')
                    ->url(fn ($record) => \Storage::url('/') .$record->signed_url, true),
                Tables\Columns\TextColumn::make('created_at')->label('תאריך יצירה'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
