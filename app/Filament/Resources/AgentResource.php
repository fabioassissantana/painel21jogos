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
        $appName = config('app.name');
        // Limpar e padronizar o nome
        $slug = strtolower(preg_replace('/[^a-z0-9]/i', '', str_replace('api', '', $appName)));
        $randomCode = $slug . '-' . rand(1000, 9999);
        $randomPassword = substr(bin2hex(random_bytes(4)), 0, 8);
        $uuid1 = \Illuminate\Support\Str::uuid()->toString();
        $uuid2 = \Illuminate\Support\Str::uuid()->toString();
        return $form
            ->schema([
                Forms\Components\TextInput::make('agentCode')
                    ->label('Código do Agente')
                    ->default($randomCode)
                    ->required(),
                Forms\Components\TextInput::make('senha')
                    ->label('Senha')
                    ->password()
                    ->default($randomPassword)
                    ->required(),
                Forms\Components\TextInput::make('saldo')
                    ->label('Saldo')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('agentToken')
                    ->label('Agent Token')
                    ->default($uuid1)
                    ->required(),
                Forms\Components\TextInput::make('secretKey')
                    ->label('Secret Key')
                    ->default($uuid2)
                    ->required(),
                Forms\Components\TextInput::make('probganho')
                    ->label('Probabilidade de Ganho')
                    ->default(0),
                Forms\Components\TextInput::make('probbonus')
                    ->label('Probabilidade de Bônus')
                    ->default(0),
                Forms\Components\TextInput::make('probganhortp')
                    ->label('Prob. Ganho RTP')
                    ->default(0),
                Forms\Components\TextInput::make('probganhoinfluencer')
                    ->label('Prob. Ganho Influencer')
                    ->default(0),
                Forms\Components\TextInput::make('probbonusinfluencer')
                    ->label('Prob. Bônus Influencer')
                    ->default(0),
                Forms\Components\TextInput::make('probganhoaposta')
                    ->label('Prob. Ganho Aposta')
                    ->default(0),
                Forms\Components\TextInput::make('probganhosaldo')
                    ->label('Prob. Ganho Saldo')
                    ->default(0),
                Forms\Components\TextInput::make('callbackurl')
                    ->label('Callback URL'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('agentCode'),
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
