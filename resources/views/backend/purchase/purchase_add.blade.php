@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title"> Ajouter une vente  </h4><br><br>

    <div class="row">
        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Date</label>
                 <input class="form-control example-date-input" name="date" type="date"  id="date">
            </div>
        </div>

        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Numero de la vente</label>
                 <input class="form-control example-date-input" name="purchase_no" type="text"  id="purchase_no">
            </div>
        </div>


        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Nom du produit </label>
                <select id="product_id" name="product_id" class="form-select" aria-label="Default select example">
                <option selected="">rechercher un produit</option>
                @foreach($stock as $product)
                <option value="{{ $product->id }}">{{ $product->nom }}</option>
               @endforeach
                </select>
            </div>
        </div>
  
       
 


        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Dosage du produit </label>
                <select name="dosage" id="dosage" class="form-select" aria-label="Default select example">
                <option selected="">Open this select menu</option>

                </select>
            </div>
        </div>

        
        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Type du produit </label>
                <select name="type" id="type" class="form-select" aria-label="Default select example">
                <option selected="">Open this select menu</option>

                </select>
            </div>
        </div>


        
        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Prix du produit </label>
                <select name="unit_price" id="unit_price" class="form-select" aria-label="Default select example">
                <option selected="">Open this select menu</option>

                </select>
            </div>
        </div>
       

     
        




        <div class="col-md-4">
            <div class="md-3">
                <label for="example-text-input" class="form-label" style="margin-top:43px;">  </label>
        
        
                <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore"> Ajouter</i>
            </div>
        </div>





    </div> <!-- // end row  -->
       </div> <!-- End card-body -->
{{-- ---------------------------------------- --}}

<div class="card-body">

    <form method="post" action="{{ route('purchase.store') }}">
        @csrf
        <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
            <thead>
                <tr>
                  
                    <th>Nom Du Produit </th>
                    <th>Dosage </th>
                    <th>Type </th>
                    <th>prix unitaire </th>
                    <th>quantité</th>
                    <th>prix total</th>
                    <th>Action</th> 

                </tr>
            </thead>

                   

            <tbody id="addRow" class="addRow">

            </tbody>

            <tbody>
                <tr>
                    <td colspan="5"></td>
                    <td>
                        <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;" >
                    </td>
                    <td></td>
                </tr>

            </tbody>   


                           
        </table><br>
        <div class="form-group">
            <button type="submit" class="btn btn-info" id="storeButton"> enregistrer</button>

        </div>

    </form>





</div>








    </div>
</div> <!-- end col -->
</div>



</div>
</div>






{{-- dosage --}}


<script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{ route('get-dosage') }}",
                type: "GET",
                data:{product_id:product_id},
                success:function(data){
                    var html = '<option value="">Selectionner dosage</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.dosage+'</option>';
                    });
                    $('#dosage').html(html);
                }
            })
        });
    });
</script>

{{-- type --}}

<script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{ route('get-type') }}",
                type: "GET",
                data:{product_id:product_id},
                success:function(data){
                    var html = '<option value="">Selectionner type</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.type+'</option>';
                    });
                    $('#type').html(html);
                }
            })
        });
    });
</script>




{{-- prix --}}

<script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{ route('get-price') }}",
                type: "GET",
                data:{product_id:product_id},
                success:function(data){
                    var html = '<option value="">selectionner prix</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.prix+'</option>';
                    });
                    $('#unit_price').html(html);
                }
            })
        });
    });
</script>










<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date[]" value="@{{date}}">
            <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">

            <td>
                <input type="hidden" name="product_id[]" value="@{{product_id}}">
                @{{ product_name}}

            </td>

            <td>
                <input type="hidden" name="dosage[]" value="@{{dosage}}">
                @{{ product_dosage}}
            </td>

            <td>
                <input type="hidden" name="type[]" value="@{{type}}">
                @{{ product_type}}

            </td>
    
     
            <td>
                <input type="number" class="form-control unit_price text-right" min="0" step="0.01" name="unit_price[]" value="">
                
            </td>
    
         
    
         <td>
            <input type="number" min="1" class="form-control buying_qty text-right" step="0.01"  name="buying_qty[]" value=""> 
        </td>
    
      
         <td>
            <input type="number" step="0.01" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly> 
        </td>
    
         <td>
            <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
        </td>
    
        </tr>
    
    </script>








    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on("click",".addeventmore", function(){
                var date = $('#date').val();
                var purchase_no = $('#purchase_no').val();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();
                var product_dosage = $('#dosage').find('option:selected').text();
                var product_type = $('#type').find('option:selected').text();



                    if(date == ''){
                    $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                     }
                    if(purchase_no == ''){
                    $.notify("Purchase No is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                     }
                      
                    if(product_id == ''){
                    $.notify("Product Field is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                     }
                     var source = $("#document-template").html();
                     var tamplate = Handlebars.compile(source);
                     var data = {
                         date:date,
                         purchase_no:purchase_no,
                         product_id:product_id,
                         product_name:product_name,
                         product_dosage:product_dosage,
                         product_type:product_type,

                     };

                     var html = tamplate(data);
                    $("#addRow").append(html); 
     
            });

            $(document).on("click",".removeeventmore",function(event){
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });
        

        $(document).on('keyup click','.unit_price,.buying_qty', function(){

            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.buying_qty").val();
            var total = unit_price * qty;
            $(this).closest("tr").find("input.buying_price").val(total);
            totalAmountPrice();
        });

        // Calculate sum of amout in invoice 

        function totalAmountPrice(){
            var sum = 0;
            $(".buying_price").each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length != 0){
                    sum += parseFloat(value);
                }
            });
            $('#estimated_amount').val(sum);
        }  


    });

        
    </script>


@endsection 