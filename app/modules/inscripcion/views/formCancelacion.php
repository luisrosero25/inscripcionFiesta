<div class="container">


    <div class="page-header">
        <h3><span class="glyphicon glyphicon-remove"></span> {{title}} </h3>
    </div> 

    <form ng-submit="cancelarInscripcion()" role="form" name="forma"class="row">


        <fieldset>
            <legend>Registra todos tus datos</legend>
     
            <div class="form-group col-lg-6" ng-class="{'has-error': forma.id_tipo_identificacion.$invalid, 'has-success': forma.id_tipo_identificacion.$valid}">
                <label for="id_tipo_identificacion">*Tipo Identificacion</label>
                <select name="id_tipo_identificacion" id="id_tipo_identificacion" class="form-control" ng-model="usuario.id_tipo_identificacion" ng-options="tipo_identificacion.descripcion for tipo_identificacion in tipos_identificacion track by tipo_identificacion.id" required>
                    <option value="">Seleccione uno..</option>
                </select>
            </div>

            <div class="form-group col-lg-6" ng-class="{'has-error': forma.numero_identificacion.$invalid, 'has-success': forma.numero_identificacion.$valid}">
                <label for="numero_identificacion">*Numero Identificacion</label>
                <input type="number" class="form-control" id="numero_identificacion" name="numero_identificacion" placeholder="Digita tu numero de identificacion"  ng-model="usuario.numero_identificacion" required>
            </div>


            <p class="text-center">
                <button type="submit" class="btn btn-success" ng-disabled="forma.$invalid">Solicitar Cancelacion</button>

            </p>
        </fieldset>

    </form>

</div>