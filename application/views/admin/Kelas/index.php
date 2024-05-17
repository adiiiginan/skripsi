<div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold m-0 fs-3"><?= $title; ?></h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">
                    <a href="../../demo20/dist/index.html" class="text-gray-600 text-hover-primary">Admin</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">Kelas</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">List Kelas Matakuliah</li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <?= $this->session->flashdata('message') ?>
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="#" class="btn btn-icon btn-color-primary bg-body w-35px h-35px w-lg-40px h-lg-40px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">
                <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                <span class="svg-icon svg-icon-2 svg-icon-md-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM11.7 17.7L16 14C16.4 13.6 16.4 12.9 16 12.5C15.6 12.1 15.4 12.6 15 13L11 16L9 15C8.6 14.6 8.4 14.1 8 14.5C7.6 14.9 8.1 15.6 8.5 16L10.3 17.7C10.5 17.9 10.8 18 11 18C11.2 18 11.5 17.9 11.7 17.7Z" fill="currentColor" />
                        <path d="M10.4343 15.4343L9.25 14.25C8.83579 13.8358 8.16421 13.8358 7.75 14.25C7.33579 14.6642 7.33579 15.3358 7.75 15.75L10.2929 18.2929C10.6834 18.6834 11.3166 18.6834 11.7071 18.2929L16.25 13.75C16.6642 13.3358 16.6642 12.6642 16.25 12.25C15.8358 11.8358 15.1642 11.8358 14.75 12.25L11.5657 15.4343C11.2533 15.7467 10.7467 15.7467 10.4343 15.4343Z" fill="currentColor" />
                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
            <!--end::Button-->
            <!--begin::Button-->
            <a href="#" class="btn btn-icon btn-color-success bg-body w-35px h-35px w-lg-40px h-lg-40px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">
                <!--begin::Svg Icon | path: icons/duotune/files/fil005.svg-->
                <span class="svg-icon svg-icon-2 svg-icon-md-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z" fill="currentColor" />
                        <rect x="11" y="19" width="10" height="2" rx="1" transform="rotate(-90 11 19)" fill="currentColor" />
                        <rect x="7" y="13" width="10" height="2" rx="1" fill="currentColor" />
                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
            <!--end::Button-->
            <!--begin::Button-->
            <a href="#" class="btn btn-icon btn-color-warning bg-body w-35px h-35px w-lg-40px h-lg-40px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
                <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                <span class="svg-icon svg-icon-2 svg-icon-md-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor" />
                        <rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
                        <rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
                        <rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
            <!--end::Button-->
            <!--begin::Daterange-->
            <a href="#" class="btn btn-flex bg-body h-35px h-lg-40px px-5" id="kt_dashboard_daterangepicker" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-trigger="hover" title="Select dashboard daterange">
                <span class="me-4">
                    <span class="text-muted fw-semibold me-1" id="kt_dashboard_daterangepicker_title">Today</span>
                    <span class="text-primary fw-bold" id="kt_dashboard_daterangepicker_date">Dec 16</span>
                </span>
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-4 m-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
            <!--end::Daterange-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <!--begin::Post-->
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Filter-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Filter</button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->
                            <div class="px-7 py-5" data-kt-user-table-filter="form">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-semibold">Role:</label>
                                    <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                        <option></option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Analyst">Analyst</option>
                                        <option value="Developer">Developer</option>
                                        <option value="Support">Support</option>
                                        <option value="Trial">Trial</option>
                                    </select>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
                                    <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
                                        <option></option>
                                        <option value="Enabled">Enabled</option>
                                    </select>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                    <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Filter-->
                        <!--begin::Export-->
                        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                    <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
                                    <path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Export</button>
                        <!--end::Export-->
                        <!--begin::Add user-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Add</button>
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                    </div>
                    <!--end::Group actions-->
                    <!--begin::Modal - Adjust Balance-->
                    <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Export Users</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                    <!--begin::Form-->
                                    <form id="kt_modal_export_users_form" class="form" action="#">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                <option></option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Analyst">Analyst</option>
                                                <option value="Developer">Developer</option>
                                                <option value="Support">Support</option>
                                                <option value="Trial">Trial</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                <option></option>
                                                <option value="excel">Excel</option>
                                                <option value="pdf">PDF</option>
                                                <option value="cvs">CVS</option>
                                                <option value="zip">ZIP</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                <span class="indicator-label">Submit</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - New Card-->
                    <!--begin::Modal - Add task-->
                    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_add_user_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Add Mahasiswa</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                    <!--begin::Form-->
                                    <form id="kt_modal_add_user_form" class="form" action="#">
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-semibold fs-6 mb-2">Nama</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="nama" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="Adi Ginandani" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-semibold fs-6 mb-2">NIDN</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="nidn" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="NIDN" value="320120937" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="adiginandani@com" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="required fw-semibold fs-6 mb-2">No Telephone</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="telp" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="08*********" value="08*********" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->

                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Scroll-->
                                        <!--begin::Actions-->
                                        <div class="text-center pt-15">
                                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                <span class="indicator-label">Submit</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - Add task-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-125px">Matakuliah</th>
                            <th class="min-w-125px">Dosen</th>
                            <th class="min-w-125px">Semester</th>
                            <th class="min-w-125px">Kelas</th>

                            <th class="text-end min-w-90px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <?php foreach ($admin as $a) : ?>
                        <tbody class="text-gray-600 fw-semibold">
                            <!--begin::Table row-->
                            <tr>
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>

                                <td class="d-flex align-items-center">

                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <a href="../../demo20/dist/apps/user-management/users/view.html">
                                            <div class="symbol-label">
                                                <img src="assets/media/avatars/300-6.jpg" class="w-100" />
                                            </div>
                                        </a>
                                    </div>

                                    <div class="d-flex flex-column">
                                        <a href="../../demo20/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1"><?= $a['matakuliah']; ?></a>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <td><?= $a['nama']; ?></td>
                                <td><?= $a['kelas']; ?></td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo20/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="<?= base_url(); ?>admin/hapusDosen/<?= $admin['nidn']; ?>" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Post-->
</div>