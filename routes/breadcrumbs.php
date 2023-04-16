<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Beranda
Breadcrumbs::for('global.beranda', function (BreadcrumbTrail $trail) {
    $trail->push('Beranda', route('global.beranda'));
});

// Beranda > Loket
Breadcrumbs::for('global.tiket', function (BreadcrumbTrail $trail) {
    $trail->parent('global.beranda');
    $trail->push('Beranda', route('global.loket'));
});
