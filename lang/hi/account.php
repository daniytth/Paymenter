<?php

return [
    'account' => 'खाता',
    'personal_details' => 'व्यक्तिगत विवरण',
    'security' => 'सुरक्षा',
    'credits' => 'क्रेडिट्स',

    'change_password' => 'पासवर्ड बदलें',

    'two_factor_authentication' => 'दो-चरणीय प्रमाणीकरण',
    'two_factor_authentication_description' => 'दो-चरणीय प्रमाणीकरण सक्षम करके अपने खाते की सुरक्षा को और मजबूत करें।',
    'two_factor_authentication_enabled' => 'आपके खाते के लिए दो-चरणीय प्रमाणीकरण सक्षम है।',
    'two_factor_authentication_enable' => 'दो-चरणीय प्रमाणीकरण सक्षम करें',
    'two_factor_authentication_disable' => 'दो-चरणीय प्रमाणीकरण अक्षम करें',
    'two_factor_authentication_disable_description' => 'क्या आप वाकई दो-चरणीय प्रमाणीकरण अक्षम करना चाहते हैं? इससे आपके खाते से सुरक्षा की अतिरिक्त परत हट जाएगी।',
    'two_factor_authentication_enable_description' => 'दो-चरणीय प्रमाणीकरण सक्षम करने के लिए, नीचे दिए गए QR कोड को Google Authenticator या Authy जैसे ऐप से स्कैन करें।',
    'two_factor_authentication_qr_code' => 'अपने प्रमाणीकरण ऐप से नीचे दिए गए QR कोड को स्कैन करें:',
    'two_factor_authentication_secret' => 'या नीचे दिए गए कोड को मैन्युअली दर्ज करें:',

    'sessions' => 'सेशंस',
    'sessions_description' => 'अन्य ब्राउज़र और डिवाइस पर अपनी सक्रिय सेशंस को प्रबंधित करें और लॉग आउट करें।',
    'logout_sessions' => 'इस सेशन को लॉग आउट करें',
    'current_device' => 'वर्तमान डिवाइस',

    'input' => [
        'current_password' => 'वर्तमान पासवर्ड',
        'current_password_placeholder' => 'आपका वर्तमान पासवर्ड',
        'new_password' => 'नया पासवर्ड',
        'new_password_placeholder' => 'आपका नया पासवर्ड',
        'confirm_password' => 'पासवर्ड की पुष्टि करें',
        'confirm_password_placeholder' => 'अपने नए पासवर्ड की पुष्टि करें',

        'two_factor_code' => 'अपने प्रमाणीकरण ऐप से कोड दर्ज करें',
        'two_factor_code_placeholder' => 'आपका दो-चरणीय प्रमाणीकरण कोड',

        'currency' => 'मुद्रा',
        'amount' => 'राशि',
        'payment_gateway' => 'भुगतान गेटवे',
    ],

    'notifications' => [
        'password_changed' => 'पासवर्ड बदल दिया गया है।',
        'password_incorrect' => 'वर्तमान पासवर्ड गलत है।',
        'two_factor_enabled' => 'दो-चरणीय प्रमाणीकरण सक्षम किया गया है।',
        'two_factor_disabled' => 'दो-चरणीय प्रमाणीकरण अक्षम कर दिया गया है।',
        'two_factor_code_incorrect' => 'कोड गलत है।',
        'session_logged_out' => 'सेशन को लॉग आउट कर दिया गया है।',
        'unauthorized' => 'यह क्रिया अनुमत नहीं है।',
    ],

    'no_credit' => 'आपके पास कोई क्रेडिट नहीं है।',
    'add_credit' => 'क्रेडिट जोड़ें',
    'credit_deposit' => 'क्रेडिट जमा (:currency)',

    'payment_methods' => 'भुगतान विधियाँ',
    'recent_transactions' => 'हाल के लेन-देन',
    'saved_payment_methods' => 'सहेजी गई भुगतान विधियाँ',
    'setup_payment_method' => 'नई भुगतान विधि सेट करें',
    'no_saved_payment_methods' => 'आपके पास कोई सहेजी गई भुगतान विधि नहीं है।',
    'saved_payment_methods_description' => 'तेज़ चेकआउट और स्वचालित भुगतान के लिए अपनी सहेजी गई भुगतान विधियों को प्रबंधित करें।',
    'no_saved_payment_methods_description' => 'आप भविष्य के भुगतानों को तेज़ और आसान बनाने तथा अपनी सेवाओं के लिए स्वचालित भुगतान सक्षम करने हेतु एक भुगतान विधि जोड़ सकते हैं।',
    'add_payment_method' => 'भुगतान विधि जोड़ें',
    'payment_method_statuses' => [
        'active' => 'सक्रिय',
        'inactive' => 'निष्क्रिय',
        'expired' => 'समाप्त',
        'pending' => 'लंबित',
    ],
    'payment_method_added' => 'भुगतान विधि जोड़ दी गई है।',
    'payment_method_add_failed' => 'भुगतान विधि जोड़ने में विफल। कृपया पुनः प्रयास करें।',
    'services_linked' => ':count सेवाएँ लिंक की गईं',
    'remove' => 'हटाएँ',
    'remove_payment_method' => 'भुगतान विधि हटाएँ',
    'remove_payment_method_confirm' => 'क्या आप वाकई :name को हटाना चाहते हैं? यह क्रिया पूर्ववत नहीं की जा सकती।',
    'expires' => ':date को समाप्त होगा',
    'cancel' => 'रद्द करें',
    'confirm' => 'हाँ, हटाएँ',
    'email_notifications' => 'ईमेल सूचनाएँ',
    'in_app_notifications' => 'इन-ऐप सूचनाएँ',
    'notifications_description' => 'अपनी सूचना प्राथमिकताएँ प्रबंधित करें। आप ईमेल, इन-ऐप (पुश) या दोनों के माध्यम से सूचनाएँ प्राप्त करना चुन सकते हैं।',
    'notification' => 'सूचना',

    'push_notifications' => 'पुश सूचनाएँ',
    'push_notifications_description' => 'वास्तविक समय में सीधे अपने ब्राउज़र में अपडेट प्राप्त करने के लिए पुश सूचनाएँ सक्षम करें, भले ही आप साइट पर न हों।',
    'enable_push_notifications' => 'पुश सूचनाएँ सक्षम करें',
    'push_status' => [
        'not_supported' => 'पुश सूचनाएँ आपके ब्राउज़र द्वारा समर्थित नहीं हैं।',
        'denied' => 'पुश सूचनाएँ अवरुद्ध हैं। कृपया उन्हें अपने ब्राउज़र सेटिंग्स में सक्षम करें।',
        'subscribed' => 'पुश सूचनाएँ सक्षम हैं।',
    ],
];