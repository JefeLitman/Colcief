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
            url: 'notas/total/1',
            dataType: "json",
            success: function(data){
               $('#name').text(data.total);
            },
            statusCode: {
                500: function() {
                    $('#name').text('1');
                },
                422: function(data) {
                    $('#name').text('2');
                }
            }
        });
      });
    });
  </script>
</html>
