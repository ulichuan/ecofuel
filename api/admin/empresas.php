<?php
$empresa = new empresa();

//Listar todas las empresas
$allCompanies = $empresa->allEmpresas();
?>

<h1>Empresas</h1>

<div class="row">
    <table class="table">
        <tbody>
            <?php
                foreach ($allCompanies as $comp)
                {
                    $ec_id = "$comp[id]";
                    $ec_name = "$comp[company]";
                    $ec_email = "$comp[email]";
                    $ec_p_number = "$comp[phone_number]";
                    $ec_m_number = "$comp[mobile_number]";
                    $ec_city = "$comp[city]";
                    $ec_category = "$comp[category]";

                    echo "<tr>";
                    echo "<td>".$ec_name."</td>";
                    echo "<td>".$ec_email."</td>";
                    echo "<td>".$ec_p_number."</td>";
                    echo "<td>".$ec_m_number."</td>";
                    echo "<td>".$ec_city."</td>";
                    echo "<td>".$ec_category."</td>";
                    echo "<td><button class=\"btn btn-info\" id=\"ver_emp_info\" onclick='varIdPage(\"admin\",\"ver_empresa\",$ec_id);'><i class=\"far fa-eye\"></i></button></td>";
                    echo "<td><button class=\"btn btn-success\" id=\"edit_emp_info\" onclick='varIdPage(\"admin\",\"editar_empresa\",$ec_id);'><i class=\"far fa-edit\"></i></button></td>";
                    echo "</tr>";
            ?>

            <?php
                }
            ?>
        </tbody>
    </table>
</div>




