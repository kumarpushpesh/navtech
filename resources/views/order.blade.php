@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row header" style="text-align:center;color:green">
        <h3>Order List</h3>
       
    </div>
    <a class="btn btn-primary" href="{{route('add')}}">Add New Order</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>OrderNo.</th>
                <th>Order Due Date</th>
                <th>Name</th>
                <th>Address</th>
                <th>phone</th>
                <th>Order Value</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data))
            @foreach ($data as $key => $value)

            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->order_no }}</td>
                <td>{{ $value->order_due_date }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->address }}</td>
                <td>{{ $value->phone }}</td>
                <td>{{ $value->order_total }}</td>
                <td>
                    <a class="btn btn-primary"  id="Edit" href="{{ route('edit',$value->id) }}">Edit</a>
                    <a class="btn btn-primary" id="destroy" href="{{ route('destroy',$value->id) }}">Delete</a>
                </td>
            </tr>

            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>OrderNo.</th>
                <th>Order Due Date</th>
                <th>Name</th>
                <th>Address</th>
                <th>phone</th>
                <th>Order Value</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="madal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="display: inline;">Update Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close" style="margin-left: 0px;"></button>
                </div>

                <input type="hidden" name="order_id" id="order_id">

                <form id="contact-form" method="POST" action="{{url('update')}}" enctype="multipart/form-data">
                    @csrf


                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_name">Order No. *</label>
                                <input id="form_name" type="text" name="order_no" id="order_id" class="form-control" placeholder="" required="required" data-error="Firstname is required.">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_lastname">Due Date *</label>
                                <input id="form_lastname" type="date" name="order_due_date" id="order_due_date" class="form-control" placeholder=" " required="required" data-error="Lastname is required.">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_email">Name *</label>
                                <input id="form_email" type="text" name="name" id="name" class="form-control" placeholder="" required="required" data-error="Valid email is required.">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_lastname">Phone *</label>
                                <input id="form_lastname" type="text" name="phone" id="phone" class="form-control" placeholder="" required="required" data-error="Lastname is required.">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_email">Order Value *</label>
                                <input id="form_email" type="text" name="order_total" id="order_total" class="form-control" placeholder="" required="required" data-error="Valid email is required.">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Address *</label>
                                <input id="form_message" name="address" id="address" class="form-control" placeholder="" rows="3" required="required" data-error="Please, leave us a message.">
                            </div>

                        </div>


                    </div>
                    <div class="row">



                        <div class="col-md-12" style="margin-left: 220px; margin-top: 20px;">

                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Update">

                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

</div>
@endsection