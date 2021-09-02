<?php
$empresa = new empresa();
//Obtener el id de la empresa
if(!isset($_GET["id"])) exit();
$e_id = $_GET["id"];
//echo $e_id;
if(isset($_POST['submit'])){
    //$empresa->newEmpresa();
    $empresa->updateEmpresa();
}
$ne_empresa = $empresa->empresaById($e_id);

?>
<h1>Actualizar Empresa</h1>

<form id="new_empresa" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_comp" value="<?php echo $e_id; ?>">
    <div class="form-group row">
      <label for="e_name" class="col-sm-2 col-form-label">Nombre de la empresa</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg" name="e_name" id="e_name" placeholder="<?php if(isset($ne_empresa[0]['company'])) { echo $ne_empresa[0]['company']; } ?>" value="<?php if(isset($ne_empresa[0]['company'])) { echo $ne_empresa[0]['company']; }?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_name_f" class="col-sm-2 col-form-label">Nombre Fiscal de la empresa</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg" name="e_name_f" id="e_name_f" placeholder="<?php if(isset($ne_empresa[0]['nombre_fiscal'])) { echo $ne_empresa[0]['nombre_fiscal']; } ?>" value="<?php if(isset($ne_empresa[0]['nombre_fiscal'])) { echo $ne_empresa[0]['nombre_fiscal']; }?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_number_f" class="col-sm-2 col-form-label">N&uacute;mero Fiscal de la empresa (NIF: CIF:)</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg" name="e_number_f" id="e_number_f" placeholder="<?php if(isset($ne_empresa[0]['numero_fiscal'])) { echo $ne_empresa[0]['numero_fiscal']; } ?>" value="<?php if(isset($ne_empresa[0]['numero_fiscal'])) { echo $ne_empresa[0]['numero_fiscal']; }?>">
      </div>
    </div>
    
    <div class="form-group row">
      <label for="e_email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control input-lg"  name="e_email" id="e_email" placeholder="<?php if(isset($ne_empresa[0]['email'])) { echo $ne_empresa[0]['email']; } ?>" value="<?php if(isset($ne_empresa[0]['email'])) { echo $ne_empresa[0]['email']; }?>">
      </div>
    </div>

    <div class="form-group row">
        <div class="form-group row">
          <label for="e_phone_number" class="col-xs-6 col-sm-6 col-md-6 col-form-label">Telefono</label>
          <div class="col-sm-10">
            <input type="text" class="form-control input-lg"  name="e_phone_number" id="e_phone_number" placeholder="<?php if(isset($ne_empresa[0]['phone_number'])) { echo $ne_empresa[0]['phone_number']; } ?>" value="<?php if(isset($ne_empresa[0]['phone_number'])) { echo $ne_empresa[0]['phone_number']; }?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="e_mobile_number" class="col-xs-6 col-sm-6 col-md-6 col-form-label">N&uacute;mero M&oacute;vil</label>
          <div class="col-sm-10">
            <input type="text" class="form-control input-lg"  name="e_mobile_number" id="e_mobile_number" placeholder="<?php if(isset($ne_empresa[0]['mobile_number'])) { echo $ne_empresa[0]['mobile_number']; } ?>" value="<?php if(isset($ne_empresa[0]['mobile_number'])) { echo $ne_empresa[0]['mobile_number']; }?>">
          </div>
        </div>
    </div>

    <div class="form-group row">
      <label for="e_address1" class="col-sm-2 col-form-label">Direcci&oacute;n 1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_address1" id="e_address1" placeholder="<?php if(isset($ne_empresa[0]['address_1'])) { echo $ne_empresa[0]['address_1']; } ?>" value="<?php if(isset($ne_empresa[0]['address_1'])) { echo $ne_empresa[0]['address_1']; }?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_address2" class="col-sm-2 col-form-label">Direcci&oacute;n 2</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_address2" id="e_address2" placeholder="<?php if(isset($ne_empresa[0]['address_2'])) { echo $ne_empresa[0]['address_2']; } ?>" value="<?php if(isset($ne_empresa[0]['address_2'])) { echo $ne_empresa[0]['address_2']; }?>">
      </div>
    </div>
    
    <div class="form-group row">
      <label for="e_postal" class="col-sm-2 col-form-label">C&oacute;digo Postal</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_postal" id="e_postal" placeholder="<?php if(isset($ne_empresa[0]['postal_code'])) { echo $ne_empresa[0]['postal_code']; } ?>" value="<?php if(isset($ne_empresa[0]['postal_code'])) { echo $ne_empresa[0]['postal_code']; }?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_city" class="col-sm-2 col-form-label">Municipio</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_city" id="e_city" placeholder="<?php if(isset($ne_empresa[0]['city'])) { echo $ne_empresa[0]['city']; } ?>" value="<?php if(isset($ne_empresa[0]['city'])) { echo $ne_empresa[0]['city']; }?>">
      </div>
    </div>
        
    <div class="form-group row">
      <label for="e_estate" class="col-sm-2 col-form-label">Provincia</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_estate" id="e_estate" placeholder="<?php if(isset($ne_empresa[0]['estate'])) { echo $ne_empresa[0]['estate']; } ?>" value="<?php if(isset($ne_empresa[0]['estate'])) { echo $ne_empresa[0]['estate']; }?>">
      </div>
    </div>
        
    <!-- <div class="form-group row">
      <label for="e_image" class="col-sm-2 col-form-label">Imagen de la empresa</label>
      <div class="col-sm-10">
        <input type="file" class="form-control input-lg" name="e_image" id="e_image">
      </div>
    </div> -->

    <div class="form-group row">
      <label for="e_person1" class="col-sm-2 col-form-label">Persona Contacto 1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_person1" id="e_person1" placeholder="<?php if(isset($ne_empresa[0]['person_1'])) { echo $ne_empresa[0]['person_1']; } ?>" value="<?php if(isset($ne_empresa[0]['person_1'])) { echo $ne_empresa[0]['person_1']; }?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_mobile_p1" class="col-sm-2 col-form-label">N&uacute;mero M&oacute;bil de Persona Contacto 1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_mobile_p1" id="e_mobile_p1" placeholder="<?php if(isset($ne_empresa[0]['mobile_person1'])) { echo $ne_empresa[0]['mobile_person1']; } ?>" value="<?php if(isset($ne_empresa[0]['mobile_person1'])) { echo $ne_empresa[0]['mobile_person1']; }?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_person2" class="col-sm-2 col-form-label">Persona Contacto 2</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg" name="e_person2" id="e_person2" placeholder="<?php if(isset($ne_empresa[0]['person_2'])) { echo $ne_empresa[0]['person_2']; } ?>" value="<?php if(isset($ne_empresa[0]['person_2'])) { echo $ne_empresa[0]['person_2']; }?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="e_mobile_p2" class="col-sm-2 col-form-label">N&uacute;mero M&oacute;bil de Persona Contacto 1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_mobile_p2" id="e_mobile_p2" placeholder="<?php if(isset($ne_empresa[0]['mobile_person2'])) { echo $ne_empresa[0]['mobile_person2']; } ?>" value="<?php if(isset($ne_empresa[0]['mobile_person2'])) { echo $ne_empresa[0]['mobile_person2']; }?>">
      </div>
    </div>
    
    <div class="form-group row">
      <label for="e_category" class="col-sm-2 col-form-label">Categoria / Descripcion</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-lg"  name="e_category" id="e_category" placeholder="<?php if(isset($ne_empresa[0]['category'])) { echo $ne_empresa[0]['category']; } ?>" value="<?php if(isset($ne_empresa[0]['category'])) { echo $ne_empresa[0]['category']; }?>">
      </div>
    </div>

    <div class="col-xs-6 col-md-6">
        <input type="submit" name="submit" value="Actualizar" class="btn btn-primary btn-block btn-lg">
    </div>
</form>
<?php 
  if (isset($errorMsg)) {
   echo "<div>$errorMsg</div>";
  }
?>
