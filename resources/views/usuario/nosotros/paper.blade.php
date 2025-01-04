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
  margin-top: 120px
}


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
  margin: 15px 10px;

}

/*
.container {
  margin-bottom: 20px;
  display: flex;
  flex-direction: column;
  
}
*/


.title {
 /* display: flex;
  flex-direction: column;  */
  display: block;
  text-align: center;
  align-items: center;
  margin-bottom: 10px;
}

.title-line {
  width: 100%;
  height: 2px;
  background-color: #2078bf;
}

.paper-title {
  font-size: 30px;
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
  max-width: 920px;
}

.abstract-container {
  text-align: left;
  margin: 20px 0;
  padding: 20px;
  border-radius: 10px;
  width: 90%;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #4d4d4d;
  max-width: 1000px;
  background-color: rgb(249, 245, 245, 0.7);
}

.abstract-container p{
  margin: 10px 0;
}

.abstract-container strong {
  color: #686868;
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

.pdf-frame {
  width: 100%;
  max-width: 1000px;
  margin: 20px 0;
  height: 800px;
}

.cards {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  width: 90%;
  max-width: 1000px;
  margin-top: 20px;
}

.cards h3{
  color: #0e72c4;
  font-size: 20px;
  margin: 5px 20px;
}

.card-item {
  text-align: left;
  flex: 1;
  padding: 20px 40px;
  background-color: #f8f8f8;
  border: 1px solid rgb(114, 114, 114,0.7);
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

   .cards h3{
    font-size: 14px;
   }
   .card-item{
    font-size: 12px;
   }

   .pdf-frame{
    max-width: 500px;
   }

   .paper-title{
    font-size: 20px;
   }

   .header-content{
    font-size: 12px;
   }

   .abstract-container{
    font-size: 14px;
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

.social-link:first-child{
  padding: 12px;
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
        <div class="title">
          
          <!--Solucionar problema con contenedor header -->
          <h1 class="paper-title">{{$paper->titulo}}</h1>
          <div class="title-line"></div>
        </div>
      
        <div class="header-content">
    <!--      <div class="container"> -->
           
            <div class="additional-info">
              <p><strong>Autor publicación: </strong>{{ $paper->formatted_autores }}</p>
              <p><strong>Fecha: </strong>  {{$paper->fecha_publicacion}}</p>
            </div>
    <!--      </div>           -->
            <div class="social-links-container">
  

              <a href="#"  target="_blank" class="social-link">
               <svg viewBox="0 0 24 24" height="24px" width="24px"  fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=fill"> <g id="share"> <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M15.8358 16.1305L9.02549 12.1985L8.27549 13.4976L15.0858 17.4295L15.8358 16.1305Z" fill="#000000"></path> <path id="vector (Stroke)_2" fill-rule="evenodd" clip-rule="evenodd" d="M15.8358 7.8656L9.02549 11.7976L8.27549 10.4985L15.0858 6.56657L15.8358 7.8656Z" fill="#000000"></path> <path id="Vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M17.85 9.14961C19.5896 9.14961 21 7.73931 21 5.99961C21 4.25991 19.5896 2.84961 17.85 2.84961C16.1103 2.84961 14.7 4.25991 14.7 5.99961C14.7 7.73931 16.1103 9.14961 17.85 9.14961ZM9.3 11.9936C9.3 13.7333 7.8897 15.1436 6.15 15.1436C4.4103 15.1436 3 13.7333 3 11.9936C3 10.2539 4.4103 8.84363 6.15 8.84363C7.8897 8.84363 9.3 10.2539 9.3 11.9936ZM21 17.9959C21 16.2562 19.5896 14.8459 17.85 14.8459C16.1103 14.8459 14.7 16.2562 14.7 17.9959C14.7 19.7356 16.1103 21.1459 17.85 21.1459C19.5896 21.1459 21 19.7356 21 17.9959Z" fill="#000000"></path> </g> </g> </g></svg>              
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
          {{$paper->descripcion}}
        </p>
        <p><strong>Autores:</strong> {{ $paper->formatted_autores }}</p>
        <p><strong>Área:</strong> {{ $paper->area }}</p>
        <p><strong>Fecha Publicación:</strong>{{ $paper->fecha_publicacion}}</p>
        <p><strong>Publisher:</strong> {{ $paper->publisher }}</p>
        <div class="doi">
          <p><strong>DOI:</strong> <a href="">{{ $paper->doi }}</a></p>        
        </div>
      </div>
    
      <iframe class="pdf-frame" src="{{ Storage::disk('pdfs')->url($paper->pdf_filename) }}" alt="Main Image" >
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