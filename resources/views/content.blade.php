@extends("welcome")
@section("content")
<div id="parteadejos">
	
		
        <div id="parteadreapta" >
                <div class="imagprin  ridicat">
                    <img class="continutimagine " src="../public/imag/imgbackground.jpg">

                </div>
                <div class="formasiceamainouanoutate ridicat color">
                        <div class="infojos color">
                                <h3 class="noutatiantet">Delicious Pizza</h3>
                                <span>Specific: Pizza <br>
                                    Livrare: 15 lei in tot orasul <br>
                                    Timp de servire: 45 minute de la preluarea comenzii <br>
                                    Orar: Luni - Joi 11:00- 23:00 <br>
                                    Sambata: 11:00 - 01:00 <br>
                                    Duminica: 13:00 - 11:00 <br>
                                </span>
                                <p class="readme" style="text-color:blank;" ><a href="{{URL("info")}}"> mai mult...</p> </a>
                        </div>
                        <div class="color telefon ">

                                    <span > <strong> <br> Numarul de telefon fix </strong> <br> <br> </span>
                                        <span>0299-23-149</span>
                                        <h4>Numarul de telefon mob. 1</h4>
                                        <span> 060-235-157 </span>
                                          <h4>Numarul de telefon mob. 2</h4>
                                          <span> 079-148-489 <br></span>

                        </div>
                </div>

                      

        </div>

        <div class="parteastinga color ridicat">
                <div class="noutati">
                       
                           <h3 class="noutati">Noutati si Evenimente</h3>
				<div >
					
                                        <span> <hr>  Daca dati comanda de 5 pizza livrarea este gratis 
					</span>
					<span> <hr>  Daca comandati 7 pizza 1 este gratis
					</span>
                                         
				</div>



                                <hr>
                        </div>					
                </div>
        </div>

@endsection