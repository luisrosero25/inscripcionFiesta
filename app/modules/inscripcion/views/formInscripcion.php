<div class="page-header">
    <h3><span class="glyphicon glyphicon-th-list"></span> {{title}} </h3>
</div> 

<form ng-submit="guardarInscripcion()" role="form" class="row">
     <div>{{aviso}}</div>
    <fieldset>
        <legend>Registra todos tus datos</legend>
        <div class="form-group col-lg-6">
            <label for="primer_nombre">*Primer Nombre</label>
            <input type="text" class="form-control" id="primer_nombre" placeholder="Digita tu primer nombre" ng-required="string">
        </div>
        <div class="form-group col-lg-6">
            <label for="segundo_nombre">Segundo Nombre</label>
            <input type="text" class="form-control" id="segundo_nombre" placeholder="Digita tu segundo nombre" >
        </div>
        <div class="form-group col-lg-6">
            <label for="primer_apellido">*Primer Apellido</label>
            <input type="text" class="form-control" id="primer_apellido" placeholder="Digita tu primer apellido" ng-required="string">
        </div>
        <div class="form-group col-lg-6">
            <label for="segundo_apellido">Segundo Apellido</label>
            <input type="text" class="form-control" id="segundo_apellido" placeholder="Digita tu segundo apellido">
        </div>

        <div class="form-group col-lg-6">
            <label for="id_tipo_identificacion">*Tipo Identificacion</label>
            <select name="id_tipo_identificacion" id="id_tipo_identificacion" class="form-control" ng-required="string">
                <option value="">Seleccione uno..</option>
            </select>
        </div>

        <div class="form-group col-lg-6">
            <label for="numero_identificacion">*Numero Identificacion</label>
            <input type="text" class="form-control" id="numero_identificacion" placeholder="Digita tu numero de identificacion" ng-required="number">
        </div>


        <div class="form-group col-lg-6">
            <label for="id_sexo">*Sexo</label>
            <select name="id_sexo" id="id_sexo" class="form-control">
                <option>Seleccione uno..</option>
            </select>
        </div>

        <div class="form-group col-lg-6">
            <label for="id_servicio">*Servicio/Area</label>
            <select name="id_area" id="id_servicio" class="form-control">
                <option>Seleccione uno..</option>
            </select>
        </div>

        <div class="form-group col-lg-6">
            <label for="celular">*Celular</label>
            <input type="text" class="form-control" id="celular" placeholder="Digita tu numero de Celular">
        </div>
        <div class="form-group col-lg-6">
            <label for="telefono">Celular 2 (opcional)</label>
            <input type="text" class="form-control" id="telefono" placeholder="Digita un segundo numero de celular">
        </div>

        <div class="form-group col-lg-6">
            <label for="cargo">*Cargo</label>
            <input type="text" class="form-control" id="cargo" placeholder="Digita tu cargo o ocupacion">
        </div>

        <div class="form-group col-lg-6">
            <label for="email">*Correo Electronico</label>
            <input type="email" class="form-control" id="email" placeholder="Digita tu correo electronico">
        </div>
        <button type="submit" class="btn btn-default" ng-binding>Registrarse</button>
    </fieldset>

</form>