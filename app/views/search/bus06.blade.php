{{HTML::style('css/bus06.css')}}
<div ng-controller="PaymentController as vm">
			
			<div class="pagos">
				<div class="tarjetas">
					<div class="pais">
						<label for="tags">Pais de procedencia:</label>
						<label><input type="text" id="tags"></label>	
					</div>				
				</div>
				<div class="informacion">
					<!--div.campos*11>(div.txt>label)+(div.inf>input)-->
					<div class="visa">
						<div class="campos">
							<div class="txt"><label >Numero de Tarjeta: </label></div>
							<div class="inf"><input type="text"></div>
						</div>
						<div class="campos">
							<div class="txt"><label >Fecha de Expiracion: </label></div>
							<div class="inf"><input type="text" id="month" placeholder="Mes"> <input type="text" id="year" placeholder="Año"></div>
						</div>
						<div class="campos">
							<div class="txt"><label >Codigo de Verificacion: </label></div>
							<div class="inf"><input type="text"></div>
						</div>
						<div class="campos">
							<div class="txt"><label>Nombre del titular: </label></div>
							<div class="inf"><input type="text"></div>
						</div>
						<div class="campos">
							<div class="txt"><label>Apellido del titular: </label></div>
							<div class="inf"><input type="text"></div>
						</div>
						<div class="campos">
							<div class="txt"><label>Direccion: </label></div>
							<div class="inf"><input type="text"></div>
						</div>
						<div class="campos">
							<div class="txt"><label>Pais: </label></div>
							<div class="inf"><input type="text"></div>
						</div>
						<div class="campos">
							<div class="txt"><label>Codigo Postal: </label></div>
							<div class="inf"><input type="text"></div>
						</div>
					</div>
				</div>
			</div>	
			<div class="final">
				<h4>Detalle del pago</h4>
				<div class="card"><label class="cambio"></label><label> <% vm.sub_total | currency:"USD$":2 %></label></div>
				<div class="card"><label >Impuesto</label><label><% vm.total_taxes | currency:"USD$":2 %></label></div>
				<br>
				<div class="card"><label>Total a pagar</label><label><% vm.total | currency:"USD$":2 %></label></div>

				<button ng-click="vm.pay()">Pagar</button>
			</div>
			
</div>