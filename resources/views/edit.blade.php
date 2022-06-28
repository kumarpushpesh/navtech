@extends('layouts.app')

@section('content')

<div class="container">


    <div class=" text-center mt-5 ">

        <h1>Edit Order Details</h1>


    </div>


    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">

                   
                                    <form id="contact-form" role="form" method="POST" action="{{url('update/'.$data->id)}}" enctype="multipart/form-data">
                                        @csrf



                                        <div class="controls">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_name">Order No. *</label>
                                                        <input id="form_name" type="text" name="order_no" value="{{$data->order_no}}" class="form-control" placeholder="" required="required" data-error="Firstname is required.">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_lastname">Due Date *</label>
                                                        <input id="form_lastname" type="date" name="order_due_date" value="{{$data->order_due_date}}" class="form-control" placeholder=" " required="required" data-error="Lastname is required.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_email">Name *</label>
                                                        <input id="form_email" type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="" required="required" data-error="Valid email is required.">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_lastname">Phone *</label>
                                                        <input id="form_lastname" type="text" name="phone" value="{{$data->phone}}" class="form-control" placeholder="" required="required" data-error="Lastname is required.">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_email">Order Value *</label>
                                                        <input id="form_email" type="text" name="order_total" value="{{$data->order_total}}" class="form-control" placeholder="" required="required" data-error="Valid email is required.">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_message">Address *</label>
                                                        <input id="form_message" name="address" class="form-control" placeholder="" rows="3" required="required" data-error="Please, leave us a message." value="{{$data->address}}">
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="row">



                                                <div class="col-md-12" style="margin-left: 270px; margin-top: 20px;">

                                                    <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Update">

                                                </div>

                                            </div>


                                        </div>
                                    </form>

                    </div>
                </div>


            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>

</div>
@endsection