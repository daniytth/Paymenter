<?php

namespace Paymenter\Extensions\Others\Logs\Admin\Resources\LogRuleResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Paymenter\Extensions\Others\Logs\Admin\Resources\LogRuleResource;

class EditLogRule extends EditRecord
{
    protected static string $resource = LogRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('test_webhook')
                ->label('Send Test Webhook')
                ->icon('ri-send-plane-line')
                ->action(function () {
                    $result = LogRuleResource::sendTestWebhook($this->record);

                    Notification::make()
                        ->title($result['ok'] ? 'Test webhook sent' : 'Test webhook failed')
                        ->body($result['message'])
                        ->{$result['ok'] ? 'success' : 'danger'}()
                        ->send();
                }),
            DeleteAction::make(),
        ];
    }
}
