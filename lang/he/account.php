<?php

return [
    'account' => 'חשבון',
    'personal_details' => 'פרטים אישיים',
    'security' => 'אבטחה',
    'credits' => 'נקודות',

    'change_password' => 'שנה סיסמא',

    'two_factor_authentication' => 'אימות דו שלבי',
    'two_factor_authentication_description' => 'הוסף שכבת אבטחה נוספת על ידי הפעלת אימות דו שלבי.',
    'two_factor_authentication_enabled' => 'אימות דו שלבי מופעל בחשבונך.',
    'two_factor_authentication_enable' => 'הפעל אימות דו שלבי',
    'two_factor_authentication_disable' => 'בטל אימות דו שלבי',
    'two_factor_authentication_disable_description' => 'האם אתה בטוח שברצונך לבטל את האימות הדו-שלבי? פעולה זו תסיר את שכבת האבטחה הנוספת מחשבונך.',
    'two_factor_authentication_enable_description' => 'על מנת להפעיל אימות דו שלבי, עליך לסרוק את קוד ה-QR המצורף באמצעות אפליקציית אימות דו שלבי כמו Google Authenticator או Authy.',
    'two_factor_authentication_qr_code' => 'סרוק את הקוד המצורף באמצעות האפליקציה:',
    'two_factor_authentication_secret' => 'או הכנס את הקוד באופן ידני:',

    'sessions' => 'חיבורים',
    'sessions_description' => 'ניהול וניתוק חיבורים קיימים בדפדפנים ומכשירים אחרים.',
    'logout_sessions' => 'ניתוק החיבור הנוכחי',
    'current_device' => 'מכשיר נוכחי',

    'input' => [
        'current_password' => 'הסיסמה הנוכחית',
        'current_password_placeholder' => 'סיסמתך הנוכחית',
        'new_password' => 'סיסמה חדשה',
        'new_password_placeholder' => 'הסיסמה החדשה שלך היא',
        'confirm_password' => 'אימות סיסמה',
        'confirm_password_placeholder' => 'אמת את הסיסמה החדשה שלך',

        'two_factor_code' => 'הקש את הקוד מיישום האימות שלך',
        'two_factor_code_placeholder' => 'הקוד שלך לאימות דו שלבי',

        'currency' => 'מטבע',
        'amount' => 'סכום',
        'payment_gateway' => 'שער תשלום',
    ],

    'notifications' => [
        'password_changed' => 'הסיסמה השתנתה.',
        'password_incorrect' => 'הסיסמה הנוכחית איננה נכונה.',
        'two_factor_enabled' => 'אימות דו שלבי הופעל.',
        'two_factor_disabled' => 'אימות דו שלבי בוטל.',
        'two_factor_code_incorrect' => 'הקוד אינו נכון.',
        'session_logged_out' => 'החיבור נותק.',
        'unauthorized' => 'פעולה זו אינה מורשית.',
    ],

    'no_credit' => 'נגמרו לך הנקודות.',
    'add_credit' => 'הוסף נקודות',
    'credit_deposit' => 'טעינת נקודות (:currency)',

    'payment_methods' => 'שיטות תשלום',
    'recent_transactions' => 'עסקאות אחרונות',
    'saved_payment_methods' => 'שיטות תשלום שמורות',
    'setup_payment_method' => 'הגדר שיטת תשלום חדשה',
    'no_saved_payment_methods' => 'אין לך שיטות תשלום שמורות.',
    'saved_payment_methods_description' => 'נהל את שיטות התשלום השמורות שלך לתשלום מהיר יותר ותשלומים אוטומטיים.',
    'no_saved_payment_methods_description' => 'תוכל להוסיף שיטת תשלום כדי להפוך תשלומים עתידיים למהירים וקלים יותר, ולאפשר תשלומים אוטומטיים עבור השירותים שלך.',
    'add_payment_method' => 'הוסף שיטת תשלום',
    'payment_method_statuses' => [
        'active' => 'פעיל',
        'inactive' => 'לא פעיל',
        'expired' => 'פג תוקף',
        'pending' => 'ממתין',
    ],
    'payment_method_added' => 'שיטת התשלום נוספה.',
    'payment_method_add_failed' => 'הוספת שיטת התשלום נכשלה. אנא נסה שוב.',
    'services_linked' => ':count שירותים מקושרים',
    'remove' => 'הסר',
    'remove_payment_method' => 'הסר שיטת תשלום',
    'remove_payment_method_confirm' => 'האם אתה בטוח שברצונך להסיר את :name? לא ניתן לבטל פעולה זו.',
    'expires' => 'פג תוקף ב-:date',
    'cancel' => 'בטל',
    'confirm' => 'כן, הסר',
    'email_notifications' => 'התראות אימייל',
    'in_app_notifications' => 'התראות באפליקציה',
    'notifications_description' => 'נהל את העדפות ההתראות שלך. תוכל לבחור לקבל התראות בדוא"ל, באפליקציה (פוש), או בשניהם.',
    'notification' => 'התראה',

    'push_notifications' => 'התראות פוש',
    'push_notifications_description' => 'הפעל התראות פוש כדי לקבל עדכונים בזמן אמת ישירות בדפדפן שלך, גם כאשר אינך באתר.',
    'enable_push_notifications' => 'הפעל התראות פוש',
    'push_status' => [
        'not_supported' => 'התראות פוש לא נתמכות על ידי הדפדפן שלך.',
        'denied' => 'התראות פוש חסומות. אנא הפעל אותן בהגדרות הדפדפן שלך.',
        'subscribed' => 'התראות פוש מופעלות.',
    ],
];