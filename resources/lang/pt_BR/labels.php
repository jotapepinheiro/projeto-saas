<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Labels Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines are used in labels throughout the system.
      | Regardless where it is placed, a label can be listed here so it is easily
      | found in a intuitive way.
      |
      |--------------------------------------------------------------------------
     */

    'frontend' => [
        'auth' => [
            'login_box_title' => 'Entrar',
            'login_title' => 'Faça login em sua conta',
            'login_button' => 'Entrar',
            'logout_box_title' => 'Sair',
            'account_info' => 'Informações da Conta',
            'login_with' => 'Entrar com :social_media',
            'register_box_title' => 'Registrar',
            'register_button' => 'Registrar',
            'remember_me' => 'Lembrar-me',
            'subdomain' => 'Informe seu subdomínio',
        ],

        'home' => [
            'home_box_title' => 'Dashboard',
            'home_title' => 'Dashboard',
            'logged_in' => 'Você está logado!',
        ],

        'passwords' => [
            'password' => 'Senha',
            'password_confirm' => 'Confirmar Senha',
            'forgot_password' => 'Esqueceu Sua Senha?',
            'reset_password_box_title' => 'Resetar Senha',
            'reset_password_button' => 'Resetar Senha',
            'send_password_reset_link_button' => 'Enviar link para redefinição de senha',
        ],

        'user' => [
            'profile' => [
                'name' => 'Nome',
                'email' => 'E-mail',
                'subdomain' => 'Subdomínio',
            ],
        ],

        'plans' => [
            'choose_plan' => 'Escolha seu Plano',
            'product' => [
                'basico' => 'Plano Básico @ R$50.00/mês',
                'padrao' => 'Plano Padrão @ R$100.00/mês',
                'premium' => 'Plano Premium @ R$150.00/mês',
            ],
        ],

        'invoices' => [
            'invoice_box_title' => 'Faturas',
            'invoice_title' => 'Minhas Faturas',
        ],

        'payments' => [
            'choose_payment' => 'Escolha o método de pagamento',
            'payment_info' => 'Informações de Pagamento',
            'methods' => [
                'stripe' => 'Pagar com Cartão de Crédito',
                'paypal' => 'Pagar com Paypal',
                'transfer' => 'Tranferência Bancária',
            ],
            'card' => [
                'name' => 'Nome no Cartão',
                'number' => 'Número do Cartão',
            ],
        ],
    ],
];
