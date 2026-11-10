<?php

return [
    'account' => 'Cuenta',
    'personal_details' => 'Datos Personales',
    'security' => 'Seguridad',
    'credits' => 'Créditos',

    'change_password' => 'Cambiar Contraseña',

    'two_factor_authentication' => 'Autenticación De Dos Factores',
    'two_factor_authentication_description' => 'Añade una capa adicional de seguridad a tu cuenta activando la autenticación de dos factores.',
    'two_factor_authentication_enabled' => 'La autenticación de dos factores está activada en tu cuenta.',
    'two_factor_authentication_enable' => 'Activar la autenticación de dos factores',
    'two_factor_authentication_disable' => 'Desactivar la autenticación de dos factores',
    'two_factor_authentication_disable_description' => '¿Estás seguro de que deseas desactivar la autenticación de dos factores? Esto eliminará la capa extra de seguridad de tu cuenta.',
    'two_factor_authentication_enable_description' => 'Para habilitar la autenticación de dos factores, debes escanear el código QR a continuación con una aplicación de autenticación como Google Authenticator o Authy.',
    'two_factor_authentication_qr_code' => 'Escanea el código QR a continuación con tu aplicación de autenticación:',
    'two_factor_authentication_secret' => 'O introduce el siguiente código manualmente:',

    'sessions' => 'Sesiones',
    'sessions_description' => 'Administra y cierra sesión en tus sesiones activas en otros navegadores y dispositivos.',
    'logout_sessions' => 'Cerrar Esta Sesión',
    'current_device' => 'Dispositivo Actual',

    'input' => [
        'current_password' => 'Contraseña Actual',
        'current_password_placeholder' => 'Tu contraseña actual',
        'new_password' => 'Nueva Contraseña',
        'new_password_placeholder' => 'Tu nueva contraseña',
        'confirm_password' => 'Confirma La Contraseña',
        'confirm_password_placeholder' => 'Confirma tu nueva contraseña',

        'two_factor_code' => 'Ingresa El Código De Tu Aplicación De Autenticación',
        'two_factor_code_placeholder' => 'Tu código de autenticación de dos factores',

        'currency' => 'Divisa',
        'amount' => 'Importe',
        'payment_gateway' => 'Pasarela De Pago',
    ],

    'notifications' => [
        'password_changed' => 'La contraseña ha sido cambiada.',
        'password_incorrect' => 'La contraseña actual es incorrecta.',
        'two_factor_enabled' => 'La autenticación de dos factores ha sido habilitada.',
        'two_factor_disabled' => 'La autenticación de dos factores ha sido deshabilitada.',
        'two_factor_code_incorrect' => 'El código es incorrecto.',
        'session_logged_out' => 'La sesión ha sido cerrada.',
        'unauthorized' => 'Esta acción no está permitida.',
    ],

    'no_credit' => 'No Tienes Créditos.',
    'add_credit' => 'Añadir Vrédito',
    'credit_deposit' => 'Depósito De Crédito (:currency)',

    'payment_methods' => 'Métodos De Pago',
    'recent_transactions' => 'Transacciones Recientes',
    'saved_payment_methods' => 'Métodos De Pago Guardados',
    'setup_payment_method' => 'Configurar un nuevo método de pago',
    'no_saved_payment_methods' => 'No tienes ningún método de pago guardado.',
    'saved_payment_methods_description' => 'Administra tus métodos de pago guardados para una compra más rápida y pagos automáticos.',
    'no_saved_payment_methods_description' => 'Puedes agregar un método de pago para hacer pagos futuros más rápidos y fáciles, y habilitar pagos automáticos para tus servicios.',
    'add_payment_method' => 'Añadir Método De Pago',
    'payment_method_statuses' => [
        'active' => 'Activo',
        'inactive' => 'Inactivo',
        'expired' => 'Expirado',
        'pending' => 'Pendiente',
    ],
    'payment_method_added' => 'El método de pago ha sido añadido.',
    'payment_method_add_failed' => 'Error al añadir el método de pago. Por favor, inténtalo de nuevo.',
    'services_linked' => ':count servicio(s) enlazado(s)',
    'remove' => 'Eliminar',
    'remove_payment_method' => 'Eliminar Método De Pago',
    'remove_payment_method_confirm' => '¿Estás seguro de que quieres eliminar :name? Esta acción no se puede deshacer.',
    'expires' => 'Caduca :date',
    'cancel' => 'Cancelar',
    'confirm' => 'Sí, Eliminar',
    'email_notifications' => 'Notificaciones Por Correo Electrónico',
    'in_app_notifications' => 'Notificaciones En La Aplicación',
    'notifications_description' => 'Administra tus preferencias de notificación. Puedes elegir recibir notificaciones por correo electrónico, dentro de la aplicación (push), o ambos.',
    'notification' => 'Notificación',

    'push_notifications' => 'Notificaciones Push',
    'push_notifications_description' => 'Activa las notificaciones push para recibir actualizaciones en tiempo real directamente en tu navegador, incluso cuando no estás en el sitio.',
    'enable_push_notifications' => 'Activar Notificaciones Push',
    'push_status' => [
        'not_supported' => 'Las notificaciones push no son compatibles con tu navegador.',
        'denied' => 'Las notificaciones push están bloqueadas. Por favor, actívalas en la configuración de tu navegador.',
        'subscribed' => 'Las notificaciones push están habilitadas.',
    ],
];