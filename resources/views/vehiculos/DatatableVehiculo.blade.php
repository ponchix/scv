  <title>Vehiculos</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <table id="example" class="table mt-2 table-borderless table-hover">
    <thead>
        <th>ID</th>
        <th>Imagen</th>
        <th>Nombre Vehiculo</th>
        <th>Estatus</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach($vehiculos as $vehiculo)
        <tr>
            <td>{{$vehiculo->id}}</td>
            <td> <img src="/imagen/{{$vehiculo->imagen}}" width="120" height="90px"> </td>
            <td>{{$vehiculo->NombreVehiculo}}</td>
            <td>@if($vehiculo->StatusInicial=='Disponible')
                <span class="badge bg-primary">{{$vehiculo->StatusInicial}}</span>
                @elseif($vehiculo->StatusInicial=='Taller')
                <span class="badge bg-warning">{{$vehiculo->StatusInicial}}</span>
                @elseif($vehiculo->StatusInicial=='Asignado')
                <span class="badge bg-info">{{$vehiculo->StatusInicial}}</span>
                @elseif($vehiculo->StatusInicial=='Fuera de servicio')
                <span class="badge bg-danger">{{$vehiculo->StatusInicial}}</span>
                @endif
            </td>
            <td>
                <form action="{{route('vehiculos.destroy',$vehiculo->id)}}" method="POST" class="formulario">
                    @can('ver-vehiculo')
                    <a class="btn btn-light" href="{{route('vehiculo.perfil',$vehiculo->id)}}"><i class="fas fa-eye"></i></a>
                    @endcan
                    @can('editar-vehiculo')
                    <a class="btn btn-success" href="{{route('vehiculos.edit',$vehiculo->id)}}"><i class="fas fa-edit"></i></a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('borrar-vehiculo')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    @endcan
                </form>         
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
   $(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu":[[5,10,50,-1],[5,10,50,"All"]],
        "language":{
         "lengthMenu":"Mostrar _MENU_ registros",
         "info":"Mostrando pagina _PAGE_ de _PAGES_",
         "infoEmpty": "Sin resultados",
         "infoFiltered": "(filtrado desde _MAX_ registros totales)",
         "paginate": {
            "first": "Primero",
            "last": "??ltimo",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "search": "Buscar:",
        "zeroRecords": "No se encontraron coincidencias"

    }
});
} ); 
</script>

<!--SweetAlert---->

<script >
    $('.formulario').submit(function(e){
        e.preventDefault();
        Swal.fire({
          title: '??Quieres eliminar este veh??culo?',
          text: "No podr??s deshacer esta acci??n",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'S??, Borrar!',
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
      }
  })

  });
</script>