<?php

return [
    'services' => 'Palvelut',
    'product' => 'Tuote',
    'price' => 'Hinta',
    'status' => 'Tilanne',
    'name' => 'Nimi',
    'actions' => 'Toiminnot',
    'view' => 'Näytä',

    'product_details' => 'Tuotetiedot',
    'billing_cycle' => 'Laskutusjakso',
    'cancel' => 'Peruuta',
    'cancellation' => 'Palvelun :service Őeruminen',
    'cancel_are_you_sure' => 'Oletko varma, että haluat perua tämän palvelun?',
    'cancel_reason' => 'Perumisen Syy',
    'cancel_type' => 'Perumisen Tyyppi',
    'cancel_immediate' => 'Peruuta Välittömästi',
    'cancel_end_of_period' => 'Peruuta Tilaus Laskutusjakson Päättyessä',
    'cancel_immediate_warning' => 'Kun painat alla olevaa painiketta, palvelu perutaan välittömästi, etkä voi enää käyttää sitä.',
    'cancellation_requested' => 'Peruutusta Pyydetty',
    'not_cancellable' => 'Tätä palvelua ei voi peruuttaa',

    'current_plan' => 'Tämänhetkinen Tilaus',
    'new_plan' => 'Uusi Tilaus',
    'change_plan' => 'Muuta Tilausta',
    'current_price' => 'Nykyinen Hinta',
    'new_price' => 'Uusi Hinta',
    'upgrade' => 'Päivitä',
    'upgrade_summary' => 'Päivityksen Yhteenveto',
    'total_today' => 'Yhteensä Tänään',
    'upgrade_service' => 'Päivitä Palvelu',
    'upgrade_choose_product' => 'Valitse Tuote, Johon Haluat Päivittää',
    'upgrade_choose_config' => 'Valitse päivityksen kokoonpano',
    'next_step' => 'Seuraava Vaihe',

    'upgrade_pending' => 'Et voi päivittää, koska päivitys-/alennuslasku on jo avoinna',

    'outstanding_invoice' => 'Sinulla on maksamaton lasku.',
    'view_and_pay' => 'Klikkaa Tästä Nähdäksesi Ja Maksaaksesi',

    'statuses' => [
        'pending' => 'Odottaa',
        'active' => 'Aktiivinen',
        'cancelled' => 'Peruttu',
        'suspended' => 'Keskeytetty',
        'cancellation_pending' => 'Peruutus Odottaa',
    ],
    'billing_cycles' => [
        'day' => 'päivä|päivää',
        'week' => 'viikko|viikkoa',
        'month' => 'kuukausi|kuukautta',
        'year' => 'vuosi|vuotta',
    ],
    'every_period' => 'Joka :period :unit',
    'price_every_period' => ':price per :period :unit',
    'price_one_time' => ':price kerran',
    'renews_in' => 'Uusiutuu',
    'renews_on' => 'Uusiutuu',
    'auto_pay' => 'Automaattimaksut Käyttäen',
    'auto_pay_not_configured' => 'Ei Määritelty',

    'no_services' => 'Palveluita ei löytynyt',
    'update_billing_agreement' => 'Päivitä Laskutussopimus',
    'clear_billing_agreement' => 'Tyhjennä Laskutussopimus',
    'select_billing_agreement' => 'Valitse Laskutussopimus',

    'remove_payment_method' => 'Poista Maksutapa',
    'remove_payment_method_confirm' => 'Oletko varma, että haluat poistaa maksutavan ":name" tästä palvelusta? Palvelusi ei enää pysty maksamaan laskujaan automaattisesti.',

    'label' => 'Nimike',
    'label_placeholder' => 'Syötä mukautettu nimi tälle palvelulle',
    'label_modal_title' => 'Muokkaa Palvelun Nimikettä',
    'update_label' => 'Päivitä Nimike',

];