<?php

Breadcrumbs::register('admin.sweets.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.sweets.management'), route('admin.sweets.index'));
});

Breadcrumbs::register('admin.sweets.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.sweets.index');
    $breadcrumbs->push(trans('menus.backend.sweets.create'), route('admin.sweets.create'));
});

Breadcrumbs::register('admin.sweets.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.sweets.index');
    $breadcrumbs->push(trans('menus.backend.sweets.edit'), route('admin.sweets.edit', $id));
});
