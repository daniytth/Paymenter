<?php

return [
    'account' => 'Compte',
    'personal_details' => 'Informations Personnelles',
    'security' => 'Sécurité',
    'credits' => 'Crédits',

    'change_password' => 'Modifier Le Mot De Passe',

    'two_factor_authentication' => 'Double Authentification',
    'two_factor_authentication_description' => 'Ajoutez une couche de sécurité supplémentaire à votre compte en activant l\'authentification à deux facteurs.',
    'two_factor_authentication_enabled' => 'La double authentification est maintenant activée pour votre compte.',
    'two_factor_authentication_enable' => 'Activer La Double Authentification',
    'two_factor_authentication_disable' => 'Désactiver La Double aAthentification',
    'two_factor_authentication_disable_description' => 'Voulez-vous vraiment désactiver la double authentification ? Cela aura pour conséquence d\'affaiblir la sécurité de votre compte.',
    'two_factor_authentication_enable_description' => 'Pour activer l\'authentification à deux facteurs, vous devez scanner le code QR ci-dessous avec une application d\'authentification comme Google Authenticator ou Authy.',
    'two_factor_authentication_qr_code' => 'Scannez le QR code ci-dessous avec votre app d\'authentification :',
    'two_factor_authentication_secret' => 'Ou saisissez le code suivant manuellement :',

    'sessions' => 'Sessions',
    'sessions_description' => 'Gérer et déconnecter vos sessions actives sur les autres navigateurs et appareils.',
    'logout_sessions' => 'Déconnecter Cette Session',
    'current_device' => 'Cet Appareil',

    'input' => [
        'current_password' => 'Mot De Passe Actuel',
        'current_password_placeholder' => 'Votre mot de passe actuel',
        'new_password' => 'Nouveau Mot De Passe',
        'new_password_placeholder' => 'Votre nouveau mot de passe',
        'confirm_password' => 'Confirmation Du Mot De Passe',
        'confirm_password_placeholder' => 'Confirmez votre nouveau mot de passe',

        'two_factor_code' => 'Entrez Le Code De Votre Application D\'authentification',
        'two_factor_code_placeholder' => 'Votre code de double authentification',

        'currency' => 'Devise',
        'amount' => 'Montant',
        'payment_gateway' => 'Passerelle De Paiement',
    ],

    'notifications' => [
        'password_changed' => 'Le mot de passe a été modifié.',
        'password_incorrect' => 'Le mot de passe actuel est incorrect.',
        'two_factor_enabled' => 'La double authentification a été activée.',
        'two_factor_disabled' => 'La double authentification a été désactivée.',
        'two_factor_code_incorrect' => 'Le code est incorrect.',
        'session_logged_out' => 'La session a été déconnectée.',
        'unauthorized' => 'Cette action n\'est pas autorisée.',
    ],

    'no_credit' => 'Vous n\'avez aucun crédit.',
    'add_credit' => 'Ajouter Des Crédits',
    'credit_deposit' => 'Déposer Des Crédits (:currency)',

    'payment_methods' => 'Modes De Paiement',
    'recent_transactions' => 'Transactions Récentes',
    'saved_payment_methods' => 'Méthodes De Paiement Enregistrées',
    'setup_payment_method' => 'Configurer Un Nouveau Mode De Paiement',
    'no_saved_payment_methods' => 'Vous n\'avez actuellement aucun mode de paiement enregistré.',
    'saved_payment_methods_description' => 'Gérez vos modes de paiement enregistrés pour des commandes plus rapides et des paiements automatiques.',
    'no_saved_payment_methods_description' => 'Vous pouvez ajouter une méthode de paiement pour rendre les paiements futurs plus rapides et plus simples. Mais aussi, activer les paiements automatiques pour vos services.',
    'add_payment_method' => 'Ajouter Un Mode De Paiement',
    'payment_method_statuses' => [
        'active' => 'Actif',
        'inactive' => 'Inactif',
        'expired' => 'Expiré',
        'pending' => 'En Attente',
    ],
    'payment_method_added' => 'Le mode de paiement a été ajouté.',
    'payment_method_add_failed' => 'Impossible d\'ajouter le mode de paiement. Veuillez réessayer.',
    'services_linked' => ':count service(s) lié(s)',
    'remove' => 'Supprimer',
    'remove_payment_method' => 'Supprimer Le Mode De Paiement',
    'remove_payment_method_confirm' => 'Êtes-vous sûr de vouloir supprimer :name ? Cette action ne peut être annulée.',
    'expires' => 'Expire Le :date',
    'cancel' => 'Annuler',
    'confirm' => 'Confirmer La Suppression',
    'email_notifications' => 'Notifications par e-mail',
    'in_app_notifications' => 'Notifications dans l\'application',
    'notifications_description' => 'Gérez vos préférences de notification. Vous pouvez choisir de recevoir des notifications par e-mail, dans l\'application (push), ou les deux.',
    'notification' => 'Notification',

    'push_notifications' => 'Notifications Push',
    'push_notifications_description' => 'Activez les notifications push pour recevoir des mises à jour en temps réel directement dans votre navigateur, même si vous n\'êtes pas sur le site.',
    'enable_push_notifications' => 'Activer Les Notifications Push',
    'push_status' => [
        'not_supported' => 'Les notifications push ne sont pas prises en charge par votre navigateur.',
        'denied' => 'Les notifications push sont bloquées. Veuillez les activer dans les paramètres de votre navigateur.',
        'subscribed' => 'Les notifications push sont activées.',
    ],
];