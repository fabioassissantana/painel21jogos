<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgentResource\Pages;
use App\Filament\Resources\AgentResource\RelationManagers;
use App\Models\Agent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AgentResource extends Resource
{
    protected static ?string $model = Agent::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-user-group';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('agentCode')
                    ->label('Código do Agente')
                    ->default(fn () => Str::slug(config('app.name')) . '-' . rand(100, 999))
                    ->required()
                    ->readOnly(),
                Forms\Components\TextInput::make('senha')
                    ->label('Senha')
                    ->password()
                    ->dehydrateStateUsing(fn (?string $state): ?string => filled($state) ? bcrypt($state) : null)
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create'),
                Forms\Components\TextInput::make('agentToken')
                    ->label('Agent Token')
                    ->default(fn () => Str::uuid()->toString())
                    ->required()
                    ->readOnly(),
                Forms\Components\TextInput::make('secretKey')
                    ->label('Secret Key')
                    ->default(fn () => Str::uuid()->toString())
                    ->required()
                    ->readOnly(),
                Forms\Components\TextInput::make('saldo')
                    ->label('Saldo')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('probganho')
                    ->label('Probabilidade de Ganho (%)')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('probbonus')
                    ->label('Probabilidade de Bônus (%)')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('callbackurl')
                    ->label('URL de Callback')
                    ->default('')
                    ->url(),
                Forms\Components\TextInput::make('ip')
                    ->label('IP Permitido')
                    ->default(''),
                Forms\Components\TextInput::make('dias_restantes')
                    ->label('Dias Restantes')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('agentCode'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('senha'),
                Tables\Columns\TextColumn::make('saldo'),
                Tables\Columns\TextColumn::make('agentToken'),
                Tables\Columns\TextColumn::make('secretKey'),
                Tables\Columns\TextColumn::make('probganho'),
                Tables\Columns\TextColumn::make('probbonus'),
                Tables\Columns\TextColumn::make('probganhortp'),
                Tables\Columns\TextColumn::make('probganhoinfluencer'),
                Tables\Columns\TextColumn::make('probbonusinfluencer'),
                Tables\Columns\TextColumn::make('probganhoaposta'),
                Tables\Columns\TextColumn::make('probganhosaldo'),
                Tables\Columns\TextColumn::make('callbackurl'),
                Tables\Columns\TextColumn::make('ip'),
                Tables\Columns\TextColumn::make('dias_restantes'),
                Tables\Columns\TextColumn::make('created_at'),
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
        if (Auth::guard('agent')->check()) {
            // Agent can only view and edit their own data
            return [
                'index' => Pages\ListAgents::route('/'),
                'edit' => Pages\EditAgent::route('/{record}/edit'),
            ];
        }
        
        // Admin has full control
        return [
            'index' => Pages\ListAgents::route('/'),
            'create' => Pages\CreateAgent::route('/create'),
            'edit' => Pages\EditAgent::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if (Auth::guard('agent')->check()) {
            return parent::getEloquentQuery()->where('id', Auth::guard('agent')->id());
        }

        return parent::getEloquentQuery();
    }
}
