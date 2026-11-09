<?php

return [
    'account' => 'Konto',
    'personal_details' => 'Personuppgifter',
    'security' => 'Säkerhet',
    'credits' => 'Krediter',

    'change_password' => 'Ändra lösenord',

    'two_factor_authentication' => 'Tvåfaktorautentisering',
    'two_factor_authentication_description' => 'Lägg till ett extra säkerhetslager till ditt konto genom att aktivera tvåfaktorautentisering.',
    'two_factor_authentication_enabled' => 'Tvåfaktorautentisering är aktiverad för ditt konto.',
    'two_factor_authentication_enable' => 'Aktivera tvåfaktorautentisering',
    'two_factor_authentication_disable' => 'Inaktivera tvåfaktorautentisering',
    'two_factor_authentication_disable_description' => 'Är du säker på att du vill inaktivera tvåfaktorautentisering? Detta tar bort det extra säkerhetslagret från ditt konto.',
    'two_factor_authentication_enable_description' => 'För att aktivera tvåfaktorautentisering måste du skanna QR-koden nedan med en autentiseringsapp som Google Authenticator eller Authy.',
    'two_factor_authentication_qr_code' => 'Skanna QR-koden nedan med din autentiseringsapp:',
    'two_factor_authentication_secret' => 'Eller ange följande kod manuellt:',

    'sessions' => 'Sessioner',
    'sessions_description' => 'Hantera och logga ut dina aktiva sessioner på andra webbläsare och enheter.',
    'logout_sessions' => 'Logga ut denna session',
    'current_device' => 'Nuvarande enhet',

    'input' => [
        'current_password' => 'Nuvarande lösenord',
        'current_password_placeholder' => 'Ditt nuvarande lösenord',
        'new_password' => 'Nytt lösenord',
        'new_password_placeholder' => 'Ditt nya lösenord',
        'confirm_password' => 'Bekräfta lösenord',
        'confirm_password_placeholder' => 'Bekräfta ditt nya lösenord',

        'two_factor_code' => 'Ange koden från din autentiseringsapp',
        'two_factor_code_placeholder' => 'Din tvåfaktorautentiseringskod',

        'currency' => 'Valuta',
        'amount' => 'Belopp',
        'payment_gateway' => 'Betalningsgateway',
    ],

    'notifications' => [
        'password_changed' => 'Lösenordet har ändrats.',
        'password_incorrect' => 'Det nuvarande lösenordet är felaktigt.',
        'two_factor_enabled' => 'Tvåfaktorautentisering har aktiverats.',
        'two_factor_disabled' => 'Tvåfaktorautentisering har inaktiverats.',
        'two_factor_code_incorrect' => 'Koden är felaktig.',
        'session_logged_out' => 'Sessionen har loggats ut.',
        'unauthorized' => 'Denna åtgärd är inte tillåten.',
    ],

    'no_credit' => 'Du har inga krediter.',
    'add_credit' => 'Lägg till kredit',
    'credit_deposit' => 'Kreditinsättning (:currency)',

    'payment_methods' => 'Betalningsmetoder',
    'recent_transactions' => 'Senaste transaktioner',
    'saved_payment_methods' => 'Sparade betalningsmetoder',
    'setup_payment_method' => 'Skapa en ny betalningsmetod',
    'no_saved_payment_methods' => 'Du har inga sparade betalningsmetoder.',
    'saved_payment_methods_description' => 'Hantera dina sparade betalningsmetoder för snabbare utcheckning och automatiska betalningar.',
    'no_saved_payment_methods_description' => 'Du kan lägga till en betalningsmetod för att göra framtida betalningar snabbare och enklare, och möjliggöra automatiska betalningar för dina tjänster.',
    'add_payment_method' => 'Lägg till en betalningsmetod',
    'payment_method_statuses' => [
        'active' => 'Aktiv',
        'inactive' => 'Inaktiv',
        'expired' => 'Löpt ut',
        'pending' => 'Väntande',
    ],
    'payment_method_added' => 'Betalningsmetoden har lagts till.',
    'payment_method_add_failed' => 'Det gick inte att lägga till betalningsmetoden. Försök igen.',
    'services_linked' => ':count tjänst(er) länkade',
    'remove' => 'Ta bort',
    'remove_payment_method' => 'Ta bort betalningsmetod',
    'remove_payment_method_confirm' => 'Är du säker på att du vill ta bort :name? Denna åtgärd kan inte ångras.',
    'expires' => 'Utgår den :date',
    'cancel' => 'Avbryt',
    'confirm' => 'Ja, ta bort',
    'email_notifications' => 'E-postaviseringar',
    'in_app_notifications' => 'Notiser i appen',
    'notifications_description' => 'Hantera dina aviseringsinställningar. Du kan välja att ta emot aviseringar via e-post, in-app (push) eller båda.',
    'notification' => 'Avisering',

    'push_notifications' => 'Pushnotiser',
    'push_notifications_description' => 'Aktivera pushnotiser för att ta emot realtidsuppdateringar direkt i din webbläsare, även när du inte är på webbplatsen.',
    'enable_push_notifications' => 'Aktivera pushnotiser',
    'push_status' => [
        'not_supported' => 'Pushnotiser stöds inte av din webbläsare.',
        'denied' => 'Pushnotiser är blockerade. Aktivera dem i din webbläsares inställningar.',
        'subscribed' => 'Pushnotiser är aktiverade.',
    ],
];