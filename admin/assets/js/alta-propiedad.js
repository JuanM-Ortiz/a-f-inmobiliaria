$(document).ready(function() {
  imgPortada.onchange = evt => {
    const [file] = imgPortada.files
    if (file) {
      previsualizacionPortadaDiv.classList.remove('d-none')
      previsualizacion.src = URL.createObjectURL(file)
    }
  }

  $("#ventaCheck").change(function() {
    $("#precioVentaDiv").toggleClass("d-none");
  });

  $("#alquilerCheck").change(function() {
    $("#precioAlquilerDiv").toggleClass("d-none");
  });

  //alta de propiedad
  $("#guardarPropiedad").on("click", function() {
    var fd = new FormData();
    let titulo = $('#titulo').val();
    let descripcion = $('#descripcion').val();
    let tipoPropiedad = $('#tipoPropiedad').val();
    let superficie = $('#superficie').val();
    let superficieCubierta = $('#superficieCubierta').val();
    let pisos = $('#pisos').val();
    let dormitorios = $('#dormitorios').val();
    let baños = $('#baños').val();
    let zona = $('#zona').val();
    let mapsUrl = $('#mapsUrl').val();
    let localidad = $('#localidad').val();
    let precioVenta = $('#precioVenta').val();
    let precioAlquiler = $('#precioAlquiler').val();
    let imgPortada = $('#imgPortada')[0].files[0];
    let destacada = $('#destacada').val();

    $.each($("#imagenes"), function(i, obj) {
      $.each(obj.files, function(j, file) {
        fd.append('imagenes[' + j + ']', file);
      })
    });

    let ambientes = $('input[name="ambientes"]:checked').map(function() {
      return this.value;
    }).get();
    let servicios = $('input[name="servicios"]:checked').map(function() {
      return this.value;
    }).get();
    let comodidades = $('input[name="comodidades"]:checked').map(function() {
      return this.value;
    }).get();
    let tipoPublicacion = $('input[name="tipoPublicacion"]:checked').map(function() {
      return this.value;
    }).get();
    ambientes = JSON.stringify(ambientes);
    servicios = JSON.stringify(servicios);
    comodidades = JSON.stringify(comodidades);
    tipoPublicacion = JSON.stringify(tipoPublicacion);
    fd.append('crear', 1);
    fd.append('titulo', titulo);
    fd.append('descripcion', descripcion);
    fd.append('tipoPropiedad', tipoPropiedad);
    fd.append('superficie', superficie);
    fd.append('superficieCubierta', superficieCubierta);
    fd.append('pisos', pisos);
    fd.append('dormitorios', dormitorios);
    fd.append('baños', baños);
    fd.append('localidad', localidad);
    fd.append('zona', zona);
    fd.append('mapsUrl', mapsUrl);
    fd.append('imgPortada', imgPortada);
    fd.append('ambientes', ambientes);
    fd.append('servicios', servicios);
    fd.append('comodidades', comodidades);
    fd.append('tipoPublicacion', tipoPublicacion);
    fd.append('precioVenta', precioVenta ?? null);
    fd.append('precioAlquiler', precioAlquiler ?? null);
    fd.append('destacada', destacada);

    $.ajax({
      url: 'controllers/propiedad.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(result) {
        if (!result) {
          window.alert('Ocurrio un error.');
          return;
        }
        if (result) {
          window.alert('Propiedad guardada correctamente!');
          window.location.reload();
        }
      },
    });

  });

  $(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {

      if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
          var reader = new FileReader();
          reader.onload = function(event) {
            $($.parseHTML('<img class="w-25">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
          }
          reader.readAsDataURL(input.files[i]);
        }
      }
    };

    $('#imagenes').on('change', function() {
      $('.gallery').html('');
      imagesPreview(this, 'div.gallery');
    });
  });
});