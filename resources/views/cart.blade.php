@extends('layouts.app')

@section('title', 'Carts')

@section('styles')

@endsection

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products List of Cart</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                @if(count($products)==0)
                                    <tr>Nothing Added to The Cart</tr>
                                @endif
                                @if(count($products)>0)
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td><img src="{{$product->options['img']}}"   width='70' class='img-thumbnail' /></td>
                                        <td>{{$product->price}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <a href="{{route('checkOut')}}" class="btn btn-primary">Checkout</a>
                            @endif
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="/theme/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/theme/plugins/jszip/jszip.min.js"></script>
    <script src="/theme/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/theme/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/theme/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/theme/js/adminlte.min.js"></script>
    <!-- Page specific script -->
@endsection
