<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = App\Models\User::first();
auth()->login($user);

// Let's modify ProductsTable temporarily or test
$action = Filament\Actions\Action::make('filter')
    ->button()
    ->label('Filter')
    ->icon('heroicon-o-funnel')
    ->badge(null);

echo "Badge value: " . var_export($action->getBadge(), true) . "\n";
