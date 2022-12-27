@extends('layouts.layout')
@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('content')
    <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card  mb-4 text-white bg-primary">
                            <div class="card-body">
                                <div class="fs-3 fw-semibold mt-4">87.500</div><span class=" text-uppercase text-white fw-semibold">Users</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-info">
                            <div class="card-body">
                                <div class="fs-3 fw-semibold mt-4">87.500</div><span class=" text-uppercase text-white fw-semibold">Clients</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-warning">
                            <div class="card-body">
                                <div class="fs-3 fw-semibold mt-4">87.500</div><span class=" text-uppercase text-white fw-semibold">Projects</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-danger">
                            <div class="card-body">
                                <div class="fs-3 fw-semibold mt-4">87.500</div><span class=" text-uppercase text-white fw-semibold">Tasks</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </div>
            <div class="container-lg mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-4">
                            Users
                        </span>
                        <a href="" class="btn btn-dark">View all</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto@email.com</td>
                                <td>98028299300</td>
                                <td>2334 Boulevard, Stretford End</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="container-lg mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-4">
                            Clients
                        </span>
                        <a href="" class="btn btn-dark">View all</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">VAT</th>
                                <th scope="col">Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Goldman Sachs</td>
                                <td>68785</td>
                                <td>699 Brentford Avenue, Upper Iweka Road, GE 459696</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="container-lg mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-4">
                            Projects
                        </span>
                        <a href="" class="btn btn-dark">View all</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Client</th>
                                <th scope="col">Assigned User</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Integrating code360 for OAuth across platforms</td>
                                <td>Goldman Sachs</td>
                                <td>Jericho Strauf</td>
                                <td>25/05/2023</td>
                                <td><span class="badge text-bg-warning">Working on it</span>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="container-lg mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-4">
                            Tasks
                        </span>
                        <a href="" class="btn btn-dark">View all</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task</th>
                                <th scope="col">User</th>
                                <th scope="col">Status</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Priority</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Integrating code360 for OAuth across platforms</td>
                                <td>Mark Otto</td>
                                <td><span class="badge text-bg-info">Open</span>
                                </td>
                                <td>25/05/2023</td>
                                <td><span class="badge text-bg-primary">Medium</span>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
