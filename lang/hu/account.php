<?php

return [
    'account' => 'Fiók',
    'personal_details' => 'Személyes Adatok',
    'security' => 'Biztonság',
    'credits' => 'Kreditek',

    'change_password' => 'Jelszó Módosítása',

    'two_factor_authentication' => 'Kétlépcsős Azonosítás',
    'two_factor_authentication_description' => 'A kétlépcsős azonosítás engedélyezésével egy extra biztonsági védelmet adhatsz a fiókodhoz.',
    'two_factor_authentication_enabled' => 'A kétlépcsős azonosítás be van kapcsolva a fiókodhoz.',
    'two_factor_authentication_enable' => 'Kétlépcsős Azonosítás Engedélyezése',
    'two_factor_authentication_disable' => 'Kétlépcsős Azonosítás Letiltása',
    'two_factor_authentication_disable_description' => 'Biztosan kikapcsolod a kétfaktoros azonosítást? Ezzel eltávolítod a fiókodból ezt az extra biztonsági védelmet.',
    'two_factor_authentication_enable_description' => 'A kétlépcsős azonosítás engedélyezéséhez a lenti QR-kódot olvasd be egy autentikátor alkalmazással, például a Google Authenticatorral vagy az Authy-val.',
    'two_factor_authentication_qr_code' => 'Olvasd be az alábbi QR-kódot az autentikátor alkalmazásoddal:',
    'two_factor_authentication_secret' => 'Vagy írd be a következő kódot manuálisan:',

    'sessions' => 'Munkamenetek',
    'sessions_description' => 'Kezeld, és jelentkezz ki aktív munkameneteidből más böngészőkön és eszközökön.',
    'logout_sessions' => 'Eszköz Kijelentkeztetése',
    'current_device' => 'Jelenlegi Eszköz',

    'input' => [
        'current_password' => 'Jelenlegi Jelszó',
        'current_password_placeholder' => 'Jelenlegi jelszavad',
        'new_password' => 'Új jelszó',
        'new_password_placeholder' => 'Új jelszavad',
        'confirm_password' => 'Jelszó Megerősítése',
        'confirm_password_placeholder' => 'Erősítsd meg az új jelszavad',

        'two_factor_code' => 'Add Meg a Hitelesítő Alkalmazás Által Generált Kódot',
        'two_factor_code_placeholder' => 'Kétlépcsős azonosító kódod',

        'currency' => 'Pénznem',
        'amount' => 'Mennyiség',
        'payment_gateway' => 'Fizetési Mód',
    ],

    'notifications' => [
        'password_changed' => 'A jelszó megváltoztatásra került.',
        'password_incorrect' => 'A jelenlegi jelszavad helytelen.',
        'two_factor_enabled' => 'Kétlépcsős azonosítás engedélyezve.',
        'two_factor_disabled' => 'Kétlépcsős azonosítás letiltva.',
        'two_factor_code_incorrect' => 'A kód helytelen.',
        'session_logged_out' => 'A munkamenet ki lett jelentkeztetve.',
        'unauthorized' => 'Ez a művelet nem engedélyezett.',
    ],

    'no_credit' => 'Nincs kredited.',
    'add_credit' => 'Kredit Hozzáadása',
    'credit_deposit' => 'Kredit Befizetés (:currency)',

    'payment_methods' => 'Fizetési Módok',
    'recent_transactions' => 'Legutóbbi Tranzakciók',
    'saved_payment_methods' => 'Elmentett Fizetési Módok',
    'setup_payment_method' => 'Új Fizetési Mód Hozzáadása',
    'no_saved_payment_methods' => 'Nincs elmentve fizetési mód.',
    'saved_payment_methods_description' => 'Kezeld a mentett fizetési módjaidat a gyorsabb fizetés és az automatikus fizetések beállításában.',
    'no_saved_payment_methods_description' => 'Hozzáadhatsz fizetési módot, hogy a jövőbeni fizetések gyorsabbak és egyszerűbbek legyenek, és engedélyezheted a szolgáltatásaid automatikus fizetését.',
    'add_payment_method' => 'Fizetési Mód Hozzáadása',
    'payment_method_statuses' => [
        'active' => 'Aktív',
        'inactive' => 'Inaktív',
        'expired' => 'Lejárt',
        'pending' => 'Függőben levő',
    ],
    'payment_method_added' => 'A fizetési mód hozzáadva.',
    'payment_method_add_failed' => 'Nem sikerült hozzáadni a fizetési módot. Kérjük, próbáld meg újra.',
    'services_linked' => 'A(z) :count szolgáltatás(ok) összekapcsolva',
    'remove' => 'Eltávolítás',
    'remove_payment_method' => 'Fizetési Mód Eltávolítása',
    'remove_payment_method_confirm' => 'Biztosan eltávolítod a(z) :name fizetési módot? Ez a művelet nem vonható vissza.',
    'expires' => 'Lejár :date',
    'cancel' => 'Mégsem',
    'confirm' => 'Igen, Eltávolítom',
    'email_notifications' => 'E-mail Értesítések',
    'in_app_notifications' => 'Alkalmazáson Belüli Értesítések',
    'notifications_description' => 'Értesítési beállítások kezelése. Beállíthatod, hogy e-mailben, alkalmazáson belül (push) vagy mindkettőn keresztül kapjál értesítéseket.',
    'notification' => 'Értesítés',

    'push_notifications' => 'Push Értesítések',
    'push_notifications_description' => 'Engedélyezd a Push értesítéseket, hogy valós idejű értesítéseket kapjál közvetlenül a böngésződben, még akkor is, ha nem tartózkodsz az oldalon.',
    'enable_push_notifications' => 'Push Értesítések Engedélyezése',
    'push_status' => [
        'not_supported' => 'A böngésződ nem támogatja a Push értesítéseket.',
        'denied' => 'A Push értesítések le vannak tiltva. Kérjük, engedélyezd őket a böngésző beállításaiban.',
        'subscribed' => 'A Push értesítések bekapcsolva.',
    ],
];