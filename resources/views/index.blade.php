@extends('layout.main')

@section('title', 'Dashboard Laundry')

@section('container')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3"
                    id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                            placeholder="Search for ...">
                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i
                                    class="fas fa-search"></i></button></div>
                    </div>
                </form>
                <ul class="nav navbar-nav flex-nowrap ml-auto">
                    <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                            data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                        <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto navbar-search w-100">
                                <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                        placeholder="Search for ...">
                                    <div class="input-group-append"><button class="btn btn-primary py-0"
                                            type="button"><i class="fas fa-search"></i></button></div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block"
                    role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-primary py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                        <span>penghasilan (perbulan)</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span>$40,000</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-success font-weight-bold text-xs mb-1">
                                        <span>penghasilan (tahunan)</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span>$215,000</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-info py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                                        <span>Transaksi</span></div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span>50</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-receipt fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-warning py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                                        <span>member</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span>18</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-user fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Employee Info</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label>Show&nbsp;<select
                                                class="form-control form-control-sm custom-select custom-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input
                                                type="search" class="form-control form-control-sm"
                                                aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                                            <td>Chief Executive Officer(CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09<br></td>
                                            <td>$1,200,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="assets/img/avatars/avatar3.jpeg">Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12<br></td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="assets/img/avatars/avatar4.jpeg">Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>2012/10/13<br></td>
                                            <td>$132,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="assets/img/avatars/avatar5.jpeg">Brenden Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>2011/06/07<br></td>
                                            <td>$206,850</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="assets/img/avatars/avatar1.jpeg">Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02<br></td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="assets/img/avatars/avatar2.jpeg">Bruno Nash<br></td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>38</td>
                                            <td>2011/05/03<br></td>
                                            <td>$163,500</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="assets/img/avatars/avatar3.jpeg">Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12<br></td>
                                            <td>$106,450</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="assets/img/avatars/avatar4.jpeg">Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06<br></td>
                                            <td>$145,600</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30"
                                                    src="assets/img/avatars/avatar5.jpeg">Cedric Kelly</td>
                                            <td>Senior JavaScript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29<br></td>
                                            <td>$433,060</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Position</strong></td>
                                            <td><strong>Office</strong></td>
                                            <td><strong>Age</strong></td>
                                            <td><strong>Start date</strong></td>
                                            <td><strong>Salary</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav
                                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#"
                                                    aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                        aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
        </div>
    </footer>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
@endsection