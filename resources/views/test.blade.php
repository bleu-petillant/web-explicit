@extends('layouts.test')
@section('resources')

<section>


</section>

<script>

$(document).ready(function(){

    $('.grid').isotope({
        // options
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
        });



}

</script>

@endsection