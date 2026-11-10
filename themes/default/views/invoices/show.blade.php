@php($accent = \App\Classes\InvoiceStyle::accent())
<div class="container mt-14">
    <div @if ($checkPayment) wire:poll.5s="checkPaymentStatus" @endif>
        @if ($this->pay || $showPayModal)
        @include('invoices.partials.payment-modal')
        @endif

        <div class="flex justify-end">
            <button
                class="inline-flex cursor-pointer items-center gap-2 text-sm font-medium underline underline-offset-4 transition-colors hover:text-primary"
                wire:click="downloadPDF">
                <span wire:loading wire:target="downloadPDF">
                    <x-ri-loader-5-fill class="size-4 animate-spin" />
                </span>
                <span wire:loading.remove wire:target="downloadPDF">
                    {{ __('invoices.download_pdf') }}
                </span>
            </button>
        </div>

        <div
            class="font-serif bg-background-secondary border border-neutral rounded-lg mt-2 p-8 sm:p-12 [--invoice-accent:{{ $accent['hex'] }}] dark:[--invoice-accent:{{ $accent['hex_light'] }}] [--invoice-soft:rgba({{ $accent['rgb'] }},0.06)] dark:[--invoice-soft:rgba({{ $accent['rgb_light'] }},0.10)]">

            {{-- Document header --}}
            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between pb-6 border-b-[3px] border-double border-(--invoice-accent)">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold uppercase tracking-wide text-(--invoice-accent)">
                        {{ !$invoice->number && config('settings.invoice_proforma', false) ? __('invoices.proforma_invoice', ['id' => $invoice->id]) : __('invoices.invoice', ['id' => $invoice->number]) }}
                    </h1>
                    <p class="mt-2 text-sm text-muted">
                        {{ !$invoice->number && config('settings.invoice_proforma', false) ? __('invoices.proforma_invoice_date') : __('invoices.invoice_date') }}:
                        {{ $invoice->created_at->format('d M Y') }}
                        @if($invoice->due_at)
                        &middot; {{ __('invoices.due_date') }}: {{ $invoice->due_at->format('d M Y') }}
                        @endif
                        @if($invoice->number)
                        &middot; {{ __('invoices.invoice_no') }}: {{ $invoice->number }}
                        @endif
                    </p>
                </div>
                @if ($invoice->status == 'paid')
                <span
                    class="inline-flex self-start items-center border border-success px-3 py-1 text-xs font-bold uppercase tracking-widest text-success sm:self-auto">
                    {{ __('invoices.paid') }}
                </span>
                @elseif ($invoice->status == 'pending')
                @php
                    $processingTransactions = $invoice->transactions->where('status', \App\Enums\InvoiceTransactionStatus::Processing);
                    $recentProcessing = $processingTransactions->where('created_at', '>=', now()->subDays(1))->count() > 0;
                @endphp
                @if($checkPayment || $recentProcessing)
                <span
                    class="inline-flex self-start items-center gap-2 border border-warning px-3 py-1 text-xs font-bold uppercase tracking-widest text-warning sm:self-auto">
                    {{ __('invoices.payment_processing') }}
                    <x-ri-loader-5-fill aria-hidden="true" class="size-4 fill-warning animate-spin" />
                </span>
                @else
                <div class="sm:text-right sm:ml-auto sm:max-w-[300px]">
                    @if($processingTransactions->count() > 0)
                    <span class="text-warning font-semibold uppercase tracking-widest text-xs">
                        {{ __('invoices.payment_processing') }}
                    </span>
                    <p class="text-sm text-muted">{{ __('invoices.duplicate_payment') }}</p>
                    @else
                    <span class="text-warning font-semibold uppercase tracking-widest text-xs">
                        {{ __('invoices.payment_pending') }}
                    </span>
                    @endif
                    <x-button.primary wire:click="$set('showPayModal', true)" class="mt-3 font-sans"
                        wire:loading.attr="disabled" wire:target="$set('showPayModal')">
                        <span wire:loading wire:target="pay">Processing...</span>
                        <span wire:loading.remove wire:target="pay">Pay</span>
                    </x-button.primary>
                </div>
                @endif
                @else
                <span
                    class="inline-flex self-start items-center border border-muted px-3 py-1 text-xs font-bold uppercase tracking-widest text-muted sm:self-auto">
                    {{ ucfirst($invoice->status) }}
                </span>
                @endif
            </div>

            {{-- Addresses --}}
            <div class="grid gap-6 mt-8 sm:grid-cols-2">
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-muted border-b border-neutral pb-2 mb-3">
                        {{ __('invoices.issued_to') }}
                    </p>
                    <p class="text-base">{{ $invoice->user_name }}</p>
                    @foreach($invoice->user_properties as $property)
                    <p class="text-base text-muted">{{ $property }}</p>
                    @endforeach
                </div>
                <div class="sm:border-l border-neutral sm:ps-6">
                    <p class="text-xs font-bold uppercase tracking-widest text-muted border-b border-neutral pb-2 mb-3">
                        {{ __('invoices.bill_to') }}
                    </p>
                    <div class="text-base text-muted">
                        {!! nl2br(e($invoice->bill_to)) !!}
                    </div>
                </div>
            </div>

            {{-- Items --}}
            <div class="mt-10 overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-(--invoice-accent)">
                            <th scope="col"
                                class="py-3 text-xs font-bold tracking-widest text-left uppercase">
                                {{ __('invoices.item') }}
                            </th>
                            <th scope="col"
                                class="py-3 text-xs font-bold tracking-widest text-right uppercase">
                                {{ __('invoices.price') }}
                            </th>
                            <th scope="col"
                                class="py-3 text-xs font-bold tracking-widest text-right uppercase">
                                {{ __('invoices.quantity') }}
                            </th>
                            <th scope="col"
                                class="py-3 text-xs font-bold tracking-widest text-right uppercase">
                                {{ __('invoices.total') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral">
                        @foreach ($invoice->items as $item)
                        <tr class="even:bg-(--invoice-soft)">
                            <td class="py-4 pe-4 font-normal">
                                @if(in_array($item->reference_type, ['App\Models\Service', 'App\Models\ServiceUpgrade']))
                                <a href="{{ route('services.show', $item->reference_type == 'App\Models\Service' ? $item->reference_id : $item->reference->service_id) }}"
                                    class="underline underline-offset-2">{{ $item->description }}
                                </a>
                                @else
                                {{ $item->description }}
                                @endif

                                @if($item->reference && $item->reference->label)
                                <br><small class="text-muted text-sm">{{ $item->reference->label }}</small>
                                @endif
                            </td>
                            <td class="py-4 pe-4 font-normal whitespace-nowrap text-right">{{ $item->formattedPrice }}
                            </td>
                            <td class="py-4 pe-4 font-normal whitespace-nowrap text-right">{{ $item->quantity }}</td>
                            <td class="py-4 whitespace-nowrap font-semibold text-right">{{ $item->formattedTotal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Totals --}}
            @php
                $adjustmentsTotal = $invoice->adjustmentNotes->filter(fn ($note) => $note->status === \App\Enums\AdjustmentNoteStatus::Active)->sum('amount');
                $adjustmentsPrice = new App\Classes\Price(['price' => $adjustmentsTotal, 'currency' => $invoice->currency]);
            @endphp
            <div class="mt-10 ml-auto w-full sm:w-80 space-y-2">
                @if ($invoice->formattedTotal->tax > 0)
                <div class="flex justify-between">
                    <div class="text-sm font-medium text-muted uppercase">{{ __('invoices.subtotal') }}</div>
                    <div class="text-base font-medium">{{ $invoice->formattedTotal->format($invoice->formattedTotal->subtotal) }}</div>
                </div>
                <div class="flex justify-between">
                    <div class="text-sm font-medium text-muted uppercase">
                        {{ $invoice->tax->name }} ({{ $invoice->tax->rate }}%)
                    </div>
                    <div class="text-base font-medium">{{ $invoice->formattedTotal->formatted->tax }}</div>
                </div>
                @endif
                @if($adjustmentsTotal != 0)
                <div class="flex justify-between">
                    <div class="text-sm font-medium text-muted uppercase">{{ __('invoices.ledger_adjustments') }}</div>
                    <div class="text-base font-medium">{{ $adjustmentsPrice->format($adjustmentsTotal) }}</div>
                </div>
                @endif
                <div
                    class="mt-3 pt-3 flex justify-between items-baseline border-b-[3px] border-double border-(--invoice-accent)">
                    <div class="text-sm font-bold uppercase tracking-widest">{{ __('invoices.total') }}</div>
                    <div class="text-xl font-bold text-(--invoice-accent)">{{ $invoice->formattedTotal }}</div>
                </div>
            </div>

            {{-- Transactions --}}
            @if ($invoice->transactions->isNotEmpty())
            @php
                $hasRefunds = $invoice->transactions->contains(fn ($transaction) => $transaction->refunded_amount > 0);
            @endphp
            <div class="mt-14">
                <h2 class="text-xs font-bold uppercase tracking-widest border-b border-neutral pb-2 mb-4">
                    {{ __('invoices.transactions') }}
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b-2 border-neutral">
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-left uppercase">
                                    {{ __('invoices.date') }}
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-left uppercase">
                                    {{ __('invoices.transaction_id') }}
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-left uppercase">
                                    {{ __('invoices.gateway') }}
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-right uppercase">
                                    {{ __('invoices.amount') }}
                                </th>
                                @if($hasRefunds)
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-right uppercase">
                                    {{ __('invoices.refunded_amount') }}
                                </th>
                                @endif
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-left uppercase">
                                    {{ __('invoices.status') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral">
                            @foreach ($invoice->transactions->sortByDesc('created_at') as $transaction)
                            <tr class="even:bg-(--invoice-soft)">
                                <td class="py-4 font-normal whitespace-nowrap">
                                    {{ $transaction->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="py-4 font-normal whitespace-nowrap">{{ $transaction->transaction_id }}
                                </td>
                                <td class="py-4 font-normal whitespace-nowrap">
                                    @if($transaction->is_credit_transaction)
                                    {{ __('invoices.paid_with_credits') }}
                                    @else
                                    {{ $transaction->gateway?->name }}
                                    @endif
                                </td>
                                <td class="py-4 font-normal whitespace-nowrap text-right">{{ $transaction->formattedAmount }}
                                </td>
                                @if($hasRefunds)
                                <td class="py-4 font-normal whitespace-nowrap text-right">
                                    @if($transaction->refunded_amount > 0)
                                    {{ $transaction->formattedRefundedAmount }}
                                    @else
                                    -
                                    @endif
                                </td>
                                @endif
                                <td class="py-4 font-normal whitespace-nowrap">
                                    @if($transaction->status == \App\Enums\InvoiceTransactionStatus::Succeeded)
                                    <span class="text-success font-semibold">{{
                                        __('invoices.transaction_statuses.succeeded') }}</span>
                                    @elseif($transaction->status == \App\Enums\InvoiceTransactionStatus::Processing)
                                    <span class="text-warning font-semibold flex items-center">
                                        {{ __('invoices.transaction_statuses.processing') }}
                                        <x-ri-loader-5-fill aria-hidden="true"
                                            class="size-5 ms-2 fill-warning animate-spin" />
                                    </span>
                                    @elseif($transaction->status == \App\Enums\InvoiceTransactionStatus::Failed)
                                    <span class="text-error font-semibold">{{ __('invoices.transaction_statuses.failed')
                                        }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            {{-- Ledger adjustments --}}
            @php
                $clientAdjustmentNotes = $invoice->adjustmentNotes;
            @endphp
            @if (config('settings.notes_client_visible', false) && $clientAdjustmentNotes->isNotEmpty())
            <div class="mt-14">
                <h2 class="text-xs font-bold uppercase tracking-widest border-b border-neutral pb-2 mb-4">
                    {{ __('invoices.ledger_adjustments') }}
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b-2 border-neutral">
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-left uppercase">
                                    {{ __('invoices.date') }}
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-left uppercase">
                                    {{ __('invoices.type') }}
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-left uppercase">
                                    {{ __('invoices.status') }}
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-left uppercase">
                                    {{ __('invoices.description') }}
                                </th>
                                <th scope="col"
                                    class="py-3 text-xs font-semibold tracking-widest text-right uppercase">
                                    {{ __('invoices.amount') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral">
                            @foreach ($clientAdjustmentNotes as $note)
                            <tr class="even:bg-(--invoice-soft)">
                                <td class="py-4 font-normal whitespace-nowrap">
                                    {{ $note->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="py-4 font-normal whitespace-nowrap">
                                    @if($note->type === \App\Enums\AdjustmentNoteType::Credit->value)
                                    <span class="text-success font-semibold">{{ __('invoices.credit_note') }}</span>
                                    @elseif($note->type === \App\Enums\AdjustmentNoteType::Debit->value)
                                    <span class="text-error font-semibold">{{ __('invoices.debit_note') }}</span>
                                    @endif
                                </td>
                                <td class="py-4 font-normal whitespace-nowrap">
                                    <span class="{{ $note->status === \App\Enums\AdjustmentNoteStatus::Voided ? 'text-error line-through' : 'text-success' }}">
                                        {{ ucfirst($note->status instanceof \App\Enums\AdjustmentNoteStatus ? $note->status->value : $note->status) }}
                                    </span>
                                </td>
                                <td class="py-4 font-normal">
                                    {{ $note->description }}
                                </td>
                                <td class="py-4 font-normal whitespace-nowrap text-right">
                                    <span class="{{ $note->type === \App\Enums\AdjustmentNoteType::Credit->value ? 'text-success' : 'text-error' }}">
                                        {{ $note->formattedAmount }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

        </div>

    </div>
</div>
