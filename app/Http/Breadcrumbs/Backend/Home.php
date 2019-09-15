<?php

Breadcrumbs::register('admin.homes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.homes.management'), route('admin.homes.index'));
});

Breadcrumbs::register('admin.homes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.homes.index');
    $breadcrumbs->push(trans('menus.backend.homes.create'), route('admin.homes.create'));
});

Breadcrumbs::register('admin.homes.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.homes.index');
    $breadcrumbs->push(trans('menus.backend.homes.edit'), route('admin.homes.edit', $id));
});
