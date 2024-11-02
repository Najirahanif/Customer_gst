@extends('layouts.adminlayout')

@section('content')
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Admin Dashboard</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

        </div>

        <section class="container-fluid hover-none">
            @if (Session::has('messageType') && Session::has('message'))
                @if (Session::get('messageType') === 'success')
                    <div class="alert alert-success" id="success-alert">
                        {{ Session::get('message') }}
                    </div>
                @elseif (Session::get('messageType') === 'error')
                    <div class="alert alert-danger" id="error-alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
            @endif
            <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="d-flex justify-content-end align-items-center">
                                    @if(count($customerslist) > 0)
                                    <a data-bs-toggle="tooltip" href="{{ route('customer.csv') }}" class="mr-2" data-bs-placement="top" title="Excel">

                                            <img src="{{ asset('admin/assets/images/icons/excel.svg') }}" alt="Excel">
                                        </a>
                                    @endif
                                    <a href="{{ route('customers.create') }}" class="btn btn-primary">Add</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(count($customerslist) > 0)
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Id</th>
                                            <th scope="col" class="text-center">Name</th>
                                            <th scope="col" class="text-center">Email</th>
                                            <!-- <th scope="col" class="text-center">Phone Number</th> -->
                                            <th scope="col" class="text-center">Premium Amount</th>
                                            <th scope="col" class="text-center">GST</th>
                                            <th scope="col" class="text-center">Total Premium Amount</th>
                                            <th scope="col" class="text-center">Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach ($customerslist as $customers)
                                        <tr id="customer-row-{{$customers->id}}">
                                            <th scope="row" class="text-center">{{$i}}</th>
                                            <td class="text-center">{{$customers->name}}</td>
                                            <td class="text-center">{{$customers->email}}</td>
                                            <!-- <td class="text-center">{{$customers->phonenumber}}</td> -->
                                            <td class="text-center">{{$customers->premiumamount}}</td>
                                            <td class="text-center">{{$customers->gstpercent}}</td>
                                            <td class="text-center">{{$customers->totalpremiumcollected}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary mt-2" href="{{ route('customers.edit', $customers->id) }}">Edit</a>
                                                <a class="btn btn-danger mt-2" onclick="deletecustomer('{{ $customers->id }}')" >Delete</a>   
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            @else
                                <div>No Record Found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function deletecustomer(id) {
                // console.log('id',id);
                Swal.fire({
                    title: "Are you sure you want to delete this item?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    allowOutsideClick: false,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        var url = "{{ route('customers.destroy', ':id') }}";
                        url = url.replace(':id', id);

                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                //  console.log('data',data);
                                
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Customer has been moved to trash.",
                                    icon: "success"
                                }).then(() => {
                                    // Remove the table row
                                    $('#customer-row-' + id).remove();
                                });
                            },
                            error: function (error) {
                                console.error("Error deleting customer:", error);
                                Swal.fire({
                                    title: "Error",
                                    text: "Already selected in another section.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            }
        </script>
@endsection

