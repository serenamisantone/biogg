<?php
/* Smarty version 4.3.0, created on 2024-01-05 18:17:02
  from 'C:\xampp\htdocs\biogg\src\templates\adminAccount.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6598398e999160_56650129',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd82713b09762c7fe3c4147b5ba87db28ff984913' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\adminAccount.tpl',
      1 => 1704473057,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6598398e999160_56650129 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<div class="main-wrapper">
    <div class="row g-5">
        <div class="col-xl-2">
            <div class="account-nav bg-white rounded py-5">
                <h6 class="mb-2 px-2">Impostazioni</h6>
                <ul class="nav nav-tabs border-0 d-block account-nav-menu">
                    <li>
                        <a href="adminAccount.php#products" data-bs-toggle="tab" class="active">
                            <span class="me-1">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                        fill="#212B36" />
                                </svg>
                            </span>
                            Prodotti
                        </a>
                    </li>

                    <li>
                        <a href="adminAccount.php#offerte" data-bs-toggle="tab">
                            <span class="me-1">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                        fill="#212B36" />
                                </svg>
                            </span>
                            Offerte
                        </a>
                    </li>

                    <li id="categoryTab">
                        <a href="adminAccount.php#category" data-bs-toggle="tab">
                            <span class="me-1">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                        fill="#212B36" />
                                </svg>
                            </span>
                            Categorie
                        </a>
                    </li>
                    <li>
                        <a href="adminAccount.php#slider" data-bs-toggle="tab">
                            <span class="me-1">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                        fill="#212B36" />
                                </svg>
                            </span>
                            Slider
                        </a>
                    </li>
                    <li>
                        <a href="adminAccount.php#produttori" data-bs-toggle="tab">
                            <span class="me-1">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                        fill="#212B36" />
                                </svg>
                            </span>
                            Produttori
                        </a>
                    </li>
                    <li>
                        <a href="adminAccount.php#AboutUs" data-bs-toggle="tab">
                            <span class="me-1">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                        fill="#212B36" />
                                    <path
                                        d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                        fill="#212B36" />
                                    <path
                                        d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                        fill="#212B36" />
                                </svg>
                            </span>
                            About Us
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="col-md-9" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="products">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="sidebar-widget search-widget bg-white py-2 px-2">
                                <form class="search-form d-flex align-items-center mt-4" action="adminAccount.php"
                                    method="GET">
                                    <input type="text" name="searchQuery" id="searchQuery" placeholder="Search...">
                                    <button class="submit-icon-btn-secondary" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
                            </div>
                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                data-bs-target="#addModalProduct">
                                <i class="fa fa-plus"></i> Aggiungi
                            </button>
                        </div>

                        <table class="table col-md-2">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrizione</th>
                                    <th>Ingredienti</th>
                                    <th>Prezzo</th>
                                    <th>Categoria</th>
                                    <th>Produttore</th>
                                    <th>Stock</th>
                                    <th>Stato</th>
                                    <th>Offerte</th>
                                    <th>Immagine</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>

                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</td>
                                        <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'custom_substr' ][ 0 ], array( $_smarty_tpl->tpl_vars['product']->value->getDescription(),0,50 ));?>
...</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getIngredients();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getPrice();?>
 €</td>
                                        <?php $_smarty_tpl->_assignInScope('category', $_smarty_tpl->tpl_vars['product']->value->getCategory());?>
                                        <td><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</td>
                                        <?php $_smarty_tpl->_assignInScope('manufacturer', $_smarty_tpl->tpl_vars['product']->value->getManufacturer());?>
                                        <td><?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getName();?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getStock();?>
</td>
                                        <td> <?php if ($_smarty_tpl->tpl_vars['product']->value->getIsOnline() == 1) {?>
                                                Online
                                            <?php } else { ?>
                                                Offline
                                            <?php }?></td>
                                        <td>
                                            <ul>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value->getOffers(), 'offer');
$_smarty_tpl->tpl_vars['offer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offer']->value) {
$_smarty_tpl->tpl_vars['offer']->do_else = false;
?>
                                                    <li><?php echo $_smarty_tpl->tpl_vars['offer']->value->getName();?>
</li>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </ul>
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getImage();?>
</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#editModalProduct_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">
                                                <i class="fa fa-pen" style="color:#4CAF50;"></i>
                                            </button>
                                        </td>


                                        <td>
                                            <button type="button" onclick="deleteProduct(<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
)">
                                                <i class="fa fa-trash-can" style="color:#FF7C08;"></i>
                                            </button>
                                        </td>


                                    </tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <!-- Modale Aggiungi Prodotto -->
                                <div class="modal fade" id="addModalProduct" tabindex="-1"
                                    aria-labelledby="addModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close float-end"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                                    <h2 class="modal-title fs-5 mb-3">Aggiungi Prodotto</h2>
                                                    <div class="row align-items-center g-4 mt-3">
                                                        <form id="addProductForm" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="product_name"
                                                                            class="text-primary">Nome:</label>
                                                                        <input type="text" id="product_name"
                                                                            name="product_name" class="form-control"
                                                                            placeholder="Inserisci il nome" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="product_description"
                                                                            class="text-primary">Descrizione:</label>
                                                                        <input type="text" id="product_description"
                                                                            name="product_description"
                                                                            class="form-control" step="0.01"
                                                                            placeholder="Inserisci la descrizione"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="product_ingredients"
                                                                            class="text-primary">Ingredienti:</label>
                                                                        <input type="text" id="product_ingredients"
                                                                            name="product_ingredients"
                                                                            class="form-control" step="0.01"
                                                                            placeholder="Inserisci gli ingredienti"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="product_price"
                                                                            class="text-primary">Prezzo:</label>
                                                                        <input type="number" id="product_price"
                                                                            name="product_price" class="form-control"
                                                                            step="0.01"
                                                                            placeholder="Inserisci il prezzo" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="product_category"
                                                                            class="text-primary">Categoria:</label>
                                                                        <select id="product_category"
                                                                            name="product_category"
                                                                            class="custom-select" required>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
">
                                                                                    <?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</option>
                                                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="product_manufacturer"
                                                                            class="text-primary">Produttore:</label>
                                                                        <select id="product_manufacturer"
                                                                            name="product_manufacturer"
                                                                            class="custom-select" required>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['manufacturers']->value, 'manufacturer');
$_smarty_tpl->tpl_vars['manufacturer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->value) {
$_smarty_tpl->tpl_vars['manufacturer']->do_else = false;
?>
                                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getId();?>
">
                                                                                    <?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getName();?>
</option>
                                                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="product_stock"
                                                                            class="text-primary">Quantità in
                                                                            magazzino:</label>
                                                                        <input type="number" id="product_stock"
                                                                            name="product_stock" class="form-control"
                                                                            placeholder="Inserisci la quantità"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="text-primary">Disponibile
                                                                            online:</label>
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" id="online_yes"
                                                                                name="product_online"
                                                                                class="custom-control-input" value="1"
                                                                                checked>
                                                                            <label class="custom-control-label"
                                                                                for="online_yes">Sì</label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" id="online_no"
                                                                                name="product_online"
                                                                                class="custom-control-input" value="0">
                                                                            <label class="custom-control-label"
                                                                                for="online_no">No</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div id="drop-area">
                                                                        <label for="fileInput"
                                                                            class="text-primary">Immagine:</label>
                                                                        <input type="file" id="fileInput" name="image"
                                                                            class="custom-file-input" required>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group"
                                                                    style="padding-top: 20px; padding-bottom: 20px;">
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-block"
                                                                        onclick="addProduct()">Aggiungi
                                                                        Prodotto</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>

                <!-- Modal Modifica Prodotto -->
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                    <div class="modal fade" id="editModalProduct_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" tabindex="-1"
                        aria-labelledby="editModalLabel_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                        <h2 class="modal-title fs-5 mb-3">Modifica Prodotto</h2>
                                        <div class="row align-items-center g-4 mt-3">
                                            <form id="editForm_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" enctype="multipart/form-data">
                                                <div class="row g-4">
                                                    <div class="col-sm-6">
                                                        <div class="label-input-field">
                                                            <label for="edit_name_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Nome:</label>
                                                            <input type="text" id="edit_name_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="label-input-field">
                                                            <label
                                                                for="edit_description_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Descrizione:</label>
                                                            <textarea id="edit_description_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                class="edit-input"
                                                                style="height: 100px; overflow: auto; "><?php echo $_smarty_tpl->tpl_vars['product']->value->getDescription();?>
</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="label-input-field">
                                                            <label
                                                                for="edit_ingredients_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Ingredienti:</label>
                                                            <input type="text" id="edit_ingredients_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getIngredients();?>
">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="label-input-field">
                                                            <label for="edit_price_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Prezzo:</label>
                                                            <input type="text" id="edit_price_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getPrice();?>
€">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="label-input-field">
                                                            <label
                                                                for="edit_category_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Categoria:</label>
                                                            <select id="edit_category_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                name="edit_category" class="edit-select">
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>

                                                                    </option>
                                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="label-input-field">
                                                            <label
                                                                for="edit_manufacturer_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Produttore:</label>
                                                            <select id="edit_manufacturer_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                name="edit_manufacturer" class="edit-select">
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['manufacturers']->value, 'manufacturer');
$_smarty_tpl->tpl_vars['manufacturer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->value) {
$_smarty_tpl->tpl_vars['manufacturer']->do_else = false;
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getId();?>
">
                                                                        <?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getName();?>
</option>
                                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="label-input-field">
                                                            <label for="edit_stock_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Quantità in
                                                                magazzino:</label>
                                                            <input type="text" id="edit_stock_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getStock();?>
">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="label-input-field">
                                                            <label
                                                                for="edit_online_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Online/Offline:</label>
                                                            <select id="edit_online_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                class="edit-select">
                                                                <option value="0"
                                                                    <?php if ($_smarty_tpl->tpl_vars['product']->value->getIsOnline() == 0) {?>selected<?php }?>>Offline
                                                                </option>
                                                                <option value="1"
                                                                    <?php if ($_smarty_tpl->tpl_vars['product']->value->getIsOnline() == 1) {?>selected<?php }?>>Online
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">

                                                        <label for="edit_offer_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Offerte:</label>
                                                        <div class="checkbox-container">
                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_offers']->value, 'offer');
$_smarty_tpl->tpl_vars['offer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offer']->value) {
$_smarty_tpl->tpl_vars['offer']->do_else = false;
?>
                                                                <div class="checkbox-item">
                                                                    <?php $_smarty_tpl->_assignInScope('isInOffer', false);?>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value->getOffers(), 'offerProduct');
$_smarty_tpl->tpl_vars['offerProduct']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offerProduct']->value) {
$_smarty_tpl->tpl_vars['offerProduct']->do_else = false;
?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['offerProduct']->value->getId() == $_smarty_tpl->tpl_vars['offer']->value->getId()) {?>
                                                                            <?php $_smarty_tpl->_assignInScope('isInOffer', true);?>
                                                                            <?php break 1;?>
                                                                        <?php }?>
                                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                                    <input type="checkbox" id="edit_offer_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                        name="selected_offers[]" value="<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
"
                                                                        <?php if ($_smarty_tpl->tpl_vars['isInOffer']->value) {?>checked<?php }?>>
                                                                    <label
                                                                        for="offer_<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['offer']->value->getName();?>
</label>
                                                                </div>
                                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="label-input-field">
                                                            <label for="edit_image_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Immagine:</label>
                                                            <div id="drop-area">
                                                                <input type="text" id="edit_image_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                    class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getImage();?>
">
                                                                <input type="file" id="fileInput2_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                                    name="image" class="custom-file-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-6 d-flex">
                                                    <button type="button" onclick="saveChanges(<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
)"
                                                        class="btn btn-primary btn-sm">Salva</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </tbody>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>
                <ul class="template-pagination d-flex align-items-center mt-6">
                    <?php
$_smarty_tpl->tpl_vars['page'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int) ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->tpl_vars['total_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['total_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0) {
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++) {
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration === 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration === $_smarty_tpl->tpl_vars['page']->total;?>
                        <?php if ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['current_page']->value) {?>
                            <li><a href="adminAccount.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" style=" background-color: #4CAF50;
        color: white; "><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
                        <?php } else { ?>
                            <li><a href="adminAccount.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
                        <?php }?>
                    <?php }
}
?>
                    <?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_pages']->value) {?>
                        <li><a href="adminAccount.php?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
"><i class="fas fa-arrow-right"></i></a></li>
                    <?php }?>
                </ul>
            </div>
        </div>


    </div>

    <div class="tab-content">
        <div class="tab-pane fade" id="offerte">
            <div class="table-responsive">
                <button type="button" class="btn btn-primary btn-lg float-end" data-bs-toggle="modal"
                    data-bs-target="#addModalOffer">
                    <i class="fa fa-plus"></i> Aggiungi
                </button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Inizio</th>
                            <th>Fine</th>
                            <th>Tipo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_offers']->value, 'offer');
$_smarty_tpl->tpl_vars['offer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['offer']->value) {
$_smarty_tpl->tpl_vars['offer']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['offer']->value->getName();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['offer']->value->getStartDate();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['offer']->value->getEndDate();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['offer']->value->getType();?>
</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#editModalOffer_<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
">
                                        <i class="fa fa-pen" style="color:#4CAF50;"></i>
                                </td>
                                <td>
                                    <button type="button" onclick="deleteOffer(<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
)">
                                        <i class="fa fa-trash-can" style="color:#FF7C08;"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Aggiungi Offerta -->
                            <div class="modal fade" id="addModalOffer" tabindex="-1" aria-labelledby="addModalLabelOffer"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                                <h2 class="modal-title fs-5 mb-3">Aggiungi Offerta</h2>
                                                <div class="row align-items-center g-4 mt-3">
                                                    <form id="addOfferForm">
                                                        <div class="form-group">
                                                            <label for="offer_name" class="text-primary">Nome:</label>
                                                            <input type="text" id="offer_name" name="offer_name"
                                                                class="form-control" placeholder="Inserisci il nome"
                                                                required>
                                                            <label for="offer_startdate" class="text-primary">Inizio
                                                                offerta:</label>
                                                            <input type="date" id="offer_startdate" name="offer_startdate"
                                                                class="form-control" required>
                                                            <label for="offer_enddate" class="text-primary">Fine
                                                                offerta:</label>
                                                            <input type="date" id="offer_enddate" name="offer_enddate"
                                                                class="form-control" required>
                                                            <label for="offer_type" class="text-primary">Tipo
                                                                offerta:</label>
                                                            <input type="text" id="offer_type" name="offer_type"
                                                                class="form-control" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-block"
                                                            onclick="addNewOffer()">Aggiungi Offerta</button>
                                                    </form> <!-- Contenuto del modal per aggiungere un'offerta -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Modifica Offerta -->
                            <div class="modal fade" id="editModalOffer_<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
" tabindex="-1"
                                aria-labelledby="editModalLabel_<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
" aria-hidden="true">
                                <!-- Contenuto del modal per modificare un'offerta -->
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                                <h2 class="modal-title fs-5 mb-3">Modifica Offerta</h2>
                                                <div class="row align-items-center g-4 mt-3">
                                                    <form id="editForm3_<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
" enctype="multipart/form-data">
                                                        <input type="text" id="editoffer_name_<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
"
                                                            class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['offer']->value->getName();?>
">
                                                        <input type="date" id="editoffer_startdate_<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
"
                                                            class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['offer']->value->getStartDate();?>
">
                                                        <input type="date" id="editoffer_enddate_<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
"
                                                            class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['offer']->value->getEndDate();?>
">
                                                        <input type="text" id="editoffer_type_<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
"
                                                            class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['offer']->value->getType();?>
">
                                                        <button onclick="saveChangesOffer(<?php echo $_smarty_tpl->tpl_vars['offer']->value->getId();?>
)"
                                                            class="btn btn-primary btn-sm">Salva</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="tab-content">
        <div class="tab-pane fade" id="category">
            <div class="table-responsive">
                <button type="button" class="btn btn-primary btn-lg float-end" data-bs-toggle="modal"
                    data-bs-target="#addModalCategory">
                    <i class="fa fa-plus"></i> Aggiungi
                </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                            <tr class="category">
                                <td><?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#editModalCategory_<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
">
                                        <i class="fa fa-pen" style="color:#4CAF50;"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" onclick="deleteCategory(<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
)">
                                        <i class="fa fa-trash-can" style="color:#FF7C08;"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="editModalCategory_<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
" tabindex="-1"
                                aria-labelledby="editModalCategory_<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
" aria-hidden="true">
                                <!-- Contenuto del modal per modificare un'offerta -->
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                                <h2 class="modal-title fs-5 mb-3">Modifica Categoria</h2>
                                                <div class="row align-items-center g-4 mt-3">
                                                    <form id="editForm5_<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
" enctype="multipart/form-data">
                                                        <input type="text" id="editcategory_name_<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
"
                                                            class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
">
                                                        <button onclick="saveChangesCategory(<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
)"
                                                            class="btn btn-primary btn-sm">Salva</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Aggiungi Categoria -->
        <div class="modal fade" id="addModalCategory" tabindex="-1" aria-labelledby="addModalLabelCategory"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                            <h2 class="modal-title fs-5 mb-3">Aggiungi Categoria</h2>
                            <div class="row align-items-center g-4 mt-3">
                                <form id="addCategoryForm">
                                    <div class="form-group">
                                        <label for="category_name" class="text-primary">Nome:</label>
                                        <input type="text" id="category_name" name="category_name" class="form-control"
                                            placeholder="Inserisci il nome" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block"
                                        onclick="addNewCategory()">Aggiungi Categoria</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade" id="slider">
            <div class="table-responsive" style="overflow-x: auto;">
                <button type="button" class="btn btn-primary btn-lg float-end" data-bs-toggle="modal"
                    data-bs-target="#addModalSlider">
                    <i class="fa fa-plus"></i> Aggiungi
                </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Sottotitolo</th>
                            <th>Descrizione</th>
                            <th>Immagine</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_slider']->value, 'slider');
$_smarty_tpl->tpl_vars['slider']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['slider']->value) {
$_smarty_tpl->tpl_vars['slider']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['slider']->value->getTitle();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['slider']->value->getCaption();?>
</td>
                                <td style="max-width: 200px; word-wrap: break-word;"><?php echo $_smarty_tpl->tpl_vars['slider']->value->getDescription();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['slider']->value->getImage();?>
</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#editModalSlider_<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
">
                                        <i class="fa fa-pen" style="color:#4CAF50;"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" onclick="deleteSlider(<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
)">
                                        <i class="fa fa-trash-can" style="color:#FF7C08;"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal Modifica Slider -->
                            <div class="modal fade" id="editModalSlider_<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
" tabindex="-1"
                                aria-labelledby="editModalSlider_<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                                <h2 class="modal-title fs-5 mb-3">Modifica Slider</h2>
                                                <div class="row align-items-center g-4 mt-3">
                                                    <form id="editForm2_<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
" enctype="multipart/form-data">
                                                        <input type="text" id="edit_title_<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
"
                                                            class="edit-input " value="<?php echo $_smarty_tpl->tpl_vars['slider']->value->getTitle();?>
">
                                                        <input type="text" id="edit_caption_<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
"
                                                            class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value->getCaption();?>
">
                                                        <input type="text" id="edit_description_<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
"
                                                            class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value->getDescription();?>
">
                                                        <div id="drop-area">
                                                            <input type="text" id="edit_image2_<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
"
                                                                class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value->getImage();?>
">
                                                            <input type="file" id="fileInput3_<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
"
                                                                name="image" class="custom-file-input">
                                                        </div>
                                                        <button onclick="saveChangesSlider(<?php echo $_smarty_tpl->tpl_vars['slider']->value->getId();?>
)"
                                                            class="btn btn-primary btn-sm">Salva</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Modal Aggiungi Slider -->
        <div class="modal fade" id="addModalSlider" tabindex="-1" aria-labelledby="addModalLabelSlider"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                            <h2 class="modal-title fs-5 mb-3">Aggiungi Slider</h2>
                            <div class="row align-items-center g-4 mt-3">
                                <form id="addSliderForm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="slideradd_title" class="text-primary">Titolo:</label>
                                        <input type="text" id="slideradd_title" name="slideradd_title"
                                            class="form-control" placeholder="Inserisci il titolo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="slideradd_caption" class="text-primary">Sottotitolo:</label>
                                        <input type="text" id="slideradd_caption" name="slideradd_caption"
                                            class="form-control" placeholder="Inserisci il sottotitolo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="slideradd_description" class="text-primary">Descrizione:</label>
                                        <input type="text" id="slideradd_description" name="slideradd_description"
                                            class="form-control" placeholder="Inserisci la descrizione" required>
                                    </div>
                                    <div id="drop-area">
                                        <label for="fileInput4" class="text-primary">Immagine:</label>
                                        <input type="file" id="fileInput4" name="image" class="custom-file-input"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block"
                                        onclick="addSlider()">Aggiungi Slider</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="tab-content">
        <div class="tab-pane fade" id="produttori">
            <div class="table-responsive">
                <button type="button" class="btn btn-primary btn-lg float-end" data-bs-toggle="modal"
                    data-bs-target="#addModalManufacturer">
                    <i class="fa fa-plus"></i> Aggiungi
                </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['manufacturers']->value, 'manufacturer');
$_smarty_tpl->tpl_vars['manufacturer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->value) {
$_smarty_tpl->tpl_vars['manufacturer']->do_else = false;
?>
                            <tr class="manufacturer">
                                <td><?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getId();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getName();?>
</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#editModalManufacturer_<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getId();?>
">
                                        <i class="fa fa-pen" style="color:#4CAF50;"></i>
                                    </button>
                                </td>


                                <td>
                                    <button type="button" onclick="deleteManufacturer(<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getId();?>
)">
                                        <i class="fa fa-trash-can" style="color:#FF7C08;"></i>
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="editModalManufacturer_<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getId();?>
" tabindex="-1"
                                aria-labelledby="editModalManufacturer_<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getId();?>
" aria-hidden="true">
                                <!-- Contenuto del modal per modificare un produttore -->
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                                <h2 class="modal-title fs-5 mb-3">Modifica Produttore</h2>
                                                <div class="row align-items-center g-4 mt-3">
                                                    <form id="editForm6_<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getId();?>
"
                                                        enctype="multipart/form-data">
                                                        <input type="text"
                                                            id="editmanufacturer_name_<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getId();?>
"
                                                            class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getName();?>
">
                                                        <button onclick="saveChangesManufacturer(<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value->getId();?>
)"
                                                            class="btn btn-primary btn-sm">Salva</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Aggiungi Produttore -->
    <div class="modal fade" id="addModalManufacturer" tabindex="-1" aria-labelledby="addModalLabelManufacturer"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                        <h2 class="modal-title fs-5 mb-3">Aggiungi Produttore</h2>
                        <div class="row align-items-center g-4 mt-3">
                            <form id="addManufacturerForm">
                                <div class="form-group">
                                    <label for="manufacturer_name" class="text-primary">Nome:</label>
                                    <input type="text" id="manufacturer_name" name="manufacturer_name"
                                        class="form-control" placeholder="Inserisci il nome" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"
                                    onclick="addNewManufacturer()">Aggiungi Produttore</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="AboutUs">
            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Slogan</th>
                            <th>Titolo</th>
                            <th>Descrizione</th>
                            <th>Missione</th>
                            <th>Visione</th>
                            <th>Immagine</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_about']->value, 'about');
$_smarty_tpl->tpl_vars['about']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['about']->value) {
$_smarty_tpl->tpl_vars['about']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['about']->value->getSlogan();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['about']->value->getTitle();?>
</td>
                                <td><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'custom_substr' ][ 0 ], array( $_smarty_tpl->tpl_vars['about']->value->getDescription(),0,50 ));?>
...</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['about']->value->getMission();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['about']->value->getVision();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['about']->value->getImage();?>
</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#editModalAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
">
                                        <i class="fa fa-pen" style="color:#4CAF50;"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal Modifica About -->
                            <div class="modal fade" id="editModalAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
" tabindex="-1"
                                aria-labelledby="editModalAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                                <h2 class="modal-title fs-5 mb-3">Modifica About Us</h2>
                                                <div class="row align-items-center g-4 mt-3">
                                                    <form id="editForm7_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
" enctype="multipart/form-data">
                                                        <div class="col-sm-6">
                                                            <label for="edit_sloganAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
">Slogan:</label>
                                                            <textarea id="edit_sloganAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
"
                                                                class="edit-input"
                                                                style="height: 100px; overflow: auto; "><?php echo $_smarty_tpl->tpl_vars['about']->value->getSlogan();?>
</textarea>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="edit_titleAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
">Titolo:</label>
                                                            <textarea id="edit_titleAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
"
                                                                class="edit-input"
                                                                style="height: 100px; overflow: auto; "><?php echo $_smarty_tpl->tpl_vars['about']->value->getTitle();?>
</textarea>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="label-input-field">
                                                                <label
                                                                    for="edit_descriptionAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
">Descrizione:</label>
                                                                <textarea id="edit_descriptionAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
"
                                                                    class="edit-input"
                                                                    style="height: 100px; overflow: auto; "><?php echo $_smarty_tpl->tpl_vars['about']->value->getDescription();?>
</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label
                                                                for="edit_missionAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
">Missione:</label>
                                                            <textarea id="edit_missionAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
"
                                                                class="edit-input"
                                                                style="height: 100px; overflow: auto; "><?php echo $_smarty_tpl->tpl_vars['about']->value->getMission();?>
</textarea>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="edit_visionAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
">Visione:</label>
                                                            <textarea id="edit_visionAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
"
                                                                class="edit-input"
                                                                style="height: 100px; overflow: auto; "><?php echo $_smarty_tpl->tpl_vars['about']->value->getVision();?>
</textarea>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="edit_imageAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
">Immagine:</label>
                                                            <div id="drop-area">
                                                                <input type="text" id="edit_imageAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
"
                                                                    class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['about']->value->getImage();?>
">
                                                                <input type="file" id="fileInputAbout_<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
"
                                                                    name="image" class="custom-file-input">
                                                            </div>
                                                        </div>
                                                        <button onclick="saveChangesAbout(<?php echo $_smarty_tpl->tpl_vars['about']->value->getId();?>
)"
                                                            class="btn btn-primary btn-sm">Salva</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</html><?php }
}
