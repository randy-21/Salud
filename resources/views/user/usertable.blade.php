
<table id="file_export" class="text-center table table-hover table-bordered table-striped table-responsive">
    <thead>
        <!-- start row -->
        <tr>
            <th>Rol</th>
            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                    srcset=""></th>
            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                    srcset=""></th>
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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-toggle="modal"
                        style="background-color:#023039;color:#ffffff" data-target="#exampleModal2"
                        onclick="userRoleEdit('{{ $users->id }}');  return false">Roles</button>
                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success ti ti-pencil" data-toggle="modal"
                        data-target="#exampleModal"
                        onclick="userEdit('{{ $users->id }}'); Up();  return false"></button>
                </td>
                <td>

                    <button class="btn btn-danger ti ti-trash"
                        onclick="userDestroy('{{ $users->id }}'); return false"></button>
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
          <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                  srcset=""></th>
          <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                  srcset=""></th>
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
