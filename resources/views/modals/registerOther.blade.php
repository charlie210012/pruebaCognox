<!-- Modal -->
<div class="modal fade" id="registerOtherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titulomodal">Inscribir Cuentas de Terceros</h5>
            </div>
            
            <div class="modal-body">

                <div class="tile">
                    <div class="tile-body">
                        @if(Auth::user()->accounts->where('status','Activa')->count() < 1)
                        <p>No puedes realizar la inscripción porque no tiene una cuenta activa</p>
                        @else
                        <form id="registerOther" name="registerOther" method="POST">
                            <div class="form-group">
                                <div class="alert alert-dark" role="alert">
                                    <p class="text-white text-center" >Los campos con (*) son obligatorios</p>
                                </div>
                                <label class="control-label">Selecciona cuenta*</label>
                                <select class="form-control"  id="account_register" name="account_register" placeholder="Seleccione la cuenta" 
                                    required>
                                    <option value="0">Seleccione la cuenta</option>
                                    @foreach ($otherAccounts as $account)
                                        <option value="{{ $account->id }}"> {{ $account->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit"  class="btn btn-info" id="btnRegister" name="btnRegister"><span id="btntext"
                                        class="bg-light"></span>Inscribir</button>
                            </div>
                        </form>
                        @endif
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    
  
