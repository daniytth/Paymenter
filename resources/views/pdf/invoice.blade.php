<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>{{ !$invoice->number && config('settings.invoice_proforma', false) ? __('invoices.proforma_invoice', ['id' => $invoice->id]) : __('invoices.invoice', ['id' => $invoice->number]) }}</title>
    @php($accent = \App\Classes\InvoiceStyle::accent())
    <style>
        @page {
            margin: 20mm 16mm 24mm 16mm;
        }

        body {
            font-family: "DejaVu Serif", "Times-Roman", Times, serif;
            font-size: 10pt;
            color: #262626;
            line-height: 1.55;
        }

        /* Masthead */
        .masthead {
            width: 100%;
            border-collapse: collapse;
        }

        .masthead .brand {
            vertical-align: top;
            width: 55%;
            padding-top: 4pt;
        }

        .masthead .brand .company {
            font-size: 15pt;
            font-weight: bold;
            color: {{ $accent['hex'] }};
            letter-spacing: 0.5pt;
        }

        .masthead .doc-title {
            vertical-align: top;
            text-align: right;
            font-size: 15pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.5pt;
            color: {{ $accent['hex'] }};
        }

        .double-rule {
            border-bottom: 3px double {{ $accent['hex'] }};
            margin-top: 12pt;
        }

        /* Meta strip (dates + status) */
        .meta {
            width: 100%;
            border-collapse: collapse;
            margin-top: 14pt;
        }

        .meta td {
            vertical-align: top;
            font-size: 9.5pt;
        }

        .meta .dates {
            color: #4a4a4a;
        }

        .meta .dates strong {
            color: #262626;
        }

        .meta .status {
            text-align: right;
        }

        .badge {
            display: inline-block;
            border: 1pt solid #2e7d32;
            color: #2e7d32;
            padding: 2pt 12pt;
            font-size: 9.5pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.5pt;
        }

        .badge-unpaid {
            border-color: #b26a00;
            color: #b26a00;
        }

        /* Addresses */
        .addresses {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18pt;
        }

        .addresses td {
            vertical-align: top;
            font-size: 10pt;
        }

        .addresses .col {
            width: 45%;
        }

        .addresses .col-title {
            font-size: 8.5pt;
            text-transform: uppercase;
            letter-spacing: 1.5pt;
            color: #7a7a7a;
            border-bottom: 1px solid #d9d9d9;
            padding-bottom: 4pt;
            margin-bottom: 6pt;
        }

        .addresses .separator {
            width: 10%;
        }

        .address-body {
            font-size: 9.5pt;
            color: #333333;
        }

        /* Items table */
        .items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 22pt;
        }

        .items th {
            background-color: {{ $accent['hex'] }};
            color: #ffffff;
            font-size: 8.5pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.2pt;
            text-align: left;
            padding: 7pt 8pt;
        }

        .items th.num {
            text-align: right;
        }

        .items td {
            padding: 7pt 8pt;
            border-bottom: 1px solid #dcdcdc;
            vertical-align: top;
            font-size: 10pt;
        }

        .items td.num {
            text-align: right;
            white-space: nowrap;
        }

        .items tr.alt td {
            background-color: {{ $accent['hex_soft'] }};
        }

        .items .ref {
            color: #6b6b6b;
            font-size: 9pt;
        }

        /* Totals */
        .totals-wrap {
            float: right;
            width: 270pt;
            margin-top: 16pt;
        }

        .totals {
            width: 100%;
            border-collapse: collapse;
        }

        .totals td {
            padding: 5pt 0 5pt 8pt;
            font-size: 10pt;
        }

        .totals .label {
            color: #555555;
        }

        .totals .amount {
            text-align: right;
            white-space: nowrap;
        }

        .totals .grand-total td {
            border-top: 1px solid #b9b9b9;
            border-bottom: 3px double {{ $accent['hex'] }};
            padding: 8pt 0 8pt 8pt;
            font-weight: bold;
            font-size: 11.5pt;
        }

        .totals .grand-total .label {
            color: #262626;
            text-transform: uppercase;
            letter-spacing: 1pt;
        }

        .totals .grand-total .amount {
            color: {{ $accent['hex'] }};
        }

        /* Secondary sections (transactions, adjustments) */
        .section {
            margin-top: 34pt;
        }

        .section-title {
            font-size: 8.5pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.5pt;
            color: #262626;
            border-bottom: 1px solid #d9d9d9;
            padding-bottom: 4pt;
            margin-bottom: 8pt;
        }

        .items.secondary th {
            background-color: {{ $accent['hex_soft'] }};
            color: {{ $accent['hex'] }};
        }

        .muted {
            color: #6b6b6b;
        }

        /* Footer (repeats on every page) */
        .footer {
            position: fixed;
            bottom: 8mm;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 8pt;
            color: #8c8c8c;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    {{-- Masthead: brand left, document title right --}}
    <table class="masthead">
        <tr>
            <td class="brand">
                @if(config('settings.logo'))
                    <img style="height: 34px" src="{{ public_path('storage/' . config('settings.logo')) }}"
                        alt="{{ config('app.name') }}">
                @else
                    <span class="company">{{ config('app.name') }}</span>
                @endif
            </td>
            <td class="doc-title">
                {{ !$invoice->number && config('settings.invoice_proforma', false) ? __('invoices.proforma_invoice', ['id' => $invoice->id]) : __('invoices.invoice', ['id' => $invoice->number]) }}
            </td>
        </tr>
    </table>
    <div class="double-rule"></div>

    {{-- Meta strip: dates left, status right --}}
    <table class="meta">
        <tr>
            <td class="dates">
                {{ !$invoice->number && config('settings.invoice_proforma', false) ? __('invoices.proforma_invoice_date') : __('invoices.invoice_date') }}:
                <strong>{{ $invoice->created_at->translatedFormat('d M Y') }}</strong><br />
                @if($invoice->due_at)
                {{ __('invoices.due_date') }}: <strong>{{ $invoice->due_at->translatedFormat('d M Y') }}</strong>
                @endif
            </td>
            <td class="status">
                <span class="badge @if($invoice->status != 'paid') badge-unpaid @endif">{{ ucfirst($invoice->status) }}</span>
            </td>
        </tr>
    </table>

    {{-- Addresses --}}
    <table class="addresses">
        <tr>
            <td class="col">
                <div class="col-title">{{ __('invoices.issued_to') }}</div>
                <div class="address-body">
                    {{ $invoice->user_name }}<br />
                    @foreach($invoice->user_properties as $property)
                    {{ $property }}<br />
                    @endforeach
                </div>
            </td>
            <td class="separator"></td>
            <td class="col">
                <div class="col-title">{{ __('invoices.bill_to') }}</div>
                <div class="address-body">
                    {!! nl2br(e($invoice->bill_to)) !!}
                </div>
            </td>
        </tr>
    </table>

    {{-- Items --}}
    <table class="items">
        <thead>
            <tr>
                <th>{{ __('invoices.item') }}</th>
                <th class="num" style="width: 60pt">{{ __('invoices.quantity') }}</th>
                <th class="num" style="width: 100pt">{{ __('invoices.unit_price') }}</th>
                <th class="num" style="width: 100pt">{{ __('invoices.total') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
            <tr @class(['alt' => $loop->iteration % 2 === 0])>
                <td>
                    {{ $item->description }}
                    @if($item->reference && $item->reference->label)
                    <br /><span class="ref">{{ $item->reference->label }}</span>
                    @endif
                </td>
                <td class="num">{{ $item->quantity }}</td>
                <td class="num">{{ $item->formattedPrice }}</td>
                <td class="num">{{ $item->formattedTotal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Totals --}}
    @php
        $adjustmentsTotal = $invoice->adjustmentNotes->filter(fn ($note) => $note->status === \App\Enums\AdjustmentNoteStatus::Active)->sum('amount');
        $adjustmentsPrice = new \App\Classes\Price(['price' => $adjustmentsTotal, 'currency' => $invoice->currency]);
    @endphp
    <div class="totals-wrap">
        <table class="totals">
            @if ($invoice->formattedTotal->tax > 0)
            <tr>
                <td class="label">{{ __('invoices.subtotal') }}</td>
                <td class="amount">{{ $invoice->formattedTotal->format($invoice->formattedTotal->price - $invoice->formattedTotal->tax) }}</td>
            </tr>
            <tr>
                <td class="label">{{ $invoice->tax->name }} ({{ $invoice->tax->rate }}%)</td>
                <td class="amount">{{ $invoice->formattedTotal->formatted->tax }}</td>
            </tr>
            @endif
            @if($adjustmentsTotal != 0)
            <tr>
                <td class="label">{{ __('invoices.ledger_adjustments') }}</td>
                <td class="amount">{{ $adjustmentsPrice->format($adjustmentsTotal) }}</td>
            </tr>
            @endif
            <tr class="grand-total">
                <td class="label">{{ __('invoices.total') }}</td>
                <td class="amount">{{ $invoice->formattedTotal }}</td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>

    {{-- Ledger adjustments --}}
    @php
        $clientAdjustmentNotes = $invoice->adjustmentNotes;
    @endphp
    @if (config('settings.notes_client_visible', false) && $clientAdjustmentNotes->isNotEmpty())
    <div class="section">
        <div class="section-title">{{ __('invoices.ledger_adjustments') }}</div>
        <table class="items secondary">
            <thead>
                <tr>
                    <th>{{ __('invoices.date') }}</th>
                    <th>{{ __('invoices.type') }}</th>
                    <th>{{ __('invoices.status') }}</th>
                    <th>{{ __('invoices.description') }}</th>
                    <th class="num">{{ __('invoices.amount') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientAdjustmentNotes as $note)
                <tr @class(['alt' => $loop->iteration % 2 === 0])>
                    <td>{{ $note->created_at->format('d/m/Y') }}</td>
                    <td>
                        @if($note->type === \App\Enums\AdjustmentNoteType::Credit->value)
                        {{ __('invoices.credit_note') }}
                        @elseif($note->type === \App\Enums\AdjustmentNoteType::Debit->value)
                        {{ __('invoices.debit_note') }}
                        @endif
                    </td>
                    <td>
                        @if($note->status === \App\Enums\AdjustmentNoteStatus::Voided)
                        <span class="muted" style="text-decoration: line-through;">{{ ucfirst($note->status instanceof \App\Enums\AdjustmentNoteStatus ? $note->status->value : $note->status) }}</span>
                        @else
                        {{ ucfirst($note->status instanceof \App\Enums\AdjustmentNoteStatus ? $note->status->value : $note->status) }}
                        @endif
                    </td>
                    <td>{{ $note->description }}</td>
                    <td class="num">{{ $note->formattedAmount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    {{-- Transactions --}}
    @php
        $successfulTransactions = $invoice->transactions->where('status', \App\Enums\InvoiceTransactionStatus::Succeeded);
        $hasRefunds = $successfulTransactions->contains(fn ($transaction) => $transaction->refunded_amount > 0);
    @endphp
    @if($successfulTransactions->isNotEmpty())
    <div class="section">
        <div class="section-title">{{ __('invoices.transactions') }}</div>
        <table class="items secondary">
            <thead>
                <tr>
                    <th>{{ __('invoices.transaction_id') }}</th>
                    <th>{{ __('invoices.payment_date') }}</th>
                    <th class="num">{{ __('invoices.amount') }}</th>
                    @if($hasRefunds)
                    <th class="num">{{ __('invoices.refunded_amount') }}</th>
                    @endif
                    <th>{{ __('invoices.payment_method') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($successfulTransactions as $transaction)
                <tr @class(['alt' => $loop->iteration % 2 === 0])>
                    <td>{{ $transaction->transaction_id }}</td>
                    <td>{{ $transaction->created_at->translatedFormat('d M Y') }}</td>
                    <td class="num">{{ $transaction->formattedAmount }}</td>
                    @if($hasRefunds)
                    <td class="num">
                        @if($transaction->refunded_amount > 0)
                        {{ $transaction->formattedRefundedAmount }}
                        @else
                        -
                        @endif
                    </td>
                    @endif
                    <td>{{ $transaction->gateway ? $transaction->gateway->name : '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    {{-- Footer --}}
    @php
        $host = parse_url(config('app.url'), PHP_URL_HOST);
    @endphp
    <div class="footer">
        {{ config('app.name') }}@if($host) &nbsp;&middot;&nbsp; {{ $host }}@endif
    </div>
</body>

</html>
