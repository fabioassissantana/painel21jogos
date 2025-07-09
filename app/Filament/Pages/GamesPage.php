<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class GamesPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 99;

    protected static string $view = 'filament.pages.games-page';

    protected static ?string $title = 'Jogos Ativos'; // Set the page title

    public array $games = [
        ['name' => 'jungle-delight', 'case' => 40],
        ['name' => 'fortune-ox', 'case' => 98],
        ['name' => 'dragon-tiger-luck', 'case' => 63],
        ['name' => 'ganesha-gold', 'case' => 42],
        ['name' => 'double-fortune', 'case' => 48],
        ['name' => 'fortune-mouse', 'case' => 68],
        ['name' => 'bikini-paradise', 'case' => 69],
        ['name' => 'fortune-tiger', 'case' => 126],
        ['name' => 'fortune-rabbit', 'case' => 1543462],
        ['name' => 'fortune-dragon', 'case' => 1695365],
        ['name' => 'cash-mania', 'case' => 1682240],
        ['name' => 'treasures-aztec', 'case' => 87],
        ['name' => 'piggy-gold', 'case' => 39],
        ['name' => 'wild-bandito', 'case' => 104],
        ['name' => 'zombie-outbreak', 'case' => 1635221],
        ['name' => 'majestic-ts', 'case' => 95],
        ['name' => 'butterfly-blossom', 'case' => 125],
        ['name' => 'fortune-snake', 'case' => 1879752],
        ['name' => 'gdn-ice-fire', 'case' => 91],
        ['name' => 'thai-river', 'case' => 92],
        ['name' => 'rise-apollo', 'case' => 101],
        ['name' => 'ninja-raccoon', 'case' => 1529867],
        ['name' => 'lucky-clover', 'case' => 1601012],
        ['name' => 'ultimate-striker', 'case' => 1489936],
        ['name' => 'three-cz-ds', 'case' => 1727711],
    ];

    

    public function getHeading(): string
    {
        return 'Jogos Ativos (' . count($this->games) . ')';
    }
}