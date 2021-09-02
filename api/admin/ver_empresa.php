<?php
$empresa = new empresa();
//Obtener el id de la empresa
if(!isset($_GET["id"])) exit();
$e_id = $_GET["id"];
//echo $e_id;
//Variable de la empresa
$ve_empresa = $empresa->empresaById($e_id);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- Card de cada empresa -->
            <?php
            foreach($ve_empresa as $row)
            {
                $company = "$row[company]";
                $nombre_fiscal = "$row[nombre_fiscal]";
                $numero_fiscal = "$row[numero_fiscal]";
                $email = "$row[email]";
                $phone_number = "$row[phone_number]";
                $mobile_number = "$row[mobile_number]";
                $address_1 = "$row[address_1]";
                $address_2 = "$row[address_2]";
                $postal_code = "$row[postal_code]";
                $city = "$row[city]";
                $provincia = "$row[estate]";
                $person_1 = "$row[person_1]";
                $person_2 = "$row[person_2]";
                $mobile_person1 = "$row[mobile_person1]";
                $mobile_person2 = "$row[mobile_person2]";
                $category = "$row[category]";
            
            ?>
            <div class="card-header">
                <h3 class="card-title">
                    <strong>Nombre Empresa: </strong><?php echo $company; ?>
                </h3>
            </div>
            <div class="card-body">
                <div id="empresaTable" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <p>Nombre Fiscal: <?php echo $nombre_fiscal; ?></p>
                            <p>N&uacute;mero Fiscal: <?php echo $numero_fiscal; ?></p>
                            <p>Categor&iacute;a: <?php echo $category; ?></p>
                        </div>        
                        <div class="col-sm-6 col-md-6">
                            <p>Email: <?php echo $email; ?></p>
                            <p>Tel&eacute;fono: <?php echo $phone_number; ?></p>
                            <p>M&oacute;bil: <?php echo $mobile_number; ?></p>
                        </div>
                        <div class="row"></div>
                        <div class="col-sm-12">
                            <h4>Direcci&oacute;n:</h4>
                            <p><?php echo $address_1; ?></p>
                            <p><?php echo $address_2; ?></p>
                            <p>C&oacute;digo Postal: <?php echo $postal_code; ?></p>
                            <p>Municipio: <?php echo $city; ?></p>
                            <p>Porvincia: <?php echo $provincia; ?></p>
                        </div>
                        <div class="row"></div>
                        <div class="col-sm-12">
                            <h4>Contacos:</h4>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <p>Contacto 1: <?php echo $person_1; ?></p>
                                    <p>Tel&eacute;fono contacto 1: <?php echo $mobile_person1; ?></p>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <p>Contacto 2: <?php echo $person_2; ?></p>
                                    <p>Tel&eacute;fono contacto 2: <?php echo $mobile_person2; ?></p>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div><!-- .row -->
                </div>
            </div>
            <?php
            } // fin del foreach
            ?>
        <!-- fin del php -->
        </div><!-- .card -->
    </div><!-- .col-12 -->
</div><!-- .row -->