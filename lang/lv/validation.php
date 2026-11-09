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

    'accepted' => ':attribute laukam ir jāpieņem.',
    'accepted_if' => ':attribute laukam ir jāpieņem, ja :other ir :value.',
    'active_url' => ':attribute laukam ir jābūt derīgam URL.',
    'after' => ':attribute laukam ir jābūt datumam pēc :date.',
    'after_or_equal' => ':attribute laukam ir jābūt datumam pēc vai vienādam ar :date.',
    'alpha' => ':attribute laukā drīkst būt tikai burti.',
    'alpha_dash' => ':attribute laukā drīkst būt tikai burti, cipari, domuzīmes un pasvītrojumi.',
    'alpha_num' => ':attribute laukā drīkst būt tikai burti un cipari.',
    'array' => ':attribute laukam ir jābūt masīvam.',
    'ascii' => ':attribute laukā drīkst būt tikai vienbaita burtciparu rakstzīmes un simboli.',
    'before' => ':attribute laukam ir jābūt datumam pirms :date.',
    'before_or_equal' => ':attribute laukam ir jābūt datumam pirms vai vienādam ar :date.',
    'between' => [
        'array' => ':attribute laukam ir jābūt no :min līdz :max elementiem.',
        'file' => ':attribute laukam ir jābūt no :min līdz :max kilobaitiem.',
        'numeric' => ':attribute laukam ir jābūt no :min līdz :max.',
        'string' => ':attribute laukam ir jābūt no :min līdz :max rakstzīmēm.',
    ],
    'boolean' => ':attribute laukam ir jābūt true vai false.',
    'can' => ':attribute lauks satur neatļautu vērtību.',
    'confirmed' => ':attribute lauka apstiprinājums nesakrīt.',
    'current_password' => 'Parole ir nepareiza.',
    'date' => ':attribute laukam ir jābūt derīgam datumam.',
    'date_equals' => ':attribute laukam ir jābūt datumam, kas vienāds ar :date.',
    'date_format' => ':attribute laukam ir jāatbilst formātam :format.',
    'decimal' => ':attribute laukam ir jābūt :decimal cipariem aiz komata.',
    'declined' => ':attribute laukam ir jābūt noraidītam.',
    'declined_if' => ':attribute laukam ir jābūt noraidītam, ja :other ir :value.',
    'different' => ':attribute laukam un :other ir jābūt atšķirīgiem.',
    'digits' => ':attribute laukam ir jābūt :digits cipariem.',
    'digits_between' => ':attribute laukam ir jābūt no :min līdz :max cipariem.',
    'dimensions' => ':attribute laukam ir nederīgi attēla izmēri.',
    'distinct' => ':attribute laukā ir dublēta vērtība.',
    'doesnt_end_with' => ':attribute laukam nedrīkst beigties ar kādu no šiem: :values.',
    'doesnt_start_with' => ':attribute laukam nedrīkst sākties ar kādu no šiem: :values.',
    'email' => ':attribute laukam ir jābūt derīgai e-pasta adresei.',
    'ends_with' => ':attribute laukam ir jābeidzas ar kādu no šiem: :values.',
    'enum' => 'Atlasītais :attribute nav derīgs.',
    'exists' => 'Atlasītais :attribute nav derīgs.',
    'extensions' => ':attribute laukam ir jābūt ar kādu no šiem paplašinājumiem: :values.',
    'file' => ':attribute laukam ir jābūt failam.',
    'filled' => ':attribute laukam ir jābūt vērtībai.',
    'gt' => [
        'array' => ':attribute laukam ir jābūt vairāk nekā :value elementiem.',
        'file' => ':attribute laukam ir jābūt lielākam par :value kilobaitiem.',
        'numeric' => ':attribute laukam ir jābūt lielākam par :value.',
        'string' => ':attribute laukam ir jābūt garākam par :value rakstzīmēm.',
    ],
    'gte' => [
        'array' => ':attribute laukam ir jābūt :value elementiem vai vairāk.',
        'file' => ':attribute laukam ir jābūt lielākam vai vienādam ar :value kilobaitiem.',
        'numeric' => ':attribute laukam ir jābūt lielākam vai vienādam ar :value.',
        'string' => ':attribute laukam ir jābūt lielākam vai vienādam ar :value rakstzīmēm.',
    ],
    'hex_color' => ':attribute laukam ir jābūt derīgai heksadecimālai krāsai.',
    'image' => ':attribute laukam ir jābūt attēlam.',
    'in' => 'Atlasītais :attribute nav derīgs.',
    'in_array' => ':attribute laukam ir jāpastāv :other.',
    'integer' => ':attribute laukam ir jābūt veselam skaitlim.',
    'ip' => ':attribute laukam ir jābūt derīgai IP adresei.',
    'ipv4' => ':attribute laukam ir jābūt derīgai IPv4 adresei.',
    'ipv6' => ':attribute laukam ir jābūt derīgai IPv6 adresei.',
    'json' => ':attribute laukam ir jābūt derīgai JSON virknei.',
    'list' => ':attribute laukam ir jābūt sarakstam.',
    'lowercase' => ':attribute laukam ir jābūt mazajiem burtiem.',
    'lt' => [
        'array' => ':attribute laukam ir jābūt mazāk nekā :value elementiem.',
        'file' => ':attribute laukam ir jābūt mazākam par :value kilobaitiem.',
        'numeric' => ':attribute laukam ir jābūt mazākam par :value.',
        'string' => ':attribute laukam ir jābūt īsākam par :value rakstzīmēm.',
    ],
    'lte' => [
        'array' => ':attribute laukam nedrīkst būt vairāk nekā :value elementi.',
        'file' => ':attribute laukam ir jābūt mazākam vai vienādam ar :value kilobaitiem.',
        'numeric' => ':attribute laukam ir jābūt mazākam vai vienādam ar :value.',
        'string' => ':attribute laukam ir jābūt mazākam vai vienādam ar :value rakstzīmēm.',
    ],
    'mac_address' => ':attribute laukam ir jābūt derīgai MAC adresei.',
    'max' => [
        'array' => ':attribute laukam nedrīkst būt vairāk nekā :max elementi.',
        'file' => ':attribute laukam nedrīkst būt lielākam par :max kilobaitiem.',
        'numeric' => ':attribute laukam nedrīkst būt lielākam par :max.',
        'string' => ':attribute laukam nedrīkst būt garākam par :max rakstzīmēm.',
    ],
    'max_digits' => ':attribute laukam nedrīkst būt vairāk nekā :max cipari.',
    'mimes' => ':attribute laukam ir jābūt failam ar tipu: :values.',
    'mimetypes' => ':attribute laukam ir jābūt failam ar tipu: :values.',
    'min' => [
        'array' => ':attribute laukam ir jābūt vismaz :min elementiem.',
        'file' => ':attribute laukam ir jābūt vismaz :min kilobaitiem.',
        'numeric' => ':attribute laukam ir jābūt vismaz :min.',
        'string' => ':attribute laukam ir jābūt vismaz :min rakstzīmēm.',
    ],
    'min_digits' => ':attribute laukam ir jābūt vismaz :min cipariem.',
    'missing' => ':attribute laukam ir jābūt iztrūkstošam.',
    'missing_if' => ':attribute laukam ir jābūt iztrūkstošam, ja :other ir :value.',
    'missing_unless' => ':attribute laukam ir jābūt iztrūkstošam, ja vien :other nav :value.',
    'missing_with' => ':attribute laukam ir jābūt iztrūkstošam, ja :values ir klāt.',
    'missing_with_all' => ':attribute laukam ir jābūt iztrūkstošam, ja :values ir klāt.',
    'multiple_of' => ':attribute laukam ir jābūt :value reizinājumam.',
    'not_in' => 'Atlasītais :attribute nav derīgs.',
    'not_regex' => ':attribute lauka formāts nav derīgs.',
    'numeric' => ':attribute laukam ir jābūt skaitlim.',
    'password' => [
        'letters' => ':attribute laukam ir jāsatur vismaz viens burts.',
        'mixed' => ':attribute laukam ir jāsatur vismaz viens lielais un viens mazais burts.',
        'numbers' => ':attribute laukam ir jāsatur vismaz viens cipars.',
        'symbols' => ':attribute laukam ir jāsatur vismaz viens simbols.',
        'uncompromised' => 'Norādītais :attribute ir parādījies datu noplūdē. Lūdzu, izvēlieties citu :attribute.',
    ],
    'present' => ':attribute laukam ir jābūt klāt.',
    'present_if' => ':attribute laukam ir jābūt klāt, ja :other ir :value.',
    'present_unless' => ':attribute laukam ir jābūt klāt, ja vien :other nav :value.',
    'present_with' => ':attribute laukam ir jābūt klāt, ja :values ir klāt.',
    'present_with_all' => ':attribute laukam ir jābūt klāt, ja :values ir klāt.',
    'prohibited' => ':attribute lauks ir aizliegts.',
    'prohibited_if' => ':attribute lauks ir aizliegts, ja :other ir :value.',
    'prohibited_unless' => ':attribute lauks ir aizliegts, ja vien :other nav iekš :values.',
    'prohibits' => ':attribute lauks aizliedz :other būt klāt.',
    'regex' => ':attribute lauka formāts nav derīgs.',
    'required' => ':attribute lauks ir obligāts.',
    'required_array_keys' => ':attribute laukam ir jāsatur ieraksti par: :values.',
    'required_if' => ':attribute lauks ir obligāts, ja :other ir :value.',
    'required_if_accepted' => ':attribute lauks ir obligāts, ja :other ir pieņemts.',
    'required_unless' => ':attribute lauks ir obligāts, ja vien :other nav iekš :values.',
    'required_with' => ':attribute lauks ir obligāts, ja :values ir klāt.',
    'required_with_all' => ':attribute lauks ir obligāts, ja :values ir klāt.',
    'required_without' => ':attribute lauks ir obligāts, ja :values nav klāt.',
    'required_without_all' => ':attribute lauks ir obligāts, ja neviens no :values nav klāt.',
    'same' => ':attribute laukam ir jāsakrīt ar :other.',
    'size' => [
        'array' => ':attribute laukam ir jāsatur :size elementi.',
        'file' => ':attribute laukam ir jābūt :size kilobaiti.',
        'numeric' => ':attribute laukam ir jābūt :size.',
        'string' => ':attribute laukam ir jābūt :size rakstzīmes.',
    ],
    'starts_with' => ':attribute laukam ir jāsākas ar kādu no šiem: :values.',
    'string' => ':attribute laukam ir jābūt virknei.',
    'timezone' => ':attribute laukam ir jābūt derīgai laika joslai.',
    'unique' => ':attribute jau ir aizņemts.',
    'uploaded' => ':attribute neizdevās augšupielādēt.',
    'uppercase' => ':attribute laukam ir jābūt lielajiem burtiem.',
    'url' => ':attribute laukam ir jābūt derīgam URL.',
    'ulid' => ':attribute laukam ir jābūt derīgam ULID.',
    'uuid' => ':attribute laukam ir jābūt derīgam UUID.',

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
            'rule-name' => 'pielāgots ziņojums',
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