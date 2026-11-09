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

    'accepted' => ':attribute ক্ষেত্রটি অবশ্যই গ্রহণ করতে হবে।',
    'accepted_if' => ':other যখন :value তখন :attribute ক্ষেত্রটি অবশ্যই গ্রহণ করতে হবে।',
    'active_url' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ URL হতে হবে।',
    'after' => ':attribute ক্ষেত্রটি অবশ্যই :date এর পরে একটি তারিখ হতে হবে।',
    'after_or_equal' => ':attribute ক্ষেত্রটি অবশ্যই :date এর পরে বা সমান তারিখ হতে হবে।',
    'alpha' => ':attribute ক্ষেত্রটিতে শুধুমাত্র অক্ষর থাকতে হবে।',
    'alpha_dash' => ':attribute ক্ষেত্রটিতে শুধুমাত্র অক্ষর, সংখ্যা, ড্যাশ এবং আন্ডারস্কোর থাকতে হবে।',
    'alpha_num' => ':attribute ক্ষেত্রটিতে শুধুমাত্র অক্ষর এবং সংখ্যা থাকতে হবে।',
    'array' => ':attribute ক্ষেত্রটি অবশ্যই একটি অ্যারে হতে হবে।',
    'ascii' => ':attribute ক্ষেত্রটিতে শুধুমাত্র একক-বাইট আলফানিউমেরিক অক্ষর এবং চিহ্ন থাকতে হবে।',
    'before' => ':attribute ক্ষেত্রটি অবশ্যই :date এর আগে একটি তারিখ হতে হবে।',
    'before_or_equal' => ':attribute ক্ষেত্রটি অবশ্যই :date এর আগে বা সমান তারিখ হতে হবে।',
    'between' => [
        'array' => ':attribute ক্ষেত্রটিতে :min থেকে :max আইটেম থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি :min থেকে :max কিলোবাইটের মধ্যে হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :min থেকে :max এর মধ্যে হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :min থেকে :max অক্ষরের মধ্যে হতে হবে।',
    ],
    'boolean' => ':attribute ক্ষেত্রটি অবশ্যই সত্য বা মিথ্যা হতে হবে।',
    'can' => ':attribute ক্ষেত্রটিতে একটি অননুমোদিত মান রয়েছে।',
    'confirmed' => ':attribute ক্ষেত্রের নিশ্চিতকরণ মেলেনি।',
    'current_password' => 'পাসওয়ার্ডটি ভুল।',
    'date' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ তারিখ হতে হবে।',
    'date_equals' => ':attribute ক্ষেত্রটি অবশ্যই :date এর সমান তারিখ হতে হবে।',
    'date_format' => ':attribute ক্ষেত্রটি অবশ্যই :format ফরম্যাটের সাথে মিলতে হবে।',
    'decimal' => ':attribute ক্ষেত্রটিতে :decimal দশমিক স্থান থাকতে হবে।',
    'declined' => ':attribute ক্ষেত্রটি অবশ্যই প্রত্যাখ্যান করতে হবে।',
    'declined_if' => ':other যখন :value তখন :attribute ক্ষেত্রটি অবশ্যই প্রত্যাখ্যান করতে হবে।',
    'different' => ':attribute ক্ষেত্র এবং :other অবশ্যই ভিন্ন হতে হবে।',
    'digits' => ':attribute ক্ষেত্রটি অবশ্যই :digits অঙ্ক হতে হবে।',
    'digits_between' => ':attribute ক্ষেত্রটি :min থেকে :max অঙ্কের মধ্যে হতে হবে।',
    'dimensions' => ':attribute ক্ষেত্রটির চিত্রের মাত্রা অবৈধ।',
    'distinct' => ':attribute ক্ষেত্রটিতে একটি সদৃশ মান রয়েছে।',
    'doesnt_end_with' => ':attribute ক্ষেত্রটি নিম্নলিখিতগুলির একটির সাথে শেষ হতে পারবে না: :values।',
    'doesnt_start_with' => ':attribute ক্ষেত্রটি নিম্নলিখিতগুলির একটির সাথে শুরু হতে পারবে না: :values।',
    'email' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ ইমেইল ঠিকানা হতে হবে।',
    'ends_with' => ':attribute ক্ষেত্রটি নিম্নলিখিতগুলির একটির সাথে শেষ হতে হবে: :values।',
    'enum' => 'নির্বাচিত :attribute অবৈধ।',
    'exists' => 'নির্বাচিত :attribute অবৈধ।',
    'extensions' => ':attribute ক্ষেত্রটিতে নিম্নলিখিত এক্সটেনশনগুলির একটি থাকতে হবে: :values।',
    'file' => ':attribute ক্ষেত্রটি অবশ্যই একটি ফাইল হতে হবে।',
    'filled' => ':attribute ক্ষেত্রটিতে অবশ্যই একটি মান থাকতে হবে।',
    'gt' => [
        'array' => ':attribute ক্ষেত্রটিতে :value এর বেশি আইটেম থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি :value কিলোবাইটের বেশি হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :value এর বেশি হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :value অক্ষরের বেশি হতে হবে।',
    ],
    'gte' => [
        'array' => ':attribute ক্ষেত্রটিতে :value আইটেম বা তার বেশি থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি :value কিলোবাইটের সমান বা বেশি হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :value এর সমান বা বেশি হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :value অক্ষরের সমান বা বেশি হতে হবে।',
    ],
    'hex_color' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ হেক্সাডেসিমেল রঙ হতে হবে।',
    'image' => ':attribute ক্ষেত্রটি অবশ্যই একটি চিত্র হতে হবে।',
    'in' => 'নির্বাচিত :attribute অবৈধ।',
    'in_array' => ':attribute ক্ষেত্রটি অবশ্যই :other এ বিদ্যমান থাকতে হবে।',
    'integer' => ':attribute ক্ষেত্রটি অবশ্যই একটি পূর্ণসংখ্যা হতে হবে।',
    'ip' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ IP ঠিকানা হতে হবে।',
    'ipv4' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ IPv4 ঠিকানা হতে হবে।',
    'ipv6' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ IPv6 ঠিকানা হতে হবে।',
    'json' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ JSON স্ট্রিং হতে হবে।',
    'list' => ':attribute ক্ষেত্রটি অবশ্যই একটি তালিকা হতে হবে।',
    'lowercase' => ':attribute ক্ষেত্রটি অবশ্যই ছোট হাতের হতে হবে।',
    'lt' => [
        'array' => ':attribute ক্ষেত্রটিতে :value এর কম আইটেম থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি :value কিলোবাইটের কম হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :value এর কম হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :value অক্ষরের কম হতে হবে।',
    ],
    'lte' => [
        'array' => ':attribute ক্ষেত্রটিতে :value এর বেশি আইটেম থাকতে পারবে না।',
        'file' => ':attribute ক্ষেত্রটি :value কিলোবাইটের সমান বা কম হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :value এর সমান বা কম হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :value অক্ষরের সমান বা কম হতে হবে।',
    ],
    'mac_address' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ MAC ঠিকানা হতে হবে।',
    'max' => [
        'array' => ':attribute ক্ষেত্রটিতে :max এর বেশি আইটেম থাকতে পারবে না।',
        'file' => ':attribute ক্ষেত্রটি :max কিলোবাইটের বেশি হতে পারবে না।',
        'numeric' => ':attribute ক্ষেত্রটি :max এর বেশি হতে পারবে না।',
        'string' => ':attribute ক্ষেত্রটি :max অক্ষরের বেশি হতে পারবে না।',
    ],
    'max_digits' => ':attribute ক্ষেত্রটিতে :max এর বেশি অঙ্ক থাকতে পারবে না।',
    'mimes' => ':attribute ক্ষেত্রটি অবশ্যই এই ধরনের একটি ফাইল হতে হবে: :values।',
    'mimetypes' => ':attribute ক্ষেত্রটি অবশ্যই এই ধরনের একটি ফাইল হতে হবে: :values।',
    'min' => [
        'array' => ':attribute ক্ষেত্রটিতে কমপক্ষে :min আইটেম থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি কমপক্ষে :min কিলোবাইট হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি কমপক্ষে :min হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি কমপক্ষে :min অক্ষর হতে হবে।',
    ],
    'min_digits' => ':attribute ক্ষেত্রটিতে কমপক্ষে :min অঙ্ক থাকতে হবে।',
    'missing' => ':attribute ক্ষেত্রটি অনুপস্থিত থাকতে হবে।',
    'missing_if' => ':other যখন :value তখন :attribute ক্ষেত্রটি অনুপস্থিত থাকতে হবে।',
    'missing_unless' => ':other যখন :value না হয় তখন :attribute ক্ষেত্রটি অনুপস্থিত থাকতে হবে।',
    'missing_with' => ':values উপস্থিত থাকলে :attribute ক্ষেত্রটি অনুপস্থিত থাকতে হবে।',
    'missing_with_all' => ':values উপস্থিত থাকলে :attribute ক্ষেত্রটি অনুপস্থিত থাকতে হবে।',
    'multiple_of' => ':attribute ক্ষেত্রটি অবশ্যই :value এর গুণিতক হতে হবে।',
    'not_in' => 'নির্বাচিত :attribute অবৈধ।',
    'not_regex' => ':attribute ক্ষেত্রের ফরম্যাট অবৈধ।',
    'numeric' => ':attribute ক্ষেত্রটি অবশ্যই একটি সংখ্যা হতে হবে।',
    'password' => [
        'letters' => ':attribute ক্ষেত্রটিতে কমপক্ষে একটি অক্ষর থাকতে হবে।',
        'mixed' => ':attribute ক্ষেত্রটিতে কমপক্ষে একটি বড় হাতের এবং একটি ছোট হাতের অক্ষর থাকতে হবে।',
        'numbers' => ':attribute ক্ষেত্রটিতে কমপক্ষে একটি সংখ্যা থাকতে হবে।',
        'symbols' => ':attribute ক্ষেত্রটিতে কমপক্ষে একটি চিহ্ন থাকতে হবে।',
        'uncompromised' => 'প্রদত্ত :attribute একটি ডেটা লিকে উপস্থিত হয়েছে। অনুগ্রহ করে একটি ভিন্ন :attribute চয়ন করুন।',
    ],
    'present' => ':attribute ক্ষেত্রটি অবশ্যই উপস্থিত থাকতে হবে।',
    'present_if' => ':other যখন :value তখন :attribute ক্ষেত্রটি অবশ্যই উপস্থিত থাকতে হবে।',
    'present_unless' => ':other যখন :value না হয় তখন :attribute ক্ষেত্রটি অবশ্যই উপস্থিত থাকতে হবে।',
    'present_with' => ':values উপস্থিত থাকলে :attribute ক্ষেত্রটি অবশ্যই উপস্থিত থাকতে হবে।',
    'present_with_all' => ':values উপস্থিত থাকলে :attribute ক্ষেত্রটি অবশ্যই উপস্থিত থাকতে হবে।',
    'prohibited' => ':attribute ক্ষেত্রটি নিষিদ্ধ।',
    'prohibited_if' => ':other যখন :value তখন :attribute ক্ষেত্রটি নিষিদ্ধ।',
    'prohibited_unless' => ':other যখন :values এ থাকে তখন ছাড়া :attribute ক্ষেত্রটি নিষিদ্ধ।',
    'prohibits' => ':attribute ক্ষেত্রটি :other কে উপস্থিত থাকতে নিষেধ করে।',
    'regex' => ':attribute ক্ষেত্রের ফরম্যাট অবৈধ।',
    'required' => ':attribute ক্ষেত্রটি আবশ্যক।',
    'required_array_keys' => ':attribute ক্ষেত্রটিতে এগুলির জন্য এন্ট্রি থাকতে হবে: :values।',
    'required_if' => ':other যখন :value তখন :attribute ক্ষেত্রটি আবশ্যক।',
    'required_if_accepted' => ':other গৃহীত হলে :attribute ক্ষেত্রটি আবশ্যক।',
    'required_unless' => ':other যখন :values এ থাকে তখন ছাড়া :attribute ক্ষেত্রটি আবশ্যক।',
    'required_with' => ':values উপস্থিত থাকলে :attribute ক্ষেত্রটি আবশ্যক।',
    'required_with_all' => ':values উপস্থিত থাকলে :attribute ক্ষেত্রটি আবশ্যক।',
    'required_without' => ':values উপস্থিত না থাকলে :attribute ক্ষেত্রটি আবশ্যক।',
    'required_without_all' => ':values এর কোনটিই উপস্থিত না থাকলে :attribute ক্ষেত্রটি আবশ্যক।',
    'same' => ':attribute ক্ষেত্রটি অবশ্যই :other এর সাথে মিলতে হবে।',
    'size' => [
        'array' => ':attribute ক্ষেত্রটিতে :size আইটেম থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি :size কিলোবাইট হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :size হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :size অক্ষর হতে হবে।',
    ],
    'starts_with' => ':attribute ক্ষেত্রটি নিম্নলিখিতগুলির একটির সাথে শুরু হতে হবে: :values।',
    'string' => ':attribute ক্ষেত্রটি অবশ্যই একটি স্ট্রিং হতে হবে।',
    'timezone' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ টাইমজোন হতে হবে।',
    'unique' => ':attribute ইতিমধ্যে নেওয়া হয়েছে।',
    'uploaded' => ':attribute আপলোড করতে ব্যর্থ হয়েছে।',
    'uppercase' => ':attribute ক্ষেত্রটি অবশ্যই বড় হাতের হতে হবে।',
    'url' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ URL হতে হবে।',
    'ulid' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ ULID হতে হবে।',
    'uuid' => ':attribute ক্ষেত্রটি অবশ্যই একটি বৈধ UUID হতে হবে।',

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
            'rule-name' => 'কাস্টম-বার্তা',
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