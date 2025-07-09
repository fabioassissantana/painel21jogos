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
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-user';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('username')
                    ->label('Nome de Usuário')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('token')
                    ->label('Token')
                    ->maxLength(255),
                Forms\Components\TextInput::make('atk')
                    ->label('ATK')
                    ->maxLength(255),
                Forms\Components\TextInput::make('saldo')
                    ->label('Saldo')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('valorapostado')
                    ->label('Valor Apostado')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('valordebitado')
                    ->label('Valor Debitado')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('valorganho')
                    ->label('Valor Ganho')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('rtp')
                    ->label('RTP')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('isinfluencer')
                    ->label('É Influenciador')
                    ->inline(false),
                Forms\Components\TextInput::make('linha_ganho')
                    ->label('Linha de Ganho')
                    ->maxLength(255),
                Forms\Components\TextInput::make('agentid')
                    ->label('ID do Agente')
                    ->numeric()
                    ->required()
                    ->readOnly(), // Agente não pode mudar o agentid
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('username'),
                Tables\Columns\TextColumn::make('token'),
                Tables\Columns\TextColumn::make('atk'),
                Tables\Columns\TextColumn::make('saldo'),
                Tables\Columns\TextColumn::make('valorapostado'),
                Tables\Columns\TextColumn::make('valordebitado'),
                Tables\Columns\TextColumn::make('valorganho'),
                Tables\Columns\TextColumn::make('rtp'),
                Tables\Columns\IconColumn::make('isinfluencer')
                    ->boolean(),
                Tables\Columns\TextColumn::make('linha_ganho'),
                Tables\Columns\TextColumn::make('agentid'),
            ])
            ->filters([
                //
            ])
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if (Auth::guard('agent')->check()) {
            return parent::getEloquentQuery()->where('agentid', Auth::guard('agent')->id());
        }

        // Admin sees all users
        return parent::getEloquentQuery();
    }
}
