<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Usuarios', url('users'));
});
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Nuevo usuario', url('users.create'));
});
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('users');
    $trail->push('Editar ' . $model->name, url('users.edit', $model));
});
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('users');
    $trail->push('Ver ' . $model->name, url('users.show', $model));
});

// Home > Tipo de document
Breadcrumbs::for('tipo-documento', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Tipos de documento', url('tipo-documento'));
});
Breadcrumbs::for('tipo-documento.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tipo-documento');
    $trail->push('Nuevo tipo de documento', url('tipo-documento.create'));
});
Breadcrumbs::for('tipo-documento.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('tipo-documento');
    $trail->push('Editar ' . $model->name, url('tipo-documento.edit', $model));
});
Breadcrumbs::for('tipo-documento.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('tipo-documento');
    $trail->push('Ver ' . $model->name, url('tipo-documento.show', $model));
});

// Home > Secion
Breadcrumbs::for('secciones', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Secciones', url('secciones'));
});
Breadcrumbs::for('secciones.create', function (BreadcrumbTrail $trail) {
    $trail->parent('secciones');
    $trail->push('Nueva seccion', url('secciones.create'));
});
Breadcrumbs::for('secciones.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('secciones');
    $trail->push('Editar ' . $model->name, url('secciones.edit', $model));
});
Breadcrumbs::for('secciones.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('secciones');
    $trail->push('Ver ' . $model->name, url('secciones.show', $model));
});

// Home > Archivo
Breadcrumbs::for('archivos', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Archivos', url('archivos'));
});
Breadcrumbs::for('archivos.create', function (BreadcrumbTrail $trail) {
    $trail->parent('archivos');
    $trail->push('Nuevo archivo', url('archivos.create'));
});
Breadcrumbs::for('archivos.edit', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('archivos');
    $trail->push('Editar ' . $model->name, url('archivos.edit', $model));
});
Breadcrumbs::for('archivos.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('archivos');
    $trail->push('Ver ' . $model->name, url('archivos.show', $model));
});
