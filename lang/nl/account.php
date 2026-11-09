<?php

return [
    'account' => 'Account',
    'personal_details' => 'Persoonlijke gegevens',
    'security' => 'Beveiliging',
    'credits' => 'Krediet',

    'change_password' => 'Wachtwoord wijzigen',

    'two_factor_authentication' => 'Tweestapsverificatie',
    'two_factor_authentication_description' => 'Voeg een extra beveiligingslaag toe aan je account door tweestapsverificatie in te schakelen.',
    'two_factor_authentication_enabled' => 'Tweestapsverificatie is ingeschakeld voor je account.',
    'two_factor_authentication_enable' => 'Schakel tweestapsverificatie in',
    'two_factor_authentication_disable' => 'Schakel tweestapsverificatie uit',
    'two_factor_authentication_disable_description' => 'Weet je zeker dat je tweestapsverificatie wilt uitschakelen? Dit verwijdert de extra beveiligingslaag van je account.',
    'two_factor_authentication_enable_description' => 'Om tweestapsverificatie in te schakelen, moet je onderstaande QR-code scannen met een authenticatie-app zoals Google Authenticator of Authy.',
    'two_factor_authentication_qr_code' => 'Scan de onderstaande QR-code met je authenticatie-app:',
    'two_factor_authentication_secret' => 'Of voer de volgende code handmatig in:',

    'sessions' => 'Sessies',
    'sessions_description' => 'Beheer en meld je actieve sessies op andere browsers en apparaten af.',
    'logout_sessions' => 'Deze sessie afmelden',
    'current_device' => 'Huidig apparaat',

    'input' => [
        'current_password' => 'Huidig wachtwoord',
        'current_password_placeholder' => 'Je huidige wachtwoord',
        'new_password' => 'Nieuw wachtwoord',
        'new_password_placeholder' => 'Je nieuwe wachtwoord',
        'confirm_password' => 'Wachtwoord bevestigen',
        'confirm_password_placeholder' => 'Bevestig je nieuwe wachtwoord',

        'two_factor_code' => 'Voer de code uit je authenticatie-app in',
        'two_factor_code_placeholder' => 'Je tweestapsverificatiecode',

        'currency' => 'Valuta',
        'amount' => 'Bedrag',
        'payment_gateway' => 'Betaalgateway',
    ],

    'notifications' => [
        'password_changed' => 'Wachtwoord is gewijzigd.',
        'password_incorrect' => 'Het huidige wachtwoord is niet correct.',
        'two_factor_enabled' => 'Tweestapsverificatie is ingeschakeld.',
        'two_factor_disabled' => 'Tweestapsverificatie is uitgeschakeld.',
        'two_factor_code_incorrect' => 'De code is incorrect.',
        'session_logged_out' => 'De sessie is afgemeld.',
        'unauthorized' => 'Deze actie is niet toegestaan.',
    ],

    'no_credit' => 'Je hebt geen krediet.',
    'add_credit' => 'Krediet toevoegen',
    'credit_deposit' => 'Kredietstorting (:currency)',

    'payment_methods' => 'Betaalmethoden',
    'recent_transactions' => 'Recente transacties',
    'saved_payment_methods' => 'Opgeslagen betaalmethoden',
    'setup_payment_method' => 'Een nieuwe betaalmethode instellen',
    'no_saved_payment_methods' => 'Je hebt geen opgeslagen betaalmethoden.',
    'saved_payment_methods_description' => 'Beheer je opgeslagen betaalmethoden voor sneller afrekenen en automatische betalingen.',
    'no_saved_payment_methods_description' => 'Je kunt een betaalmethode toevoegen om toekomstige betalingen makkelijker te maken en automatische betalingen voor je diensten in te schakelen.',
    'add_payment_method' => 'Een betaalmethode toevoegen',
    'payment_method_statuses' => [
        'active' => 'Actief',
        'inactive' => 'Inactief',
        'expired' => 'Verlopen',
        'pending' => 'In behandeling',
    ],
    'payment_method_added' => 'De betaalmethode is toegevoegd.',
    'payment_method_add_failed' => 'Toevoegen van betaalmethode mislukt. Probeer het opnieuw.',
    'services_linked' => ':count dienst(en) gekoppeld',
    'remove' => 'Verwijderen',
    'remove_payment_method' => 'Betaalmethode verwijderen',
    'remove_payment_method_confirm' => 'Weet je zeker dat je :name wilt verwijderen? Deze handeling kan niet ongedaan worden gemaakt.',
    'expires' => 'Verloopt op :date',
    'cancel' => 'Annuleren',
    'confirm' => 'Ja, verwijderen',
    'email_notifications' => 'E-mailmeldingen',
    'in_app_notifications' => 'In-app meldingen',
    'notifications_description' => 'Beheer je meldingsvoorkeuren. Je kunt kiezen om meldingen te ontvangen via e-mail, in-app (push) of beide.',
    'notification' => 'Melding',

    'push_notifications' => 'Pushmeldingen',
    'push_notifications_description' => 'Schakel pushmeldingen in om realtime updates rechtstreeks in je browser te ontvangen, zelfs als je niet op de site bent.',
    'enable_push_notifications' => 'Pushmeldingen inschakelen',
    'push_status' => [
        'not_supported' => 'Pushmeldingen worden niet ondersteund door je browser.',
        'denied' => 'Pushmeldingen zijn geblokkeerd. Schakel ze in via je browserinstellingen.',
        'subscribed' => 'Pushmeldingen zijn ingeschakeld.',
    ],
];