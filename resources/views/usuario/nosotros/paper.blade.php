@extends('usuario.layout.plantilla')

@section('title', 'biblioteca')



@section('contenido')

<style>
.nosotros {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: white;
  padding: 20px;
  margin-top: 150px
}
/*
.orgHeader {
  display: flex;
  flex-direction: column;
  align-items: flex-start; 
  justify-content: flex-start;
  text-align: left;
  width: 100%;
  background: #2f8ce4;
  color: #eee;
  padding: 2%;
}

.orgHeader h1 {
  font-size: 2em;
  text-transform: capitalize;
  margin-bottom: 2%;
}



.nav {
  width: 100%;
  list-style-type: none;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-start;
  justify-content: flex-start;
  text-align: center;
}

.nav li {
  width: auto;
  display: inline-block;
  padding: 2%;
  white-space: nowrap;
}

.nav li:hover{
  color: #1321da;
}

.nav li, .photos img {
  cursor: pointer;
}
  */

.header {
  display: flex;
  flex-direction: column;
  align-items: start;
  margin: 10px;
}



.header-content {
  margin-bottom: 20px;
  justify-content: left;
}



.title {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 10px;
}

.title-line {
  width: 100%;
  height: 2px;
  background-color: #2078bf;
}

.paper-title {
  font-size: 32px;
  color: #2e5382;
  margin: 10px 0;
}

.additional-info p {
  font-size: 18px;
  font-weight: 500;
  margin: 5px 0;
}

.header-image {
  border-radius: 10px;
  width: 100%;
  max-width: 913px;
}

.abstract-container {
  text-align: left;
  margin: 20px 0;
  padding: 20px;
  border-radius: 10px;
  width: 90%;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #4d4d4d;
  max-width: 1024px;
  background-color: rgb(249, 245, 245, 0.7);
}

.abstract-container strong {
  color: #5c5b5b;
}

.abstract-text {
  font-style: italic;
  font-weight: 300;
  margin: 10px 0;
}

.action-buttons {
  display: flex;
  gap: 10px;
  margin: 20px 0;
  justify-content: flex-end;

}

.btn {
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  color: white;
  font-size: 18px;
  cursor: pointer;
}

.btn-cita {
  background-color: #98c560;
}

.btn-pdf {
  background-color: #98c560;
}

.main-image {
  width: 100%;
  max-width: 1091px;
  margin: 20px 0;
  height: 800px;
}

.cards {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  width: 90%;
  max-width: 1024px;
  margin-top: 20px;
}

.r {
  text-align: right;
}

.card-item {
  text-align: left;
  flex: 1;
  padding: 10px;
  background-color: #f8f8f8;
  border: 1px solid #545353;
}

.card-item:hover {

  background-color: #ebebeb;
  transform: ease-out all;
}


.doi {
  margin-top: 20px;
}

.doi p {
  font-size: 18px;
}

.doi a {
  font-size: 18px;
  color: black;
  text-decoration: underline;
}

</style>


<div class="nosotros">

      <div class="header">
        <div class="header-content">
          <div class="title">
          
            <h1 class="paper-title">Titulo paper </h1>
            <div class="title-line"></div>
          </div>
          <div class="additional-info">
            <p><strong>Autor publicación: </strong>Informacion adicional</p>
            <p><strong>Fecha: </strong>   M/D/Y</p>
          </div>
        </div>
        <img class="header-image" src="https://via.placeholder.com/913x212" alt="Header Image" />
      </div>
    
      <div class="abstract-container">
        <h3>Abstract:</h3>
        <p class="abstract-text">
          Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad mauris est
          parturient varius molestie condimentum eleifend sit. Parturient phasellus augue auctor conubia lacus netus
          sociosqu montes. Fusce mauris quisque nisl nisi nam per aenean. Aliquam montes euismod turpis in proin eleifend
          hac pharetra. Tempor mus curabitur interdum interdum sociosqu.
          parturient varius molestie condimentum eleifend sit. Parturient phasellus augue auctor conubia lacus netus
          sociosqu montes. Fusce mauris quisque nisl nisi nam per aenean. Aliquam montes euismod turpis in proin eleifend
          hac pharetra. Tempor mus curabitur interdum interdum sociosqu.
        </p>
        <p><strong>Autores:</strong> autor 1, autor 2</p>
        <p><strong>Área:</strong> tema relacionado</p>
        <p><strong>Fecha Publicación:</strong> M/D/Y</p>
        <p><strong>Publisher:</strong> nombre publisher</p>
        <div class="doi">
          <p><strong>DOI:</strong></p>
          <a href="#">10.1109/INTERCON52678.2021.9532881</a>
        </div>
      </div>
    
      <div class="action-buttons">
        <button class="btn btn-cita">DOCX</button>
        <button class="btn btn-pdf">PDF </button>
      </div>
    
      <iframe class="main-image" src="https://www.unilibrecucuta.edu.co/portal/images/investigacion/pdf/formato_papers.pdf" alt="Main Image" >
      </iframe>
    
      <div class="cards">
        <div class="card-item r">
          <h3>Paper anterior</h3>
          <p>Titulo paper anterior</p>
        </div>
        <div class="card-item">
          <h3>Paper siguiente</h3>
          <p>Titulo paper siguiente</p>
        </div>
      </div>
    
     
    </div>

    @endsection