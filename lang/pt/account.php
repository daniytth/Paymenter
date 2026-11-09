<?php

return [
    'account' => 'Conta',
    'personal_details' => 'Dados pessoais',
    'security' => 'Segurança',
    'credits' => 'Créditos',

    'change_password' => 'Alterar senha',

    'two_factor_authentication' => 'Autenticação de dois fatores (2FA)',
    'two_factor_authentication_description' => 'Adicione uma camada extra de segurança à sua conta ativando a autenticação de dois fatores.',
    'two_factor_authentication_enabled' => 'A autenticação de dois fatores está ativada para a sua conta.',
    'two_factor_authentication_enable' => 'Ativar autenticação de dois fatores',
    'two_factor_authentication_disable' => 'Desativar autenticação de dois fatores',
    'two_factor_authentication_disable_description' => 'Tem certeza de que deseja desativar a autenticação de dois fatores? Isso removerá a camada extra de segurança da sua conta.',
    'two_factor_authentication_enable_description' => 'Para ativar a autenticação de dois fatores, você precisa escanear o código QR abaixo com um aplicativo autenticador, como o Google Authenticator ou o Authy.',
    'two_factor_authentication_qr_code' => 'Escaneie o código QR abaixo com o seu aplicativo de autenticação:',
    'two_factor_authentication_secret' => 'Ou insira o seguinte código manualmente:',

    'sessions' => 'Sessões',
    'sessions_description' => 'Gerencie e encerre suas sessões ativas em outros navegadores e dispositivos.',
    'logout_sessions' => 'Encerrar esta sessão',
    'current_device' => 'Dispositivo atual',

    'input' => [
        'current_password' => 'Senha atual',
        'current_password_placeholder' => 'Sua senha atual',
        'new_password' => 'Nova senha',
        'new_password_placeholder' => 'Sua nova senha',
        'confirm_password' => 'Confirme a senha',
        'confirm_password_placeholder' => 'Confirme sua nova senha',

        'two_factor_code' => 'Insira o código do seu aplicativo autenticador',
        'two_factor_code_placeholder' => 'Seu código de autenticação de dois fatores',

        'currency' => 'Moeda',
        'amount' => 'Valor',
        'payment_gateway' => 'Gateway de pagamento',
    ],

    'notifications' => [
        'password_changed' => 'A senha foi alterada.',
        'password_incorrect' => 'A senha atual está incorreta.',
        'two_factor_enabled' => 'A autenticação de dois fatores foi ativada.',
        'two_factor_disabled' => 'A autenticação de dois fatores foi desativada.',
        'two_factor_code_incorrect' => 'O código está incorreto.',
        'session_logged_out' => 'A sessão foi encerrada.',
        'unauthorized' => 'Esta ação não é permitida.',
    ],

    'no_credit' => 'Você não tem créditos.',
    'add_credit' => 'Adicionar crédito',
    'credit_deposit' => 'Depósito de crédito (:currency)',

    'payment_methods' => 'Métodos de pagamento',
    'recent_transactions' => 'Transações recentes',
    'saved_payment_methods' => 'Métodos de pagamento salvos',
    'setup_payment_method' => 'Configurar um novo método de pagamento',
    'no_saved_payment_methods' => 'Você não tem métodos de pagamento salvos.',
    'saved_payment_methods_description' => 'Gerencie seus métodos de pagamento salvos para finalizar compras mais rápido e habilitar pagamentos automáticos.',
    'no_saved_payment_methods_description' => 'Você pode adicionar um método de pagamento para tornar pagamentos futuros mais rápidos e fáceis, e habilitar pagamentos automáticos para seus serviços.',
    'add_payment_method' => 'Adicionar método de pagamento',
    'payment_method_statuses' => [
        'active' => 'Ativo',
        'inactive' => 'Inativo',
        'expired' => 'Expirado',
        'pending' => 'Pendente',
    ],
    'payment_method_added' => 'O método de pagamento foi adicionado.',
    'payment_method_add_failed' => 'Falha ao adicionar o método de pagamento. Por favor, tente novamente.',
    'services_linked' => ':count serviço(s) vinculado(s)',
    'remove' => 'Remover',
    'remove_payment_method' => 'Remover método de pagamento',
    'remove_payment_method_confirm' => 'Tem certeza de que deseja remover :name? Esta ação não pode ser desfeita.',
    'expires' => 'Expira em :date',
    'cancel' => 'Cancelar',
    'confirm' => 'Sim, remover',
    'email_notifications' => 'Notificações por e-mail',
    'in_app_notifications' => 'Notificações no aplicativo',
    'notifications_description' => 'Gerencie suas preferências de notificação. Você pode escolher receber notificações por e-mail, no aplicativo (push) ou ambos.',
    'notification' => 'Notificação',

    'push_notifications' => 'Notificações push',
    'push_notifications_description' => 'Ative as notificações push para receber atualizações em tempo real diretamente no seu navegador, mesmo quando você não estiver no site.',
    'enable_push_notifications' => 'Ativar notificações push',
    'push_status' => [
        'not_supported' => 'As notificações push não são suportadas pelo seu navegador.',
        'denied' => 'As notificações push estão bloqueadas. Por favor, ative-as nas configurações do seu navegador.',
        'subscribed' => 'As notificações push estão ativadas.',
    ],
];