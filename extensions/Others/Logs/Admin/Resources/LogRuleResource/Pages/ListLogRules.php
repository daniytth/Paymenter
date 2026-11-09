<?php

namespace Paymenter\Extensions\Others\Logs\Admin\Resources\LogRuleResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Paymenter\Extensions\Others\Logs\Admin\Resources\LogRuleResource;
use Paymenter\Extensions\Others\Logs\Models\LogRule;
use Throwable;

class ListLogRules extends ListRecords
{
    protected static string $resource = LogRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('install_presets')
                ->label('Install Presets')
                ->icon('ri-magic-line')
                ->requiresConfirmation()
                ->modalDescription('Install all pre-made rule templates. Existing rule names will not be duplicated.')
                ->action(function () {
                    try {
                        $created = 0;
                        foreach (LogRuleResource::presets() as $preset) {
                            $name = (string)($preset['name'] ?? 'Preset');
                            if (LogRule::query()->where('name', $name)->exists()) {
                                continue;
                            }
                            LogRule::query()->create($preset);
                            $created++;
                        }

                        Notification::make()
                            ->title('Preset rules installed')
                            ->body($created . ' new preset rules created.')
                            ->success()
                            ->send();
                    } catch (Throwable $e) {
                        report($e);
                        Notification::make()
                            ->title('Failed to install presets')
                            ->body('Could not create preset rules. Check logs for details.')
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }
}
