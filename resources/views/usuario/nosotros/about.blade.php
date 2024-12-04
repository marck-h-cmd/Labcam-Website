@extends('usuario.layout.plantilla')

@section('title', 'sobre-nosotros')

@push('styles')
   
    @vite('resources/css/about.css') 
@endpush

@section('contenido')

<!--Temporal-->
<style>
    *{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

.about-section {
    width: 100%;
   /* padding: 20px; */
    display: flex;
    flex-direction: column;
    gap: 40px;
    background: white;
    margin-top: 150px
}

.description-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column; 
    padding: 10px;
}


.description {
    max-width: 800px;
    font-size: 20px;
    font-family: 'Inter', sans-serif;
    font-style: italic;
    font-weight: 300;
    color: black;
    text-align: center; 
}

.heading {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

.blue-line {
    width: 30%;
    height: 2px;
    background: #2371d4;
}

.heading-title {
    font-size: 36px;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    color: #2e5382;
}

.vision, .mission {
    display: flex;
    flex-direction: row;
    justify-content:space-evenly;
    align-items: center;
    gap: 10%;
    padding: 20px;
   /* flex-wrap: wrap; */
}

.vision{
    background-color: #F9F5F5;
}

.content {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin: 10px;
}

.title {
    font-size: 24px;
    font-family: 'Inria Serif', serif;
    font-style: italic;
    font-weight: 700;
    color: #2b07f5;
    margin-left: 10px;
}

.line {
    width: 150px;
    height: 2px;
    background: #538cf8;
}

.text {
    font-size: 20px;
    font-family: 'Inter', sans-serif;
    font-style: italic;
    font-weight: 300;
    color: black;
}

.image-main, .image-highlight, .image-gallery {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 20px 10px;
}




@media (max-width: 768px) {
    .vision, .mission {
        flex-direction: column;
        align-items: center;
    }

    .vision{
        flex-direction: column-reverse;
    }

    .content {
        text-align: center;
    }

    .mission-line{
        justify-content: center;
        
    }
}


    </style>
<div class="about-section">

<div class="heading">

    <div class="heading-title">Labcam</div>
    <div class="blue-line"></div>
</div>
<div class="description-container">
    <div class="description">
        Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad
        mauris est parturient varius molestie condimentum eleifend sit.
        Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad
        mauris est parturient varius molestie condimentum eleifend sit.
        Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad
        mauris est parturient varius molestie condimentum eleifend sit.
    </div>
</div>



<div class="vision">
    <img class="image-main" src="https://via.placeholder.com/459x291" alt="Main Image" />
    <div class="content">
        <div class="title">Visión</div>
        <div class="line"></div>
        <div class="text">
            Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at.
            Ad
            mauris est parturient varius molestie condimentum eleifend sit.
            Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at.
            Ad
            mauris est parturient varius molestie condimentum eleifend sit.
        </div>
    </div>


</div>

<div class="mission">

    <div class="content">
        <div class="title">Misión</div>
        <div class="line"></div>
        <div class="text">
            Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at.
            Ad
            mauris est parturient varius molestie condimentum eleifend sit.
            Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at.
            Ad
            mauris est parturient varius molestie condimentum eleifend sit.
            Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at.
            Ad
            mauris est parturient varius molestie condimentum eleifend sit.
        </div>
    </div>
    <img class="image-highlight" src="https://via.placeholder.com/459x291" alt="Highlighted Image" />

</div>

<div class="heading">

    <div class="heading-title">Nuestro Grupo</div>
    <div class="blue-line"></div>
</div>

<div class="description-container">
    <div class="description">
        Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad
        mauris est parturient varius molestie condimentum eleifend sit.
        Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad
      
    </div>

    <img class="image-gallery" src="https://via.placeholder.com/600x291" alt="Highlighted Image">
</div>
</div>
@endsection