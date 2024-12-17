
<table id="file_export" class=" table table-hover table-bordered table-striped table-responsive">
    <thead>
        <!-- start row -->
        <tr>
            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                srcset=""></th>
            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                    srcset=""></th>
            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                    srcset=""></th>
            <th>ID</th>
            <th>Nombre</th>
          
            

        </tr>
        <!-- end row -->
    </thead>
    <tbody>
        @foreach ($Role as $Roles)
            <tr>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning ti ti-user" 
                    data-bs-toggle="modal" data-bs-target="#success-header-modal2" fdprocessedid="cw61t3"
                        onclick="RolePermissionEdit('{{ $Roles->id }}'); Up();  return false"></button>


                      
                </td>

                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success ti ti-pencil" 
                    data-bs-toggle="modal" data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                        onclick="RoleEdit('{{ $Roles->id }}'); Up();  return false"></button>


                      
                </td>
                <td>
                 
                    <button class="btn btn-danger ti ti-trash"
                        onclick="RoleDestroy('{{ $Roles->id }}'); return false"></button>
                </td>



                <td>{{ $Roles->id }}</td>
               
                <td>{{ $Roles->name }}</td>  
                            
              
             


            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <!-- start row -->
        <tr>
            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                srcset=""></th>
                <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                    srcset=""></th>
        <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                srcset=""></th>
        <th>ID</th>
        <th>Nombre</th>
        
        
        </tr>
        <!-- end row -->
    </tfoot>
</table>








    <script>
 
      </script>
    