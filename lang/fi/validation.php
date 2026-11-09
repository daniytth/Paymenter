<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute-kenttä on hyväksyttävä.',
    'accepted_if' => ':attribute-kenttä on hyväksyttävä, kun :other on :value.',
    'active_url' => ':attribute-kentän on oltava kelvollinen URL-osoite.',
    'after' => ':attribute-kentän on oltava päivämäärä :date jälkeen.',
    'after_or_equal' => ':attribute-kentän on oltava päivämäärä :date jälkeen tai sama.',
    'alpha' => ':attribute-kenttä saa sisältää vain kirjaimia.',
    'alpha_dash' => ':attribute-kenttä saa sisältää vain kirjaimia, numeroita, viivoja ja alaviivoja.',
    'alpha_num' => ':attribute-kenttä saa sisältää vain kirjaimia ja numeroita.',
    'array' => ':attribute-kentän on oltava taulukko.',
    'ascii' => ':attribute-kenttä saa sisältää vain yksitavuisia aakkosnumeerisia merkkejä ja symboleja.',
    'before' => ':attribute-kentän on oltava päivämäärä ennen :date.',
    'before_or_equal' => ':attribute-kentän on oltava päivämäärä ennen :date tai sama.',
    'between' => [
        'array' => ':attribute-kentässä on oltava :min–:max kohdetta.',
        'file' => ':attribute-kentän on oltava :min–:max kilotavua.',
        'numeric' => ':attribute-kentän on oltava :min–:max välillä.',
        'string' => ':attribute-kentän on oltava :min–:max merkkiä.',
    ],
    'boolean' => ':attribute-kentän on oltava tosi tai epätosi.',
    'can' => ':attribute-kenttä sisältää luvattoman arvon.',
    'confirmed' => ':attribute-kentän vahvistus ei täsmää.',
    'current_password' => 'Salasana on virheellinen.',
    'date' => ':attribute-kentän on oltava kelvollinen päivämäärä.',
    'date_equals' => ':attribute-kentän on oltava päivämäärä, joka on sama kuin :date.',
    'date_format' => ':attribute-kentän on vastattava muotoa :format.',
    'decimal' => ':attribute-kentässä on oltava :decimal desimaalia.',
    'declined' => ':attribute-kenttä on hylättävä.',
    'declined_if' => ':attribute-kenttä on hylättävä, kun :other on :value.',
    'different' => ':attribute-kentän ja :other-kentän on oltava erilaisia.',
    'digits' => ':attribute-kentässä on oltava :digits numeroa.',
    'digits_between' => ':attribute-kentässä on oltava :min–:max numeroa.',
    'dimensions' => ':attribute-kentän kuvan mitat ovat virheelliset.',
    'distinct' => ':attribute-kentässä on sama arvo kuin toisessa kentässä.',
    'doesnt_end_with' => ':attribute-kenttä ei saa päättyä johonkin seuraavista: :values.',
    'doesnt_start_with' => ':attribute-kenttä ei saa alkaa jollakin seuraavista: :values.',
    'email' => ':attribute-kentän on oltava kelvollinen sähköpostiosoite.',
    'ends_with' => ':attribute-kentän on päätyttävä johonkin seuraavista: :values.',
    'enum' => 'Valittu :attribute on virheellinen.',
    'exists' => 'Valittu :attribute on virheellinen.',
    'extensions' => ':attribute-kentässä on oltava jokin seuraavista tiedostopäätteistä: :values.',
    'file' => ':attribute-kentän on oltava tiedosto.',
    'filled' => ':attribute-kentässä on oltava arvo.',
    'gt' => [
        'array' => ':attribute-kentässä on oltava enemmän kuin :value kohdetta.',
        'file' => ':attribute-kentän on oltava suurempi kuin :value kilotavua.',
        'numeric' => ':attribute-kentän on oltava suurempi kuin :value.',
        'string' => ':attribute-kentän on oltava pidempi kuin :value merkkiä.',
    ],
    'gte' => [
        'array' => ':attribute-kentässä on oltava vähintään :value kohdetta.',
        'file' => ':attribute-kentän on oltava vähintään :value kilotavua.',
        'numeric' => ':attribute-kentän on oltava suurempi tai yhtä suuri kuin :value.',
        'string' => ':attribute-kentän on oltava vähintään :value merkkiä.',
    ],
    'hex_color' => ':attribute-kentän on oltava kelvollinen heksadesimaaliväri.',
    'image' => ':attribute-kentän on oltava kuva.',
    'in' => 'Valittu :attribute on virheellinen.',
    'in_array' => ':attribute-kentän on löydyttävä kentästä :other.',
    'integer' => ':attribute-kentän on oltava kokonaisluku.',
    'ip' => ':attribute-kentän on oltava kelvollinen IP-osoite.',
    'ipv4' => ':attribute-kentän on oltava kelvollinen IPv4-osoite.',
    'ipv6' => ':attribute-kentän on oltava kelvollinen IPv6-osoite.',
    'json' => ':attribute-kentän on oltava kelvollinen JSON-merkkijono.',
    'list' => ':attribute-kentän on oltava lista.',
    'lowercase' => ':attribute-kentän on oltava pienillä kirjaimilla.',
    'lt' => [
        'array' => ':attribute-kentässä on oltava vähemmän kuin :value kohdetta.',
        'file' => ':attribute-kentän on oltava pienempi kuin :value kilotavua.',
        'numeric' => ':attribute-kentän on oltava pienempi kuin :value.',
        'string' => ':attribute-kentän on oltava lyhyempi kuin :value merkkiä.',
    ],
    'lte' => [
        'array' => ':attribute-kentässä ei saa olla enempää kuin :value kohdetta.',
        'file' => ':attribute-kentän on oltava enintään :value kilotavua.',
        'numeric' => ':attribute-kentän on oltava pienempi tai yhtä suuri kuin :value.',
        'string' => ':attribute-kentän on oltava enintään :value merkkiä.',
    ],
    'mac_address' => ':attribute-kentän on oltava kelvollinen MAC-osoite.',
    'max' => [
        'array' => ':attribute-kentässä ei saa olla enempää kuin :max kohdetta.',
        'file' => ':attribute-kentän ei saa olla suurempi kuin :max kilotavua.',
        'numeric' => ':attribute-kentän ei saa olla suurempi kuin :max.',
        'string' => ':attribute-kentän ei saa olla pidempi kuin :max merkkiä.',
    ],
    'max_digits' => ':attribute-kentässä ei saa olla enempää kuin :max numeroa.',
    'mimes' => ':attribute-kentän on oltava tiedosto, jonka tyyppi on: :values.',
    'mimetypes' => ':attribute-kentän on oltava tiedosto, jonka tyyppi on: :values.',
    'min' => [
        'array' => ':attribute-kentässä on oltava vähintään :min kohdetta.',
        'file' => ':attribute-kentän on oltava vähintään :min kilotavua.',
        'numeric' => ':attribute-kentän on oltava vähintään :min.',
        'string' => ':attribute-kentän on oltava vähintään :min merkkiä.',
    ],
    'min_digits' => ':attribute-kentässä on oltava vähintään :min numeroa.',
    'missing' => ':attribute-kentän on puututtava.',
    'missing_if' => ':attribute-kentän on puututtava, kun :other on :value.',
    'missing_unless' => ':attribute-kentän on puututtava, ellei :other ole :value.',
    'missing_with' => ':attribute-kentän on puututtava, kun :values on läsnä.',
    'missing_with_all' => ':attribute-kentän on puututtava, kun :values ovat läsnä.',
    'multiple_of' => ':attribute-kentän on oltava :value:n monikerta.',
    'not_in' => 'Valittu :attribute on virheellinen.',
    'not_regex' => ':attribute-kentän muoto on virheellinen.',
    'numeric' => ':attribute-kentän on oltava numero.',
    'password' => [
        'letters' => ':attribute-kentässä on oltava vähintään yksi kirjain.',
        'mixed' => ':attribute-kentässä on oltava vähintään yksi iso ja yksi pieni kirjain.',
        'numbers' => ':attribute-kentässä on oltava vähintään yksi numero.',
        'symbols' => ':attribute-kentässä on oltava vähintään yksi symboli.',
        'uncompromised' => 'Annettu :attribute on esiintynyt tietovuodossa. Valitse eri :attribute.',
    ],
    'present' => ':attribute-kentän on oltava läsnä.',
    'present_if' => ':attribute-kentän on oltava läsnä, kun :other on :value.',
    'present_unless' => ':attribute-kentän on oltava läsnä, ellei :other ole :value.',
    'present_with' => ':attribute-kentän on oltava läsnä, kun :values on läsnä.',
    'present_with_all' => ':attribute-kentän on oltava läsnä, kun :values ovat läsnä.',
    'prohibited' => ':attribute-kenttä on kielletty.',
    'prohibited_if' => ':attribute-kenttä on kielletty, kun :other on :value.',
    'prohibited_unless' => ':attribute-kenttä on kielletty, ellei :other ole :values-kohdassa.',
    'prohibits' => ':attribute-kenttä estää :other-kentän läsnäolon.',
    'regex' => ':attribute-kentän muoto on virheellinen.',
    'required' => ':attribute-kenttä on pakollinen.',
    'required_array_keys' => ':attribute-kentässä on oltava merkintöjä seuraaville: :values.',
    'required_if' => ':attribute-kenttä on pakollinen, kun :other on :value.',
    'required_if_accepted' => ':attribute-kenttä on pakollinen, kun :other on hyväksytty.',
    'required_unless' => ':attribute-kenttä on pakollinen, ellei :other ole :values-kohdassa.',
    'required_with' => ':attribute-kenttä on pakollinen, kun :values on läsnä.',
    'required_with_all' => ':attribute-kenttä on pakollinen, kun :values ovat läsnä.',
    'required_without' => ':attribute-kenttä on pakollinen, kun :values ei ole läsnä.',
    'required_without_all' => ':attribute-kenttä on pakollinen, kun mikään :values-kohdista ei ole läsnä.',
    'same' => ':attribute-kentän on vastattava :other-kenttää.',
    'size' => [
        'array' => ':attribute-kentässä on oltava :size kohdetta.',
        'file' => ':attribute-kentän on oltava :size kilotavua.',
        'numeric' => ':attribute-kentän on oltava :size.',
        'string' => ':attribute-kentässä on oltava :size merkkiä.',
    ],
    'starts_with' => ':attribute-kentän on alettava jollakin seuraavista: :values.',
    'string' => ':attribute-kentän on oltava merkkijono.',
    'timezone' => ':attribute-kentän on oltava kelvollinen aikavyöhyke.',
    'unique' => ':attribute on jo käytössä.',
    'uploaded' => ':attribute:n lataus epäonnistui.',
    'uppercase' => ':attribute-kentän on oltava isoilla kirjaimilla.',
    'url' => ':attribute-kentän on oltava kelvollinen URL-osoite.',
    'ulid' => ':attribute-kentän on oltava kelvollinen ULID.',
    'uuid' => ':attribute-kentän on oltava kelvollinen UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'mukautettu viesti',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];