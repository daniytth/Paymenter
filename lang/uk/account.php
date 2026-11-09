<?php

return [
    'account' => 'Обліковий запис',
    'personal_details' => 'Особисті дані',
    'security' => 'Безпека',
    'credits' => 'Кредити',

    'change_password' => 'Змінити пароль',

    'two_factor_authentication' => 'Двофакторна автентифікація',
    'two_factor_authentication_description' => 'Додайте додатковий рівень безпеки до вашого облікового запису, увімкнувши двофакторну автентифікацію.',
    'two_factor_authentication_enabled' => 'Двофакторна автентифікація увімкнена для вашого облікового запису.',
    'two_factor_authentication_enable' => 'Увімкнути двофакторну автентифікацію',
    'two_factor_authentication_disable' => 'Вимкнути двофакторну автентифікацію',
    'two_factor_authentication_disable_description' => 'Ви впевнені, що хочете вимкнути двофакторну автентифікацію? Це видалить додатковий рівень безпеки з вашого облікового запису.',
    'two_factor_authentication_enable_description' => 'Щоб увімкнути двофакторну автентифікацію, відскануйте QR-код нижче за допомогою додатка для автентифікації, наприклад Google Authenticator або Authy.',
    'two_factor_authentication_qr_code' => 'Відскануйте QR-код нижче у вашому додатку для автентифікації:',
    'two_factor_authentication_secret' => 'Або введіть наступний код вручну:',

    'sessions' => 'Сесії',
    'sessions_description' => 'Керуйте та завершуйте свої активні сесії на інших браузерах і пристроях.',
    'logout_sessions' => 'Завершити цю сесію',
    'current_device' => 'Поточний пристрій',

    'input' => [
        'current_password' => 'Поточний пароль',
        'current_password_placeholder' => 'Ваш поточний пароль',
        'new_password' => 'Новий пароль',
        'new_password_placeholder' => 'Ваш новий пароль',
        'confirm_password' => 'Підтвердити пароль',
        'confirm_password_placeholder' => 'Підтвердьте ваш новий пароль',

        'two_factor_code' => 'Введіть код з вашого додатка для автентифікації',
        'two_factor_code_placeholder' => 'Ваш код двофакторної автентифікації',

        'currency' => 'Валюта',
        'amount' => 'Сума',
        'payment_gateway' => 'Платіжний шлюз',
    ],

    'notifications' => [
        'password_changed' => 'Пароль змінено.',
        'password_incorrect' => 'Поточний пароль неправильний.',
        'two_factor_enabled' => 'Двофакторна автентифікація увімкнена.',
        'two_factor_disabled' => 'Двофакторна автентифікація вимкнена.',
        'two_factor_code_incorrect' => 'Код неправильний.',
        'session_logged_out' => 'Сесію завершено.',
        'unauthorized' => 'Ця дія не дозволена.',
    ],

    'no_credit' => 'У вас немає кредитів.',
    'add_credit' => 'Додати кошти',
    'credit_deposit' => 'Поповнення рахунку (:currency)',

    'payment_methods' => 'Способи оплати',
    'recent_transactions' => 'Останні транзакції',
    'saved_payment_methods' => 'Збережені способи оплати',
    'setup_payment_method' => 'Налаштувати новий спосіб оплати',
    'no_saved_payment_methods' => 'У вас немає збережених способів оплати.',
    'saved_payment_methods_description' => 'Керуйте збереженими способами оплати, щоб швидше оформлювати замовлення та використовувати автоматичні платежі.',
    'no_saved_payment_methods_description' => 'Ви можете додати спосіб оплати, щоб зробити майбутні платежі швидшими та зручнішими, а також увімкнути автоматичні платежі для своїх послуг.',
    'add_payment_method' => 'Додати спосіб оплати',
    'payment_method_statuses' => [
        'active' => 'Активний',
        'inactive' => 'Неактивний',
        'expired' => 'Термін дії минув',
        'pending' => 'В очікуванні',
    ],
    'payment_method_added' => 'Спосіб оплати було додано.',
    'payment_method_add_failed' => 'Не вдалося додати спосіб оплати. Будь ласка, спробуйте ще раз.',
    'services_linked' => 'Пов\'язано послуг: :count',
    'remove' => 'Видалити',
    'remove_payment_method' => 'Видалити спосіб оплати',
    'remove_payment_method_confirm' => 'Ви впевнені, що хочете видалити :name? Цю дію неможливо скасувати.',
    'expires' => 'Дійсний до :date',
    'cancel' => 'Скасувати',
    'confirm' => 'Так, видалити',
    'email_notifications' => 'Сповіщення електронною поштою',
    'in_app_notifications' => 'Сповіщення в застосунку',
    'notifications_description' => 'Керуйте своїми налаштуваннями сповіщень. Ви можете обрати отримання сповіщень електронною поштою, у застосунку (push) або обома способами.',
    'notification' => 'Сповіщення',

    'push_notifications' => 'Push-сповіщення',
    'push_notifications_description' => 'Увімкніть push-сповіщення, щоб отримувати оновлення в реальному часі безпосередньо у браузері, навіть коли ви не перебуваєте на сайті.',
    'enable_push_notifications' => 'Увімкнути push-сповіщення',
    'push_status' => [
        'not_supported' => 'Ваш браузер не підтримує push-сповіщення.',
        'denied' => 'Push-сповіщення заблоковано. Будь ласка, увімкніть їх у налаштуваннях браузера.',
        'subscribed' => 'Push-сповіщення увімкнено.',
    ],
];