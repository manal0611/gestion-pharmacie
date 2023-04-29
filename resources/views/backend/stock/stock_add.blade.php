@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            {{-- show errors if they exist --}}
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <span>{{$error}}</span>
                @endforeach
            </div>
            @endif
            {{-- end show errors --}}
            

            <h4 class="card-title">Alimentation Du Stock </h4><br><br>


            <form method="post" action="{{ route('stock.store') }}" id="myForm" >
                @csrf

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"> Nom du médicament </label>
                    <div class="form-group col-sm-10">
                    <input name="nom" class="form-control" type="text"    >
                    </div>
                </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> Dosage </label>
                <div class="form-group col-sm-10">
                <input name="dosage" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"> Type</label>
                <div class="form-group col-sm-10">
                <input name="type" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->

           
              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Prix </label>
                <div class="form-group col-sm-10">
                <input name="prix" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->


             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Date d'expiration  </label>
                <div class="form-group col-sm-10">
                    <input name="date_exp" class="form-control" type="text"  >
                </div>
            </div>
            <!-- end row -->


             <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">In QTE </label>
                <div class="form-group col-sm-10">
                <input name="qte_stock" class="form-control" type="number"  >
                </div>
            </div>
            <!-- end row -->





<input type="submit" class="btn btn-info waves-effect waves-light" value="ajouter au stock">
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
                    required : 'Veillez Entrer Le Nom Du Médicament',
                },
                dosage: {
                    required : 'Veillez Entrer Le Dosage Du Médicament',
                },
                type: {
                    required : 'Veillez Entrer Le Type Du Médicament',
                },
                prix: {
                    required : 'Veillez Entrer Le prix Du Médicament',
                },
                date_exp: {
                    required : "Veillez Entrer La Date D'expiration Du Médicament",
                },
                qte_stock: {
                    required : 'Veillez Entrer La Quantité Du Médicament',
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