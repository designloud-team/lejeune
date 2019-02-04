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