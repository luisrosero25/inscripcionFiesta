<div class="container">


    <div class="page-header">
        <h3><span class="glyphicon glyphicon-th-list"></span> {{title}} </h3>
    </div> 

    <form ng-submit="guardarInscripcion()" role="form" name="forma"class="row">


        <fieldset>
            <legend>Registra todos tus datos</legend>
            <div class="form-group col-lg-6"  ng-class="{'has-error': forma.primer_nombre.$invalid, 'has-success': forma.primer_nombre.$valid}">
                <label for="primer_nombre">*Primer Nombre</label>
                <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" placeholder="Digita tu primer nombre" ng-model="usuario.primer_nombre" required>

            </div>
            <div class="form-group col-lg-6">
                <label for="segundo_nombre">Segundo Nombre</label>
                <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" ng-model="usuario.segundo_nombre" placeholder="Digita tu segundo nombre" >
            </div>
            <div class="form-group col-lg-6" ng-class="{'has-error': forma.primer_apellido.$invalid, 'has-success': forma.primer_apellido.$valid}">
                <label for="primer_apellido">*Primer Apellido</label>
                <input type="text" class="form-control"  id="primer_apellido" name="primer_apellido" placeholder="Digita tu primer apellido" ng-model="usuario.primer_apellido" required>
            </div>
            <div class="form-group col-lg-6">
                <label for="segundo_apellido">Segundo Apellido</label>
                <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" ng-model="usuario.segundo_apellido" placeholder="Digita tu segundo apellido">
            </div>

            <div class="form-group col-lg-6" ng-class="{'has-error': forma.id_tipo_identificacion.$invalid, 'has-success': forma.id_tipo_identificacion.$valid}">
                <label for="id_tipo_identificacion">*Tipo Identificacion</label>
                <select name="id_tipo_identificacion" id="id_tipo_identificacion" class="form-control" ng-model="usuario.id_tipo_identificacion" ng-options="tipo_identificacion.descripcion for tipo_identificacion in tipos_identificacion track by tipo_identificacion.id" required>
                    <option value="">Seleccione uno..</option>
                </select>
            </div>

            <div class="form-group col-lg-6" ng-class="{'has-error': forma.numero_identificacion.$invalid, 'has-success': forma.numero_identificacion.$valid}">
                <label for="numero_identificacion">*Numero Identificacion</label>
                <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion" placeholder="Digita tu numero de identificacion"  ng-model="usuario.numero_identificacion" required>
            </div>


            <div class="form-group col-lg-6" ng-class="{'has-error': forma.id_sexo.$invalid, 'has-success': forma.id_sexo.$valid}">
                <label for="id_sexo">*Sexo</label>
                <select name="id_sexo" id="id_sexo" class="form-control"   ng-model="usuario.id_sexo"  ng-options="sexo.descripcion for sexo in sexos  track by sexo.id"  required>
                    <option value="" >Seleccione uno..</option>
                </select>
            </div>

            <div class="form-group col-lg-6" ng-class="{'has-error': forma.id_servicio.$invalid, 'has-success': forma.id_servicio.$valid}">
                <label for="id_servicio">*Servicio/Area</label>
                <select name="id_servicio" id="id_servicio" class="form-control" ng-model="usuario.id_servicio" ng-options="servicio.descripcion for servicio in servicios track by servicio.id"  required>
                    <option value="" >Seleccione uno..</option>
                </select>
            </div>

            <div class="form-group col-lg-6" ng-class="{'has-error': forma.celular.$invalid, 'has-success': forma.celular.$valid}">
                <label for="celular">*Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="Digita tu numero de Celular" ng-model="usuario.celular" required>
            </div>
            <div class="form-group col-lg-6">
                <label for="telefono">Celular 2 (opcional)</label>
                <input type="text" class="form-control" name="telefono" id="telefono" ng-model="usuario.telefono" placeholder="Digita un segundo numero de celular">
            </div>

            <div class="form-group col-lg-6" ng-class="{'has-error': forma.cargo.$invalid, 'has-success': forma.cargo.$valid}">
                <label for="cargo">*Cargo</label>
                <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Digita tu cargo o ocupacion" ng-model="usuario.cargo" required>
            </div>

            <div class="form-group col-lg-6" ng-class="{'has-error': forma.email.$invalid, 'has-success': forma.email.$valid}">
                <label for="email">*Correo Electronico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digita tu correo electronico" ng-model="usuario.email" required>
            </div>
            <button type="submit" class="btn btn-default" ng-disabled="forma.$invalid">Registrarse</button>
        </fieldset>

    </form>

</div>