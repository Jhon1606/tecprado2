function modalAgregar(pagina){
    $('#myModal' + pagina).modal('show');
}

function modalEditarComplejo(codigo){

    $.ajax({
        url: "../../General/Queries/infocomplejo.php",
        type: "POST",
        dataType: "JSON",
        data: {codigo: codigo}
    })
    .done(function(info){

        var descripcion = info[0].descripcion;

        $("#ideditar").val(codigo);
        $("#descripcion").val(descripcion);
        $('#modalEditarComplejo').modal('show');
    });
}

function modalEditarAmbiente(ideditar){

    $.ajax({
        url: "../../General/Queries/infoambiente.php",
        type: "POST",
        dataType: "JSON",
        data: {ideditar: ideditar}
    })
    .done(function(info){
        var codigo = info[0].codigo;
        var descripcion = info[0].descripcion;
        var tipo_ubicacion = info[0].tipo_ubicacion;
        var centro_costo = info[0].centro_costo;

        $("#ideditar").val(codigo);
        $("#descripcion").val(descripcion);
        $("#tipo_ubicacion").val(tipo_ubicacion);
        $("#centro_costo").val(centro_costo);
        $('#modalEditarAmbiente').modal('show');
    });
}

function modalEditarGrupo(ideditar){ 
    $.ajax({
        url: "../../General/Queries/infogrupo.php",
        type: "POST",
        dataType: "JSON",
        data: {ideditar: ideditar}
    })
    .done(function(info){
        var codigo_gru = info[0].codigo_gru;
        var descripcion = info[0].descripcion;
        var consecutivo = info[0].consecutivo;

        $("#ideditar").val(codigo_gru);
        $("#descripcion").val(descripcion);
        $("#consecutivo").val(consecutivo);
        $('#modalEditarGrupo').modal('show');
    });
}

function modalEditarEquipo(ideditar){
    
    $.ajax({
        url: "../../General/Queries/infoequipo.php",
        type: "POST",
        dataType: "JSON",
        data: {ideditar: ideditar}
    })
    .done(function(info){
        var codigo_eqp = info[0].codigo_eqp;
        var centro_costo = info[0].centro_costo;
        var ambiente = info[0].ambiente;
        var habitacion = info[0].habitacion;
        var descripcion = info[0].descripcion;
        var codigo_grupo = info[0].codigo_grupo;
        var codigo_linea = info[0].codigo_linea;
        var serie = info[0].serie;
        var modelo = info[0].modelo;
        var marca = info[0].marca;
        var observaciones = info[0].observaciones;
        var codigo_und = info[0].codigo_und;
        var estandar_combustible = info[0].estandar_combustible;
        var fecha_ultimo_mtto = info[0].fecha_ultimo_mtto;
        
        $("#ideditar").val(codigo_eqp);
        $("#centro_costo").val(centro_costo);
        cargarAmbienteEditar(centro_costo,ambiente);
        cargarHabitacionEditar(ambiente,habitacion);
        $("#descripcion").val(descripcion);
        $("#codigo_grupo").val(codigo_grupo);
        $("#codigo_linea").val(codigo_linea);
        $("#serie").val(serie);
        $("#modelo").val(modelo);
        $("#marca").val(marca);
        $("#observaciones").val(observaciones);
        $("#codigo_und").val(codigo_und);
        $("#estandar_combustible").val(estandar_combustible);
        $("#fecha_ultimo_mtto").val(fecha_ultimo_mtto);
        $('#modalEditarEquipo').modal('show');
    });
}

function cargarAmbiente(complejo){
    $.ajax({
        url: "../../General/Queries/filtroambiente.php",
        type: "POST",
        dataType: "HTML",
        data: {complejo: complejo},
        success: function(selectAmbiente){
            $('#crearAmbiente').html(selectAmbiente);
        }
    });
}

function cargarAmbienteEditar(complejo,ambiente){
    $.ajax({
        url: "../../General/Queries/filtroeditarambiente.php",
        type: "POST",
        dataType: "HTML",
        data: {complejo: complejo, ambiente: ambiente},
        success: function(selectAmbiente){
            $('#editarAmbiente').html(selectAmbiente);
        }
    });
}

function cargarHabitacion(ambiente){
    $.ajax({
        url: "../../General/Queries/filtrohabitacion.php",
        type: "POST",
        dataType: "HTML",
        data: {ambiente: ambiente},
        success: function(selectHabitacion){
            $('#crearHabitacion').html(selectHabitacion);
        }
    });
}

function cargarHabitacionEditar(ambiente,habitacion){
    $.ajax({
        url: "../../General/Queries/filtrohabitacion.php",
        type: "POST",
        dataType: "HTML",
        data: {ambiente: ambiente, habitacion: habitacion},
        success: function(selectHabitacion){
            $('#editarHabitacion').html(selectHabitacion);
        }
    });
}

function modalSubirArchivo(equipo){
    $('#equipo').val(equipo);
    $.ajax({
        url: "../../General/Queries/lstdoc.php",
        type: "POST",
        dataType: "JSON",
        data: {equipo: equipo}
    })
    .done(function(info){
           var valores = info;
        $('#equiposDoc').empty();
             
        for(var i=0; i<valores.length; i++){
                
            var td = `<tr><td>` + valores[i].comentario +
            `</td>
            <td><a href="../../General/Docs/`+valores[i].archivo+`" target="blank_" >` + valores[i].archivo +
            `</a></td>
            <td></td></tr>`;

            $("#equiposDoc").append(td);                
        }
    });
    $('#modalArchivo').modal('show');
}

function modalEliminarFile($iddocumento){
    $('#id').val($iddocumento);
    $('#modalEliminarArchivo').modal('show');
}

function modalEditarLinea(ideditar){
    $.ajax({
        url: "../../General/Queries/infolinea.php",
        type: "POST",
        dataType: "JSON",
        data: {ideditar: ideditar}
    })
    .done(function(info){
        var codigo_linea = info[0].codigo_linea;
        var descripcion = info[0].descripcion;
        var grupo = info[0].grupo;

        $("#ideditar").val(codigo_linea);
        $("#descripcion").val(descripcion);
        $("#grupo").val(grupo);
        $('#modalEditarLinea').modal('show');
    });
}

function modalEditarUnidad(ideditar){
    $.ajax({
        url: "../../General/Queries/infounidades.php",
        type: "POST",
        dataType: "JSON",
        data: {ideditar: ideditar}
    })
    .done(function(info){
        var codigo_und = info[0].codigo_und;
        var descripcion = info[0].descripcion;

        $("#ideditar").val(codigo_und);
        $("#descripcion").val(descripcion);
        $('#modalEditarUnidades').modal('show');
    });
}

function modalEditarTipo(ideditar){
    $.ajax({
        url: "../../General/Queries/infotipo.php",
        type: "POST",
        dataType: "JSON",
        data: {ideditar: ideditar}
    })
    .done(function(info){
        var id = info[0].id;
        var descripcion = info[0].descripcion;

        $("#ideditar").val(id);
        $("#descripcion").val(descripcion);
        $('#modalEditarTipo').modal('show');
    });
}

function modalEliminar(codigo){
    alert(codigo);
    $("#codigo").val(codigo);
    $('#myModalEliminar').modal('show');
}

