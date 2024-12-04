

@extends('usuario.layout.plantilla')

@section('title', 'paper')


@section('contenido')

<style>
.Nosotros {
    width: 100%;
    padding: 20px;
    margin-top: 150px
}

.main-title {
    display: flex;
    flex-direction: column;
    align-items: center;

    gap: 10px;
    margin: 20px;
}

.main-title .blue-line{
   width: 20%;
   height: 2px;
    background: #2371d4;
}

.title {
    font-size: 30px;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    color: #2e5382;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}


.Group31 {
    text-align: center;
}

.btn-publicaciones {
    background: #98c560;
    color: white;
    font-size: 21px;
    font-weight: 700;
    padding: 15px 30px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    align-items: center;
}


.card {
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 380px;
    background: white;
    box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.25);
    border-radius: 6px;
}

.image {
    height: 200px;
    background: #d9d9d9;
    border-radius: 6px 6px 0 0;
}

.content {
    padding: 15px;
}

.titulo {
    font-size: 24px;
    font-weight: 500;
    margin-bottom: 10px;
}

.doi {
    font-size: 15px;
    margin-bottom: 10px;
}

.doi-link {
    text-decoration: underline;
    color: black;
}

.autores {
    font-style: italic;
    font-size: 18px;
    margin-bottom: 15px;
}

.descripcion {
    font-size: 17px;
    margin-bottom: 15px;
    text-align: justify;
}

.detalles {
    font-size: 20px;
    color: #f4f5f4;
    font-style: italic;
    font-weight: 700;
    background-color: #98c560;
    padding: 20px;
    display: block;

}

.detalles:hover{
    background-color: #66b308;
    cursor: pointer;
    transition: all 0.4s ease-out allow-discrete;
}


@media (max-width: 768px) {
    .cards {
        flex-direction: column;
        align-items: center;
    }

    .card {
       max-width: 80%; 
    }

    .doi-link{
        font-size: 12px;
    }
}

</style>
<div class="Nosotros">
 
        
    <div class="main-title">
       
        <div class="title">Publicaciones-papers</div>
        <div class="blue-line"></div>
    </div>
  
    <div class="container cards">
      
      <div class="card">
        <img class="image">
        <div class="content">
          <h3 class="titulo">Titulo:</h3>
          
          <p class="autores">AUTORES: autor 1, autor 2</p>
          <p class="descripcion">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Sed
          </p>
          <p class="doi">
            DOI: <span class="doi-link">10.1109/INTERCON52678.2021.9532881</span>
          </p>
         
        </div>
        <a class="detalles">
          Más detalles ->

        </a>
      </div>
  
    
      <div class="card">
        <img class="image">
        <div class="content">
          <h3 class="titulo">Titulo:</h3>
         
          <p class="autores">AUTORES: autor 1, autor 2</p>
          <p class="descripcion">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Sed
          </p>
          <p class="doi">
            DOI: <span class="doi-link">10.1109/INTERCON52678.2021.9532881</span>
          </p>
        </div>
        <a class="detalles">
          Más detalles ->

        </a>
      </div>

      <div class="card">
        <img class="image">
        <div class="content">
          <h3 class="titulo">Titulo:</h3>
         
          <p class="autores">AUTORES: autor 1, autor 2</p>
          <p class="descripcion">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Sed
          </p>
          <p class="doi">
            DOI: <span class="doi-link">10.1109/INTERCON52678.2021.9532881</span>
          </p>
        </div>
        <a class="detalles">
          Más detalles ->

        </a>
      </div>
    </div>
    <div class="container">
     
        <div class="Group31">
          <button class="btn-publicaciones">VER PUBLICACIONES</button>
        </div>
      </div>
  </div>
  
@endsection