<?php
Breadcrumbs::register('dashboard.index', function($breadcrumbs)
{
    $breadcrumbs->push('dashboard', route('dashboard.index'));
});
// customers
Breadcrumbs::register('customers.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('customers', route('customers.index'));
});

// customers > Add customers
Breadcrumbs::register('customers.create', function($breadcrumbs)
{
    $breadcrumbs->parent('customers.index');
    $breadcrumbs->push('Add customer', route('customers.create'));
});

// customers > [customers Name]
Breadcrumbs::register('customers.show', function($breadcrumbs, $customer)
{
    $breadcrumbs->parent('customers.index');
    $breadcrumbs->push($customer->company, route('customers.show', $customer->id));
});

// customers > [customers Name] > Edit customers
Breadcrumbs::register('customers.edit', function($breadcrumbs, $customer)
{
    $breadcrumbs->parent('customers.show', $customer);
    $breadcrumbs->push('Edit customer', route('customers.edit', $customer->id));
});
// notaries
Breadcrumbs::register('notaries.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('notaries', route('notaries.index'));
});

// notaries > Add notaries
Breadcrumbs::register('notaries.create', function($breadcrumbs)
{
    $breadcrumbs->parent('notaries.index');
    $breadcrumbs->push('Add notary', route('notaries.create'));
});

// notaries > [notaries Name]
Breadcrumbs::register('notaries.show', function($breadcrumbs, $notary)
{
    $breadcrumbs->parent('notaries.index');
    $breadcrumbs->push(($notary->business_name ?$notary->business_name.', ':'') . $notary->first_name." ".$notary->last_name, route('notaries.show', $notary->id));
});

// notaries > [notaries Name] > Edit notaries
Breadcrumbs::register('notaries.edit', function($breadcrumbs, $notary)
{
    $breadcrumbs->parent('notaries.show', $notary);
    $breadcrumbs->push('Edit notary', route('notaries.edit', $notary->id));
});
Breadcrumbs::register('notaries.search', function($breadcrumbs)
{
    $breadcrumbs->parent('notaries.index');
    $breadcrumbs->push('notaries', route('notaries.search'));
});
// orders
Breadcrumbs::register('orders.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('orders', route('orders.index'));
});


// notaries > [notaries Name]
Breadcrumbs::register('orders.show', function($breadcrumbs, $order)
{
    $breadcrumbs->parent('orders.index');
    $breadcrumbs->push($order->id);
});

// notaries > [notaries Name] > Edit notaries
Breadcrumbs::register('orders.edit', function($breadcrumbs, $order)
{
    $breadcrumbs->parent('orders.show', $order);
    $breadcrumbs->push('Edit order', route('orders.edit', $order->id));
});