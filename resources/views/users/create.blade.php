@extends('layout.layout')

@section('content')
    <h1>Add New User</h1>
    <hr>
     <form action="/users" method="post" name="frm_create" id="frm_create">
     {{ csrf_field() }}
      <div class="form-group">
        <label for="title">User Name</label>
        <input type="text" class="form-control" id="username"  name="name">
      </div>
      <div class="form-group">
        <label for="title">email</label>
        <input type="text" class="form-control" id="email"  name="email">
      </div>
      <div class="form-group">
        <label for="title">password</label>
        <input type="text" class="form-control" id="password"  name="password">
      </div>
      <div class="form-group">
        <label for="title">phone</label>
        <input type="text" class="form-control" id="phone"  name="phone">
      </div>
      <div class="form-group">
        <label for="description">image </label>
        <input type="file" class="form-control" id="image" name="image">
      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   
    <script type="text/javascript">
$( document ).ready(function() {
    $(document).on('submit', 'form#frm_create', function (event) {
        event.preventDefault();
        var form = $(this);
        var data = new FormData($(this)[0]);
        var url = form.attr("action");
        console.log(1,data);
         $.ajax({
            type: form.attr('method'),
            url: 'http://127.0.0.1:8000/api/register/',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.is-invalid').removeClass('is-invalid');
                if (data.fail) {
                    for (control in data.errors) {
                        $('#' + control).addClass('is-invalid');
                        $('#error-' + control).html(data.errors[control]);
                    }
                } else {
                    ajaxLoad(data.redirect_url);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("Error: " + errorThrown);
            }
        }); 

        
        
        return false;
    });
});
</script>
@endsection
