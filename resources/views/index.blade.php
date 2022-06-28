
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navtech</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Data table</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNeworder" class="btn btn-success">Add</button></div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Order No</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Order Value</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->order_due_date }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>
                       <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $order->id }}">Edit</a>
                      <a href="javascript:void(0)" class="btn btn-primary delete" data-id="{{ $order->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Order No</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Order Value</th>
                  <th scope="col">Action</th>
                </tr>
              </tfoot>
            </table>
            
        </div>
    </div>        
</div>
<!-- boostrap model -->
    <div class="modal fade" id="ajax-order-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxorderModel"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="addEditorderForm" name="addEditorderForm" class="form-horizontal" method="POST">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Order No.</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="order_no" name="order_no" placeholder="Enter order Number" value="" maxlength="50" required="">
                </div>
              </div>  
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Order Date</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" id="order_due_date" name="order_due_date" placeholder="Enter.... " value="" maxlength="50" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter..." value="" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter..." value="" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter..." value="" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Total Value</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="order_total" name="order_total" placeholder="Enter..." value="" required="">
                </div>
              </div>
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNeworder">Save changes
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
<script type="text/javascript">
 $(document).ready(function($){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#addNeworder').click(function () {
       $('#addEditorderForm').trigger("reset");
       $('#ajaxorderModel').html("Add order");
       $('#ajax-order-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('edit-order') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxorderModel').html("Edit");
              $('#ajax-order-model').modal('show');
              $('#id').val(res.id);
              $('#order_no').val(res.order_no);
              $('#order_due_date').val(res.order_due_date);
              $('#name').val(res.name);
              $('#address').val(res.address);
              $('#phone').val(res.phone);
              $('#order_total').val(res.order_total);
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete-order') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              window.location.reload();
           }
        });
       }
    });
    $('body').on('click', '#btn-save', function (event) {
          var id = $("#id").val();
          var order_no = $('#order_no').val();
          var order_due_date = $('#order_due_date').val();
          var namer = $("#name").val();
          var address = $("#address").val();
          var phone = $("#phone").val();
          var order_total = $("#order_total").val();
          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('add-update-order') }}",
            data: {
              id:id,
              order_no:order_no,
              order_due_date:order_due_date,
              name:name,
              address:address,
              phone:phone,
              order_total:order_total,
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });
    });
});
</script>
</body>
</html>