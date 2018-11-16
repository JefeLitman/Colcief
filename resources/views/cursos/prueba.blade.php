<!DOCTYPE HTML>
<html>

  <body>
    {!! Form::text('id') !!}
    <div id="name"></div>
  </body>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script>
    $(function () {
      $('input').keyup(function() {
        $.ajax({
            method: 'get',
            url: 'cursos/estudiantes/9/01',
            dataType: "json",
            success: function(data){
               $('#name').text(data[0].pk_estudiante);
            },
            statusCode: {
                500: function() {
                    //
                },
                422: function(data) {
                    //
                }
            }
        });
      });
    });
  </script>
</html>
