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
  margin: 10px;
  /*align-items: center; */
}


.header-content{
  display: flex;
  gap: 10px;
  justify-content: space-between;

}


.container {
  margin-bottom: 20px;
  display: flex;
  flex-direction: column;
  
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
  font-size: 14px;
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

.abstract-container p{
  margin: 10px 0;
}

.abstract-container strong {
  color: #585757;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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

.cards h3{
  color: #0e72c4;
  font-size: 20px;
  margin: 5px;
}

.card-item {
  text-align: left;
  flex: 1;
  padding: 20px 40px;
  background-color: #f8f8f8;
  border: 1px solid #545353;
  cursor: pointer;
}

.card-item.r{
  text-align: right;
}

.card-item:hover {

  background-color: #ebebeb;
  transform: ease-out all;
}

@media (max-width: 768px) {
   .header-content{
   flex-direction: column;
   }
}

.doi {
  margin-top: 20px;
}

.doi p {
  font-size: 14px;
}

.doi a {
  font-size: 14px;
  color: black;
  text-decoration: underline;
  
}

/*  icons */

.social-links-container {
  align-items:flex-end;
  display: flex;
  margin: 5px;
 
}

.social-link {
  background-color: rgba(20, 168, 212, 0);
  box-sizing: border-box;
  cursor: pointer;
  display: block;
  height: 50px;
  width: 50px;
}
.social-link:hover {
  transform: scale(1.1);
  transition: all 0.5s;
}
.social-link:hover .social-icon path {
  color: rgb(7, 121, 173);
  background: rgb(12, 32, 207);
  fill: rgb(31, 194, 172);
  transition: all 0.5s;
}




</style>


<div class="nosotros">

      <div class="header">
      
        <div class="header-content">
          <div class="container">
            <div class="title">
          
              <!--Solucionar problema con contenedor header -->
              <h1 class="paper-title">Titulo Paper</h1>
              <div class="title-line"></div>
            </div>
            <div class="additional-info">
              <p><strong>Autor publicación: </strong>Informacion adicional</p>
              <p><strong>Fecha: </strong>   M/D/Y</p>
            </div>
          </div>
            <div class="social-links-container">
  

              <a href="#" target="_blank" class="social-link">
                <svg  fill="#02dfe3" height="32px" width="32px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 458.624 458.624" xml:space="preserve" stroke="#02dfe3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M339.588,314.529c-14.215,0-27.456,4.133-38.621,11.239l-112.682-78.67c1.809-6.315,2.798-12.976,2.798-19.871 c0-6.896-0.989-13.557-2.798-19.871l109.64-76.547c11.764,8.356,26.133,13.286,41.662,13.286c39.79,0,72.047-32.257,72.047-72.047 C411.634,32.258,379.378,0,339.588,0c-39.79,0-72.047,32.257-72.047,72.047c0,5.255,0.578,10.373,1.646,15.308l-112.424,78.491 c-10.974-6.759-23.892-10.666-37.727-10.666c-39.79,0-72.047,32.257-72.047,72.047s32.256,72.047,72.047,72.047 c13.834,0,26.753-3.907,37.727-10.666l113.292,79.097c-1.629,6.017-2.514,12.34-2.514,18.872c0,39.79,32.257,72.047,72.047,72.047 c39.79,0,72.047-32.257,72.047-72.047C411.635,346.787,379.378,314.529,339.588,314.529z"></path></g></g></g></svg>
                
              </a>
              
          
              <a href="#" target="_blank" class="social-link">
                <svg class="social-icon" viewBox="0 0 30 30">
                  <path d="M16.108,8.215c-1.4,0-2.539,1.139-2.539,2.538v3.22h-1.715c-0.276,0-0.5,0.224-0.5,0.5s0.224,0.5,0.5,0.5h1.715v6.312
              c0,0.276,0.224,0.5,0.5,0.5s0.5-0.224,0.5-0.5v-6.312h2.425c0.276,0,0.5-0.224,0.5-0.5s-0.224-0.5-0.5-0.5h-2.425v-3.22
              c0-0.848,0.69-1.538,1.539-1.538c0.848,0,1.539,0.69,1.539,1.538c0,0.276,0.224,0.5,0.5,0.5s0.5-0.224,0.5-0.5
              C18.646,9.353,17.508,8.215,16.108,8.215z">
                    
                  </path>
                  
                </svg>
                
              </a>
                      
              <a href="#" target="_blank" class="social-link">
                <svg class="social-icon" viewBox="0 0 30 30">
                  <path d="M21.2,22.7H8.8c-0.8,0-1.5-0.7-1.5-1.5V8.8C7.3,8,8,7.3,8.8,7.3h12.4c0.8,0,1.5,0.7,1.5,1.5v12.4C22.7,22,22,22.7,21.2,22.7
                    z M8.8,8.2c-0.3,0-0.6,0.3-0.6,0.6v12.4c0,0.3,0.3,0.6,0.6,0.6h12.4c0.3,0,0.6-0.3,0.6-0.6V8.8c0-0.3-0.3-0.6-0.6-0.6H8.8z"></path><path d="M12,20.7H9.9c-0.2,0-0.4-0.2-0.4-0.4v-6.9c0-0.2,0.2-0.4,0.4-0.4H12c0.2,0,0.4,0.2,0.4,0.4v6.9C12.5,20.5,12.3,20.7,12,20.7
                    z M10.3,19.8h1.3v-6h-1.3V19.8z"></path>
                  <path d="M11,12.4c-0.8,0-1.5-0.7-1.5-1.5c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5C12.5,11.7,11.8,12.4,11,12.4z M11,10.2
                    c-0.4,0-0.6,0.3-0.6,0.6c0,0.4,0.3,0.6,0.6,0.6c0.4,0,0.6-0.3,0.6-0.6C11.6,10.5,11.3,10.2,11,10.2z"></path>
                  <path d="M20.1,20.7H18c-0.2,0-0.4-0.2-0.4-0.4v-3.4c0-1.1-0.1-1.4-0.7-1.4c-0.6,0-0.8,0.2-0.8,1.3v3.4c0,0.2-0.2,0.4-0.4,0.4h-2.2
                    c-0.2,0-0.4-0.2-0.4-0.4v-6.9c0-0.2,0.2-0.4,0.4-0.4h2.1c0.2,0,0.4,0.1,0.4,0.3c0.4-0.3,1-0.5,1.6-0.5c2.7,0,3,2,3,3.7v3.8
                    C20.6,20.5,20.4,20.7,20.1,20.7z M18.4,19.8h1.3l0-3.4c0-2.1-0.6-2.9-2.1-2.9c-0.9,0-1.4,0.5-1.6,0.9c-0.1,0.1-0.2,0.2-0.4,0.2
                    c-0.2,0-0.5-0.2-0.5-0.4v-0.5h-1.2v6h1.3v-3c0-0.5,0-2.2,1.7-2.2c1.6,0,1.6,1.5,1.6,2.3V19.8z"></path>
                </svg>
              </a>        
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
          <p><strong>DOI:</strong> <a href="#">10.1109/INTERCON52678.2021.9532881</a></p>        
        </div>
      </div>
    
      <!--
      <div class="action-buttons">
        <button class="btn btn-cita">DOCX</button>
        <button class="btn btn-pdf">PDF </button>
      </div>
    
    -->
      <iframe class="main-image" src="https://www.unilibrecucuta.edu.co/portal/images/investigacion/pdf/formato_papers.pdf" alt="Main Image" >
      </iframe>
    
      <div class="cards">
        <div class="card-item r">
          <h3>Titulo Paper anterior</h3>
          <p>paper anterior</p>
        </div>
        <div class="card-item">
          <h3>Titulo Paper siguiente</h3>
          <p> Paper siguiente</p>
        </div>
      </div>
    
     
    </div>

    @endsection