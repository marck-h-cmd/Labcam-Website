<?php $__env->startSection('title', 'sobre-nosotros'); ?>

<?php $__env->startPush('styles'); ?>
   
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/about.css'); ?> 
<?php $__env->stopPush(); ?>

<?php $__env->startSection('contenido'); ?>

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
    font-size: 16px;
    font-family: 'Inter', sans-serif;
    font-style: italic;
    font-weight: 300;
    color: black;
    /*text-align: center; */
    letter-spacing: 1px;
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
    justify-content:center;
    align-items: center;
    /*justify-items: center; */
    gap: 5%;
    padding: 20px;
   /* flex-wrap: wrap; */
   letter-spacing: 1px;
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
    font-size: 26px;
    font-family: 'Inter', sans-serif;
    font-weight: 700;
    color: #5185c9;
    margin-left: 10px;
}

.line {
    width: 150px;
    height: 2px;
    background: #538cf8;
}

.text {
    font-size: 16px;
    font-family: 'Inter', sans-serif;
    font-style: italic;
    font-weight: 300;
    color: black;
    max-width: 500px;
}

.image-main, .image-highlight, .image-gallery {
    
    border-radius: 10px;
    margin: 20px 10px;
}

.image-gallery{
    height: 491px;
    width: 700px;
}

.image-highlight{
   height: 350px; 
   width: 460px;
}

.image-main{
    height: 400px;
    width: 460px;
}

.text-heading{
  display: flex;
  flex-direction: column;
}



@media (max-width: 968px) {
    .vision, .mission {
        flex-direction: column;
        align-items: center;
    }

    .vision{
        flex-direction: column-reverse;
    }

    .content {
        text-align: center; 
        justify-content: center;
        letter-spacing: 1px;
    }

    .title {
        text-align: center;
    }

    .mission-line{
        justify-content: center;
        
    }
    .description {
        max-width: 85%; 
    }
    .about-section{
        font-size: 0.5em;
    }

    .image-gallery,.image-highlight,.image-main{
        max-width: 500px;
        height: auto;
    }

    .text-heading{
        align-items: center;
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
    <img class="image-main" src="/images/labcam-icon.png" alt="Main Image" />
    <div class="content">
        <div class="text-heading">
        <div class="title">Visión</div>
        <div class="line"></div>
        </div>
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
        <div class="text-heading">
        <div class="title">Misión</div>
        <div class="line"></div>
        </div>
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
    <img class="image-highlight" src="/user/template/images/carrusel/carrusel_02.jpg" alt="Highlighted Image" />

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

    <img class="image-gallery" src="/user/template/images/carrusel/carrusel_03.jpg" alt="Highlighted Image" >
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('usuario.layout.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CURSOS EXTRAS\PAGINA LABCAM\PROYECTO COMPARTIDO\Labcam-Website\resources\views/usuario/nosotros/about.blade.php ENDPATH**/ ?>