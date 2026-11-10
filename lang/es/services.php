<?php

return [
    'services' => 'Servicios',
    'product' => 'Producto',
    'price' => 'Precio',
    'status' => 'Estado',
    'name' => 'Nombre',
    'actions' => 'Acciones',
    'view' => 'Ver',

    'product_details' => 'Detalles Del Producto',
    'billing_cycle' => 'Ciclo De Facturación',
    'cancel' => 'Cancelar',
    'cancellation' => 'Cancelación De :service',
    'cancel_are_you_sure' => '¿Estás seguro de que quieres cancelar este servicio?',
    'cancel_reason' => 'Razón dD La Cancelación',
    'cancel_type' => 'Tipo De Cancelación',
    'cancel_immediate' => 'Cancelar De Inmediato',
    'cancel_end_of_period' => 'Cancelar Al Final Del Período De Facturación',
    'cancel_immediate_warning' => 'Al pulsar el botón de abajo, el servicio se cancelará inmediatamente y ya no podrás utilizarlo.',
    'cancellation_requested' => 'Cancelación Solicitada',
    'not_cancellable' => 'Este servicio no se puede cancelar',

    'current_plan' => 'Plan Actual',
    'new_plan' => 'Nuevo Plan',
    'change_plan' => 'Cambiar Plan',
    'current_price' => 'Precio Actual',
    'new_price' => 'Nuevo Precio',
    'upgrade' => 'Mejorar',
    'upgrade_summary' => 'Resumen de la actualización',
    'total_today' => 'Total Hoy',
    'upgrade_service' => 'Actualizar El Servicio',
    'upgrade_choose_product' => 'Elige El Producto Al Que Mejorar',
    'upgrade_choose_config' => 'Elige La Configuración Para La Mejora',
    'next_step' => 'Siguiente Paso',

    'upgrade_pending' => 'No es posible realizar una actualización si ya existe una factura de actualización/degradación abierta',

    'outstanding_invoice' => 'Tienes Una factura pendiente.',
    'view_and_pay' => 'Haz Clic Aquí Para Ver y Pagar',

    'statuses' => [
        'pending' => 'Pendiente',
        'active' => 'Activo',
        'cancelled' => 'Cancelado',
        'suspended' => 'Suspendido',
        'cancellation_pending' => 'Cancelación Pendiente',
    ],
    'billing_cycles' => [
        'day' => 'día|días',
        'week' => 'semana|semanas',
        'month' => 'mes|meses',
        'year' => 'año|años',
    ],
    'every_period' => 'Cada :period :unit',
    'price_every_period' => ':price por :period :unit',
    'price_one_time' => ':price una sola vez',
    'renews_in' => 'Renueva En',
    'renews_on' => 'Se Renueva El',
    'auto_pay' => 'Pago Automático Usando',
    'auto_pay_not_configured' => 'No Configurado',

    'no_services' => 'No se encontraron servicios',
    'update_billing_agreement' => 'Actualizar Acuerdo De Facturación',
    'clear_billing_agreement' => 'Borrar Acuerdo De Facturación',
    'select_billing_agreement' => 'Seleccionar Acuerdo De Facturación',

    'remove_payment_method' => 'Eliminar Método De Pago',
    'remove_payment_method_confirm' => '¿Estás seguro de que deseas eliminar el método de pago ":name" de este servicio? Tu servicio ya no podrá pagar sus facturas automáticamente.',

    'label' => 'Etiqueta',
    'label_placeholder' => 'Introduce una etiqueta personalizada para este servicio',
    'label_modal_title' => 'Editar Etiqueta Del Servicio',
    'update_label' => 'Actualizar Etiqueta',

];