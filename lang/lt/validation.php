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

    'accepted' => 'Laukas „:attribute“ turi būti patvirtintas.',
    'accepted_if' => 'Laukas „:attribute“ turi būti patvirtintas, kai :other yra :value.',
    'active_url' => 'Laukas „:attribute“ turi būti galiojantis URL adresas.',
    'after' => 'Laukas „:attribute“ turi būti data po :date.',
    'after_or_equal' => 'Laukas „:attribute“ turi būti data po arba lygi :date.',
    'alpha' => 'Laukas „:attribute“ gali turėti tik raides.',
    'alpha_dash' => 'Laukas „:attribute“ gali turėti tik raides, skaičius, brūkšnelius ir pabraukimus.',
    'alpha_num' => 'Laukas „:attribute“ gali turėti tik raides ir skaičius.',
    'any_of' => 'Lauko „:attribute“ reikšmė yra negaliojanti.',
    'array' => 'Laukas „:attribute“ turi būti masyvas.',
    'ascii' => 'Laukas „:attribute“ gali turėti tik vieno baito raidinius-skaitmeninius simbolius ir ženklus.',
    'before' => 'Laukas „:attribute“ turi būti data prieš :date.',
    'before_or_equal' => 'Laukas „:attribute“ turi būti data prieš arba lygi :date.',
    'between' => [
        'array' => 'Laukas „:attribute“ turi turėti nuo :min iki :max elementų.',
        'file' => 'Laukas „:attribute“ turi būti nuo :min iki :max kilobaitų.',
        'numeric' => 'Lauko „:attribute“ reikšmė turi būti tarp :min ir :max.',
        'string' => 'Laukas „:attribute“ turi turėti nuo :min iki :max simbolių.',
    ],
    'boolean' => 'Laukas „:attribute“ turi būti teisingas arba klaidingas.',
    'can' => 'Laukas „:attribute“ turi neleistiną reikšmę.',
    'confirmed' => 'Lauko „:attribute“ patvirtinimas nesutampa.',
    'contains' => 'Lauke „:attribute“ trūksta reikiamos reikšmės.',
    'current_password' => 'Slaptažodis neteisingas.',
    'date' => 'Laukas „:attribute“ turi būti galiojanti data.',
    'date_equals' => 'Laukas „:attribute“ turi būti data, lygi :date.',
    'date_format' => 'Laukas „:attribute“ turi atitikti formatą :format.',
    'decimal' => 'Laukas „:attribute“ turi turėti :decimal skaitmenis po kablelio.',
    'declined' => 'Laukas „:attribute“ turi būti atmestas.',
    'declined_if' => 'Laukas „:attribute“ turi būti atmestas, kai :other yra :value.',
    'different' => 'Laukai „:attribute“ ir :other turi skirtis.',
    'digits' => 'Laukas „:attribute“ turi turėti :digits skaitmenis.',
    'digits_between' => 'Laukas „:attribute“ turi turėti nuo :min iki :max skaitmenų.',
    'dimensions' => 'Laukas „:attribute“ turi neteisingus paveikslėlio matmenis.',
    'distinct' => 'Laukas „:attribute“ turi pasikartojančią reikšmę.',
    'doesnt_end_with' => 'Laukas „:attribute“ negali baigtis vienu iš šių: :values.',
    'doesnt_start_with' => 'Laukas „:attribute“ negali prasidėti vienu iš šių: :values.',
    'email' => 'Laukas „:attribute“ turi būti galiojantis el. pašto adresas.',
    'ends_with' => 'Laukas „:attribute“ turi baigtis vienu iš šių: :values.',
    'enum' => 'Pasirinkta lauko „:attribute“ reikšmė yra neteisinga.',
    'exists' => 'Pasirinkta lauko „:attribute“ reikšmė yra neteisinga.',
    'extensions' => 'Laukas „:attribute“ turi turėti vieną iš šių plėtinių: :values.',
    'file' => 'Laukas „:attribute“ turi būti failas.',
    'filled' => 'Laukas „:attribute“ turi būti užpildytas.',
    'gt' => [
        'array' => 'Laukas „:attribute“ turi turėti daugiau nei :value elementų.',
        'file' => 'Laukas „:attribute“ turi būti didesnis nei :value kilobaitų.',
        'numeric' => 'Lauko „:attribute“ reikšmė turi būti didesnė nei :value.',
        'string' => 'Laukas „:attribute“ turi turėti daugiau nei :value simbolių.',
    ],
    'gte' => [
        'array' => 'Laukas „:attribute“ turi turėti :value arba daugiau elementų.',
        'file' => 'Laukas „:attribute“ turi būti didesnis arba lygus :value kilobaitų.',
        'numeric' => 'Lauko „:attribute“ reikšmė turi būti didesnė arba lygi :value.',
        'string' => 'Laukas „:attribute“ turi turėti daugiau arba lygu :value simbolių.',
    ],
    'hex_color' => 'Laukas „:attribute“ turi būti galiojanti šešioliktainė spalva.',
    'image' => 'Laukas „:attribute“ turi būti paveikslėlis.',
    'in' => 'Pasirinkta lauko „:attribute“ reikšmė yra negaliojanti.',
    'in_array' => 'Lauko „:attribute“ reikšmė turi egzistuoti lauke :other.',
    'in_array_keys' => 'Laukas „:attribute“ turi turėti bent vieną iš šių raktų: :values.',
    'integer' => 'Laukas „:attribute“ turi būti sveikasis skaičius.',
    'ip' => 'Laukas „:attribute“ turi būti galiojantis IP adresas.',
    'ipv4' => 'Laukas „:attribute“ turi būti galiojantis IPv4 adresas.',
    'ipv6' => 'Laukas „:attribute“ turi būti galiojantis IPv6 adresas.',
    'json' => 'Laukas „:attribute“ turi būti galiojanti JSON eilutė.',
    'list' => 'Laukas „:attribute“ turi būti sąrašas.',
    'lowercase' => 'Laukas „:attribute“ turi būti rašomas mažosiomis raidėmis.',
    'lt' => [
        'array' => 'Laukas „:attribute“ turi turėti mažiau nei :value elementų.',
        'file' => 'Laukas „:attribute“ turi būti mažesnis nei :value kilobaitų.',
        'numeric' => 'Lauko „:attribute“ reikšmė turi būti mažesnė nei :value.',
        'string' => 'Laukas „:attribute“ turi turėti mažiau nei :value simbolių.',
    ],
    'lte' => [
        'array' => 'Laukas „:attribute“ negali turėti daugiau nei :value elementų.',
        'file' => 'Laukas „:attribute“ turi būti mažesnis arba lygus :value kilobaitų.',
        'numeric' => 'Lauko „:attribute“ reikšmė turi būti mažesnė arba lygi :value.',
        'string' => 'Laukas „:attribute“ turi turėti mažiau arba lygu :value simbolių.',
    ],
    'mac_address' => 'Laukas „:attribute“ turi būti galiojantis MAC adresas.',
    'max' => [
        'array' => 'Laukas „:attribute“ negali turėti daugiau nei :max elementų.',
        'file' => 'Laukas „:attribute“ negali būti didesnis nei :max kilobaitų.',
        'numeric' => 'Lauko „:attribute“ reikšmė negali būti didesnė nei :max.',
        'string' => 'Laukas „:attribute“ negali būti ilgesnis nei :max simbolių.',
    ],
    'max_digits' => 'Laukas „:attribute“ negali turėti daugiau nei :max skaitmenų.',
    'mimes' => 'Laukas „:attribute“ turi būti failas, kurio tipas: :values.',
    'mimetypes' => 'Laukas „:attribute“ turi būti failas, kurio tipas: :values.',
    'min' => [
        'array' => 'Laukas „:attribute“ turi turėti bent :min elementų.',
        'file' => 'Laukas „:attribute“ turi būti bent :min kilobaitų.',
        'numeric' => 'Lauko „:attribute“ reikšmė turi būti bent :min.',
        'string' => 'Laukas „:attribute“ turi turėti bent :min simbolių.',
    ],
    'min_digits' => 'Laukas „:attribute“ turi turėti bent :min skaitmenis.',
    'missing' => 'Laukas „:attribute“ turi trūkti.',
    'missing_if' => 'Laukas „:attribute“ turi trūkti, kai :other yra :value.',
    'missing_unless' => 'Laukas „:attribute“ turi trūkti, nebent :other yra :value.',
    'missing_with' => 'Laukas „:attribute“ turi trūkti, kai :values yra pateikta.',
    'missing_with_all' => 'Laukas „:attribute“ turi trūkti, kai pateikti visi :values.',
    'multiple_of' => 'Lauko „:attribute“ reikšmė turi būti skaičiaus :value kartotinė.',
    'not_in' => 'Pasirinkta lauko „:attribute“ reikšmė yra negaliojanti.',
    'not_regex' => 'Lauko „:attribute“ formatas yra neteisingas.',
    'numeric' => 'Laukas „:attribute“ turi būti skaičius.',
    'password' => [
        'letters' => 'Laukas „:attribute“ turi turėti bent vieną raidę.',
        'mixed' => 'Laukas „:attribute“ turi turėti bent vieną didžiąją ir vieną mažąją raidę.',
        'numbers' => 'Laukas „:attribute“ turi turėti bent vieną skaičių.',
        'symbols' => 'Laukas „:attribute“ turi turėti bent vieną simbolį.',
        'uncompromised' => 'Nurodyta lauko „:attribute“ reikšmė buvo rasta duomenų nutekėjime. Prašome pasirinkti kitą „:attribute“.',
    ],
    'present' => 'Laukas „:attribute“ turi būti pateiktas.',
    'present_if' => 'Laukas „:attribute“ turi būti pateiktas, kai :other yra :value.',
    'present_unless' => 'Laukas „:attribute“ turi būti pateiktas, nebent :other yra :value.',
    'present_with' => 'Laukas „:attribute“ turi būti pateiktas, kai :values yra pateikta.',
    'present_with_all' => 'Laukas „:attribute“ turi būti pateiktas, kai pateikti visi :values.',
    'prohibited' => 'Laukas „:attribute“ yra draudžiamas.',
    'prohibited_if' => 'Laukas „:attribute“ yra draudžiamas, kai :other yra :value.',
    'prohibited_if_accepted' => 'Laukas „:attribute“ yra draudžiamas, kai :other yra patvirtintas.',
    'prohibited_if_declined' => 'Laukas „:attribute“ yra draudžiamas, kai :other yra atmestas.',
    'prohibited_unless' => 'Laukas „:attribute“ yra draudžiamas, nebent :other yra tarp :values.',
    'prohibits' => 'Laukas „:attribute“ neleidžia pateikti :other.',
    'regex' => 'Lauko „:attribute“ formatas yra neteisingas.',
    'required' => 'Laukas „:attribute“ yra privalomas.',
    'required_array_keys' => 'Laukas „:attribute“ turi turėti raktus: :values.',
    'required_if' => 'Laukas „:attribute“ yra privalomas, kai :other yra :value.',
    'required_if_accepted' => 'Laukas „:attribute“ yra privalomas, kai :other yra patvirtintas.',
    'required_if_declined' => 'Laukas „:attribute“ yra privalomas, kai :other yra atmestas.',
    'required_unless' => 'Laukas „:attribute“ yra privalomas, nebent :other yra tarp :values.',
    'required_with' => 'Laukas „:attribute“ yra privalomas, kai :values yra pateikta.',
    'required_with_all' => 'Laukas „:attribute“ yra privalomas, kai pateikti visi :values.',
    'required_without' => 'Laukas „:attribute“ yra privalomas, kai :values nėra pateikta.',
    'required_without_all' => 'Laukas „:attribute“ yra privalomas, kai nėra nė vieno iš :values.',
    'same' => 'Laukas „:attribute“ turi atitikti :other.',
    'size' => [
        'array' => 'Laukas „:attribute“ turi turėti :size elementus.',
        'file' => 'Laukas „:attribute“ turi būti :size kilobaitų.',
        'numeric' => 'Lauko „:attribute“ reikšmė turi būti :size.',
        'string' => 'Laukas „:attribute“ turi turėti :size simbolius.',
    ],
    'starts_with' => 'Laukas „:attribute“ turi prasidėti vienu iš šių: :values.',
    'string' => 'Laukas „:attribute“ turi būti eilutė.',
    'timezone' => 'Laukas „:attribute“ turi būti galiojanti laiko juosta.',
    'unique' => 'Lauko „:attribute“ reikšmė jau yra paimta.',
    'uploaded' => 'Lauko „:attribute“ įkėlimas nepavyko.',
    'uppercase' => 'Laukas „:attribute“ turi būti rašomas didžiosiomis raidėmis.',
    'url' => 'Laukas „:attribute“ turi būti galiojantis URL adresas.',
    'ulid' => 'Laukas „:attribute“ turi būti galiojantis ULID.',
    'uuid' => 'Laukas „:attribute“ turi būti galiojantis UUID.',

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
            'rule-name' => 'individualus-pranesimas',
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

    'attributes' => [
        'first_name' => 'vardas',
        'email' => 'el. paštas',
        'password' => 'slaptažodis',
        'title' => 'pavadinimas',
        'body' => 'turinys',
    ],

];
