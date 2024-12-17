
<table id="file_export" class="text-center table table-hover table-bordered table-striped table-responsive">
    <thead>
        <!-- start row -->
        <tr>
            <th>Rol</th>
           
            <th>ID</th>

            <th>Nombres</th>

            <th>Email</th>

            <th>Rol ó Cargo</th>

        </tr>
        <!-- end row -->
    </thead>
    <tbody>
        @foreach ($user as $users)
            <tr>

                <td>
                    <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                          <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)" onclick="userRoleEdit('{{ $users->id }}');  return false">
                              <i class="fs-4 ti ti-user"></i>Role
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                            data-bs-toggle="modal" data-bs-target="#success-header-modal"
                        onclick="userEdit('{{ $users->id }}'); Up();  return false"
                            >
                              <i class="fs-4 ti ti-edit"></i>Edit
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                              onclick="userDestroy('{{ $users->id }}'); return false"
                            >
                              <i class="fs-4 ti ti-trash"></i>Delete
                            </a>
                          </li>
                        </ul>
                      </div>


                  
                </td>
              



                <td>{{ $users->id }}</td>

                </td>




                <td>{{ $users->name }}</td>

                <td>{{ $users->email }}</td>



                <td>

                    @foreach ($users->roles as $item)
                        {{ $item->name }}
                    @endforeach
                </td>


            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <!-- start row -->
        <tr>
          <th>Rol</th>
        
          <th>ID</th>

          <th>Nombres</th>

          <th>Email</th>

          <th>Rol ó Cargo</th>
        </tr>
        <!-- end row -->
    </tfoot>
</table>








    <script>

      </script>
