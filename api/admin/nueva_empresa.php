<?php
$empresa = new empresa();
if(isset($_POST['submit'])){
    $empresa->newEmpresa();
}
?>
<h1>Crear Nueva Empresa</h1>

<form id="new_empresa" action="" method="post" enctype="multipart/form-data">

    <div class="form-group row">
      <label for="e_name" class="col-sm-2 col-form-label">Nombre de la empresa</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg" name="e_name" id="e_name" placeholder="">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_name_f" class="col-sm-2 col-form-label">Nombre Fiscal de la empresa</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg" name="e_name_f" id="e_name_f" placeholder="">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_number_f" class="col-sm-2 col-form-label">N&uacute;mero Fiscal de la empresa (NIF: CIF:)</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg" name="e_number_f" id="e_number_f" placeholder="">
      </div>
    </div>
    
    <div class="form-group row">
      <label for="e_email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control input-lg"  name="e_email" id="e_email" placeholder="">
      </div>
    </div>

    <div class="form-group row">
        <div class="form-group row">
          <label for="e_phone_number" class="col-xs-6 col-sm-6 col-md-6" col-form-label">Telefono</label>
          <div class="col-sm-10">
            <input type="text" class="form-control input-lg"  name="e_phone_number" id="e_phone_number">
          </div>
        </div>
        <div class="form-group row">
          <label for="e_mobile_number" class="col-xs-6 col-sm-6 col-md-6 col-form-label">N&uacute;mero M&oacute;vil</label>
          <div class="col-sm-10">
            <input type="text" class="form-control input-lg"  name="e_mobile_number" id="e_mobile_number">
          </div>
        </div>
    </div>

    <div class="form-group row">
      <label for="e_address1" class="col-sm-2 col-form-label">Direcci&oacute;n 1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_address1" id="e_address1">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_address2" class="col-sm-2 col-form-label">Direcci&oacute;n 2</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_address2" id="e_address2">
      </div>
    </div>
    
    <div class="form-group row">
      <label for="e_postal" class="col-sm-2 col-form-label">C&oacute;digo Postal</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_postal" id="e_postal">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_city" class="col-sm-2 col-form-label">Municipio</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_city" id="e_city">
      </div>
    </div>
        
    <div class="form-group row">
      <label for="e_estate" class="col-sm-2 col-form-label">Provincia</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_estate" id="e_estate">
      </div>
    </div>
        
    <div class="form-group row">
      <label for="e_image" class="col-sm-2 col-form-label">Imagen de la empresa</label>
      <div class="col-sm-10">
        <input type="file" class="form-control input-lg" name="e_image" id="e_image">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_person1" class="col-sm-2 col-form-label">Persona Contacto 1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_person1" id="e_person1">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_mobile_p1" class="col-sm-2 col-form-label">N&uacute;mero M&oacute;bil de Persona Contacto 1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_mobile_p1" id="e_mobile_p1">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_person2" class="col-sm-2 col-form-label">Persona Contacto 2</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg" name="e_person2" id="e_person2">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_mobile_p2" class="col-sm-2 col-form-label">N&uacute;mero M&oacute;bil de Persona Contacto 1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_mobile_p2" id="e_mobile_p2">
      </div>
    </div>
    
    <div class="form-group row">
      <label for="e_category" class="col-sm-2 col-form-label">Categoria / Descripcion</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_category" id="e_category">
      </div>
    </div>

    <div class="col-xs-6 col-md-6">
        <input type="submit" name="submit" value="Guardar" class="btn btn-primary btn-block btn-lg">
    </div>
</form>