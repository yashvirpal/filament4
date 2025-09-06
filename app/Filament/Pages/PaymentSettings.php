<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
use UnitEnum;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Cache;


class PaymentSettings extends Page implements HasForms
{
    use InteractsWithForms;

    /** Form state */
    public ?array $data = [];

    /** Use instance (non-static) view to avoid conflicts */
    protected string $view = 'filament.pages.payment-settings';

    /** Sidebar/title (match parent signatures) */


    public static function getNavigationGroup(): string|null
    {
        return 'System Settings';
    }

    public function mount(): void
    {
        $setting = Setting::firstOrCreate([]);
        // preload state
        $this->data = $setting->only([
            'account_holder',
            'account_number',
            'bank',
            'branch',
            'neft_details',
            'gpay',
            'paytm',
            'helpline_number',
        ]);

        $this->form->fill($this->data);
    }

    /** ✅ Filament v4 expects Schema here, not Form */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('account_holder')->label('Account Holder')->maxLength(255),
                TextInput::make('account_number')->label('Account Number')->maxLength(255),
                TextInput::make('bank')->label('Bank')->maxLength(255),
                TextInput::make('branch')->label('Branch')->maxLength(255),
                TextInput::make('neft_details')->label('NEFT / IFSC Code')->maxLength(50),
                TextInput::make('gpay')->label('GPAY (UPI / Number)')->maxLength(255),
                TextInput::make('paytm')->label('Paytm (UPI / Number)')->maxLength(255),
                TextInput::make('helpline_number')->label('Helpline Number')->maxLength(30),
            ])
            ->statePath('data'); // bind to $data
    }

    public function save(): void
    {
        $setting = Setting::firstOrCreate([]);
        $setting->fill($this->data)->save();
        Cache::forget('app_settings');
        Notification::make()
            ->title('Payment settings updated successfully.')
            ->success()
            ->send();
    }
}
