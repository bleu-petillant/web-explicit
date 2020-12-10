@extends('layouts.head-home')
@section('ressources')

<section class="search-bar">

<h1 class="text-center text-white text-6xl font-bold"> Ressources</h1>

<div class="wrapper">
    <div class="search_box">
        
        <div class="search_field">
        <livewire:search />
          <!-- <input type="text" class="input" placeholder="Recherche"> -->
          <i class="fas fa-search"></i>
        </div>
        <div class="dropdown">
            <div class="default_option">Toute les catégories</div>  
            <ul>
              <li>Toute les catégories</li>
              <li>pdf</li>
              <li>video</li>
              <li>Podcast</li>
            </ul>
        </div>
    </div>

    
</div>

</section>

<section class="ressources-news contenu">
  <h2 class="font-bold text-5xl mt-4 mb-5 mx-8">Nouveautés</h2>

  <div class="flex mx-auto py-2 news-ressource-cards">

    <div class="video-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8 ">
        <a href="" >
                <img class="video-card card-image w-full h-40 object-cover" src="img/ressource/ress-5.jpg" alt="">
                <div class="mt-2 py-3 pl-2 video-card-content">
                    <p class="category video-color ">video</p>
                    <h3 class="card-title text-2xl font-bold">Titre</h3>
                    <p class="card-text">Détails sur la ressource</p>
                </div>
                <p class="text-center mt-5 mb-5"><a href="" class="video-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>
    </div>
    
    <div class=" podcast-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8">
        <a href="">   
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-2.jpg" alt="">
            <div class="mt-2 py-3 pl-2 podcast-card-content">
                <p class="category podcast-color ">podcast</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>
            <p class="text-center mt-5 mb-5"><a href="" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>      
    </div >       
    
    <div class="pdf-card card bg-white w-1/3 shadow-lg hover:shadow-xl mx-8">
        <a href="">
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-3.jpg" alt="">
            <div class="mt-2 py-3 pl-2 pdf-card-content">
                <p class="category pdf-color ">pdf</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>

            <p class="text-center mt-5 mb-5"><a href="" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
                
        </a>
    </div>      
            
  </div class=" py-2">

  <div class=" shadow md:flex bg-white rounded-xl p-8 md:p-0 mx-8">
 
    <img class="w-32 h-32 md:w-48 md:h-auto  rounded-l-lg " src="img/ressource/explicitation-book.jpg" alt="" width="384" height="512">
    <div class=" podcast-card-content p-6 ">

        <p class="category podcast-color ">Livre</p>
        <h3 class="card-title text-2xl font-bold">Titre de livre, Nom de l'auteur.</h3>
        <p class="text-lg ">
        Vestibulum ultricies, justo nec lacinia auctor, tellus massa efficitur metus, nec <br>
        tempor lectus augue eu nibh. Quisque eget nulla magna. 
        </p>
      
    </div>
    <!-- <a href="" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a> -->
</div>

</section>

<section class="all-ressources contenu">

<h2 class="font-bold text-5xl mt-4 mb-5 mx-8 text-right">Toute nos ressources</h2>


