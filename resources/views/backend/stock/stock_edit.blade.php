@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Modifier un médicament </h4><br><br>



            <form method="post" action="{{ route('stock.update') }}" id="myForm" >
                @csrf

                <input type="hidden" name="id" value="{{ $stock->id }}">

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> Nom </label>
                <div class="form-group col-sm-10">
                    <input name="nom" class="form-control" value="{{ $stock->nom }}" type="text"    >
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> Dosage </label>
                <div class="form-group col-sm-10">
                    <input name="dosage" class="form-control" value="{{ $stock->dosage }}" type="text"    >
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> Type </label>
                <div class="form-group col-sm-10">
                    <input name="type" class="form-control" value="{{ $stock->type }}" type="text"    >
                </div>
            </div>
            <!-- end row -->


            
  <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Prix </label>
                <div class="form-group col-sm-10">
                    <input name="prix" value="{{ $stock->prix }}" class="form-control" type="text"  >
                </div>
            </div>
            <!-- end row -->

<div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label"> Date d'expiration </label>
    <div class="form-group col-sm-10">
        <input name="date_exp" value="{{ $stock->date_exp }}" class="form-control" type="text"  >
    </div>
</div>
<!-- end row -->


<div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label">In QTE </label>
    <div class="form-group col-sm-10">
        <input name="qte_stock" value="{{ $stock->qte_stock }}" class="form-control" type="number"  >
    </div>
</div>
<!-- end row -->





<input type="submit" class="btn btn-info waves-effect waves-light" value="Modifier">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                nom: {
                    required : true,
                }, 
                dosage: {
                    required : true,
                }, 
                type: {
                    required : true,
                }, 
                prix: {
                    required : true,
                },
                date_exp: {
                    required : true,
                },
                qte_stock: {
                    required : true,
                },
            },
            messages :{
                nom: {
                    required : 'Veillez Saisir Le Nom Du Médicament',
                },
                dosage: {
                    required : 'Veillez Saisir Le Dosage Du Médicament',
                },
                type: {
                    required : 'Veillez Saisir Le Type Du Médicament',
                },
                prix: {
                    required : 'Veillez Saisir Le Prix Du Médicament',
                },
                date_exp: {
                    required : "Veillez Saisir La Date D'expiration Du Médicament",
                },
                qte_stock: {
                    required : 'Veillez Saisir La Quantité Du Stock Du Médicament',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>



@endsection 