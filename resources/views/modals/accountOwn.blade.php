<!-- Modal -->
<div class="modal fade" id="ownModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titulomodal">Transferir a cuentas propias</h5>
            </div>
            
            <div class="modal-body">

                <div class="tile">
                    <div class="tile-body">
                        @if(Auth::user()->accounts->where('status','Activa')->count() <= 1)
                        <p>No puede realizar transacciones entre cuentas porque solo tienes una cuenta activa</p>
                        @else
                        <form id="ownTransfer" name="ownTransfer" method="POST">
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            <div class="form-group">
                                <div class="alert alert-dark" role="alert">
                                    <p class="text-white text-center" >Los campos con (*) son obligatorios</p>
                                </div>
                                <label class="control-label">Cuenta de Origen*</label>
                                <select class="form-control"  id="account_origin" name="account_origin" placeholder="Seleccione la cuenta" 
                                    required>
                                    <option value="0">Seleccione la cuenta de Origen</option>
                                    @foreach (Auth::user()->accounts->where('status','Activa') as $account)
                                        <option value="{{ $account->id }}"> {{ $account->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="alert alert-dark" id="originAlert" name="originAlert"  role="alert" style="display:none">
                                
                                <p class="text-white text-center" >Debes seleccionar una cuenta de origen</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Cuenta destino*</label>
                                <select class="form-control" id="account_final" name="account_final" placeholder="Seleccione la cuenta destino"
                                    required>
                                    <option value="0">Seleccione la cuenta destino</option>
                                    @foreach (Auth::user()->accounts->where('status','Activa') as $account)
                                        <option value="{{ $account->id }}"> {{ $account->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="alert alert-dark" id="finalAlert1" name="finalAlert1"  role="alert" style="display:none">
                                
                                <p class="text-white text-center" >La cuenta de origen no puede ser igual la cuenta destino</p>
                            </div>
                            <div class="alert alert-dark" id="finalAlert2" name="finalAlert2"  role="alert" style="display:none">
                                
                                <p class="text-white text-center" >Debes seleccionar una cuenta destino</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Monto a transferir *</label>
                                <input class="form-control" id="value" name="value" type=""
                                    placeholder="Ingresa el valor a transferir" required>
                            </div>
                            <div class="alert alert-dark" id="valueAlert" name="valueAlert"  role="alert" style="display:none">
                                <p class="text-white text-center" >El valor a transferir no puede ser igual a cero</p>
                            </div>
                            
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit"  class="btn btn-info" id="btnTransfer" name="btnTransfer"><span id="btntext"
                                        class="bg-light"></span>Transferir</button>
                            </div>
                        </form>
                        @endif
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    
    const form = document.getElementById('ownTransfer');
    const ownInputs = document.querySelectorAll("#ownTransfer input");

    const ownSelects = document.querySelectorAll("#ownTransfer select");

    var sel;
    var fel;
   
    const validarFormulario = (e) =>{
        switch (e.target.name){
            case "account_origin":
            this.sel = e.target.value;
                if(fel == sel) {
                    document.getElementById("finalAlert1").style.display = "block";
                }else{
                    document.getElementById("originAlert").style.display = "none";
                    document.getElementById("finalAlert1").style.display = "none";
                }
            break;
            case "account_final":
            this.fel = e.target.value;
                if(fel == sel) {
                    document.getElementById("finalAlert1").style.display = "block";
                }else if( e.target.value == 0 ||  e.target.value == null){
                    document.getElementById("finalAlert2").style.display = "block";
                }else{
                    document.getElementById("finalAlert1").style.display = "none";
                    document.getElementById("finalAlert2").style.display = "none";
                }
            break;
            case "value":
                if(e.target.value == 0){
                    document.getElementById("valueAlert").style.display = "block";
                }else{
                    document.getElementById("valueAlert").style.display = "none";
                }
            break;
        }
        
    }

   

    const validarValor = (e)=>{
        
        $(e.target).val(function(index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }

    
    ownInputs.forEach((input) => {
        input.addEventListener('keyup',validarValor);
        input.addEventListener('blur',validarValor);
        input.addEventListener('keyup',validarFormulario);
        input.addEventListener('blur',validarFormulario);
    });
    

    ownSelects.forEach((select) => {
        select.addEventListener('change',validarFormulario);
    });
</script>