<div class="mx-8">
  <ul class="filters flex justify-around">
		<li><a  href="javascript:void(0);" data-filter="*">Tout</a></li>
		<li><a class="podcast-color" href="javascript:void(0);" data-filter="podcast">Podcast</a></li>
		<li><a class="video-color" href="javascript:void(0);" data-filter="video">video</a></li>
    <li><a class="pdf-color" href="javascript:void(0);" data-filter="pdf">pdf</a></li>
	</ul>
	<div id="container" class="isotope grid grid-rows-4 grid-flow-col gap-8">

    <!-- <div class="grid-item" data-filter="podcast"></div>

    <div class="grid-item" data-filter="podcast"></div>

    <div class="grid-item" data-filter="podcast" ></div>

    <div class="grid-item" data-filter="video" ></div>

    <div class="grid-item" data-filter="video"></div>

    <div class="grid-item" data-filter="video"></div>

    <div class="grid-item" data-filter="pdf " ></div>

    <div class="grid-item" data-filter="pdf" ></div> -->

		<div class=" grid-item podcast-card card bg-white shadow-lg hover:shadow-xl " data-filter="podcast">
      <a href="">   
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-2.jpg" alt="">
            <div class="mt-2 py-3 pl-2 podcast-card-content">
                <p class="category podcast-color ">podcast</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>
            <p class="text-center mt-5 mb-5"><a href="" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>    
    </div>

		<div class=" grid-item podcast-card card bg-white  shadow-lg hover:shadow-xl" data-filter="podcast">
      <a href="">   
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-2.jpg" alt="">
            <div class="mt-2 py-3 pl-2 podcast-card-content">
                <p class="category podcast-color ">podcast</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>
            <p class="text-center mt-5 mb-5"><a href="" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>    
    </div>

		<div class="grid-item podcast-card card bg-white  shadow-lg hover:shadow-xl " data-filter="podcast">
      <a href="">   
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-2.jpg" alt="">
            <div class="mt-2 py-3 pl-2 podcast-card-content">
                <p class="category podcast-color ">podcast</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>
            <p class="text-center mt-5 mb-5"><a href="" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>    
    </div>

		<div class="grid-item pdf-card card bg-white  shadow-lg hover:shadow-xl " data-filter="pdf">
      <a href="">
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-3.jpg" alt="">
            <div class="mt-2 py-3 pl-2 pdf-card-content">
                <p class="category pdf-color ">pdf</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>

            <p class="text-center mt-5 mb-5"><a href="" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
                
        </a>
    </div>

    <div class="  grid-item pdf-card card bg-white  shadow-lg hover:shadow-xl " data-filter="pdf">
      <a href="">
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-3.jpg" alt="">
            <div class="mt-2 py-3 pl-2 pdf-card-content">
                <p class="category pdf-color ">pdf</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>

            <p class="text-center mt-5 mb-5"><a href="" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
                
        </a>
    </div>

		<div class="grid-item video-card card bg-white  shadow-lg hover:shadow-xl " data-filter="video">
      <a href="" >
          <img class="video-card card-image w-full h-40 object-cover" src="img/ressource/ress-5.jpg" alt="">
          <div class="mt-2 py-3 pl-2 video-card-content">
              <p class="category video-color ">video</p>
              <h3 class="card-title text-2xl font-bold">Titre</h3>
              <p class="card-text">Détails sur la ressource</p>
          </div>
          <p class="text-center mt-5 mb-5"><a href="" class="video-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>
    </div>

    <div class="grid-item video-card card bg-white shadow-lg hover:shadow-xl " data-filter="video">
      <a href="" >
          <img class="video-card card-image w-full h-40 object-cover" src="img/ressource/ress-5.jpg" alt="">
          <div class="mt-2 py-3 pl-2 video-card-content">
              <p class="category video-color ">video</p>
              <h3 class="card-title text-2xl font-bold">Titre</h3>
              <p class="card-text">Détails sur la ressource</p>
          </div>
          <p class="text-center mt-5 mb-5"><a href="" class="video-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>
    </div>

    <div class=" grid-item podcast-card card bg-white shadow-lg hover:shadow-xl " data-filter="podcast">
      <a href="">   
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-2.jpg" alt="">
            <div class="mt-2 py-3 pl-2 podcast-card-content">
                <p class="category podcast-color ">podcast</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>
            <p class="text-center mt-5 mb-5"><a href="" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>    
    </div>

		<div class=" grid-item podcast-card card bg-white  shadow-lg hover:shadow-xl" data-filter="podcast">
      <a href="">   
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-2.jpg" alt="">
            <div class="mt-2 py-3 pl-2 podcast-card-content">
                <p class="category podcast-color ">podcast</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>
            <p class="text-center mt-5 mb-5"><a href="" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>    
    </div>

		<div class="grid-item podcast-card card bg-white  shadow-lg hover:shadow-xl " data-filter="podcast">
      <a href="">   
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-2.jpg" alt="">
            <div class="mt-2 py-3 pl-2 podcast-card-content">
                <p class="category podcast-color ">podcast</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>
            <p class="text-center mt-5 mb-5"><a href="" class=" podcast-button uppercase mx-auto tracking-wider">Lien</a></p>
        </a>    
    </div>

		<div class="grid-item pdf-card card bg-white  shadow-lg hover:shadow-xl " data-filter="pdf">
      <a href="">
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-3.jpg" alt="">
            <div class="mt-2 py-3 pl-2 pdf-card-content">
                <p class="category pdf-color ">pdf</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>

            <p class="text-center mt-5 mb-5"><a href="" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
                
        </a>
    </div>

    <div class="  grid-item pdf-card card bg-white  shadow-lg hover:shadow-xl " data-filter="pdf">
      <a href="">
            <img class=" card-image w-full h-40 object-cover" src="img/ressource/ress-3.jpg" alt="">
            <div class="mt-2 py-3 pl-2 pdf-card-content">
                <p class="category pdf-color ">pdf</p>
                <h3 class="card-title text-2xl font-bold">Titre</h3>
                <p class="card-text">Détails sur la ressource</p>
            </div>

            <p class="text-center mt-5 mb-5"><a href="" class="pdf-button uppercase mx-auto tracking-wider">Lien</a></p>
                
        </a>
    </div>

	


	</div>
</div>


</section>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script>
$(".default_option").click(function(){
  $(".dropdown ul").addClass("active");
});

$(".dropdown ul li").click(function(){
  var text = $(this).text();
  $(".default_option").text(text);
  $(".dropdown ul").removeClass("active");
});



</script>

@endsection
