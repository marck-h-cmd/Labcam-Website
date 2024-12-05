@extends('usuario.layout.plantilla')

@section('title', 'paper')


@section('contenido')

<style>
.nosotros-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    padding: 20px;
    background: white;
    margin-top: 150px
}

.main-title {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.main-title .blue-line{
   width: 80%;
}

.title {
    font-size: 30px;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    color: #2e5382;
}


.subtitle{
    display: block;
}
.blue-line {
    width: 150px;
    height: 2px;
    background: #2371d4;
}



.sub-text{
    font-size: 24px;
    font-family: 'Inter', sans-serif;
    font-weight: 400;
    color: #30588b;
    margin-left: 20px;
}

.content-section {
    display: flex;
    flex-direction: column;
    gap: 20px;
    max-width: 800px;
    text-align: left;
}

.text-content {
    font-family: Inter, sans-serif;
    font-size: 20px;
    font-style: italic;
    font-weight: 300;
    color: black;
    word-wrap: break-word;
    margin-top: 5px;
}

.separator {
    width: 100%;
    height: 2px;
    background: #2371D4;
}

.social-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.icon-container {
    display: flex;
    gap: 10px;
}

.footer-text {
    text-align: center;
    font-size: 18px;
    font-weight: 700;
    color: white;
    background: #2462B2;
    padding: 10px;
}

.image-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}

.image-section img {
    max-width: 100%;
    height: auto;
}

.explore-button {
    background: #98C560;
    border-radius: 5px;
    color: white;
    font-family: Inter, sans-serif;
    font-weight: 700;
    padding: 10px 20px;
    text-align: center;
    cursor: pointer;
}

/*
slider
*/

.slider {
    border: solid 1px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    background-color: #fff;
    min-height: 375px;
    width: 622px;
    position: relative;
    overflow: hidden;
    box-sizing: border-box;
    text-align: center;
    margin: 0 auto;
}

.slider .slider-item {
    position: absolute;
    visibility: hidden;
    padding: 10px;
}

.slider .slider-item:nth-of-type(1) {
    visibility: visible;
}

.slider .slider-item:nth-of-type(1)>* {
    opacity: 1;
}

.slider .slider-item img {
    margin-bottom: 6px;
}

.slider .slider-item img:hover {
    opacity: 0.5 !important;
}

.slider .slider-item>* {
    opacity: 0;
    transition: all 0.5s;
}

.slider input[type=radio] {
    cursor: pointer;
    position: relative;
    margin: 12px 0;
}

.slider input[type=radio]:before {
    content: '';
   
    float: left;
    height: 100%;
    width: 100%;
    transition: all 0.5s;
}

.slider input[type=radio]:checked~.slider-item {
    visibility: hidden;
}


.slider input[type=radio]:nth-of-type(1):checked~.slider-item:nth-of-type(1),
.slider input[type=radio]:nth-of-type(2):checked~.slider-item:nth-of-type(2),
.slider input[type=radio]:nth-of-type(3):checked~.slider-item:nth-of-type(3),
.slider input[type=radio]:nth-of-type(4):checked~.slider-item:nth-of-type(4) {
    visibility: visible;
}

.slider input[type=radio]:nth-of-type(1):checked~.slider-item:nth-of-type(1)>*,
.slider input[type=radio]:nth-of-type(2):checked~.slider-item:nth-of-type(2)>*,
.slider input[type=radio]:nth-of-type(3):checked~.slider-item:nth-of-type(3)>*,
.slider input[type=radio]:nth-of-type(4):checked~.slider-item:nth-of-type(4)>* {
    opacity: 1;
}

@media (max-width: 968px) {
   .slider{
    width: 422px;
    min-height: 325px;
   }
}



</style>

<div class="nosotros-container">

    <div class="main-title">
       
        <div class="title">Historia</div>
        <div class="blue-line"></div>
    </div>

    <div class="content-section">
      <p class="text-content">
        Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad mauris est parturient varius molestie condimentum eleifend sit. Parturient phasellus augue auctor conubia lacus netus sociosqu montes. Fusce mauris quisque nisl nisi nam per aenean. Aliquam montes euismod turpis in proin eleifend hac pharetra. Tempor mus curabitur interdum interdum sociosqu.
      </p>
     
      <div class="subtitle">
       
        <div class="sub-text">Subtitle 1</div>
        <div class="blue-line"></div>
    </div>

      <p class="text-content">
        Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad mauris est parturient varius molestie condimentum eleifend sit. Parturient phasellus augue auctor conubia lacus netus sociosqu montes. Fusce mauris quisque nisl nisi nam per aenean. Aliquam montes euismod turpis in proin eleifend hac pharetra.
      </p>

      <div class="subtitle">
       
        <div class="sub-text">Subtitle 1</div>
        <div class="blue-line"></div>
    </div>

      <p class="text-content">
        Lorem ipsum odor amet, consectetuer adipiscing elit. Felis eleifend nam convallis mus vehicula at. Ad mauris est parturient varius molestie condimentum eleifend sit. Parturient phasellus augue auctor conubia lacus netus sociosqu montes. Fusce mauris quisque nisl nisi nam per aenean. Aliquam montes euismod turpis in proin eleifend hac pharetra.
      </p>

      <div class="separator"></div>
    </div>

    <div class="image-section">
        <div class="slider">

            <input type="radio" name="nav" value="1">
            <input type="radio" name="nav" value="2">
            <input type="radio" name="nav" value="3">
            <input type="radio" name="nav" value="4">
    
              <div class="slider-item">
                  <img src="https://placehold.co/650x250" alt="Sport" />
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore a neque perspiciatis facere labore consequuntur.</p>
              </div>
              <div class="slider-item">
                  <img src="https://placehold.co/650x250/000000/FFFFFF/png" alt="Sport" />
                  <p>Cum, delectus, possimus facilis impedit blanditiis ullam distinctio. Hic, provident, magnam fuga non modi eos!</p>
              </div>
              <div class="slider-item">
                  <img src="https://placehold.co/650x250" alt="Sport" />
                  <p>A, asperiores facere laudantium voluptates eveniet eligendi non reprehenderit quae eum dolores sequi iste laborum.</p>
              </div>
              <div class="slider-item">
                  <img src="https://placehold.co/650x250/000000/FFFFFF/png" alt="Sport" />
                  <p>Ducimus, alias, aspernatur voluptatum facilis velit porro nesciunt error eos dicta doloribus perspiciatis odio itaque?</p>
              </div>
    
        </div>
      <div class="explore-button">Explorar más</div>
    </div>
  </div>
  


@endsection