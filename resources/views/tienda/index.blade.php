@extends('layouts.dashboard')

@section('content')

{{-- alertas --}}
@include('dashboard.componentView.alert')

{{-- style page --}}
@push('page_css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/wizard.css')}}">
<style>
    #steps-uid-0 div.actions.clearfix ul li.disabled a {
    display: none;
}
    .app-content .wizard > .actions > ul > li > a {
    background: #02E9FE;
    font-weight: 600;
    border-radius: 4px !important;
    text-transform: uppercase;
    padding: 10px 20px;
    margin-top: 40px;
}
</style>
@endpush

{{-- script vendor --}}
@push('vendor_js')
<script src="{{asset('app-assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endpush

<section id="columns">
    <div class="row">


        
        <div class="col-4">
                <div class="card">
                    <div class="card-content">
                        <img class="" src="https://images-na.ssl-images-amazon.com/images/I/81blwMhVV8L._AC_SL1500_.jpg" height="250" width="300" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title float-right">$562.23</h4>
                            <h4 class="card-title">⭐⭐⭐⭐⭐</h4>
                            <br>
                            <h6 class="card-title small font-weight-medium">Lorem ipsu dolor item</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        <a href="#" class="col-12 btn btn-lg btn-success waves-effect waves-light"><i class="feather icon-shopping-cart mr-1"></i> Comprar</a>
                    </div>
                </div>
        </div>



        <div class="col-4">
                <div class="card">
                    <div class="card-content">
                        <img class=" " src="https://phonesdata.com/files/models/Apple--iPhone-11-134.png" height="250" width="250" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title float-right">$365.48</h4>
                            <h4 class="card-title">⭐⭐⭐⭐⭐</h4>
                            <br>
                            <h6 class="card-title small font-weight-medium">Lorem ipsu dolor item</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        <a href="#" class="col-12 btn btn-lg btn-success waves-effect waves-light"><i class="feather icon-shopping-cart mr-1"></i> Comprar</a>
                    </div>
                </div>
        </div>


        <div class="col-4">
                <div class="card">
                    <div class="card-content">
                        <img class=" " src="https://images-eu.ssl-images-amazon.com/images/I/41S3vnwFogL.jpg" height="250" width="300" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title float-right">$135.14</h4>
                            <h4 class="card-title">⭐⭐⭐⭐⭐</h4>
                            <br>
                            <h6 class="card-title small font-weight-medium">Lorem ipsu dolor item</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        <a href="#" class="col-12 btn btn-lg btn-success waves-effect waves-light"><i class="feather icon-shopping-cart mr-1"></i> Comprar</a>
                    </div>
                </div>
        </div>



    </div>
</section>
{{-- modales --}}
{{-- @include('tienda.modalCompra') --}}
{{-- @include('tienda.modalCupon') --}}

@push('custom_js')
<script>
    var form = $(".steps-validation").show();
    $(".steps-validation").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: 'Invertir',
            next: 'Siguiente',
            previous: 'Atras'
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            form.submit()
        }
    });

    // Initialize validation
    $(".steps-validation").validate({
        ignore: 'input[type=hidden]', // ignore hidden fields
        errorClass: 'danger',
        successClass: 'success',
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        rules: {
            email: {
                email: true
            }
        }
    });
</script>
@endpush

<script>
    function medidas() {
        let medida = $('#inversion').val();
        $('#medida').text(medida)
    }

    function detalles(product) {
        product = JSON.parse(product)
        let inversion = $('#inversion').val()
        $('.enable').attr('disabled', false)
        $('#product'+product.ID).attr('disabled', true)
        $('#idproducto').val(product.ID)
        $('#title2').val(product.post_title)
        $('#price2').val(product.meta_value)
    }

</script>

@endsection