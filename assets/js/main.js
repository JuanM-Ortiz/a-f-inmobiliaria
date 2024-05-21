
window.onload = function() {
    var navbar = document.querySelector('nav');
    navbar.classList.add('nav-visible');
};


  new Glider(document.querySelector('.glider'), {
    slidesToShow: 1,
    dots: '#dots',
    draggable: true,
    arrows: {
      prev: '.glider-prev',
      next: '.glider-next'
    }
  });



  function redirectPropiedad(idPropiedad) {
    window.location.href = 'detalle-propiedad.php?id=' + idPropiedad;
  }

  function copiarCodigo()
  {
    var textToCopy = $('#codigoPropiedad').text();
    var tempTextarea = $('<textarea>');
    $('body').append(tempTextarea);
    tempTextarea.val(textToCopy).select();
    document.execCommand('copy');
    tempTextarea.remove();
    const Toast = Swal.mixin({
      toast: true,
      position: "bottom-end",
      showConfirmButton: false,
      background: "#383737",
      color: "#FFFFFF",
      iconColor: "#E38241",
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    });
    Toast.fire({
      icon: "success",
      title: "Código copiado al portapapeles!"
    });
  }