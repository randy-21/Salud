@extends('template')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h4 class="mb-4 mb-md-0 card-title">Usuarios</h4>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex" href="../main/index.html">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Usuarios
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="datatables">
                <!-- start File export -->
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <h4 class="card-title mb-0">Exportar</h4>
                        </div>
                        <p class="card-subtitle mb-3">
                            <button type="button" class="btn mb-1 me-1 bg-success-subtle text-success"
                                data-bs-toggle="modal" data-bs-target="#success-header-modal">
                                Agregar
                            </button>
                        </p>
                        <div class="table-responsive" id="mycontent">
                            @include('user.usertable')
                        </div>
                    </div>
                </div>
                <!-- end Language file -->
                <!-- end Setting defaults -->
                <!-- end Custom toolbar elements -->
            </div>
        </div>
    </div>

    <div class="button-group">
        <!-- success Header Modal -->
        <div id="success-header-modal" class="modal fade" tabindex="-1" aria-labelledby="success-header-modalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success text-white">
                        <h4 class="modal-title text-white" id="success-header-modalLabel">
                            Usuarios
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" role="form" id="user" name="user" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="names" class="form-label">Nombres</label>
                                <input name="name" type="text" class="form-control" id="names">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control" id="password" value="12345678">
                            </div>
                            <br>
                            Elija Rol :
                            <select name="role" id="" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="Asistencial">Asistencial</option>
                                <option value="Digitador">Digitador</option>
                                <option value="Invitado">Invitado</option>
                            </select>

                    </div>
                    <div class="modal-footer">
                        <input type="button" value="Nuevo" class="btn btn-primary" onclick="New();$('#user')[0].reset();" name="new">
                        <input type="button" value="Guardar" class="btn bg-success-subtle text-success" onclick="userStore()" id="create">
                        <input type="button" value="Modificar" class="btn bg-danger-subtle text-danger" onclick="userUpdate();" id="update">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
