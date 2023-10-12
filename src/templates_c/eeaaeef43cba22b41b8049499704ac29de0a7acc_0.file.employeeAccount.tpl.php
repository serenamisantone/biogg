<?php
/* Smarty version 4.3.0, created on 2023-10-03 16:22:18
  from 'C:\xampp\htdocs\biogg\src\templates\employeeAccount.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_651c239ae12025_84375165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eeaaeef43cba22b41b8049499704ac29de0a7acc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\employeeAccount.tpl',
      1 => 1690974251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651c239ae12025_84375165 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <!--main content wrapper start-->
    <div class="main-wrapper">

                <div class="row g-4">
                    <div class="col-xl-3">
                        <div class="account-nav bg-white rounded py-5">
                            <h6 class="mb-4 px-4">Manage My Account</h6>
                            <ul class="nav nav-tabs border-0 d-block account-nav-menu">
                                <li>
                                    <a href="#dashboard" data-bs-toggle="tab" class="active">
                                        <span class="me-2">
                        <svg
                          width="13"
                          height="12"
                          viewBox="0 0 13 12"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M0.332031 1.33333V0.666667C0.332031 0.3 0.632031 0 0.998698 0H12.332C12.6987 0 12.9987 0.3 12.9987 0.666667V1.33333C12.9987 1.7 12.6987 2 12.332 2H0.998698C0.632031 2 0.332031 1.7 0.332031 1.33333ZM12.332 3.33333H0.998698C0.632031 3.33333 0.332031 3.63333 0.332031 4V8C0.332031 8.36667 0.632031 8.66667 0.998698 8.66667H12.332C12.6987 8.66667 12.9987 8.36667 12.9987 8V4C12.9987 3.63333 12.6987 3.33333 12.332 3.33333ZM0.998698 12H12.332C12.6987 12 12.9987 11.7 12.9987 11.3333V10.6667C12.9987 10.3 12.6987 10 12.332 10H0.998698C0.632031 10 0.332031 10.3 0.332031 10.6667V11.3333C0.332031 11.7 0.632031 12 0.998698 12Z"
                            fill="#4EB529"
                          />
                        </svg>
                      </span>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="#order-history" data-bs-toggle="tab">
                                        <span class="me-2">
                        <svg
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M5 12C5 12.5523 4.55228 13 4 13C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11C4.55228 11 5 11.4477 5 12Z"
                            fill="#212B36"
                          />
                          <path
                            d="M7 11.94C7 11.4209 7.42085 11 7.94 11H20.06C20.5791 11 21 11.4209 21 11.94V12.06C21 12.5791 20.5791 13 20.06 13H7.94C7.42085 13 7 12.5791 7 12.06V11.94Z"
                            fill="#212B36"
                          />
                          <path
                            d="M3 16.94C3 16.4209 3.42085 16 3.94 16H20.06C20.5791 16 21 16.4209 21 16.94V17.06C21 17.5791 20.5791 18 20.06 18H3.94C3.42085 18 3 17.5791 3 17.06V16.94Z"
                            fill="#212B36"
                          />
                          <path
                            d="M3 6.94C3 6.42085 3.42085 6 3.94 6H20.06C20.5791 6 21 6.42085 21 6.94V7.06C21 7.57915 20.5791 8 20.06 8H3.94C3.42085 8 3 7.57915 3 7.06V6.94Z"
                            fill="#212B36"
                          />
                        </svg>
                      </span>
                                        Order History
                                    </a>
                                </li>
                                <li>
                                    <a href="#address-book" data-bs-toggle="tab">
                                        <span class="me-2">
                        <svg
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                            fill="#212B36"
                          />
                        </svg>
                      </span>
                                        Address Book
                                    </a>
                                </li>
                                <li>
                                    <a href="#payments" data-bs-toggle="tab">
                                        <span class="me-2">
                        <svg
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                            fill="#212B36"
                          />
                        </svg>
                      </span>
                                        Payment Methods
                                    </a>
                                </li>
                                <li>
                                    <a href="#update-profile" data-bs-toggle="tab">
                                        <span class="me-2">
                        <svg
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                            fill="#212B36"
                          />
                        </svg>
                      </span>
                                        Updated Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#order-tracking" data-bs-toggle="tab">
                                        <span class="me-2">
                        <svg
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                            fill="#212B36"
                          />
                        </svg>
                      </span>
                                        Order Tracking
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="me-2">
                        <svg
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                            fill="#212B36"
                          />
                        </svg>
                      </span>
                                        Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <div class="address-book bg-white rounded p-5">
                                    <div class="row g-6">
                                        <div class="col-md-6">
                                            <div class="address-book-content pe-md-4 border-right position-relative">
                                                <div class="d-flex align-items-center gap-5 mb-4">
                                                    <h6 class="mb-0">Address Book</h6>
                                                    <a href="#">Edit</a>
                                                </div>
                                                <p class="text-uppercase fw-medium mb-3">
                                                    Default Shipping Address
                                                </p>
                                                <div class="address">
                                                    <p class="text-dark fw-bold mb-1">Saiful Talukdar</p>
                                                    <p class="mb-0">
                                                        Ghunshe, Muksudpur Dhaka - Gopalganj.
                                                        <br />
                              (+880) 1633082302
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 align-self-end">
                                            <div class="address-book-content ps-md-4">
                                                <p class="text-uppercase fw-medium mb-3">
                                                    Default Billing Address
                                                </p>
                                                <div class="address">
                                                    <p class="text-dark fw-bold mb-1">Saiful Talukdar</p>
                                                    <p class="mb-0">
                                                        Ghunshe, Muksudpur Dhaka - Gopalganj.
                                                        <br />
                              (+880) 1633082302
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="order-history">
                                <div class="recent-orders bg-white rounded py-5">
                                    <h6 class="mb-4 px-4">Recent Orders</h6>
                                    <div class="table-responsive">
                                        <table class="order-history-table table">
                                            <tr>
                                                <th>Order Number#</th>
                                                <th>Placed on</th>
                                                <th>Method</th>
                                                <th>Items</th>
                                                <th>Total</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <td>635981586200289</td>
                                                <td>03/12/2022</td>
                                                <td>COD</td>
                                                <td class="thumbnail">
                                                    <img src="assets/img/products/cauliflower-xs.png" alt="product" />
                                                </td>
                                                <td class="text-secondary">$105.60</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-invoice fs-xs">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>635981586200289</td>
                                                <td>03/12/2022</td>
                                                <td>COD</td>
                                                <td class="thumbnail">
                                                    <img src="assets/img/products/cauliflower-xs.png" alt="product" />
                                                </td>
                                                <td class="text-secondary">$105.60</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-invoice fs-xs">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>635981586200289</td>
                                                <td>03/12/2022</td>
                                                <td>COD</td>
                                                <td class="thumbnail">
                                                    <img src="assets/img/products/cauliflower-xs.png" alt="product" />
                                                </td>
                                                <td class="text-secondary">$105.60</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-invoice fs-xs">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>635981586200289</td>
                                                <td>03/12/2022</td>
                                                <td>COD</td>
                                                <td class="thumbnail">
                                                    <img src="assets/img/products/cauliflower-xs.png" alt="product" />
                                                </td>
                                                <td class="text-secondary">$105.60</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-invoice fs-xs">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>635981586200289</td>
                                                <td>03/12/2022</td>
                                                <td>COD</td>
                                                <td class="thumbnail">
                                                    <img src="assets/img/products/cauliflower-xs.png" alt="product" />
                                                </td>
                                                <td class="text-secondary">$105.60</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-invoice fs-xs">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>635981586200289</td>
                                                <td>03/12/2022</td>
                                                <td>COD</td>
                                                <td class="thumbnail">
                                                    <img src="assets/img/products/cauliflower-xs.png" alt="product" />
                                                </td>
                                                <td class="text-secondary">$105.60</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-invoice fs-xs">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>635981586200289</td>
                                                <td>03/12/2022</td>
                                                <td>COD</td>
                                                <td class="thumbnail">
                                                    <img src="assets/img/products/cauliflower-xs.png" alt="product" />
                                                </td>
                                                <td class="text-secondary">$105.60</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-invoice fs-xs">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>635981586200289</td>
                                                <td>03/12/2022</td>
                                                <td>COD</td>
                                                <td class="thumbnail">
                                                    <img src="assets/img/products/cauliflower-xs.png" alt="product" />
                                                </td>
                                                <td class="text-secondary">$105.60</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-invoice fs-xs">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>635981586200289</td>
                                                <td>03/12/2022</td>
                                                <td>COD</td>
                                                <td class="thumbnail">
                                                    <img src="assets/img/products/cauliflower-xs.png" alt="product" />
                                                </td>
                                                <td class="text-secondary">$105.60</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-invoice fs-xs">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="address-book">
                                <div class="address-book bg-white rounded p-5">
                                    <div class="row g-6">
                                        <div class="col-md-6">
                                            <div class="address-book-content pe-md-4 border-right position-relative">
                                                <div class="d-flex align-items-center gap-5 mb-4">
                                                    <h6 class="mb-0">Address Book</h6>
                                                    <a href="#">Edit</a>
                                                </div>
                                                <p class="text-uppercase fw-medium mb-3">
                                                    Default Shipping Address
                                                </p>
                                                <div class="address">
                                                    <p class="text-dark fw-bold mb-1">Saiful Talukdar</p>
                                                    <p class="mb-0">
                                                        Ghunshe, Muksudpur Dhaka - Gopalganj.
                                                        <br />
                              (+880) 1633082302
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 align-self-end">
                                            <div class="address-book-content ps-md-4">
                                                <p class="text-uppercase fw-medium mb-3">
                                                    Default Billing Address
                                                </p>
                                                <div class="address">
                                                    <p class="text-dark fw-bold mb-1">Saiful Talukdar</p>
                                                    <p class="mb-0">
                                                        Ghunshe, Muksudpur Dhaka - Gopalganj.
                                                        <br />
                              (+880) 1633082302
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payments">
                                <div class="payment-methods bg-white rounded py-5 px-4">
                                    <h6 class="mb-4">Default Payment Methods</h6>
                                    <div class="table-responsive">
                                        <table class="payments-list-table table">
                                            <tr>
                                                <th>Credit / Debit cards info</th>
                                                <th>Name</th>
                                                <th>Expires on</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <td class="d-flex align-items-center gap-3">
                                                    <span
                              class="icon d-inline-flex align-items-center justify-content-center rounded-circle"
                            >
                              <img
                                src="assets/img/brands/paypal-icon.png"
                                alt="icon"
                              />
                            </span>
                                                    <p class="d-inline-block mb-0">
                                                        <strong>PayPal</strong>
                                                        youremail@domain.com
                                                        <span
                                class="badge bg-secondary-light text-secondary fw-normal ms-1"
                              >
                                Active
                              </span>
                                                    </p>
                                                </td>
                                                <td>Talukdar</td>
                                                <td>25/2024</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-more">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-flex align-items-center gap-3">
                                                    <span
                              class="icon d-inline-flex align-items-center justify-content-center rounded-circle"
                            >
                              <img
                                src="assets/img/brands/paypal-icon.png"
                                alt="icon"
                              />
                            </span>
                                                    <p class="d-inline-block mb-0">
                                                        <strong>PayPal</strong>
                                                        youremail@domain.com
                                                    </p>
                                                </td>
                                                <td>Talukdar</td>
                                                <td>25/2024</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-more">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-flex align-items-center gap-3">
                                                    <span
                              class="icon d-inline-flex align-items-center justify-content-center rounded-circle"
                            >
                              <img
                                src="assets/img/brands/paypal-icon.png"
                                alt="icon"
                              />
                            </span>
                                                    <p class="d-inline-block mb-0">
                                                        <strong>PayPal</strong>
                                                        youremail@domain.com
                                                    </p>
                                                </td>
                                                <td>Talukdar</td>
                                                <td>25/2024</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-more">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-flex align-items-center gap-3">
                                                    <span
                              class="icon d-inline-flex align-items-center justify-content-center rounded-circle"
                            >
                              <img
                                src="assets/img/brands/paypal-icon.png"
                                alt="icon"
                              />
                            </span>
                                                    <p class="d-inline-block mb-0">
                                                        <strong>PayPal</strong>
                                                        youremail@domain.com
                                                    </p>
                                                </td>
                                                <td>Talukdar</td>
                                                <td>25/2024</td>
                                                <td class="text-center">
                                                    <a href="#" class="view-more">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <a href="#" class="btn btn-primary mt-4">
                                        <span class="me-2"><i class="fas fa-plus"></i></span>
                                        Add Payment
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="update-profile">
                                <div class="update-profile bg-white py-5 px-4">
                                    <h6 class="mb-4">Update Profile</h6>
                                    <form class="profile-form">
                                        <div class="file-upload text-center rounded-3 mb-5">
                                            <input type="file" name="dp" />
                                            <img src="assets/img/icons/image.svg" alt="dp" class="img-fluid" />
                                            <p class="text-dark fw-bold mb-2 mt-3">
                                                Drop your files here or
                                                <a href="#" class="text-primary">browse</a>
                                            </p>
                                            <p class="mb-0 file-name">
                                                (Only *.jpeg and *.png images will be accepted)
                                            </p>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-sm-6">
                                                <div class="label-input-field">
                                                    <label>First Name</label>
                                                    <input type="text" placeholder="Gene J." />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="label-input-field">
                                                    <label>Last Name</label>
                                                    <input type="text" placeholder="Larose" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="label-input-field">
                                                    <label>Phone/Mobile</label>
                                                    <input type="tel" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="label-input-field">
                                                    <label>Email Address</label>
                                                    <input type="email" placeholder="themetags@gmail.com" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="label-input-field">
                                                    <label>Birthday</label>
                                                    <input type="date" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="label-input-field">
                                                    <label>User Name</label>
                                                    <input type="text" placeholder="Username" />
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-6">
                                            Update Profile
                                        </button>
                                    </form>
                                </div>
                                <div class="change-password bg-white py-5 px-4 mt-4 rounded">
                                    <h6 class="mb-4">Change Password</h6>
                                    <form class="password-reset-form">
                                        <div class="row g-4">
                                            <div class="col-sm-6">
                                                <div class="label-input-field">
                                                    <label>Email Address</label>
                                                    <input type="email" placeholder="themetags@gmail.com" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="label-input-field">
                                                    <label>Current Password</label>
                                                    <input type="password" placeholder="Current password" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="label-input-field">
                                                    <label>New Password</label>
                                                    <input type="password" placeholder="New password" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="label-input-field">
                                                    <label>Re-type Password</label>
                                                    <input type="password" placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-6">
                                            Change Password
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="order-tracking">
                                <div class="order-tracking-wrap bg-white rounded py-5 px-4">
                                    <h6 class="mb-4">Order Tracking</h6>
                                    <ol id="progress-bar">
                                        <li class="fs-xs tt-step tt-step-done">Pending</li>
                                        <li class="fs-xs tt-step tt-step-done">Processing</li>
                                        <li class="fs-xs tt-step active">On the Way</li>
                                        <li class="fs-xs tt-step">Delivered</li>
                                    </ol>
                                    <div class="table-responsive-md mt-5">
                                        <table class="table table-bordered fs-xs">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date & Time</th>
                                                    <th scope="col">Status Info</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> 14 Feb 2023 - 13:19 </td>
                                                    <td>Your package has been delivered. Thank
                                                        you for shopping at Grostore!</td>
                                                </tr>
                                                <tr>
                                                    <td> 13 Feb 2023 - 13:39</td>
                                                    <td>Your package has been handed over to
                                                        Grostore Delivery.</td>
                                                </tr>
                                                <tr>
                                                    <td> 12 Feb 2023 - 14:50</td>
                                                    <td>Your package has been packed and is
                                                        being handed over to a logistics partner</td>
                                                </tr>
                                                <tr>
                                                    <td>12 Feb 2023 - 13:05</td>
                                                    <td>Your order has been successfully
                                                        verified.</td>
                                                </tr>
                                                <tr>
                                                    <td>12 Feb 2023 - 13:05</td>
                                                    <td>Thank you for shopping at GroStore! Your
                                                        order is being verified.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <!--my account section end-->

     <?php }
}
