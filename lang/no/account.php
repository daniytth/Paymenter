<?php

return [
    'account' => 'Konto',
    'personal_details' => 'Personlige opplysninger',
    'security' => 'Sikkerhet',
    'credits' => 'Kreditt',

    'change_password' => 'Endre passord',

    'two_factor_authentication' => 'Tofaktorautentisering',
    'two_factor_authentication_description' => 'Legg til et ekstra sikkerhetslag for kontoen din ved å aktivere tofaktorautentisering.',
    'two_factor_authentication_enabled' => 'Tofaktorautentisering er aktivert for kontoen din.',
    'two_factor_authentication_enable' => 'Aktiver tofaktorautentisering',
    'two_factor_authentication_disable' => 'Deaktiver tofaktorautentisering',
    'two_factor_authentication_disable_description' => 'Er du sikker på at du vil deaktivere tofaktorautentisering? Dette fjerner det ekstra sikkerhetslaget fra kontoen din.',
    'two_factor_authentication_enable_description' => 'For å aktivere tofaktorautentisering må du skanne QR-koden nedenfor med en autentiseringsapp som Google Authenticator eller Authy.',
    'two_factor_authentication_qr_code' => 'Skann QR-koden nedenfor med autentiseringsappen din:',
    'two_factor_authentication_secret' => 'Eller skriv inn følgende kode manuelt:',

    'sessions' => 'Økter',
    'sessions_description' => 'Administrer og logg ut dine aktive økter i andre nettlesere og enheter.',
    'logout_sessions' => 'Logg ut denne økten',
    'current_device' => 'Nåværende enhet',

    'input' => [
        'current_password' => 'Nåværende passord',
        'current_password_placeholder' => 'Ditt nåværende passord',
        'new_password' => 'Nytt passord',
        'new_password_placeholder' => 'Ditt nye passord',
        'confirm_password' => 'Bekreft passord',
        'confirm_password_placeholder' => 'Bekreft nytt passord',

        'two_factor_code' => 'Skriv inn koden fra autentiseringsappen',
        'two_factor_code_placeholder' => 'Din tofaktorautentiseringskode',

        'currency' => 'Valuta',
        'amount' => 'Beløp',
        'payment_gateway' => 'Betalingsløsning',
    ],

    'notifications' => [
        'password_changed' => 'Passordet er endret.',
        'password_incorrect' => 'Oppgitt passord er feil.',
        'two_factor_enabled' => 'Tofaktorautentisering er aktivert.',
        'two_factor_disabled' => 'Tofaktorautentisering er deaktivert.',
        'two_factor_code_incorrect' => 'Koden er feil.',
        'session_logged_out' => 'Økten er logget ut.',
        'unauthorized' => 'Denne handlingen er ikke tillatt.',
    ],

    'no_credit' => 'Du har ingen kreditt.',
    'add_credit' => 'Legg til kreditt',
    'credit_deposit' => 'Kredittinnskudd (:currency)',

    'payment_methods' => 'Betalingsmetoder',
    'recent_transactions' => 'Nylige transaksjoner',
    'saved_payment_methods' => 'Lagrede betalingsmetoder',
    'setup_payment_method' => 'Sett opp en ny betalingsmetode',
    'no_saved_payment_methods' => 'Du har ingen lagrede betalingsmetoder.',
    'saved_payment_methods_description' => 'Administrer dine lagrede betalingsmetoder for raskere utsjekking og automatiske betalinger.',
    'no_saved_payment_methods_description' => 'Du kan legge til en betalingsmetode for å gjøre fremtidige betalinger raskere og enklere, og aktivere automatiske betalinger for tjenestene dine.',
    'add_payment_method' => 'Legg til betalingsmetode',
    'payment_method_statuses' => [
        'active' => 'Aktiv',
        'inactive' => 'Inaktiv',
        'expired' => 'Utgått',
        'pending' => 'Avventer',
    ],
    'payment_method_added' => 'Betalingsmetoden er lagt til.',
    'payment_method_add_failed' => 'Kunne ikke legge til betalingsmetoden. Vennligst prøv igjen.',
    'services_linked' => ':count tjeneste(r) knyttet',
    'remove' => 'Fjern',
    'remove_payment_method' => 'Fjern betalingsmetode',
    'remove_payment_method_confirm' => 'Er du sikker på at du vil fjerne :name? Denne handlingen kan ikke angres.',
    'expires' => 'Utløper :date',
    'cancel' => 'Avbryt',
    'confirm' => 'Ja, fjern',
    'email_notifications' => 'E-postvarsler',
    'in_app_notifications' => 'Varsler i appen',
    'notifications_description' => 'Administrer varslingsinnstillingene dine. Du kan velge å motta varsler via e-post, i appen (push) eller begge.',
    'notification' => 'Varsel',

    'push_notifications' => 'Push-varsler',
    'push_notifications_description' => 'Aktiver push-varsler for å motta sanntidsoppdateringer direkte i nettleseren din, selv når du ikke er på nettstedet.',
    'enable_push_notifications' => 'Aktiver push-varsler',
    'push_status' => [
        'not_supported' => 'Push-varsler støttes ikke av nettleseren din.',
        'denied' => 'Push-varsler er blokkert. Aktiver dem i nettleserinnstillingene.',
        'subscribed' => 'Push-varsler er aktivert.',
    ],
];