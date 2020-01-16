 $(document).ready(function () {
     $("#carga").click(function () {
         $.ajax(
             'agenda.php', {
                 success: function (data) {

                     var break_data = JSON.parse(data);

                     for (let i = 0; i < break_data.length; i++) {
                         $("#tabla").append("<tr><td>" + break_data[i].id + "</td><td>" + break_data[i].nombre + "</td><td>" + break_data[i].telefono + "</td></tr>");

                     }



                 },
                 error: function () {
                     alert('There was some error performing the AJAX call!');
                 }
             }
         );
     });

 });