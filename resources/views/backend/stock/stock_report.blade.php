@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Gestion Du Stock</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{route('stock.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">ajouter au stock </a> <br> <br>               

                    <h4 class="card-title">Liste Des Médicaments</h4>
                    <br> 

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nom</th> 
                            <th>Dosage</th> 
                            <th>Type</th> 
                            <th>Prix </th>
                            <th>Date D'expiration</th> 
                            <th>in QTY</th>
                            <th>Out QTY</th>
                            <th>Quantité du stock</th>

                            <th>Action</th>

                        </thead>



                      
                        <tbody>

                        	@foreach($stocks as $key => $item)
 @php                           
$buying_total = App\Models\Purchase::where('product_id',$item->id)->sum('buying_qty');
$qty_final_stock = $item->qte_stock - $buying_total;
@endphp

                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item->nom }} </td> 
                            <td> {{ $item->dosage }} </td> 
                            <td> {{ $item->type }} </td> 
                            <td> {{ $item->prix }} </td> 
                            <td> {{ $item->date_exp }} </td> 
                            <td><span class="btn btn-success"> {{ $item->qte_stock }}</span> </td> 
                            <td><span class="btn btn-info"> {{ $buying_total }}</span> </td> 
                            <td> <span class="btn btn-danger">{{$qty_final_stock}}</span>  </td> 

                            <td>
    <a href="{{ route('stock.edit',$item->id) }} " class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

    <a href="{{ route('stock.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection